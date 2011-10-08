<?
session_start();
// Установщик Икариам
define('INSTALL_SCRIPT_DIR', dirname(__FILE__).'/');
define('SETUP_FILE', INSTALL_SCRIPT_DIR . 'IkariamSetup.tar.gz');

$neededFilesPattern = array(
        '!^install/.*!',
	'!^setup/.*!'
);

// Основной класс для действий с файлами
class BasicFileUtil {
	public static function getTempFolder() {
		if (!empty($_SERVER['DOCUMENT_ROOT'])) {
			if (strpos($_SERVER['DOCUMENT_ROOT'], 'strato') !== false) {
				if (!@file_exists($_SERVER['DOCUMENT_ROOT'].'/tmp')) {
					@mkdir($_SERVER['DOCUMENT_ROOT'].'/tmp/', 0777);
					@chmod($_SERVER['DOCUMENT_ROOT'].'/tmp/', 0777);
				}
			}
			if (@file_exists($_SERVER['DOCUMENT_ROOT'].'/tmp') && @is_writable($_SERVER['DOCUMENT_ROOT'].'/tmp')) {
				return $_SERVER['DOCUMENT_ROOT'].'/tmp/';
			}
		}
		if (isset($_ENV['TMP']) && @is_writable($_ENV['TMP'])) {
			return $_ENV['TMP'] . '/';
		}
		if (isset($_ENV['TEMP']) && @is_writable($_ENV['TEMP'])) {
			return $_ENV['TEMP'] . '/';
		}
		if (isset($_ENV['TMPDIR']) && @is_writable($_ENV['TMPDIR'])) {
			return $_ENV['TMPDIR'] . '/';
		}
		if (!preg_match('/^5\.1\.2(?![.0-9])/', phpversion())) {
			if (($path = ini_get('upload_tmp_dir')) && @is_writable($path)) {
				return $path . '/';
			}
			if (@file_exists('/tmp/') && @is_writable('/tmp/')) {
				return '/tmp/';
			}
			if (function_exists('session_save_path') && ($path = session_save_path()) && @is_writable($path)) {
				return $path . '/';
			}
		}
		$path = INSTALL_SCRIPT_DIR.'tmp/';
		if (@file_exists($path) && @is_writable($path)) {
			return $path;
		}
		else {
			if (ini_get('safe_mode')) $reason = "due to php safe_mode restrictions";
			else $reason = "due to an unknown reason";
			die('There is no access to the system temporary folder '.$reason.' and no user specific temporary folder exists in '.INSTALL_SCRIPT_DIR.'! This is a misconfiguration of your webserver software! Please create a folder called '.$path.' using your favourite ftp program, make it writable and then retry this installation.');
		}
	}
}

// Класс для работы с tart.gz архивами
class Tar {
	protected $archiveName = '';
	protected $contentList = array();
	protected $opened = false;
	protected $read = false;
	protected $file = null;
	protected $isZipped = false;
	protected $mode = 'rb';

	public function __construct($archiveName) {
		$match = array();
		if (!is_file($archiveName)) {
			die("unable to find tar archive '".$archiveName."'");
		}
		$this->archiveName = $archiveName;
		$this->open();
		$this->readContent();
	}

	public function __destruct() {
		$this->close();
	}

        public function open() {
		if (!$this->opened) {
			if ($this->isZipped) $this->file = new ZipFile($this->archiveName, $this->mode);
			else {
				$this->file = new File($this->archiveName, $this->mode);
				if ($this->file->read(2) == "\37\213") {
					$this->file->close();
					$this->isZipped = true;
					$this->file = new ZipFile($this->archiveName, $this->mode);
				}
				else {
					$this->file->seek(0);
				}
			}
			$this->opened = true;
		}
	}

	public function close() {
		if ($this->opened) {
			$this->file->close();
			$this->opened = false;
		}
	}

	public function getContentList() {
		if (!$this->read) {
			$this->open();
			$this->readContent();
		}
		return $this->contentList;
	}

	public function getFileInfo($fileIndex) {
		if (!is_int($fileIndex)) {
			$fileIndex = $this->getIndexByFilename($fileIndex);
		}
		if (!isset($this->contentList[$fileIndex])) {
			die("Tar: could find file '$index' in archive");
		}
		return $this->contentList[$fileIndex];
	}

	public function getIndexByFilename($filename) {
		foreach ($this->contentList as $index => $file) {
			if ($file['filename'] == $filename) {
				return $index;
			}
		}
		return false;
	}

	public function extractToString($index) {
		if (!$this->read) {
			$this->open();
			$this->readContent();
		}
		$header = $this->getFileInfo($index);
		if ($header['type'] != 'file') {
			return false;
		}
		$this->file->seek($header['offset']);
		$content = '';
		$n = floor($header['size'] / 512);
		for($i = 0; $i < $n; $i++) {
			$content .= $this->file->read(512);
		}
		if(($header['size'] % 512) != 0) {
			$buffer = $this->file->read(512);
			$content .= substr($buffer, 0, ($header['size'] % 512));
		}
		return $content;
	}

	public function extract($index, $destination) {
                if (!$this->read) {
			$this->open();
			$this->readContent();
		}
		$header = $this->getFileInfo($index);
		if ($header['type'] != 'file') {
			return false;
		}
		$this->file->seek($header['offset']);
		$targetFile = new File($destination);
		$n = floor($header['size'] / 512);
		for ($i = 0; $i < $n; $i++) {
			$content = $this->file->read(512);
			$targetFile->write($content, 512);
		}
		if (($header['size'] % 512) != 0) {
			$content = $this->file->read(512);
			$targetFile->write($content, ($header['size'] % 512));
		}
		$targetFile->close();
		if (function_exists('apache_get_version') || !@$targetFile->is_writable()) {
			@$targetFile->chmod(0777);
		}
		else {
			@$targetFile->chmod(0755);
		}
		if ($header['mtime']) {
			@$targetFile->touch($header['mtime']);
		}
		if (filesize($destination) != $header['size']) {
			die("Could not untar file '".$header['filename']."' to '".$destination."'. Maybe disk quota exceeded in folder '".dirname($destination)."'.");
		}
		return true;
	}

	protected function readContent() {
		$this->contentList = array();
		$this->read = true;
		$i = 0;
		while (strlen($binaryData = $this->file->read(512)) != 0) {
			$header = $this->readHeader($binaryData);
			if ($header === false) {
				continue;
			}
			$this->contentList[$i] = $header;
			$this->contentList[$i]['index'] = $i;
			$i++;
			$this->file->seek($this->file->tell() + (512 * ceil(($header['size'] / 512))));
		}
	}

	protected function readHeader($binaryData) {
		if (strlen($binaryData) != 512) {
			return false;
		}
		$header = array();
		$checksum = 0;
		for ($i = 0; $i < 148; $i++) {
			$checksum += ord(substr($binaryData, $i, 1));
		}
		for ($i = 148; $i < 156; $i++) {
			$checksum += ord(' ');
		}
		for ($i = 156; $i < 512; $i++) {
			$checksum += ord(substr($binaryData, $i, 1));
		}
		$data = unpack("a100filename/a8mode/a8uid/a8gid/a12size/a12mtime/a8checksum/a1typeflag/a100link/a6magic/a2version/a32uname/a32gname/a8devmajor/a8devminor", $binaryData);
		$header['checksum'] = OctDec(trim($data['checksum']));
		if($header['checksum'] == $checksum) {
			$header['filename'] = trim($data['filename']);
			$header['mode'] = OctDec(trim($data['mode']));
			$header['uid'] = OctDec(trim($data['uid']));
			$header['gid'] = OctDec(trim($data['gid']));
			$header['size'] = OctDec(trim($data['size']));
			$header['mtime'] = OctDec(trim($data['mtime']));
			if(($header['typeflag'] = $data['typeflag']) == '5') {
				$header['size'] = 0;
				$header['type'] = 'folder';
			}
			else {
				$header['type'] = 'file';
			}
			$header['offset'] = $this->file->tell();
			return $header;
		}
		else {
			return false;
		}
	}
}

// Класс для работы с файлами
class File {
	protected $resource = null;
	protected $filename;

	public function __construct($filename, $mode = 'wb') {
		$this->filename = $filename;
		$this->resource = fopen($filename, $mode);
	}

	public function __call($function, $arguments) {
		if (function_exists('f' . $function)) {
			array_unshift($arguments, $this->resource);
	       		return call_user_func_array('f' . $function, $arguments);
		}
		else if (function_exists($function)) {
			array_unshift($arguments, $this->filename);
	       		return call_user_func_array($function, $arguments);
		}
		else {
			die('Can not call file method ' . $function);
		}
	}
}

// Класс для работы с zip архивом
class ZipFile extends File {
	public function __construct($filename, $mode = 'wb') {
		$this->filename = $filename;
		if (!function_exists('gzopen')) {
			die('Can not find functions of the zlib extension');
		}
		$this->resource = @gzopen($filename, $mode);
		if ($this->resource === false) {
			die('Can not open file ' . $filename);
		}
	}

	public function __call($function, $arguments) {
		if (function_exists('gz' . $function)) {
			array_unshift($arguments, $this->resource);
	       		return call_user_func_array('gz' . $function, $arguments);
		}
		else if (function_exists($function)) {
			array_unshift($arguments, $this->filename);
	       		return call_user_func_array($function, $arguments);
		}
		else {
			die('Can not call method ' . $function);
		}
	}

	public function getFileSize() {
		$byteBlock = 1<<14;
		$eof = $byteBlock;
		$correction = 1;
		while ($this->seek($eof) == 0) {
			$eof += $byteBlock;
			$correction = 0;
		}
		while ($byteBlock > 1) {
			$byteBlock >>= 1;
			$eof += $byteBlock * ($this->seek($eof) ? -1 : 1);
		}
		if ($this->seek($eof) == -1) $eof -= 1;
		$this->rewind();
		return $eof - $correction;
	}
}

define('TMP_DIR', BasicFileUtil::getTempFolder());
if (isset($_REQUEST['tmpFilePrefix'])) {
	$prefix = preg_replace('/[^a-f0-9_]+/', '', $_REQUEST['tmpFilePrefix']);
}
else {
	$prefix = substr(sha1(uniqid(microtime())), 0, 8) . '_';
}
define('TMP_FILE_PREFIX', $prefix);
if (isset($_GET['showImage'])) {
	if (preg_match('~\w+\.jpg~', $_GET['showImage'])) {
		header('Content-Type: image/jpg');
		readfile(TMP_DIR . TMP_FILE_PREFIX . $_GET['showImage']);
	}
	exit;
}
if (isset($_GET['showJs'])) {
	if (preg_match('~\w+\.js~', $_GET['showJs'])) {
		header('Content-Type: application/x-javascript');
		readfile(TMP_DIR . TMP_FILE_PREFIX . $_GET['showJs']);
	}
	exit;
}

if (!file_exists(TMP_DIR . TMP_FILE_PREFIX . 'IkariamSetup.class.php')) {
	$tar = new Tar(SETUP_FILE);
	$contentList = $tar->getContentList();
	if (!count($contentList)) {
		die("Can not unpack 'IkariamSetup.tar.gz'. File is probably broken.");
	}
	foreach ($contentList as $file) {
		if ($file['type'] != 'folder') {
			foreach ($neededFilesPattern as $pattern) {
				if (preg_match($pattern, $file['filename'])) {
					$tar->extract($file['index'], TMP_DIR . TMP_FILE_PREFIX . basename($file['filename']));
				}
			}
		}
	}
	$tar->close();
}

@require_once(TMP_DIR . TMP_FILE_PREFIX . 'IkariamSetup.class.php');

if (!class_exists('IkariamSetup')) {
	die("Can not find class 'IkariamSetup'");
}

$SETUP = new IkariamSetup;