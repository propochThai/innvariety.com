@include('includes.header')
<style>
    .ls-slide-outer .ls-pager.ls-gallery{display: none;}
</style>
<main role="main" class="main">
<div class="container">
    
    <div class="hotnews">
        <div class="clearfix">
            <h2>Tag:: {{ $title }}</h2>
            <div class="row rowclear">
                <div class="col-md-8 newleft">
                    <ul id="slidernews" class="slidenews">
                      <li data-thumb="{{ $all_post[0]->featured }}">
                        <a href="/view/{{ $all_post[0]->id }}">
                          <img src="{{ $all_post[0]->featured }}" class="img-responsive">
                          <div class="caption">
                            <h3>{{ $all_post[0]->title }}</h3>
                          </div>
                        </a>
                      </li>
                      
                    </ul>
                </div>

          
                <div class="col-md-4 newright">
                    <div class="newright newsrightlist newsclip">
                    <h3>ข่าว Hot ประจำหมวด</h3>
                    <ul class="list-unstyled clearfix">
                        @foreach($post_hit as $post)
                        <li class="clearfix col-lg-12 col-sm-6 nopad">
                            <figure class="col-xs-6">
                                <a href="/view/{{ $post->id }}"><img src="{{ $post->featured }}" class="img-responsive"></a>
                            </figure>
                            <div class="col-xs-6 detailright">
                                <a href="/view/{{ $post->id }}">{{ $post->title }}</a>
                                <span class="label label-info">เปิดอ่าน {{ $post->visitor }}</span>
                            </div>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->

    <div class="newslist">
        <div class="row clearfix">
            <div class="col-md-8">
                <ul class="list-unstyled row clearfix list-5">
                    @for($i=1;$i<count($all_post);$i++)
                    

                    <li class="clearfix col-xs-6 col-md-4">
                        <figure>
                            <a href="/view/{{ $all_post[$i]->id }}"><img src="{{ $all_post[$i]->featured }}" class="img-responsive" style="min-height: 250px"></a>
                        </figure>
                        <div class="captionnews">
                            <a href="/view/{{ $all_post[$i]->id }}">{{ $all_post[$i]->title }}</a>
                        </div>
                    </li>
                    @endfor

                </ul>
                {{ $all_post->links() }}
            </div>

            <div class="col-md-4">
                

                <div class="ad adright text-center">
                    <a href="#"><img src="{{ asset('images/adrightlist.jpg') }}" class="img-responsive"></a>
                </div>

                
                <br>
                 @include('includes.fanpage')
            </div>
        </div>
    </div>
</div>
</main>
<a class="hintbottom glyphicon glyphicon-chevron-up"></a>
@include('includes.footer')