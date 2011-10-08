<h2><?=$this->lang->line('welcome_title')?></h2>

<div id="tour">
 
    <div class="tour-slide txt current-slide" id="tourSlide1" style="display:block;">
        <p><?=$this->lang->line('tour_1_text_1')?></p><?=$this->lang->line('tour_1_text_2')?><br/><br/>
        <img src="<?=$this->config->item('base_url')?>design/tour/tour_city.jpg"  width="463px" />
    </div>

    <div class="tour-slide txt" id="tourSlide2">
        <p><?=$this->lang->line('tour_2_text_1')?><br /> <img src="<?=$this->config->item('base_url')?>design/tour/icon_wood.gif" /> <?=$this->lang->line('tour_2_text_2')?>, <img src="<?=$this->config->item('base_url')?>design/tour/icon_wine.gif" /> <?=$this->lang->line('tour_2_text_3')?>, <img src="<?=$this->config->item('base_url')?>design/tour/icon_marble.gif" /> <?=$this->lang->line('tour_2_text_4')?>, <img src="<?=$this->config->item('base_url')?>design/tour/icon_glass.gif" /> <?=$this->lang->line('tour_2_text_5')?> и <img src="<?=$this->config->item('base_url')?>design/tour/icon_sulfur.gif" /> <?=$this->lang->line('tour_2_text_6')?>.</p><p><?=$this->lang->line('tour_2_text_7')?></p><br/>
        <img src="<?=$this->config->item('base_url')?>design/tour/tour_resources.jpg"  width="463px" />    </div>

    <div class="tour-slide txt" id="tourSlide3">
        <p><?=$this->lang->line('tour_3_text_1')?></p><p><?=$this->lang->line('tour_3_text_2')?><br /><?=$this->lang->line('tour_3_text_3')?><br /><?=$this->lang->line('tour_3_text_4')?></p><br/>
        <img src="<?=$this->config->item('base_url')?>design/tour/tour_construction.jpg"  width="463px" />    </div>

    <div class="tour-slide txt" id="tourSlide4">
        <p><?=$this->lang->line('tour_4_text_1')?></p><p><?=$this->lang->line('tour_4_text_2')?></p><br/>
        <br/>
        <img src="<?=$this->config->item('base_url')?>design/tour/tour_advisors.jpg"  width="463px" /></div>

    <div class="tour-slide txt" id="tourSlide5">
        <p><?=$this->lang->line('tour_5_text_1')?></p><br/>
        <br/>
        <img src="<?=$this->config->item('base_url')?>design/tour/tour_views.jpg"  width="463px" /></div>
    <div class="tour-slide txt" id="tourSlide6">
    <ul>
        <li><b><?=$this->lang->line('tour_6_text_1')?></b><br/>
        <?=$this->lang->line('tour_6_text_2')?></li>
        <li><b><?=$this->lang->line('tour_6_text_3')?></b><br/>
        <?=$this->lang->line('tour_6_text_4')?></li>
        <li><b><?=$this->lang->line('tour_6_text_5')?></b><br/>
        <?=$this->lang->line('tour_6_text_6')?></li>
    </ul>
        <img src="<?=$this->config->item('base_url')?>design/tour/bg_wall_cut.jpg"  alt="blablu" id="gameTourWallImg" />    </div>

    <div class="tour-slide txt" id="tourSlide7">
        <ul>
            <li><b><?=$this->lang->line('tour_7_text_1')?></b><br/>
            <?=$this->lang->line('tour_7_text_2')?></li>
            <li><b><?=$this->lang->line('tour_7_text_3')?></b><br/>
            <?=$this->lang->line('tour_7_text_4')?></li>
            <li><b><?=$this->lang->line('tour_7_text_5')?></b><br/>
            <?=$this->lang->line('tour_7_text_6')?></li>
        </ul>
        <p id="gameTourRegisterForFree" ><?=$this->lang->line('link_playnow_text')?></p>
    </div>

    <div class="controlls">
        <a class="back" href="javascript:void(0)" title="<?=$this->lang->line('back')?>"  style="display:none;"">&laquo; <?=$this->lang->line('back')?></a>
        <a class="next" href="javascript:void(0)" title="<?=$this->lang->line('next')?>"><?=$this->lang->line('next')?> &raquo;</a>
    </div>

</div>
<script type="text/javascript">

    $( document ) . ready( function() {

        var slideRange = { first: 1, last: 7 }
        var currentSlideNo = slideRange.first ;

        $( '.next' ).click( function() {

            currentSlideNo++ ;
            showSlide( currentSlideNo ) ;
            checkForLastSlide() ;

        } ) ;

        $( '.back' ).click( function() {

            currentSlideNo-- ;
            showSlide( currentSlideNo ) ;
            checkForFirstSlide() ;

        } ) ;

        function checkForLastSlide() {

            if( currentSlideNo == slideRange.last ) {
                hideNextLink() ;
            } else {
                showNextLink() ;
                showBackLink() ;
            }
        }

        function checkForFirstSlide() {

            if( currentSlideNo == slideRange.first ) {
                hideBackLink() ;
            } else {
                showBackLink() ;
                showNextLink() ;
            }
        }

    } ) ;

    function showSlide( slideNo ) {

        var newSlideId = 'tourSlide' + slideNo ;

        $('.current-slide') . css('display','none');

        /*$( '.current-slide' ) . fadeOut( 300, function() {

            $( '#' + newSlideId ) . fadeIn( 300 ) . addClass( 'current-slide' ) ;

        } ) . removeClass( 'current-slide' ) ;*/
        $('#'+newSlideId).css('display','block');
        $('.current-slide').removeClass('current-slide');
        $('#'+newSlideId).addClass('current-slide');
    }

    function showNextLink() {
        //$( '.controlls a.next' ).show() ;
        $( '.controlls a.next' ).css('display','block');
    }

    function hideNextLink() {
        //$( '.controlls a.next' ).hide() ;
        $( '.controlls a.next' ).css('display','none');
    }

    function showBackLink() {
        //$( '.controlls a.back' ).show() ;
        $( '.controlls a.back' ).css('display','block');
    }

    function hideBackLink() {
        //$( '.controlls a.back' ).hide() ;
        $( '.controlls a.back' ).css('display','none');

    }

</script>