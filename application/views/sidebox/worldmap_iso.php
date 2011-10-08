<script type='text/javascript'>
if(!window.console) {
    var console = function(){};
    console.log = function(){};
}

MAXSIZE = 9;
halfMaxSize = Math.floor(MAXSIZE/2);

start_x=<?=$this->Island_Model->island->x?>;
start_y=<?=$this->Island_Model->island->y?>;

center_x=<?=$this->Island_Model->island->x?>;
center_y=<?=$this->Island_Model->island->y?>;

center_x_begin=<?=$this->Island_Model->island->x?>;
center_y_begin=<?=$this->Island_Model->island->y?>;

wonder_status=1;
tradegood_status=1;
city_status=1;

IE = (navigator.appName!='Microsoft Internet Explorer')?0:1;

tradegoodText = new Array();
tradegoodText[1] = '<?=$this->lang->line('wine')?>';
tradegoodText[2] = '<?=$this->lang->line('marble')?>';
tradegoodText[3] = '<?=$this->lang->line('crystal')?>';
tradegoodText[4] = '<?=$this->lang->line('resource')?>';

wonderText = new Array();
wonderText[1] = '<?=$this->lang->line('wonder_1')?>';
wonderText[2] = '<?=$this->lang->line('wonder_2')?>';
wonderText[3] = '<?=$this->lang->line('wonder_3')?>';
wonderText[4] = '<?=$this->lang->line('wonder_4')?>';
wonderText[5] = '<?=$this->lang->line('wonder_5')?>';
wonderText[6] = '<?=$this->lang->line('wonder_6')?>';
wonderText[7] = '<?=$this->lang->line('wonder_7')?>';
wonderText[8] = '<?=$this->lang->line('wonder_8')?>';


var mapText = new Array();
mapText['markedislandlink'] = '<?=$this->lang->line('center_map')?>';

markCoordX = -1;
markCoordY = -1;


occupiedIslandJS = new Array();
allyIslandJS = new Array();
militaryIslandsJS = new Array();

ownIslandJS = new Array();
<?foreach($this->Player_Model->islands as $island){?>
if (!ownIslandJS[<?=$island->x?>]) {
    ownIslandJS[<?=$island->x?>] = new Array();
}
if (ownIslandJS[<?=$island->x?>]) {
    ownIslandJS[<?=$island->x?>][<?=$island->y?>] = 1;
}
<?}?>
var shortcuts = new Array();


	if(shortcuts[<?=$this->Island_Model->island->x?>] == undefined) shortcuts[<?=$this->Island_Model->island->x?>] = new Array();
	shortcuts[<?=$this->Island_Model->island->x?>][<?=$this->Island_Model->island->y?>] = 2;


function Map(x, y) {

    var thisObj = this;

    thisObj.scrollDiv = new Array();
    thisObj.scrollDiv[0] = document.getElementById('map1');
    thisObj.scrollDiv[1] = document.getElementById('linkMap');

    thisObj.maxX = 9;
    thisObj.maxY = 9;

    thisObj.currMapX = x;
    thisObj.currMapY = y;

    thisObj.waitingForData = false;
    thisObj.waitingForIslandData = false;

    thisObj.startDragY = 0;
    thisObj.startDragX = 0;
    thisObj.startPosX = 0;
    thisObj.startPosY = 0;
    thisObj.posX = 0;
    thisObj.posY = 0;

    thisObj.dx = 0;
    thisObj.dy = 0;

    thisObj.lastDiffX = 0;
    thisObj.lastDiffY = 0;

    thisObj.tilesToLoad = new Array();

    thisObj.tile = new Array(); // fuer html-obj der einzelteile

    thisObj.action = '';

    thisObj.dragHandleObj = document.getElementById('dragHandlerOverlay');

    // datenspeicher fuer alle geladenen map-daten
    thisObj.islands = new Array();

    this.initCoords = function() {

//        console.log('initCoords');

        thisObj.startDragY = 0;
        thisObj.startDragX = 0;
        thisObj.startPosX = 0;
        thisObj.startPosY = 0;
        thisObj.posX = 0;
        thisObj.posY = 0;


        thisObj.lastDiffX = 0;
        thisObj.lastDiffY = 0;
        thisObj.dx = 0;
        thisObj.dy = 0;

        thisObj.tilesToLoad = new Array();
        thisObj.tile = new Array();

        thisObj.action = '';


        thisObj.waitingForData = false;
        thisObj.waitingForIslandData = false;

        thisObj.scrollDiv[0].style.top = '0px';
        thisObj.scrollDiv[0].style.left = '0px';

    }

    this.moveBy = function(deltaMapX, deltaMapY) {

        if (thisObj.action == '') {
            if (deltaMapX && deltaMapY) {
                deltaMapX /= 2;
                deltaMapY /= 2;
            }
            if (deltaMapX) {
                thisObj.startMovePosX = thisObj.posX;
                thisObj.targetMovePosX = thisObj.posX - 240*deltaMapX;
            } else {
                thisObj.startMovePosX = thisObj.posX;
                thisObj.targetMovePosX = thisObj.posX;
            }
            if (deltaMapY) {
                thisObj.startMovePosY = thisObj.posY;
                thisObj.targetMovePosY = thisObj.posY - 120*deltaMapY;
            } else {
                thisObj.startMovePosY = thisObj.posY;
                thisObj.targetMovePosY = thisObj.posY;
            }


            //thisObj.action = 'dragHandle';
            //thisObj.dragStop();
            thisObj.action = 'move';


//            console.log('deltaMapX:deltaMapY:'+ deltaMapX +':'+ deltaMapY);

            thisObj.moveInterval();
        }
    }


    this.moveInterval = function() {

            //console.log(thisObj.posX +':'+ thisObj.posY);

            if (!thisObj.scrollStartTime) {
                thisObj.scrollStartTime = new Date().getTime();
                var deltaTime = 0;

            } else {
                var currTime = new Date().getTime();
                var deltaTime =  currTime - thisObj.scrollStartTime;
            }

            thisObj.posX = thisObj.startMovePosX + (thisObj.targetMovePosX-thisObj.startMovePosX)*(deltaTime/500);
            thisObj.posY = thisObj.startMovePosY + (thisObj.targetMovePosY-thisObj.startMovePosY)*(deltaTime/500);



            thisObj.setPosition();

            if (deltaTime < 500) {
                setTimeout(thisObj.moveInterval, 50);
            } else {
                thisObj.scrollStartTime = 0;
                thisObj.action = '';

                thisObj.posX = thisObj.startMovePosX + (thisObj.targetMovePosX-thisObj.startMovePosX);
                thisObj.posY = thisObj.startMovePosY + (thisObj.targetMovePosY-thisObj.startMovePosY);
                thisObj.setPosition();



                // randteile anfuegen
                var dx = Math.round((thisObj.targetMovePosX-thisObj.startMovePosX)/2-(thisObj.targetMovePosY-thisObj.startMovePosY))/120;
                var dy = Math.round((thisObj.targetMovePosY-thisObj.startMovePosY) + (thisObj.targetMovePosX-thisObj.startMovePosX)/2)/120;
                thisObj.drawBorder(0, dx);
                //console.log(dx, dy);
                if (Math.abs(dx)>1) {
                    thisObj.drawBorder(0, dx);
                }
                thisObj.drawBorder(dy, 0);
                if (Math.abs(dy)>1) {
                    thisObj.drawBorder(dy, 0);
                }
                //thisObj.lastDiffY-=dx*120;
                //thisObj.lastDiffX-=dy*120;


            }
    }

    this.drawMap = function() {

        for (var x = 0; x <= thisObj.maxX; x++) {
            thisObj.tile[x] = new Array();
            for (var y = 0; y <= thisObj.maxY; y++) {
                obj = document.getElementById('tile_'+ x +'_'+ y);
                thisObj.tile[x][y] = obj;
                obj.style.left = (x*120 - y*120) +'px';
                obj.style.top  = (x*60  + y*60)  +'px';
                thisObj.drawPiece(obj,  thisObj.currMapX + x - Math.floor(thisObj.maxX/2), thisObj.currMapY + y - Math.floor(thisObj.maxY/2));
            }
        }
    }

    this.drawPiece = function(obj, x, y) {

        mapX = x;
        mapY = y;

        wonder = obj.firstChild;
        tradegood = wonder.nextSibling;
        cities = tradegood.nextSibling;
        marking = cities.nextSibling;
        own  = marking.nextSibling;
        coords = marking.id.split('_');

        var linkId = 'link_'+obj.id;
        objLink = document.getElementById(linkId);
        obj.style.zIndex  = 100+mapX+mapY;
        obj.mapX = mapX;
        obj.mapY = mapY;

        if (thisObj.islands && thisObj.islands[mapX] && thisObj.islands[mapX][mapY]) {

            if (thisObj.islands[mapX][mapY]!='ocean') {

                var isl = thisObj.islands[mapX][mapY];
                obj.className = 'island'+ isl[5]; // island_type_id
                obj.title = isl[1] +' ['+mapX+':'+mapY+']';//name
                obj.alt =isl[1];


                wonder.className='wonder wonder'+isl[3];

                tradegood.className='tradegood tradegood'+isl[2];
                //cities.innerHTML = isl[1] +' ['+ mapX +':'+ mapY +']';
                cities.innerHTML=isl[7];
                cities.className = 'cities';

                if (thisObj.currMapX == mapX && thisObj.currMapY == mapY) {
                    //marking.className = 'islandMarked'
                    thisObj.markIsland(obj.id);
                } else {
                    marking.className = '';
                }


                if (militaryIslandsJS[mapX] && militaryIslandsJS[mapX][mapY]) {
                    obj.className = 'island'+ isl[5]  + 'treaty';
                } else {
                    own.className = '';
                }


                if (occupiedIslandJS[mapX] && occupiedIslandJS[mapX][mapY]) {
                    obj.className = 'island'+ isl[5]  + 'own';
                } else {
                    //own.className = '';
                }


                if (allyIslandJS[mapX] && allyIslandJS[mapX][mapY]) {
                    obj.className = 'island'+ isl[5]  + 'ally';
                } else {
                   // own.className = '';
                }



                if (ownIslandJS[mapX] && ownIslandJS[mapX][mapY]) {
                     obj.className = 'island'+ isl[5]  + 'own';
                } else {
                    //own.className = '';
                }




                //console.log(linkId);
                objLink.innerHTML = '<a href="#'+ mapX +':'+ mapY +'" onclick="map.clickIsland(\''+ obj.id +'\');return false;" class="islandLink"></a>';
                objLink.style.left = obj.style.left;
                objLink.style.top  = obj.style.top;
                ;

            } else  {

                obj.className = thisObj.getOceanClass(mapX, mapY);
                obj.title = '';
                wonder.className='';
                tradegood.className='';
                cities.className = '';
                cities.innerHTML='';
                //cities.innerHTML=''+ mapX +':'+ mapY +':'+ thisObj.islands[mapX][mapY];
                objLink.innerHTML = '';
                own.className = '';
                marking.className = '';
            }
            obj.toLoad = false;;
        } else {
            obj.className = thisObj.getOceanClass(mapX, mapY);
            obj.title = '';
            wonder.className='';
            tradegood.className='';
            cities.className = '';
            objLink.innerHTML = '';
            own.className = '';
            marking.className = '';

            if (mapX < (100 + thisObj.maxX) && mapX>0 && mapY < (100 + thisObj.maxY) && mapY> 0) {
                obj.className = 'loading';
                cities.innerHTML = '';
                //cities.innerHTML = 'loading'+ mapX +':'+ mapY;
                obj.toLoad = true;
                thisObj.tilesToLoad[mapX+'_'+mapY] = obj;
                thisObj.getMapData(mapX, mapY);
            } else {
                cities.innerHTML = '';
                obj.toLoad = false;
            }
        }
    }

    // bei Bedarf: teile an Rand in Scrollrichtung zufuegen
    this.drawBorder = function(deltaX, deltaY) {

       if (deltaX>0) {
            thisObj.lastDiffX += 120;
            thisObj.dx--;
//            console.log('b');
            for (y=0; y<=thisObj.maxY; y++) {
                dy =  thisObj.dy + y;
                //console.log('x:y' + thisObj.dx +':'+ dy);
                obj = thisObj.tile[thisObj.maxX][y];
                obj.style.left = (thisObj.dx*120 - dy*120) +'px';
                obj.style.top  = (thisObj.dx*60  + dy*60)  +'px';
                thisObj.drawPiece(obj, thisObj.currMapX + thisObj.dx - Math.floor(thisObj.maxX/2), thisObj.currMapY + dy - Math.floor(thisObj.maxY/2));

                var temp = thisObj.tile[thisObj.maxX][y];
                for (x=thisObj.maxX-1; x>=0; x--) {
                    thisObj.tile[x+1][y] = thisObj.tile[x][y];
                    //console.log('tile['+ (x+1) +']['+  y +'] = tile['+ (x) +']['+ y +']' );
                }
                thisObj.tile[0][y] = temp;
                //dxx++;
            }
        } else if(deltaX<0) {
            thisObj.lastDiffX -= 120;
            thisObj.dx++;
//            console.log('a');
            //dx = -Math.floor((diffX/2+diffY )/120);
            for (y=0; y<=thisObj.maxY; y++) {
                dy =  thisObj.dy + y;
                obj =thisObj.tile[0][y];
                obj.style.left = ((thisObj.dx+thisObj.maxX-1)*120 - dy*120) +'px';
                obj.style.top  = ((thisObj.dx+thisObj.maxX-1)*60  + dy*60)  +'px';
                thisObj.drawPiece(obj, thisObj.currMapX + thisObj.dx+thisObj.maxX-1 - Math.floor(thisObj.maxX/2), thisObj.currMapY + dy - Math.floor(thisObj.maxY/2));

                var temp = thisObj.tile[0][y];
                for (x=0; x<thisObj.maxX; x++) {
                    thisObj.tile[x][y] = thisObj.tile[x+1][y];
                    //console.log('tile['+ (x) +']['+  y +'] = tile['+ (x+1) +']['+ y +']' );
                }
                thisObj.tile[thisObj.maxX][y] = temp;
            }
        } else

        if (deltaY > 0) {
            thisObj.lastDiffY += 120;
            thisObj.dy++;
//            console.log('c');
            for (x=0; x<=thisObj.maxX; x++) {
                dx = thisObj.dx + x;
                obj = thisObj.tile[x][0];
                //console.log('tile_'+ x +'_'+ ((Math.abs(dy+800)%9)));
                obj.style.left = ((dx)*120 - (thisObj.dy+thisObj.maxY)*120) +'px';
                obj.style.top  = ((dx)*60  + (thisObj.dy+thisObj.maxY)*60)  +'px';
                thisObj.drawPiece(obj, thisObj.currMapX + dx - Math.floor(thisObj.maxX/2), thisObj.currMapY + thisObj.dy+thisObj.maxY - Math.floor(thisObj.maxY/2));

                var temp = thisObj.tile[x][0];
                for (y=0; y<thisObj.maxY; y++) {
                    thisObj.tile[x][y] = thisObj.tile[x][y+1];
                    //console.log('tile['+ (x) +']['+  (y+1) +'] = tile['+ (x) +']['+ y +']' );
                }
                thisObj.tile[x][thisObj.maxY] = temp;

            }
        } else if(deltaY < 0) {
            thisObj.lastDiffY -= 120;
            thisObj.dy--;
//            console.log('d');
            //dy = Math.floor((diffX/2-diffY)/120);
            for (x=0; x<=thisObj.maxX; x++) {
                dx = thisObj.dx + x;
                obj = thisObj.tile[x][thisObj.maxY];;
                //console.log('tile_'+ x +'_'+ ((Math.abs(dy+800)%9)));
                obj.style.left = ((dx)*120 - (thisObj.dy)*120) +'px';
                obj.style.top  = ((dx)*60  + (thisObj.dy)*60)  +'px';
                thisObj.drawPiece(obj, thisObj.currMapX + dx - Math.floor(thisObj.maxX/2), thisObj.currMapY + thisObj.dy - Math.floor(thisObj.maxY/2));

                var temp = thisObj.tile[x][thisObj.maxY];
                for (y=thisObj.maxY-1; y>=0; y--) {
                    thisObj.tile[x][y+1] = thisObj.tile[x][y];
                    //console.log('tile['+ (x+1) +']['+  y +'] = tile['+ (x) +']['+ y +']' );
                }
                thisObj.tile[x][0] = temp;
            }

        }

    }

    this.drawBorderPlusX = function() {
        thisObj.drawBorder(1, 0);
    }

    this.getMapData = function(x, y) {

        if (!thisObj.waitingForData) {
            thisObj.waitingForData = true;
            jsonUrl  = '<?=$this->config->item('base_url')?>actions/getJSONArea/'+ (x - thisObj.maxX -4);
            jsonUrl += '/'+ (x + thisObj.maxX +4);
            jsonUrl += '/'+ (y - thisObj.maxY -4);
            jsonUrl += '/'+ (y + thisObj.maxY +4)+'/';
            ajaxRequest(jsonUrl, thisObj.handleMapData);
        }
    }
    this.handleMapData = function(JSONResponse) {

//        console.log('handleMapData');

        if (!JSONResponse) return false;

        var responseData = JSON.parse(JSONResponse);
        var mapData = responseData['data'];
        var requestData = responseData['request'];

        for (x = requestData['x_min']; x<=requestData['x_max']; x++) {
            for (y = requestData['y_min']; y<=requestData['y_max']; y++) {
                if (!thisObj.islands[x]) {
                    thisObj.islands[x] = new Array();
                }
                if (mapData[x] && mapData[x][y]) {
                    thisObj.islands[x][y] = mapData[x][y];
                } else {
                    thisObj.islands[x][y] = 'ocean';
                }
            }
        }
        for (var coords in thisObj.tilesToLoad) {
//            console.log('handleMapData'+coords+'#'+ thisObj.tilesToLoad[coords].mapX+':'+ thisObj.tilesToLoad[coords].mapY);
            var testCoords = thisObj.tilesToLoad[coords].mapX +'_'+ thisObj.tilesToLoad[coords].mapY;
            if (thisObj.tilesToLoad[coords].toLoad == true) {
                if (testCoords==coords) {
                    var xy = coords.split('_');
//                    console.log('coord');
                    thisObj.drawPiece(thisObj.tilesToLoad[coords], xy[0], xy[1]);
                } else {
//                    console.log('mapXY');
                    thisObj.drawPiece(thisObj.tilesToLoad[coords],  thisObj.tilesToLoad[coords].mapX,  thisObj.tilesToLoad[coords].mapY);
                }
            }
        }
        thisObj.tilesToLoad = new Array();

        thisObj.waitingForData = false;
        //thisObj.drawMap();
    }


    this.dragHandle = function(event) {

        // init
        addListener(document, 'onclick', thisObj.dragStop)
        thisObj.dragHandleObj.style.cursor = 'crosshair';

        thisObj.startDragHandlePosX = document.all ? window.event.clientX : event.pageX;
        thisObj.startDragHandlePosY = document.all ? window.event.clientY : event.pageY;

        if (typeof(event)!="undefined"){
            if (event.preventDefault) {
               event.preventDefault();
            }
            event.returnValue = false;
        }


        // drag&drop
        document.onmousemove = function(ev) {

            // drag&drop init
            if (thisObj.action == '') {

                thisObj.startPosX = thisObj.startDragHandlePosX;
                thisObj.startPosY = thisObj.startDragHandlePosY;

                if (typeof(event)!="undefined"){
                    if (event.preventDefault) {
                       event.preventDefault();
                    }
                    event.returnValue = false;
                }

                thisObj.startDragY = (parseInt(thisObj.scrollDiv[0].style.top))?parseInt(thisObj.scrollDiv[0].style.top):0;
                thisObj.startDragX = (parseInt(thisObj.scrollDiv[0].style.left))?parseInt(thisObj.scrollDiv[0].style.left):0;

                //console.log('thisObj.startDragXY:' + thisObj.startDragX +':'+thisObj.startDragY);

                thisObj.startMapX = thisObj.currMapX;
                thisObj.startMapY = thisObj.currMapY;

                thisObj.action = 'dragHandle';
            }



            // verschiebung auslesen
            thisObj.posX = document.all ? window.event.clientX : ev.pageX;
            thisObj.posY = document.all ? window.event.clientY : ev.pageY;
            if (typeof(event)!="undefined"){
                if (event.preventDefault) {
                   event.preventDefault();
                }
                event.returnValue = false;
            }

            // verschieben
            thisObj.setPosition();

            /* */
            // neue Inseln an Rand anfuegen
            var diffX = (thisObj.posX  - thisObj.startPosX + thisObj.startDragX); // verschiebung seit dem Draw
            var diffY = (thisObj.posY  - thisObj.startPosY + thisObj.startDragY); // verschiebung seit dem Draw
            //console.log('diffX:diffY:' + diffX +':'+ diffY);
            //dx = -Math.round( (diffX/2 + diffY)/120 );
            //dy =  Math.round( (diffX/2 - diffY)/120 );

            dx = thisObj.dx;
            dy = thisObj.dy;

            dyy = dy;
            dxx = dx;

            //console.log( thisObj.currMapX - thisObj.lastDiffX/240 - thisObj.lastDiffY/120);



            if ( (diffX/2 + diffY) > thisObj.lastDiffX+120 ) {
                thisObj.drawBorder(1, 0);
            }
            if ( (diffX/2 + diffY ) < thisObj.lastDiffX-120 ) {
                thisObj.drawBorder(-1, 0);
            }
            if ( (diffX/2 - diffY) > thisObj.lastDiffY+120 ) {
                thisObj.drawBorder(0, 1);
            }
            if ( (diffX/2 - diffY) < thisObj.lastDiffY-120 ) {
                thisObj.drawBorder(0, -1);
            }


            if (typeof(obj) != 'undefined') {
                //console.log(obj.style.left);
            }

         };
    },

    this.setPosition = function() {

            //console.log('### thisObj.posX, thisObj.startPosX, thisObj.startDragX', thisObj.posX, thisObj.startPosX, thisObj.startDragX,
            //    thisObj.posY, thisObj.startPosY, thisObj.startDragY)

            var dx = (thisObj.posX  - (thisObj.startPosX-thisObj.startDragX));
            var dy = (thisObj.posY - (thisObj.startPosY-thisObj.startDragY));

            document.navInputForm.xcoord.value = thisObj.currMapX - Math.round(dy/120+dx/240);
            document.navInputForm.ycoord.value = thisObj.currMapY - Math.round(dy/120-dx/240);

            //console.log(dy, '###', dy);

            thisObj.scrollDiv[0].style.left = dx + 'px';
            thisObj.scrollDiv[0].style.top =  dy + 'px';
            thisObj.scrollDiv[1].style.left = dx + 'px';
            thisObj.scrollDiv[1].style.top =  dy + 'px';
    }

    this.dragStop = function(ev) {
        document.onmousemove = '';

        if (thisObj.action == 'dragHandle') {
            setTimeout(function() {thisObj.action = ''}, 100);
        }
        thisObj.dragHandleObj.style.cursor = 'move';

    },

    // springen auf Karte ueber Eingabefeld
    this.jumpToCoord = function() {
        var x = document.navInputForm.xcoord.value;
        var y = document.navInputForm.ycoord.value;

        thisObj.jumpToXY(x, y);
    }

    this.jumpToShortcut = function() {
    	var text = document.navShortcutForm.homeCitySelect.value;
    	var trennzeichenPos = text.indexOf(':');
    	var x = parseInt(text.substring(0, trennzeichenPos), 10);
    	var y = parseInt(text.substring(trennzeichenPos+1, text.length), 10);

    	thisObj.jumpToXY(x, y);
    }

    this.jumpToXY = function(x, y) {
        thisObj.currMapX = parseInt(x);
        thisObj.currMapY = parseInt(y);

        thisObj.initCoords();
        thisObj.drawMap();
        thisObj.setPosition();
        //thisObj.markIsland(x, y);
    }

    this.getOceanClass = function(x, y) {
        var klasse = 'ocean1';
        if( (Math.abs((x+y*3)%4)) ==0) klasse = 'ocean2';
        if( (Math.abs((x+y*4)%5)) ==0) klasse = 'ocean3';
        if( (Math.abs((x+y*5)%12))==0) klasse = 'ocean_feature1';
        if( (Math.abs((x+y*6)%13))==0) klasse = 'ocean_feature2';
        if( (Math.abs((x+y*7)%12))==0) klasse = 'ocean_feature3';
        if( (Math.abs((x+y*8)%13))==0) klasse = 'ocean_feature4';
        return klasse;
    }

    this.getXYFromEvent = function(event) {
        posX = document.all ? window.event.clientX : event.pageX;
        posY = document.all ? window.event.clientY : event.pageY;
        return [posX, posY];
    }

    this.centerIsland = function(x, y) {
        thisObj.jumpToXY(x, y);
    }

    this.markIsland = function(objId) {
        obj = document.getElementById(objId);
        var x = obj.mapX;
        var y = obj.mapY;

        var linkId = 'link_'+objId;
        objLink = document.getElementById(linkId);
        objLink.className = '';


        //var id = 'magnify_'+ x +'_'+ y ;
        var id = objId.replace('tile', 'magnify');
        if (thisObj.magnifiedIslandObj) {
            if (thisObj.magnifiedIslandObj.id == id) { // klick 2 auf Objekt
            } else { // klick auf anderes Objekt
                thisObj.magnifiedIslandObj.className = '';
                thisObj.markedIslandObj.className = '';

                var oldLinkId = 'link_'+ thisObj.magnifiedIslandObj.id.replace('magnify', 'tile');
//                console.log(oldLinkId);
                objOldLink = document.getElementById(oldLinkId);
                objOldLink.className = '';
            }
        }
        //console.log(x+'###'+y);
        idMarking = objId.replace('tile', 'marking');
        if (document.getElementById(id)) {
            thisObj.magnifiedIslandObj = document.getElementById(id);

            thisObj.markedIslandObj = document.getElementById(idMarking);
            thisObj.markedIslandObj.className = 'islandMarked';
            thisObj.markedIslandXY  = [x, y];

            objLink.className = 'islandLinkMarked';
        }

        // Inseldaten in Seite schreiben
        // Breadcrumbs
        isl = thisObj.islands[x][y];
        var text = isl[1] +' ['+ x +':'+ y +']';

        document.getElementById('islandBread').innerHTML = '<a title="'+ mapText['markedislandlink'] +'" class="island" onclick="map.centerIsland('+ x +', '+ y +');" href="#">'+ text +'</a>';
        // Info
        document.getElementById('islandName').innerHTML =  thisObj.islands[x][y][1];

        //document.getElementById('islandActions').className = 'nohidden';
        document.getElementById('islandInfos').className = 'nohidden';
        document.getElementById('tradegoodLabel').innerHTML = '<a href="<?=$this->config->item('base_url')?>game/informations/16/">'+tradegoodText[isl[2]]+ '</a>';
        document.getElementById('wonderLabel').innerHTML = '<a href="<?=$this->config->item('base_url')?>game/wonderDetail/'+isl[3]+'/">'+wonderText[isl[3]]+'</a';
        var button1 = Dom.get('islandAddButton');
        var button2 = Dom.get('islandRemoveButton');

        if(shortcuts[x] != undefined && shortcuts[x][y] != 'undefined' && shortcuts[x][y] == 1) {
        	button1.style.display = 'none';
        	button2.href="<?=$this->config->item('base_url')?>actions/removeIslandFromShortcut/"+x+"/"+y+"/";
        	button2.style.display = 'inline';
        } else if(shortcuts[x] != undefined && shortcuts[x][y] != 'undefined' && shortcuts[x][y] == 2) {
        	button1.style.display = 'none';
        	button2.style.display = 'none';
        } else {
        	button1.style.display = 'inline';
        	button1.onclick = function() { showIslandAddDialog(isl[0], x, y, thisObj.islands[x][y][1]); };
        	button2.href="#";
        	button2.style.display = 'none';
        }
    }

    this.clickIsland = function(objId) {
        if (thisObj.action == '') {
            obj = document.getElementById(objId);
            var x = obj.mapX;
            var y = obj.mapY;
            var id = objId.replace('tile', 'magnify');

//            console.log('clickIsland: '+ id);
            if (thisObj.magnifiedIslandObj) {
                if (thisObj.magnifiedIslandObj.id == id) { // klick 2 auf Objekt
                    window.location.href = '<?=$this->config->item('base_url')?>game/island/' + thisObj.islands[x][y][0]+'/';
                    return true;
                } else { // klick auf anderes Objekt
                }
            } else {
                thisObj.magnifiedIslandObj = document.getElementById(id);
            }
            thisObj.markIsland(objId);
        }
    }

    // zeigt spieler der insel an (funktioniert, ist aber nicht eingebaut)
    this.getIslandData = function(x, y) {
        if (!thisObj.waitingForIslandData) {
            thisObj.waitingForIslandData = true;
            jsonUrl  = '<?=$this->config->item('base_url')?>actions/getJSONIsland/'+ x;
            jsonUrl += '/'+ y+'/';
            ajaxRequest(jsonUrl, thisObj.handleIslandData);
        }
    }
    // zeigt spieler der insel an  (funktioniert, ist aber nicht eingebaut)
    this.handleIslandData = function(JSONResponse) {
        var responseData = JSON.parse(JSONResponse);

        // TODO: schoen machen, wenns dann doch mal eingbaut wird
        document.getElementById('information').innerHTML = '';
        for (var i in responseData['data']) {
            document.getElementById('information').innerHTML += responseData['data'][i]['name'] + '('+ responseData['data'][i]['avatar_name']+')' +'<br />';
        }
        thisObj.waitingForIslandData = false;
    }

    this.getXYOffset = function(obj) {
        var xy = [0, 0];
        do {
            xy[0] += obj.offsetLeft;
            xy[1] += obj.offsetTop;
            obj = obj.parentNode;
        }   while(obj.parentNode)
//        console.log('Left: '+ xy)
        return xy;
    }

    thisObj.cityStatus = 1;
    this.switchCities = function() {
        thisObj.cityStatus= (thisObj.cityStatus+1)%2;
        if(thisObj.cityStatus==0) document.getElementById('buttonCities').className='deactivated';
        else document.getElementById('buttonCities').className='';
        for (var j=0;j<=thisObj.maxX;j++){
            for (var i=0;i<=thisObj.maxY;i++){
                cities= document.getElementById('cities_'+i+'_'+j);
                cities.style.visibility = (thisObj.cityStatus) ? 'visible':'hidden';
            }
        }
    }
    thisObj.tradegoodStatus = 1;
    this.switchTradegood = function() {
        thisObj.tradegoodStatus= (thisObj.tradegoodStatus+1)%2;
        if(thisObj.tradegoodStatus==0) document.getElementById('buttonTradegood').className='deactivated';
        else document.getElementById('buttonTradegood').className='';
        for (var j=0;j<=thisObj.maxX;j++){
            for (var i=0;i<=thisObj.maxY;i++){
                tradegood= document.getElementById('tradegood_'+i+'_'+j);
                tradegood.style.visibility = (thisObj.tradegoodStatus) ? 'visible':'hidden';
            }
        }
    }


    // drag and drop
    addListener(thisObj.dragHandleObj, 'mousedown', thisObj.dragHandle);
    addListener(document.getElementById('linkMap'), 'mousedown', thisObj.dragHandle);
    //addListener(thisObj.dragHandleObj, 'mouseout', thisObj.dragStop);
    addListener(document, 'mouseup', thisObj.dragStop)
    thisObj.initCoords();

}


function showIslandAddDialog(islandId, islandX, islandY, islandName) {
	var box = Dom.get('annotationBox');
	box.style.display='block';
	var closeButton = box.firstChild;
	var header = Dom.get('annotationHeader');
	header.innerHTML = "<?=$this->lang->line('add_island')?>: "+islandName;
	var content = Dom.get('annotationText');
	//content.innerHTML = "Insel Anfügen und so";
	document.addIslandForm.islandX.value = islandX;
	document.addIslandForm.islandY.value = islandY;
	document.addIslandForm.label.value = islandName;
}


</script>
<!--<script type="text/javascript" src="js/worldmap/worldmap.js"></script>-->

<script type="text/javascript">
<!--
Event.onDOMReady( function() {
    replaceSelect(Dom.get("homeCitySelect"));
});

//-->
</script>

<style type="text/css">
#worldmap_iso #container #mapShortcutInput {
	background-image:url(<?=$this->config->item('style_url')?>skin/layout/bg_mapnav_coord.jpg);
	background-repeat:repeat;
	height:28px;
	padding-top:3px;
	position:relative;
	padding-left:18px;
}

.citySpecialSelect .dropbutton {          background-position: 0px -25px; padding-left:8px; height:25px; line-height:25px; cursor:default;}

</style>
 

<div id="navigation" class="dynamic" style="z-index:10000">
		<h3 class="header"><?=$this->lang->line('world_navigation')?></h3>
		<div class="content">

			<form name="navInputForm" action="javaScript:void(null);" onsubmit="map.jumpToCoord();">
			<div id="mapCoordInput"  style="position:relative;">
				<label for="inputXCoord" class="x">X:</label>
				<input class="x" id="inputXCoord" type="text" name="xcoord"  maxlength=4 value="<?=$this->Island_Model->island->x?>">
				<label for="inputYCoord" class="y">Y:</label>
				<input class="y" id="inputYCoord" type="text" name="ycoord"  maxlength=4 value="<?=$this->Island_Model->island->y?>">
				<input class="submitButton" type="image" src="<?=$this->config->item('style_url')?>skin/img/blank.gif" name="submit">
			</div>
			</form>



			<div id="mapControls"  style="position:relative;">
				<ul class="visibility">
					<li><a href="#" onClick='map.switchTradegood();' id="buttonTradegood"></a></li>
					<li><a href="#" onClick='map.switchCities();' id="buttonCities"></a></li>
				</ul>
				<ul class="scrolling">
                    <li class="nw"><a href="#" onclick="map.moveBy(-1,-1); return false;"></a></li>
					<li class="n"><a href="#" onclick="map.moveBy(0,-1); return false;"></a></li>
					<li class="ne"><a href="#" onclick="map.moveBy(1,-1); return false;"></a></li>
					<li class="w"><a href="#" onclick="map.moveBy(-1,0); return false;"></a></li>
					<li class="e"><a href="#" onclick="map.moveBy(1,0); return false;"></a> </li>
					<li class="sw"><a href="#" onclick="map.moveBy(-1,1); return false;"></a></li>
					<li class="s"><a href="#" onclick="map.moveBy(0,1); return false;"></a></li>
					<li class="se"><a href="#" onclick="map.moveBy(1,1); return false;"></a></li>
				</ul>
			</div>


			<form name="navShortcutForm" action="javaScript:void(null);" onsubmit="map.jumpToShortcut();">
			<div id="mapShortcutInput"  style="position:relative;" title="<?=$this->lang->line('island_shortcuts')?>">

				<select id="homeCitySelect"
                               class="citySpecialSelect smallFont"
                               name="newHomeCity" tabindex="1" onchange="map.jumpToShortcut();">
                            <option value="<?=$this->Island_Model->island->x?>:<?=$this->Island_Model->island->y?>"  selected="selected">[<?=$this->Island_Model->island->x?>:<?=$this->Island_Model->island->y?>] <?=$this->Player_Model->now_town->name?></option>                        </select>


			</div>
			</form>


		</div>
		<div class="footer"></div>
	</div>

	<div id="information" class="dynamic">
		<h3 id="islandName" class="header"><?=$this->lang->line('info')?></h3>
		<div class="content">
            <table id="islandInfos">
                <tr><th><?=$this->lang->line('trade')?>:</th><td id="tradegoodLabel" class=label></td></tr>
                <tr><th><?=$this->lang->line('wonder')?>:</th><td id="wonderLabel"  class="label"></td></tr>
            </table>

            <div class="centerButton"><p><a class="button" id="islandAddButton" href="#" title="<?=$this->lang->line('add_island')?>"><?=$this->lang->line('add_shortcut')?></a>
            <a class="button" id="islandRemoveButton" href="#"  title="<?=$this->lang->line('remove_island')?>"><?=$this->lang->line('delete_shortcut')?></a></p>
            </div>

		</div>
		<div class="footer"></div>
	</div> 