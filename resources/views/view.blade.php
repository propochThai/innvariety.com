@include('includes.header')
<style>
    .ls-slide-outer .ls-pager.ls-gallery{display: none;}

</style>
<link rel="stylesheet" href="/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<main role="main" class="main">
<div class="container">
    
    
    <!-- section -->

    <div class="newslist {{ $css_name }}">
        <div class="row clearfix">
            <div class="col-md-8 newsdetailinner">
                <h1>{{ $post->title }} </h1>
                <span class="glyphicon glyphicon-time"></span>
                <span class="label label-success">
                    {{ $post->created_at->toDateTimeString() }}
                </span>
     
            
                &nbsp;<span class="glyphicon glyphicon-eye-open"></span>
                <span class="label label-info">เปิดอ่าน {{ $post->visitor }}</span>
                <br><br>
                <figure class="text-center">
                    <img src="{{ $post->featured }}" class="img-responsive">
                </figure>
                <br>
          
                <br>
                 {!! $post->textcontent !!}
                 <br>
                    
                 @if($post->videocontent != '-')

                 <iframe width="560" height="315" src="{!! $post->videocontent !!}" frameborder="0" allowfullscreen></iframe>
                 @endif
                 @if(count($gallery) >0)
                <div class="wraphottag {{ $css_name }}">
                     <span class="hottag">Gallery</span>
                                <div class="grouptag"> </div>
                                
                        @foreach($gallery as $g)


        
                  
        <a rel="example_group" href="{{ $g->imageurl }}">
        
        <img alt="gallery" src="{{ $g->imageurl }}" width='100' /></a>
        

                        @endforeach
                           
                        
                </div>
                @endif
                 <div class="wraphottag {{ $css_name }}">
                     <span class="hottag">Realative tag</span>
                        <div class="grouptag">
                        @foreach($post->tags as $tag) 
                            <a href="/tag/{{ $tag->slug }}" class="tagin">{{ $tag->name }}</a> 
                            @endforeach
                     </div>
                </div>

                <div class="fb-comments" data-href="{{ Request::fullUrl() }}" data-width="100%" data-numposts="5"></div>
            </div>

            <div class="col-md-4">
                <div class="newright newsrightlist {{ $css_name }}">
                    <h3>ข่าวล่าสุดในหมวด</h3>
                    <ul class="list-unstyled clearfix">
                        @foreach($relative_post as $re_post)

                        <li class="clearfix col-lg-12 col-sm-6 nopad">
                            <figure class="col-md-4">
                                <a href="/view/{{ $re_post->id }}"><img src="{{ $re_post->featured }}" class="img-responsive" ></a>
                            </figure>
                            <div class="col-md-8 detailright">
                                <a href="/view/{{ $re_post->id }}">{{ $re_post->title }}</a>
                            </div>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>


                <div class="ad adright text-center">

                 @foreach($array_banner as $area)
        
                      @if(strpos($area->areaname,'L1-View(360x531)') !==false )
                          <a href="{{ $area->banner[0]->linkurl }}" target="_blank"><img src="{{ $area->banner[0]->linkimage }}"class="img-responsive"></a>
                      @endif
                @endforeach
                </div>
                @include('includes.fanpage')
            </div>
        </div>
    </div>
</div>
</main>
<a class="hintbottom glyphicon glyphicon-chevron-up"></a>


@include('includes.footer')
<script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="/fancybox/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

<script type="text/javascript">


        $(document).ready(function() {

                $("a[rel=example_group]").fancybox({
                'overlayShow': false,
                'transitionIn'      : 'none',
                'transitionOut'     : 'none',
                'titlePosition'     : 'over',
                'width'             : 400,
                'height'            : 300,
                'autoDimensions'    : false,
                'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
                    return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                }
            });

        });
</script>

