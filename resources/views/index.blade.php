@include('includes.header')

<link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet" type="text/css">
<style type="text/css">
  .playvideo {
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 3;
    background: url(http://www.hugball.com/images/playicon.png) no-repeat center center;
    transition: all 0.3s ease 0s;
}



.wrapplay{position: relative; display: block; overflow: hidden; margin-bottom: 3px;}
.wrapplay img{position: relative; z-index: 2; transition: all 0.3s ease 0s;}

.wrapplay:hover .playvideo{ background-color: rgba(0, 0, 0, 0.6);}
.wrapplay:hover img{transform: scale(1.1);}

.wrapplay {
  display: inline-block;
    margin-bottom: 2px;
    position: relative;
    display: block;
    overflow: hidden;
    margin-bottom: 3px;
}

</style>
<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->


<!-- Magnific Popup core JS file -->


<main role="main" class="main">
<div class="container">

    <div class="hotnews">
        <div class="clearfix">

            <div class="row rowclear">
                <div class="col-md-8 newleft">
                <h2>Hilight บันเทิง</h2>
                <ul id="slidernews" class="slidenews">
                    @foreach ($posts_hilight as $post_hilight)

                      <li data-thumb="{{ $post_hilight->featured }}">
                        <a href="/view/{{ $post_hilight->id }}">
                          <img src="{{ $post_hilight->featured }}" class="img-responsive" width="850" height="500">
                          <div class="caption">
                            <h3>{{ $post_hilight->title }}</h3>
                          </div>

                        </a>
                      </li>
                    @endforeach
                    </ul>
                </div>

                <div class="col-md-4 newright">
                    <h2 style="color:red;border-left: 5px solid red;">ข่าว Hot </h2>
                    <ul class="list-unstyled clearfix">
                        @foreach($posts_hilight2 as $post_hilight2)
                        <li class="clearfix col-lg-12 col-sm-6 nopad">
                            <figure class="col-xs-6">
                                <a href="/view/{{ $post_hilight2->id }}"><img src="{{ $post_hilight2->featured }}" class="img-responsive" ></a>
                            </figure>
                            <div class="col-xs-6 detailright">
                                <a href="/view/{{ $post_hilight2->id }}">{{ $post_hilight2->title }}</a>

                <span class="label label-info">เปิดอ่าน {{ $post_hilight2->visitor }}</span>
                            </div>
                        </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
    </div>




                     <section class="ad text-center">
    @foreach($array_banner as $area)
        @if(strpos($area->areaname,'C0-Home(728x180)') !==false )
            @if($area->banner[0]->is_show==1)
              <a href="{{ $area->banner[0]->linkurl }}" target="_blank">
              <img src="{{ $area->banner[0]->linkimage }}" class="img-responsive"></a>
            @endif
        @endif
    @endforeach
     </section>

     @include('includes.section1')
     <section class="newssection green">
                <h4>INN Hilight Dara  </h4>
                <a href="http://www.innnews.co.th/shownews/summary?category=8" target="_blank" class="showall">ดูทั้งหมด</a>

                <ul class="list-unstyled row clearfix list-5">

                  @foreach ($result_feed as $item)

                    <li class="clearfix col-sm-6 col-md-3" style="min-height: 200px">
                        <figure>
                            <a href="{{ $item['link'] }}" target="_blank">

                           {!! $item['image'] !!}
                            </a>

                        </figure>
                        <div class="captionnews">
                            <a href="{{ $item['link'] }}" target="_blank">{{ $item['title'] }}</a>
                        </div>
                    </li>



                    @endforeach



                </ul>
        </section>
    <div class="clearfix"></div>
<section class="newssection blue">
                <h4>INN Lifestyle</h4>
                <a href="http://www.innnews.co.th/shownews/summary?category=20" target="_blank" class="showall">ดูทั้งหมด</a>

                <ul class="list-unstyled row clearfix list-5">

                  @foreach ($result_feed2 as $item)

                    <li class="clearfix col-sm-6 col-md-3" style="min-height: 200px">
                        <figure>
                            <a href="{{ $item['link'] }}" target="_blank">

                           {!! $item['image'] !!}
                            </a>

                        </figure>
                        <div class="captionnews">
                            <a href="{{ $item['link'] }}" target="_blank">{{ $item['title'] }}</a>
                        </div>
                    </li>



                    @endforeach



                </ul>
        </section>
<div class="clearfix"></div>
<section class="newssection red2">
                <h4>INN Best Story</h4>
                <a href="http://www.innnews.co.th/shownews/summary?category=32" target="_blank" class="showall">ดูทั้งหมด</a>

                <ul class="list-unstyled row clearfix list-5">

                  @foreach ($result_feed_goodstory as $item)

                    <li class="clearfix col-sm-6 col-md-3" style="min-height: 200px">
                        <figure>
                            <a href="{{ $item['link'] }}" target="_blank">

                           {!! $item['image'] !!}
                            </a>

                        </figure>
                        <div class="captionnews">
                            <a href="{{ $item['link'] }}" target="_blank">{{ $item['title'] }}</a>
                        </div>
                    </li>



                    @endforeach



                </ul>
        </section>

<section class="newssection green">
                <h4>INN Clip</h4>
                <a href="http://www.innnews.co.th/shownews/multimedia?category=multimedia" target="_blank" class="showall">ดูทั้งหมด</a>

                <ul class="list-unstyled row clearfix list-5">

                  @foreach ($result_feed_best_clip as $item)

                    <li class="clearfix col-sm-6 col-md-3" style="min-height: 200px">
                        <figure>
                            <a href="{{ $item['link'] }}" target="_blank">

                           {!! $item['image'] !!}
                            </a>

                        </figure>
                        <div class="captionnews">
                            <a href="{{ $item['link'] }}" target="_blank">{{ $item['title'] }}</a>
                        </div>
                    </li>



                    @endforeach



                </ul>
        </section>
    <section class="ad text-center">
    @foreach($array_banner as $area)
        @if(strpos($area->areaname,'C1-Home(728x180)') !==false )
            @if($area->banner[0]->is_show==1)
              <a href="{{ $area->banner[0]->linkurl }}" target="_blank">
              <img src="{{ $area->banner[0]->linkimage }}" class="img-responsive"></a>
            @endif
        @endif
    @endforeach


    </section>
    <div class="clearfix"></div>
    @include('includes.section2')

     <div class="clearfix"></div>


    <section class="ad text-center">
    @foreach($array_banner as $area)
        @if(strpos($area->areaname,'C2-Home(728x180)') !==false )
              @if($area->banner[0]->is_show==1)
                <a href="{{ $area->banner[0]->linkurl }}" target="_blank">
                <img src="{{ $area->banner[0]->linkimage }}" class="img-responsive"></a>
              @endif
        @endif
    @endforeach


    </section>
    <div class="clearfix"></div>
    @include('includes.section3')
    @include('includes.section4')

     @include('includes.section5')
     @include('includes.section6')

 <section class="newssection blue">
                <h4>INN ประชาสัมพันธ์  </h4>
                <a href="http://www.innnews.co.th/shownews/summary?category=41" target="_blank" class="showall">ดูทั้งหมด</a>

                <ul class="list-unstyled row clearfix list-5">

                  @foreach ($result_feed_information as $item)

                    <li class="clearfix col-sm-6 col-md-3" style="min-height: 200px">
                        <figure>
                            <a href="{{ $item['link'] }}" target="_blank">

                           {!! $item['image'] !!}
                            </a>

                        </figure>
                        <div class="captionnews">
                            <a href="{{ $item['link'] }}" target="_blank">{{ $item['title'] }}</a>
                        </div>
                    </li>



                    @endforeach



                </ul>
        </section>

<section class="newssection orage">
                <h4>INN ไอที  </h4>
                <a href="http://www.innnews.co.th/shownews/summary?category=42" target="_blank" class="showall">ดูทั้งหมด</a>

                <ul class="list-unstyled row clearfix list-5">

                  @foreach ($result_feed_it as $item)

                    <li class="clearfix col-sm-6 col-md-3" style="min-height: 200px">
                        <figure>
                            <a href="{{ $item['link'] }}" target="_blank">

                           {!! $item['image'] !!}
                            </a>

                        </figure>
                        <div class="captionnews">
                            <a href="{{ $item['link'] }}" target="_blank">{{ $item['title'] }}</a>
                        </div>
                    </li>



                    @endforeach



                </ul>
        </section>
    <div class="clearfix"></div>
<section class="newssection orage">
                <h4>ข้อมูลน่าสนใจ</h4>
               

                <ul class="list-unstyled row clearfix list-5">

                  <li class="clearfix col-sm-1 col-md-3">
     <iframe frameborder=0 width="195" height="360" scrolling="no" src=http://www.pttplc.com/th/getoilprice.aspx></iframe>
                </li>
                <li class="clearfix col-sm-6 col-md-3">
<!-Currency Converter widget - HTML code - fx-rate.net --> <div style="width: 135px; border:1px solid #000;background-color:#fff;align:center;text-align;left;margin:0px 0px;padding:0px 0px;"> <div style="text-align:center;font-size:12px; line-height:16px;font-family: arial;color:#173a00; font-weight:bold;background:#c5e554;padding:3px 3px;"> <a href="https://fx-rate.net/THB/" title="Thai Baht Exchange Rate" style="text-decoration:none;color:#173a00;font-size:12px; line-height:16px;font-family: arial;"> <img border="" width="16" height="11" style="margin:0;padding:0;border:0;" src = "https://fx-rate.net/images/countries/th.png"></img> &#160; Baht Exchange Rate</a> </div>    <script type="text/javascript" src="https://fx-rate.net/fx-rates.php?currency=THB&length=continent&label_type=currency"></script></div><!-end of code-->
</li>
<li class="clearfix col-sm-6 col-md-3">
<iframe marginheight="2" marginwidth="2" src="http://www.namchiang.com/GoldPriceHistory/GoldPrice2015.html" scrolling="no" width="180" height="150" frameborder="0"> </iframe>
</li>
<li class="clearfix col-sm-6 col-md-3">
<iframe width="200px" height="194px" frameborder="0" scrolling="no" src="http://weblink.settrade.com/banner/banner3.jsp"></iframe>
</li>
<li class="clearfix col-sm-6 col-md-3">
<iframe src="http://www.tmd.go.th/daily_forecast_forweb.php" width="180" height="260" scrolling="no" frameborder=0></iframe>
</li>
</ul>
</div>
</main>
@foreach($array_banner as $area)
        @if(strpos($area->areaname,'W1-Home(650X350)') !==false )
            @if($area->banner[0]->is_show==1)
                <div id="test-popup" class="white-popup mfp-hide">
                <a href='{{ $area->banner[0]->linkurl }}' target="_blank">
                <img src='{{ $area->banner[0]->linkimage }}' border="0" class="img-responsive">
                </a>
                  <a href="#test-popup" id='click-popup' style='display:none' class="open-popup-link">
                </a>

                </div>
            @endif
        @endif
@endforeach



<style type="text/css">
    .white-popup {
  position: relative;
  background: #FFF;
  padding: 30px;

  width: auto;
  max-width: 70%;
  margin: 20px auto;
}

.mfp-gallery .mfp-first .mfp-arrow-left,
.mfp-gallery .mfp-last .mfp-arrow-right {
    display: none;
    }
</style>
<a class="hintbottom glyphicon glyphicon-chevron-up"></a>


@include('includes.footer')
@foreach($array_banner as $area)
        @if(strpos($area->areaname,'W1-Home(650X350)') !==false )
            @if($area->banner[0]->is_show==1)
                <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
                <script>
                $( document ).ready(function() {
                   $('.open-popup-link').magnificPopup({
                    type:'inline',
                    gallery:{
                    enabled:false
                    },
                    midClick:true
                    });
                   $('#click-popup').click();

                });
                </script>
            @endif
        @endif
@endforeach
<br/>
<br/>
