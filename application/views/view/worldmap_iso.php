<?$x = $param1?>
<?$y = $param2?>
<div id="mainview" style="overflow:visible;z-index:30">

	<div id="annotationBox" style="display:none;">
        <div class="close" onclick="this.parentNode.style.display='none'"></div>
        <h3 class="header" id="annotationHeader"></h3>
        <div class="content" style="padding:10px;" id="annotationText">
            <form name="addIslandForm" action="<?=$this->config->item('base_url')?>actions/addIslandToShortcut/" method="POST">
			    <input type="hidden" name="islandX" value="1">
			    <input type="hidden" name="islandY" value="1">
			<p>В список быстрого доступа каждого острова может быть внесен текст, содержащий до 15 символов.</p>
			<div class="centerButton">Текст: <input type="text" name="label" value="inselname"  maxlength="15"></div>
			<div class="centerButton"><a class="button" onclick="document.addIslandForm.submit();" href="#">Добавить остров</a></div>
			</form>
        </div>
        <div class="footer"></div>
    </div>

    <div id="scrollcover" style="overflow: hidden ;background-image:url(<?=$this->config->item('style_url')?>skin/world/bg_ocean01.gif);z-index:35">
        <div id="worldmap" style="overflow:visible;position:absolute;z-index:40;left:240px;top:-300px;">

            <div id="map1" style="position:absolute;z-index:50;cursor:move;">
<!-- Здесь видимо стандартные картинки моря -->
                <div align='center' alt=''  valign='middle' id='tile_0_0'
                    class = "ocean1"
                    style='z-index:100;position:absolute; width:240px; height:120px; left:0px; top:0px;'
                    ><div id='wonder_0_0' ></div
                    ><div id='tradegood_0_0' ></div
                    ><div id='cities_0_0'></div
                    ><div id='marking_0_0'></div
                    ><div></div
                    ><div id='magnify_0_0'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_1_0'
                    class = "ocean1"
                    style='z-index:101;position:absolute; width:240px; height:120px; left:120px; top:60px;'
                    ><div id='wonder_1_0' ></div
                    ><div id='tradegood_1_0' ></div
                    ><div id='cities_1_0'></div
                    ><div id='marking_1_0'></div
                    ><div></div
                    ><div id='magnify_1_0'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_2_0'
                    class = "ocean1"
                    style='z-index:102;position:absolute; width:240px; height:120px; left:240px; top:120px;'
                    ><div id='wonder_2_0' ></div
                    ><div id='tradegood_2_0' ></div
                    ><div id='cities_2_0'></div
                    ><div id='marking_2_0'></div
                    ><div></div
                    ><div id='magnify_2_0'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_3_0'
                    class = "ocean1"
                    style='z-index:103;position:absolute; width:240px; height:120px; left:360px; top:180px;'
                    ><div id='wonder_3_0' ></div
                    ><div id='tradegood_3_0' ></div
                    ><div id='cities_3_0'></div
                    ><div id='marking_3_0'></div
                    ><div></div
                    ><div id='magnify_3_0'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_4_0'
                    class = "ocean1"
                    style='z-index:104;position:absolute; width:240px; height:120px; left:480px; top:240px;'
                    ><div id='wonder_4_0' ></div
                    ><div id='tradegood_4_0' ></div
                    ><div id='cities_4_0'></div
                    ><div id='marking_4_0'></div
                    ><div></div
                    ><div id='magnify_4_0'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_5_0'
                    class = "ocean1"
                    style='z-index:105;position:absolute; width:240px; height:120px; left:600px; top:300px;'
                    ><div id='wonder_5_0' ></div
                    ><div id='tradegood_5_0' ></div
                    ><div id='cities_5_0'></div
                    ><div id='marking_5_0'></div
                    ><div></div
                    ><div id='magnify_5_0'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_6_0'
                    class = "ocean1"
                    style='z-index:106;position:absolute; width:240px; height:120px; left:720px; top:360px;'
                    ><div id='wonder_6_0' ></div
                    ><div id='tradegood_6_0' ></div
                    ><div id='cities_6_0'></div
                    ><div id='marking_6_0'></div
                    ><div></div
                    ><div id='magnify_6_0'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_7_0'
                    class = "ocean1"
                    style='z-index:107;position:absolute; width:240px; height:120px; left:840px; top:420px;'
                    ><div id='wonder_7_0' ></div
                    ><div id='tradegood_7_0' ></div
                    ><div id='cities_7_0'></div
                    ><div id='marking_7_0'></div
                    ><div></div
                    ><div id='magnify_7_0'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_8_0'
                    class = "ocean1"
                    style='z-index:108;position:absolute; width:240px; height:120px; left:960px; top:480px;'
                    ><div id='wonder_8_0' ></div
                    ><div id='tradegood_8_0' ></div
                    ><div id='cities_8_0'></div
                    ><div id='marking_8_0'></div
                    ><div></div
                    ><div id='magnify_8_0'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_9_0'
                    class = "ocean1"
                    style='z-index:109;position:absolute; width:240px; height:120px; left:1080px; top:540px;'
                    ><div id='wonder_9_0' ></div
                    ><div id='tradegood_9_0' ></div
                    ><div id='cities_9_0'></div
                    ><div id='marking_9_0'></div
                    ><div></div
                    ><div id='magnify_9_0'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_0_1'
                    class = "ocean1"
                    style='z-index:110;position:absolute; width:240px; height:120px; left:-120px; top:60px;'
                    ><div id='wonder_0_1' ></div
                    ><div id='tradegood_0_1' ></div
                    ><div id='cities_0_1'></div
                    ><div id='marking_0_1'></div
                    ><div></div
                    ><div id='magnify_0_1'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_1_1'
                    class = "ocean1"
                    style='z-index:111;position:absolute; width:240px; height:120px; left:0px; top:120px;'
                    ><div id='wonder_1_1' ></div
                    ><div id='tradegood_1_1' ></div
                    ><div id='cities_1_1'></div
                    ><div id='marking_1_1'></div
                    ><div></div
                    ><div id='magnify_1_1'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_2_1'
                    class = "ocean1"
                    style='z-index:112;position:absolute; width:240px; height:120px; left:120px; top:180px;'
                    ><div id='wonder_2_1' ></div
                    ><div id='tradegood_2_1' ></div
                    ><div id='cities_2_1'></div
                    ><div id='marking_2_1'></div
                    ><div></div
                    ><div id='magnify_2_1'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_3_1'
                    class = "ocean1"
                    style='z-index:113;position:absolute; width:240px; height:120px; left:240px; top:240px;'
                    ><div id='wonder_3_1' ></div
                    ><div id='tradegood_3_1' ></div
                    ><div id='cities_3_1'></div
                    ><div id='marking_3_1'></div
                    ><div></div
                    ><div id='magnify_3_1'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_4_1'
                    class = "ocean1"
                    style='z-index:114;position:absolute; width:240px; height:120px; left:360px; top:300px;'
                    ><div id='wonder_4_1' ></div
                    ><div id='tradegood_4_1' ></div
                    ><div id='cities_4_1'></div
                    ><div id='marking_4_1'></div
                    ><div></div
                    ><div id='magnify_4_1'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_5_1'
                    class = "ocean1"
                    style='z-index:115;position:absolute; width:240px; height:120px; left:480px; top:360px;'
                    ><div id='wonder_5_1' ></div
                    ><div id='tradegood_5_1' ></div
                    ><div id='cities_5_1'></div
                    ><div id='marking_5_1'></div
                    ><div></div
                    ><div id='magnify_5_1'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_6_1'
                    class = "ocean1"
                    style='z-index:116;position:absolute; width:240px; height:120px; left:600px; top:420px;'
                    ><div id='wonder_6_1' ></div
                    ><div id='tradegood_6_1' ></div
                    ><div id='cities_6_1'></div
                    ><div id='marking_6_1'></div
                    ><div></div
                    ><div id='magnify_6_1'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_7_1'
                    class = "ocean1"
                    style='z-index:117;position:absolute; width:240px; height:120px; left:720px; top:480px;'
                    ><div id='wonder_7_1' ></div
                    ><div id='tradegood_7_1' ></div
                    ><div id='cities_7_1'></div
                    ><div id='marking_7_1'></div
                    ><div></div
                    ><div id='magnify_7_1'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_8_1'
                    class = "ocean1"
                    style='z-index:118;position:absolute; width:240px; height:120px; left:840px; top:540px;'
                    ><div id='wonder_8_1' ></div
                    ><div id='tradegood_8_1' ></div
                    ><div id='cities_8_1'></div
                    ><div id='marking_8_1'></div
                    ><div></div
                    ><div id='magnify_8_1'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_9_1'
                    class = "ocean1"
                    style='z-index:119;position:absolute; width:240px; height:120px; left:960px; top:600px;'
                    ><div id='wonder_9_1' ></div
                    ><div id='tradegood_9_1' ></div
                    ><div id='cities_9_1'></div
                    ><div id='marking_9_1'></div
                    ><div></div
                    ><div id='magnify_9_1'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_0_2'
                    class = "ocean1"
                    style='z-index:120;position:absolute; width:240px; height:120px; left:-240px; top:120px;'
                    ><div id='wonder_0_2' ></div
                    ><div id='tradegood_0_2' ></div
                    ><div id='cities_0_2'></div
                    ><div id='marking_0_2'></div
                    ><div></div
                    ><div id='magnify_0_2'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_1_2'
                    class = "ocean1"
                    style='z-index:121;position:absolute; width:240px; height:120px; left:-120px; top:180px;'
                    ><div id='wonder_1_2' ></div
                    ><div id='tradegood_1_2' ></div
                    ><div id='cities_1_2'></div
                    ><div id='marking_1_2'></div
                    ><div></div
                    ><div id='magnify_1_2'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_2_2'
                    class = "ocean1"
                    style='z-index:122;position:absolute; width:240px; height:120px; left:0px; top:240px;'
                    ><div id='wonder_2_2' ></div
                    ><div id='tradegood_2_2' ></div
                    ><div id='cities_2_2'></div
                    ><div id='marking_2_2'></div
                    ><div></div
                    ><div id='magnify_2_2'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_3_2'
                    class = "ocean1"
                    style='z-index:123;position:absolute; width:240px; height:120px; left:120px; top:300px;'
                    ><div id='wonder_3_2' ></div
                    ><div id='tradegood_3_2' ></div
                    ><div id='cities_3_2'></div
                    ><div id='marking_3_2'></div
                    ><div></div
                    ><div id='magnify_3_2'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_4_2'
                    class = "ocean1"
                    style='z-index:124;position:absolute; width:240px; height:120px; left:240px; top:360px;'
                    ><div id='wonder_4_2' ></div
                    ><div id='tradegood_4_2' ></div
                    ><div id='cities_4_2'></div
                    ><div id='marking_4_2'></div
                    ><div></div
                    ><div id='magnify_4_2'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_5_2'
                    class = "ocean1"
                    style='z-index:125;position:absolute; width:240px; height:120px; left:360px; top:420px;'
                    ><div id='wonder_5_2' ></div
                    ><div id='tradegood_5_2' ></div
                    ><div id='cities_5_2'></div
                    ><div id='marking_5_2'></div
                    ><div></div
                    ><div id='magnify_5_2'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_6_2'
                    class = "ocean1"
                    style='z-index:126;position:absolute; width:240px; height:120px; left:480px; top:480px;'
                    ><div id='wonder_6_2' ></div
                    ><div id='tradegood_6_2' ></div
                    ><div id='cities_6_2'></div
                    ><div id='marking_6_2'></div
                    ><div></div
                    ><div id='magnify_6_2'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_7_2'
                    class = "ocean1"
                    style='z-index:127;position:absolute; width:240px; height:120px; left:600px; top:540px;'
                    ><div id='wonder_7_2' ></div
                    ><div id='tradegood_7_2' ></div
                    ><div id='cities_7_2'></div
                    ><div id='marking_7_2'></div
                    ><div></div
                    ><div id='magnify_7_2'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_8_2'
                    class = "ocean1"
                    style='z-index:128;position:absolute; width:240px; height:120px; left:720px; top:600px;'
                    ><div id='wonder_8_2' ></div
                    ><div id='tradegood_8_2' ></div
                    ><div id='cities_8_2'></div
                    ><div id='marking_8_2'></div
                    ><div></div
                    ><div id='magnify_8_2'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_9_2'
                    class = "ocean1"
                    style='z-index:129;position:absolute; width:240px; height:120px; left:840px; top:660px;'
                    ><div id='wonder_9_2' ></div
                    ><div id='tradegood_9_2' ></div
                    ><div id='cities_9_2'></div
                    ><div id='marking_9_2'></div
                    ><div></div
                    ><div id='magnify_9_2'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_0_3'
                    class = "ocean1"
                    style='z-index:130;position:absolute; width:240px; height:120px; left:-360px; top:180px;'
                    ><div id='wonder_0_3' ></div
                    ><div id='tradegood_0_3' ></div
                    ><div id='cities_0_3'></div
                    ><div id='marking_0_3'></div
                    ><div></div
                    ><div id='magnify_0_3'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_1_3'
                    class = "ocean1"
                    style='z-index:131;position:absolute; width:240px; height:120px; left:-240px; top:240px;'
                    ><div id='wonder_1_3' ></div
                    ><div id='tradegood_1_3' ></div
                    ><div id='cities_1_3'></div
                    ><div id='marking_1_3'></div
                    ><div></div
                    ><div id='magnify_1_3'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_2_3'
                    class = "ocean1"
                    style='z-index:132;position:absolute; width:240px; height:120px; left:-120px; top:300px;'
                    ><div id='wonder_2_3' ></div
                    ><div id='tradegood_2_3' ></div
                    ><div id='cities_2_3'></div
                    ><div id='marking_2_3'></div
                    ><div></div
                    ><div id='magnify_2_3'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_3_3'
                    class = "ocean1"
                    style='z-index:133;position:absolute; width:240px; height:120px; left:0px; top:360px;'
                    ><div id='wonder_3_3' ></div
                    ><div id='tradegood_3_3' ></div
                    ><div id='cities_3_3'></div
                    ><div id='marking_3_3'></div
                    ><div></div
                    ><div id='magnify_3_3'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_4_3'
                    class = "ocean1"
                    style='z-index:134;position:absolute; width:240px; height:120px; left:120px; top:420px;'
                    ><div id='wonder_4_3' ></div
                    ><div id='tradegood_4_3' ></div
                    ><div id='cities_4_3'></div
                    ><div id='marking_4_3'></div
                    ><div></div
                    ><div id='magnify_4_3'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_5_3'
                    class = "ocean1"
                    style='z-index:135;position:absolute; width:240px; height:120px; left:240px; top:480px;'
                    ><div id='wonder_5_3' ></div
                    ><div id='tradegood_5_3' ></div
                    ><div id='cities_5_3'></div
                    ><div id='marking_5_3'></div
                    ><div></div
                    ><div id='magnify_5_3'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_6_3'
                    class = "ocean1"
                    style='z-index:136;position:absolute; width:240px; height:120px; left:360px; top:540px;'
                    ><div id='wonder_6_3' ></div
                    ><div id='tradegood_6_3' ></div
                    ><div id='cities_6_3'></div
                    ><div id='marking_6_3'></div
                    ><div></div
                    ><div id='magnify_6_3'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_7_3'
                    class = "ocean1"
                    style='z-index:137;position:absolute; width:240px; height:120px; left:480px; top:600px;'
                    ><div id='wonder_7_3' ></div
                    ><div id='tradegood_7_3' ></div
                    ><div id='cities_7_3'></div
                    ><div id='marking_7_3'></div
                    ><div></div
                    ><div id='magnify_7_3'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_8_3'
                    class = "ocean1"
                    style='z-index:138;position:absolute; width:240px; height:120px; left:600px; top:660px;'
                    ><div id='wonder_8_3' ></div
                    ><div id='tradegood_8_3' ></div
                    ><div id='cities_8_3'></div
                    ><div id='marking_8_3'></div
                    ><div></div
                    ><div id='magnify_8_3'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_9_3'
                    class = "ocean1"
                    style='z-index:139;position:absolute; width:240px; height:120px; left:720px; top:720px;'
                    ><div id='wonder_9_3' ></div
                    ><div id='tradegood_9_3' ></div
                    ><div id='cities_9_3'></div
                    ><div id='marking_9_3'></div
                    ><div></div
                    ><div id='magnify_9_3'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_0_4'
                    class = "ocean1"
                    style='z-index:140;position:absolute; width:240px; height:120px; left:-480px; top:240px;'
                    ><div id='wonder_0_4' ></div
                    ><div id='tradegood_0_4' ></div
                    ><div id='cities_0_4'></div
                    ><div id='marking_0_4'></div
                    ><div></div
                    ><div id='magnify_0_4'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_1_4'
                    class = "ocean1"
                    style='z-index:141;position:absolute; width:240px; height:120px; left:-360px; top:300px;'
                    ><div id='wonder_1_4' ></div
                    ><div id='tradegood_1_4' ></div
                    ><div id='cities_1_4'></div
                    ><div id='marking_1_4'></div
                    ><div></div
                    ><div id='magnify_1_4'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_2_4'
                    class = "ocean1"
                    style='z-index:142;position:absolute; width:240px; height:120px; left:-240px; top:360px;'
                    ><div id='wonder_2_4' ></div
                    ><div id='tradegood_2_4' ></div
                    ><div id='cities_2_4'></div
                    ><div id='marking_2_4'></div
                    ><div></div
                    ><div id='magnify_2_4'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_3_4'
                    class = "ocean1"
                    style='z-index:143;position:absolute; width:240px; height:120px; left:-120px; top:420px;'
                    ><div id='wonder_3_4' ></div
                    ><div id='tradegood_3_4' ></div
                    ><div id='cities_3_4'></div
                    ><div id='marking_3_4'></div
                    ><div></div
                    ><div id='magnify_3_4'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_4_4'
                    class = "ocean1"
                    style='z-index:144;position:absolute; width:240px; height:120px; left:0px; top:480px;'
                    ><div id='wonder_4_4' ></div
                    ><div id='tradegood_4_4' ></div
                    ><div id='cities_4_4'></div
                    ><div id='marking_4_4'></div
                    ><div></div
                    ><div id='magnify_4_4'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_5_4'
                    class = "ocean1"
                    style='z-index:145;position:absolute; width:240px; height:120px; left:120px; top:540px;'
                    ><div id='wonder_5_4' ></div
                    ><div id='tradegood_5_4' ></div
                    ><div id='cities_5_4'></div
                    ><div id='marking_5_4'></div
                    ><div></div
                    ><div id='magnify_5_4'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_6_4'
                    class = "ocean1"
                    style='z-index:146;position:absolute; width:240px; height:120px; left:240px; top:600px;'
                    ><div id='wonder_6_4' ></div
                    ><div id='tradegood_6_4' ></div
                    ><div id='cities_6_4'></div
                    ><div id='marking_6_4'></div
                    ><div></div
                    ><div id='magnify_6_4'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_7_4'
                    class = "ocean1"
                    style='z-index:147;position:absolute; width:240px; height:120px; left:360px; top:660px;'
                    ><div id='wonder_7_4' ></div
                    ><div id='tradegood_7_4' ></div
                    ><div id='cities_7_4'></div
                    ><div id='marking_7_4'></div
                    ><div></div
                    ><div id='magnify_7_4'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_8_4'
                    class = "ocean1"
                    style='z-index:148;position:absolute; width:240px; height:120px; left:480px; top:720px;'
                    ><div id='wonder_8_4' ></div
                    ><div id='tradegood_8_4' ></div
                    ><div id='cities_8_4'></div
                    ><div id='marking_8_4'></div
                    ><div></div
                    ><div id='magnify_8_4'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_9_4'
                    class = "ocean1"
                    style='z-index:149;position:absolute; width:240px; height:120px; left:600px; top:780px;'
                    ><div id='wonder_9_4' ></div
                    ><div id='tradegood_9_4' ></div
                    ><div id='cities_9_4'></div
                    ><div id='marking_9_4'></div
                    ><div></div
                    ><div id='magnify_9_4'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_0_5'
                    class = "ocean1"
                    style='z-index:150;position:absolute; width:240px; height:120px; left:-600px; top:300px;'
                    ><div id='wonder_0_5' ></div
                    ><div id='tradegood_0_5' ></div
                    ><div id='cities_0_5'></div
                    ><div id='marking_0_5'></div
                    ><div></div
                    ><div id='magnify_0_5'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_1_5'
                    class = "ocean1"
                    style='z-index:151;position:absolute; width:240px; height:120px; left:-480px; top:360px;'
                    ><div id='wonder_1_5' ></div
                    ><div id='tradegood_1_5' ></div
                    ><div id='cities_1_5'></div
                    ><div id='marking_1_5'></div
                    ><div></div
                    ><div id='magnify_1_5'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_2_5'
                    class = "ocean1"
                    style='z-index:152;position:absolute; width:240px; height:120px; left:-360px; top:420px;'
                    ><div id='wonder_2_5' ></div
                    ><div id='tradegood_2_5' ></div
                    ><div id='cities_2_5'></div
                    ><div id='marking_2_5'></div
                    ><div></div
                    ><div id='magnify_2_5'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_3_5'
                    class = "ocean1"
                    style='z-index:153;position:absolute; width:240px; height:120px; left:-240px; top:480px;'
                    ><div id='wonder_3_5' ></div
                    ><div id='tradegood_3_5' ></div
                    ><div id='cities_3_5'></div
                    ><div id='marking_3_5'></div
                    ><div></div
                    ><div id='magnify_3_5'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_4_5'
                    class = "ocean1"
                    style='z-index:154;position:absolute; width:240px; height:120px; left:-120px; top:540px;'
                    ><div id='wonder_4_5' ></div
                    ><div id='tradegood_4_5' ></div
                    ><div id='cities_4_5'></div
                    ><div id='marking_4_5'></div
                    ><div></div
                    ><div id='magnify_4_5'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_5_5'
                    class = "ocean1"
                    style='z-index:155;position:absolute; width:240px; height:120px; left:0px; top:600px;'
                    ><div id='wonder_5_5' ></div
                    ><div id='tradegood_5_5' ></div
                    ><div id='cities_5_5'></div
                    ><div id='marking_5_5'></div
                    ><div></div
                    ><div id='magnify_5_5'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_6_5'
                    class = "ocean1"
                    style='z-index:156;position:absolute; width:240px; height:120px; left:120px; top:660px;'
                    ><div id='wonder_6_5' ></div
                    ><div id='tradegood_6_5' ></div
                    ><div id='cities_6_5'></div
                    ><div id='marking_6_5'></div
                    ><div></div
                    ><div id='magnify_6_5'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_7_5'
                    class = "ocean1"
                    style='z-index:157;position:absolute; width:240px; height:120px; left:240px; top:720px;'
                    ><div id='wonder_7_5' ></div
                    ><div id='tradegood_7_5' ></div
                    ><div id='cities_7_5'></div
                    ><div id='marking_7_5'></div
                    ><div></div
                    ><div id='magnify_7_5'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_8_5'
                    class = "ocean1"
                    style='z-index:158;position:absolute; width:240px; height:120px; left:360px; top:780px;'
                    ><div id='wonder_8_5' ></div
                    ><div id='tradegood_8_5' ></div
                    ><div id='cities_8_5'></div
                    ><div id='marking_8_5'></div
                    ><div></div
                    ><div id='magnify_8_5'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_9_5'
                    class = "ocean1"
                    style='z-index:159;position:absolute; width:240px; height:120px; left:480px; top:840px;'
                    ><div id='wonder_9_5' ></div
                    ><div id='tradegood_9_5' ></div
                    ><div id='cities_9_5'></div
                    ><div id='marking_9_5'></div
                    ><div></div
                    ><div id='magnify_9_5'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_0_6'
                    class = "ocean1"
                    style='z-index:160;position:absolute; width:240px; height:120px; left:-720px; top:360px;'
                    ><div id='wonder_0_6' ></div
                    ><div id='tradegood_0_6' ></div
                    ><div id='cities_0_6'></div
                    ><div id='marking_0_6'></div
                    ><div></div
                    ><div id='magnify_0_6'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_1_6'
                    class = "ocean1"
                    style='z-index:161;position:absolute; width:240px; height:120px; left:-600px; top:420px;'
                    ><div id='wonder_1_6' ></div
                    ><div id='tradegood_1_6' ></div
                    ><div id='cities_1_6'></div
                    ><div id='marking_1_6'></div
                    ><div></div
                    ><div id='magnify_1_6'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_2_6'
                    class = "ocean1"
                    style='z-index:162;position:absolute; width:240px; height:120px; left:-480px; top:480px;'
                    ><div id='wonder_2_6' ></div
                    ><div id='tradegood_2_6' ></div
                    ><div id='cities_2_6'></div
                    ><div id='marking_2_6'></div
                    ><div></div
                    ><div id='magnify_2_6'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_3_6'
                    class = "ocean1"
                    style='z-index:163;position:absolute; width:240px; height:120px; left:-360px; top:540px;'
                    ><div id='wonder_3_6' ></div
                    ><div id='tradegood_3_6' ></div
                    ><div id='cities_3_6'></div
                    ><div id='marking_3_6'></div
                    ><div></div
                    ><div id='magnify_3_6'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_4_6'
                    class = "ocean1"
                    style='z-index:164;position:absolute; width:240px; height:120px; left:-240px; top:600px;'
                    ><div id='wonder_4_6' ></div
                    ><div id='tradegood_4_6' ></div
                    ><div id='cities_4_6'></div
                    ><div id='marking_4_6'></div
                    ><div></div
                    ><div id='magnify_4_6'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_5_6'
                    class = "ocean1"
                    style='z-index:165;position:absolute; width:240px; height:120px; left:-120px; top:660px;'
                    ><div id='wonder_5_6' ></div
                    ><div id='tradegood_5_6' ></div
                    ><div id='cities_5_6'></div
                    ><div id='marking_5_6'></div
                    ><div></div
                    ><div id='magnify_5_6'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_6_6'
                    class = "ocean1"
                    style='z-index:166;position:absolute; width:240px; height:120px; left:0px; top:720px;'
                    ><div id='wonder_6_6' ></div
                    ><div id='tradegood_6_6' ></div
                    ><div id='cities_6_6'></div
                    ><div id='marking_6_6'></div
                    ><div></div
                    ><div id='magnify_6_6'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_7_6'
                    class = "ocean1"
                    style='z-index:167;position:absolute; width:240px; height:120px; left:120px; top:780px;'
                    ><div id='wonder_7_6' ></div
                    ><div id='tradegood_7_6' ></div
                    ><div id='cities_7_6'></div
                    ><div id='marking_7_6'></div
                    ><div></div
                    ><div id='magnify_7_6'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_8_6'
                    class = "ocean1"
                    style='z-index:168;position:absolute; width:240px; height:120px; left:240px; top:840px;'
                    ><div id='wonder_8_6' ></div
                    ><div id='tradegood_8_6' ></div
                    ><div id='cities_8_6'></div
                    ><div id='marking_8_6'></div
                    ><div></div
                    ><div id='magnify_8_6'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_9_6'
                    class = "ocean1"
                    style='z-index:169;position:absolute; width:240px; height:120px; left:360px; top:900px;'
                    ><div id='wonder_9_6' ></div
                    ><div id='tradegood_9_6' ></div
                    ><div id='cities_9_6'></div
                    ><div id='marking_9_6'></div
                    ><div></div
                    ><div id='magnify_9_6'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_0_7'
                    class = "ocean1"
                    style='z-index:170;position:absolute; width:240px; height:120px; left:-840px; top:420px;'
                    ><div id='wonder_0_7' ></div
                    ><div id='tradegood_0_7' ></div
                    ><div id='cities_0_7'></div
                    ><div id='marking_0_7'></div
                    ><div></div
                    ><div id='magnify_0_7'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_1_7'
                    class = "ocean1"
                    style='z-index:171;position:absolute; width:240px; height:120px; left:-720px; top:480px;'
                    ><div id='wonder_1_7' ></div
                    ><div id='tradegood_1_7' ></div
                    ><div id='cities_1_7'></div
                    ><div id='marking_1_7'></div
                    ><div></div
                    ><div id='magnify_1_7'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_2_7'
                    class = "ocean1"
                    style='z-index:172;position:absolute; width:240px; height:120px; left:-600px; top:540px;'
                    ><div id='wonder_2_7' ></div
                    ><div id='tradegood_2_7' ></div
                    ><div id='cities_2_7'></div
                    ><div id='marking_2_7'></div
                    ><div></div
                    ><div id='magnify_2_7'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_3_7'
                    class = "ocean1"
                    style='z-index:173;position:absolute; width:240px; height:120px; left:-480px; top:600px;'
                    ><div id='wonder_3_7' ></div
                    ><div id='tradegood_3_7' ></div
                    ><div id='cities_3_7'></div
                    ><div id='marking_3_7'></div
                    ><div></div
                    ><div id='magnify_3_7'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_4_7'
                    class = "ocean1"
                    style='z-index:174;position:absolute; width:240px; height:120px; left:-360px; top:660px;'
                    ><div id='wonder_4_7' ></div
                    ><div id='tradegood_4_7' ></div
                    ><div id='cities_4_7'></div
                    ><div id='marking_4_7'></div
                    ><div></div
                    ><div id='magnify_4_7'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_5_7'
                    class = "ocean1"
                    style='z-index:175;position:absolute; width:240px; height:120px; left:-240px; top:720px;'
                    ><div id='wonder_5_7' ></div
                    ><div id='tradegood_5_7' ></div
                    ><div id='cities_5_7'></div
                    ><div id='marking_5_7'></div
                    ><div></div
                    ><div id='magnify_5_7'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_6_7'
                    class = "ocean1"
                    style='z-index:176;position:absolute; width:240px; height:120px; left:-120px; top:780px;'
                    ><div id='wonder_6_7' ></div
                    ><div id='tradegood_6_7' ></div
                    ><div id='cities_6_7'></div
                    ><div id='marking_6_7'></div
                    ><div></div
                    ><div id='magnify_6_7'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_7_7'
                    class = "ocean1"
                    style='z-index:177;position:absolute; width:240px; height:120px; left:0px; top:840px;'
                    ><div id='wonder_7_7' ></div
                    ><div id='tradegood_7_7' ></div
                    ><div id='cities_7_7'></div
                    ><div id='marking_7_7'></div
                    ><div></div
                    ><div id='magnify_7_7'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_8_7'
                    class = "ocean1"
                    style='z-index:178;position:absolute; width:240px; height:120px; left:120px; top:900px;'
                    ><div id='wonder_8_7' ></div
                    ><div id='tradegood_8_7' ></div
                    ><div id='cities_8_7'></div
                    ><div id='marking_8_7'></div
                    ><div></div
                    ><div id='magnify_8_7'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_9_7'
                    class = "ocean1"
                    style='z-index:179;position:absolute; width:240px; height:120px; left:240px; top:960px;'
                    ><div id='wonder_9_7' ></div
                    ><div id='tradegood_9_7' ></div
                    ><div id='cities_9_7'></div
                    ><div id='marking_9_7'></div
                    ><div></div
                    ><div id='magnify_9_7'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_0_8'
                    class = "ocean1"
                    style='z-index:180;position:absolute; width:240px; height:120px; left:-960px; top:480px;'
                    ><div id='wonder_0_8' ></div
                    ><div id='tradegood_0_8' ></div
                    ><div id='cities_0_8'></div
                    ><div id='marking_0_8'></div
                    ><div></div
                    ><div id='magnify_0_8'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_1_8'
                    class = "ocean1"
                    style='z-index:181;position:absolute; width:240px; height:120px; left:-840px; top:540px;'
                    ><div id='wonder_1_8' ></div
                    ><div id='tradegood_1_8' ></div
                    ><div id='cities_1_8'></div
                    ><div id='marking_1_8'></div
                    ><div></div
                    ><div id='magnify_1_8'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_2_8'
                    class = "ocean1"
                    style='z-index:182;position:absolute; width:240px; height:120px; left:-720px; top:600px;'
                    ><div id='wonder_2_8' ></div
                    ><div id='tradegood_2_8' ></div
                    ><div id='cities_2_8'></div
                    ><div id='marking_2_8'></div
                    ><div></div
                    ><div id='magnify_2_8'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_3_8'
                    class = "ocean1"
                    style='z-index:183;position:absolute; width:240px; height:120px; left:-600px; top:660px;'
                    ><div id='wonder_3_8' ></div
                    ><div id='tradegood_3_8' ></div
                    ><div id='cities_3_8'></div
                    ><div id='marking_3_8'></div
                    ><div></div
                    ><div id='magnify_3_8'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_4_8'
                    class = "ocean1"
                    style='z-index:184;position:absolute; width:240px; height:120px; left:-480px; top:720px;'
                    ><div id='wonder_4_8' ></div
                    ><div id='tradegood_4_8' ></div
                    ><div id='cities_4_8'></div
                    ><div id='marking_4_8'></div
                    ><div></div
                    ><div id='magnify_4_8'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_5_8'
                    class = "ocean1"
                    style='z-index:185;position:absolute; width:240px; height:120px; left:-360px; top:780px;'
                    ><div id='wonder_5_8' ></div
                    ><div id='tradegood_5_8' ></div
                    ><div id='cities_5_8'></div
                    ><div id='marking_5_8'></div
                    ><div></div
                    ><div id='magnify_5_8'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_6_8'
                    class = "ocean1"
                    style='z-index:186;position:absolute; width:240px; height:120px; left:-240px; top:840px;'
                    ><div id='wonder_6_8' ></div
                    ><div id='tradegood_6_8' ></div
                    ><div id='cities_6_8'></div
                    ><div id='marking_6_8'></div
                    ><div></div
                    ><div id='magnify_6_8'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_7_8'
                    class = "ocean1"
                    style='z-index:187;position:absolute; width:240px; height:120px; left:-120px; top:900px;'
                    ><div id='wonder_7_8' ></div
                    ><div id='tradegood_7_8' ></div
                    ><div id='cities_7_8'></div
                    ><div id='marking_7_8'></div
                    ><div></div
                    ><div id='magnify_7_8'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_8_8'
                    class = "ocean1"
                    style='z-index:188;position:absolute; width:240px; height:120px; left:0px; top:960px;'
                    ><div id='wonder_8_8' ></div
                    ><div id='tradegood_8_8' ></div
                    ><div id='cities_8_8'></div
                    ><div id='marking_8_8'></div
                    ><div></div
                    ><div id='magnify_8_8'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_9_8'
                    class = "ocean1"
                    style='z-index:189;position:absolute; width:240px; height:120px; left:120px; top:1020px;'
                    ><div id='wonder_9_8' ></div
                    ><div id='tradegood_9_8' ></div
                    ><div id='cities_9_8'></div
                    ><div id='marking_9_8'></div
                    ><div></div
                    ><div id='magnify_9_8'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_0_9'
                    class = "ocean1"
                    style='z-index:190;position:absolute; width:240px; height:120px; left:-1080px; top:540px;'
                    ><div id='wonder_0_9' ></div
                    ><div id='tradegood_0_9' ></div
                    ><div id='cities_0_9'></div
                    ><div id='marking_0_9'></div
                    ><div></div
                    ><div id='magnify_0_9'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_1_9'
                    class = "ocean1"
                    style='z-index:191;position:absolute; width:240px; height:120px; left:-960px; top:600px;'
                    ><div id='wonder_1_9' ></div
                    ><div id='tradegood_1_9' ></div
                    ><div id='cities_1_9'></div
                    ><div id='marking_1_9'></div
                    ><div></div
                    ><div id='magnify_1_9'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_2_9'
                    class = "ocean1"
                    style='z-index:192;position:absolute; width:240px; height:120px; left:-840px; top:660px;'
                    ><div id='wonder_2_9' ></div
                    ><div id='tradegood_2_9' ></div
                    ><div id='cities_2_9'></div
                    ><div id='marking_2_9'></div
                    ><div></div
                    ><div id='magnify_2_9'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_3_9'
                    class = "ocean1"
                    style='z-index:193;position:absolute; width:240px; height:120px; left:-720px; top:720px;'
                    ><div id='wonder_3_9' ></div
                    ><div id='tradegood_3_9' ></div
                    ><div id='cities_3_9'></div
                    ><div id='marking_3_9'></div
                    ><div></div
                    ><div id='magnify_3_9'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_4_9'
                    class = "ocean1"
                    style='z-index:194;position:absolute; width:240px; height:120px; left:-600px; top:780px;'
                    ><div id='wonder_4_9' ></div
                    ><div id='tradegood_4_9' ></div
                    ><div id='cities_4_9'></div
                    ><div id='marking_4_9'></div
                    ><div></div
                    ><div id='magnify_4_9'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_5_9'
                    class = "ocean1"
                    style='z-index:195;position:absolute; width:240px; height:120px; left:-480px; top:840px;'
                    ><div id='wonder_5_9' ></div
                    ><div id='tradegood_5_9' ></div
                    ><div id='cities_5_9'></div
                    ><div id='marking_5_9'></div
                    ><div></div
                    ><div id='magnify_5_9'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_6_9'
                    class = "ocean1"
                    style='z-index:196;position:absolute; width:240px; height:120px; left:-360px; top:900px;'
                    ><div id='wonder_6_9' ></div
                    ><div id='tradegood_6_9' ></div
                    ><div id='cities_6_9'></div
                    ><div id='marking_6_9'></div
                    ><div></div
                    ><div id='magnify_6_9'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_7_9'
                    class = "ocean1"
                    style='z-index:197;position:absolute; width:240px; height:120px; left:-240px; top:960px;'
                    ><div id='wonder_7_9' ></div
                    ><div id='tradegood_7_9' ></div
                    ><div id='cities_7_9'></div
                    ><div id='marking_7_9'></div
                    ><div></div
                    ><div id='magnify_7_9'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_8_9'
                    class = "ocean1"
                    style='z-index:198;position:absolute; width:240px; height:120px; left:-120px; top:1020px;'
                    ><div id='wonder_8_9' ></div
                    ><div id='tradegood_8_9' ></div
                    ><div id='cities_8_9'></div
                    ><div id='marking_8_9'></div
                    ><div></div
                    ><div id='magnify_8_9'></div
                ></div>
                <div align='center' alt=''  valign='middle' id='tile_9_9'
                    class = "ocean1"
                    style='z-index:199;position:absolute; width:240px; height:120px; left:0px; top:1080px;'
                    ><div id='wonder_9_9' ></div
                    ><div id='tradegood_9_9' ></div
                    ><div id='cities_9_9'></div
                    ><div id='marking_9_9'></div
                    ><div></div
                    ><div id='magnify_9_9'></div
                ></div>
            
            </div>
            <div class="linkMapContainer" style="z-index:10000;position:absolute;">
                <div id="linkMap" style="position:absolute;z-index:10000;"><div id="link_tile_0_0" style="z-index:10000;position:absolute;left:0px;top:0px;"></div><div id="link_tile_1_0" style="z-index:10000;position:absolute;left:120px;top:60px;"></div><div id="link_tile_2_0" style="z-index:10000;position:absolute;left:240px;top:120px;"></div><div id="link_tile_3_0" style="z-index:10000;position:absolute;left:360px;top:180px;"></div><div id="link_tile_4_0" style="z-index:10000;position:absolute;left:480px;top:240px;"></div><div id="link_tile_5_0" style="z-index:10000;position:absolute;left:600px;top:300px;"></div><div id="link_tile_6_0" style="z-index:10000;position:absolute;left:720px;top:360px;"></div><div id="link_tile_7_0" style="z-index:10000;position:absolute;left:840px;top:420px;"></div><div id="link_tile_8_0" style="z-index:10000;position:absolute;left:960px;top:480px;"></div><div id="link_tile_9_0" style="z-index:10000;position:absolute;left:1080px;top:540px;"></div><div id="link_tile_0_1" style="z-index:10000;position:absolute;left:-120px;top:60px;"></div><div id="link_tile_1_1" style="z-index:10000;position:absolute;left:0px;top:120px;"></div><div id="link_tile_2_1" style="z-index:10000;position:absolute;left:120px;top:180px;"></div><div id="link_tile_3_1" style="z-index:10000;position:absolute;left:240px;top:240px;"></div><div id="link_tile_4_1" style="z-index:10000;position:absolute;left:360px;top:300px;"></div><div id="link_tile_5_1" style="z-index:10000;position:absolute;left:480px;top:360px;"></div><div id="link_tile_6_1" style="z-index:10000;position:absolute;left:600px;top:420px;"></div><div id="link_tile_7_1" style="z-index:10000;position:absolute;left:720px;top:480px;"></div><div id="link_tile_8_1" style="z-index:10000;position:absolute;left:840px;top:540px;"></div><div id="link_tile_9_1" style="z-index:10000;position:absolute;left:960px;top:600px;"></div><div id="link_tile_0_2" style="z-index:10000;position:absolute;left:-240px;top:120px;"></div><div id="link_tile_1_2" style="z-index:10000;position:absolute;left:-120px;top:180px;"></div><div id="link_tile_2_2" style="z-index:10000;position:absolute;left:0px;top:240px;"></div><div id="link_tile_3_2" style="z-index:10000;position:absolute;left:120px;top:300px;"></div><div id="link_tile_4_2" style="z-index:10000;position:absolute;left:240px;top:360px;"></div><div id="link_tile_5_2" style="z-index:10000;position:absolute;left:360px;top:420px;"></div><div id="link_tile_6_2" style="z-index:10000;position:absolute;left:480px;top:480px;"></div><div id="link_tile_7_2" style="z-index:10000;position:absolute;left:600px;top:540px;"></div><div id="link_tile_8_2" style="z-index:10000;position:absolute;left:720px;top:600px;"></div><div id="link_tile_9_2" style="z-index:10000;position:absolute;left:840px;top:660px;"></div><div id="link_tile_0_3" style="z-index:10000;position:absolute;left:-360px;top:180px;"></div><div id="link_tile_1_3" style="z-index:10000;position:absolute;left:-240px;top:240px;"></div><div id="link_tile_2_3" style="z-index:10000;position:absolute;left:-120px;top:300px;"></div><div id="link_tile_3_3" style="z-index:10000;position:absolute;left:0px;top:360px;"></div><div id="link_tile_4_3" style="z-index:10000;position:absolute;left:120px;top:420px;"></div><div id="link_tile_5_3" style="z-index:10000;position:absolute;left:240px;top:480px;"></div><div id="link_tile_6_3" style="z-index:10000;position:absolute;left:360px;top:540px;"></div><div id="link_tile_7_3" style="z-index:10000;position:absolute;left:480px;top:600px;"></div><div id="link_tile_8_3" style="z-index:10000;position:absolute;left:600px;top:660px;"></div><div id="link_tile_9_3" style="z-index:10000;position:absolute;left:720px;top:720px;"></div><div id="link_tile_0_4" style="z-index:10000;position:absolute;left:-480px;top:240px;"></div><div id="link_tile_1_4" style="z-index:10000;position:absolute;left:-360px;top:300px;"></div><div id="link_tile_2_4" style="z-index:10000;position:absolute;left:-240px;top:360px;"></div><div id="link_tile_3_4" style="z-index:10000;position:absolute;left:-120px;top:420px;"></div><div id="link_tile_4_4" style="z-index:10000;position:absolute;left:0px;top:480px;"></div><div id="link_tile_5_4" style="z-index:10000;position:absolute;left:120px;top:540px;"></div><div id="link_tile_6_4" style="z-index:10000;position:absolute;left:240px;top:600px;"></div><div id="link_tile_7_4" style="z-index:10000;position:absolute;left:360px;top:660px;"></div><div id="link_tile_8_4" style="z-index:10000;position:absolute;left:480px;top:720px;"></div><div id="link_tile_9_4" style="z-index:10000;position:absolute;left:600px;top:780px;"></div><div id="link_tile_0_5" style="z-index:10000;position:absolute;left:-600px;top:300px;"></div><div id="link_tile_1_5" style="z-index:10000;position:absolute;left:-480px;top:360px;"></div><div id="link_tile_2_5" style="z-index:10000;position:absolute;left:-360px;top:420px;"></div><div id="link_tile_3_5" style="z-index:10000;position:absolute;left:-240px;top:480px;"></div><div id="link_tile_4_5" style="z-index:10000;position:absolute;left:-120px;top:540px;"></div><div id="link_tile_5_5" style="z-index:10000;position:absolute;left:0px;top:600px;"></div><div id="link_tile_6_5" style="z-index:10000;position:absolute;left:120px;top:660px;"></div><div id="link_tile_7_5" style="z-index:10000;position:absolute;left:240px;top:720px;"></div><div id="link_tile_8_5" style="z-index:10000;position:absolute;left:360px;top:780px;"></div><div id="link_tile_9_5" style="z-index:10000;position:absolute;left:480px;top:840px;"></div><div id="link_tile_0_6" style="z-index:10000;position:absolute;left:-720px;top:360px;"></div><div id="link_tile_1_6" style="z-index:10000;position:absolute;left:-600px;top:420px;"></div><div id="link_tile_2_6" style="z-index:10000;position:absolute;left:-480px;top:480px;"></div><div id="link_tile_3_6" style="z-index:10000;position:absolute;left:-360px;top:540px;"></div><div id="link_tile_4_6" style="z-index:10000;position:absolute;left:-240px;top:600px;"></div><div id="link_tile_5_6" style="z-index:10000;position:absolute;left:-120px;top:660px;"></div><div id="link_tile_6_6" style="z-index:10000;position:absolute;left:0px;top:720px;"></div><div id="link_tile_7_6" style="z-index:10000;position:absolute;left:120px;top:780px;"></div><div id="link_tile_8_6" style="z-index:10000;position:absolute;left:240px;top:840px;"></div><div id="link_tile_9_6" style="z-index:10000;position:absolute;left:360px;top:900px;"></div><div id="link_tile_0_7" style="z-index:10000;position:absolute;left:-840px;top:420px;"></div><div id="link_tile_1_7" style="z-index:10000;position:absolute;left:-720px;top:480px;"></div><div id="link_tile_2_7" style="z-index:10000;position:absolute;left:-600px;top:540px;"></div><div id="link_tile_3_7" style="z-index:10000;position:absolute;left:-480px;top:600px;"></div><div id="link_tile_4_7" style="z-index:10000;position:absolute;left:-360px;top:660px;"></div><div id="link_tile_5_7" style="z-index:10000;position:absolute;left:-240px;top:720px;"></div><div id="link_tile_6_7" style="z-index:10000;position:absolute;left:-120px;top:780px;"></div><div id="link_tile_7_7" style="z-index:10000;position:absolute;left:0px;top:840px;"></div><div id="link_tile_8_7" style="z-index:10000;position:absolute;left:120px;top:900px;"></div><div id="link_tile_9_7" style="z-index:10000;position:absolute;left:240px;top:960px;"></div><div id="link_tile_0_8" style="z-index:10000;position:absolute;left:-960px;top:480px;"></div><div id="link_tile_1_8" style="z-index:10000;position:absolute;left:-840px;top:540px;"></div><div id="link_tile_2_8" style="z-index:10000;position:absolute;left:-720px;top:600px;"></div><div id="link_tile_3_8" style="z-index:10000;position:absolute;left:-600px;top:660px;"></div><div id="link_tile_4_8" style="z-index:10000;position:absolute;left:-480px;top:720px;"></div><div id="link_tile_5_8" style="z-index:10000;position:absolute;left:-360px;top:780px;"></div><div id="link_tile_6_8" style="z-index:10000;position:absolute;left:-240px;top:840px;"></div><div id="link_tile_7_8" style="z-index:10000;position:absolute;left:-120px;top:900px;"></div><div id="link_tile_8_8" style="z-index:10000;position:absolute;left:0px;top:960px;"></div><div id="link_tile_9_8" style="z-index:10000;position:absolute;left:120px;top:1020px;"></div><div id="link_tile_0_9" style="z-index:10000;position:absolute;left:-1080px;top:540px;"></div><div id="link_tile_1_9" style="z-index:10000;position:absolute;left:-960px;top:600px;"></div><div id="link_tile_2_9" style="z-index:10000;position:absolute;left:-840px;top:660px;"></div><div id="link_tile_3_9" style="z-index:10000;position:absolute;left:-720px;top:720px;"></div><div id="link_tile_4_9" style="z-index:10000;position:absolute;left:-600px;top:780px;"></div><div id="link_tile_5_9" style="z-index:10000;position:absolute;left:-480px;top:840px;"></div><div id="link_tile_6_9" style="z-index:10000;position:absolute;left:-360px;top:900px;"></div><div id="link_tile_7_9" style="z-index:10000;position:absolute;left:-240px;top:960px;"></div><div id="link_tile_8_9" style="z-index:10000;position:absolute;left:-120px;top:1020px;"></div><div id="link_tile_9_9" style="z-index:10000;position:absolute;left:0px;top:1080px;"></div></div>
            </div> 
            <div id="dragHandlerOverlay" style="cursor:move;position:absolute;z-index:1000;margin-left:-300px;margin-top:240px;width:800px;height:600px;background-image:url(<?=$this->config->item('style_url')?>skin/img/blank.gif);">
            </div>

        </div>
    </div>
</div>

<script>
    var map = new Map(<?=$x?>, <?=$y?>);
    map.getMapData(<?=$x?>, <?=$y?>);
    map.drawMap();
</script>
 