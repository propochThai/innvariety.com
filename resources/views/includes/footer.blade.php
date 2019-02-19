<footer class="footer">
  <div class="container">
    <a href="#" class="logofooter">
      <img src="{{ asset('images/innfooter.jpg') }}">
    </a>
    <div class="detail">
      ลิขสิทธิ์ 2013 บริษัท สำนักข่าว ไอ.เอ็น.เอ็น. จำกัด <br><br>

      287/195 ซ.รามคำแหง 21 ถ.ประดิษฐ์มนูธรรม แขวงพลับพลา <br>
      เขตวังทองหลาง กรุงเทพฯ 10310 )
    </div>

    <div class="social">
      <a href="{{ $site->facebook }}" target="_blank"><img src="{{ asset('images/facebook.jpg') }}"></a>
      <a href="{{ $site->twister }}" target="_blank"><img src="{{ asset('images/twitter.jpg') }}"></a>

      <a href="{{ $site->youtube }}" target="_blank"><img src="{{ asset('images/youtube.jpg') }}"></a>

      <script type="text/javascript">__th_page={{ $pagenametruehit }};</script>
      <script type="text/javascript" src="http://hits.truehits.in.th/data/t0031871.js"></script>
      <noscript>
      <a target="_blank" href="http://truehits.net/stat.php?id=t0031871"> <img src="http://hits.truehits.in.th/noscript.php?id=t0031871" alt="Thailand Web Stat" border="0" width="14" height="17" /></a>
      <a target="_blank" href="http://truehits.net/">Truehits.net</a>
      </noscript>





    </div>
  </div>
</footer>

  <!--endfooter -->
</div>

</div>


<script type="text/javascript" src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-migrate-1.1.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.mmenu.min.all.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.lightSlider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/prefixfree.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.hoverIntent.js') }}"></script>

<script type="text/javascript">
$(document).ready(function(){
  $('nav#menu').mmenu({
      extensions  : [ 'effect-slide-menu', 'pageshadow' ],
      searchfield : false,
      counters  : false,
      slidingSubmenus: false,
       offCanvas: {
                position: "right"
            }
    });

    $('#slidernews').lightSlider({
        adaptiveHeight:true,
        gallery:true,
        item:1,
        loop:true,
        thumbItem:5,
        slideMargin:0,
        enableDrag: true,
        currentPagerPosition:'left'
    });



    $(window).scroll(function() {
      var scroll = $(window).scrollTop();

      //>=, not <=
      if (scroll >= 50) {
         $(".hintbottom").fadeIn('slow');
      }
      else{
        $(".hintbottom").fadeOut('slow');
      }
    });
   $(".hintbottom").click(function() {
      $("html, body").animate({ scrollTop: 0 }, "slow");
      return false;
    });

   // ui list
    $.widget( "custom.iconselectmenu", $.ui.selectmenu, {
      _renderItem: function( ul, item ) {
        var li = $( "<li>", { text: item.label } );

        if ( item.disabled ) {
          li.addClass( "ui-state-disabled" );
        }

        $( "<span>", {
          style: item.element.attr( "data-style" ),
          "class": "ui-icon " + item.element.attr( "data-class" )
        })
          .appendTo( li );

        return li.appendTo( ul );
      }
    });


    // tabtable

    // submenu
    function mouseover(){
        $(this).find(".submenu").slideDown(200);
    }
    function mouseout(){
      $(this).find(".submenu").slideUp(200);
    }
    var SubmenuConfig =
        {
        interval: 100,
        sensitivity: 4,
        over: mouseover,
        timeout:50,
        out: mouseout
    };
    $(".mainmenu li").hoverIntent(SubmenuConfig);

});
</script>


<!--img src="{{ asset('images/black_ribbon_top_left.png') }}" class="black-ribbon stick-top stick-left"/-->

</body>
</html>
