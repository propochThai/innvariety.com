 <section class="newssection {{ $subcategory_1->style->cssname }}">
                <h4>{{ $subcategory_1->name }}</h4>
                <a href="/category/{{ $subcategory_1->slug }}" class="showall">ดูทั้งหมด</a>
    @if($site->format2_type ==2)
                <ul class="list-unstyled row clearfix list-5">
                    @foreach ($posts_1 as $post)
                    <li class="clearfix col-sm-6 col-md-3" style="min-height: 170px">
                        <figure>

                            <a href="/view/{{ $post->id }}" target="_blank" class="wrapplay"><i class="playvideo"></i><img src="{{ $post->featured }}" class="img-responsive" style='min-height:250px'></a>
                        </figure>
                        <div class="captionnews">
                            <a href="/view/{{ $post->id }}" target="_blank">{{ str_limit($post->title,$limit =40,$end='...') }}</a>
                        </div>
                    </li>
                    @endforeach
                </ul>

    @elseif($site->format2_type ==3)
            <div class="row">
            @foreach ($posts_1 as $post)
            @if ($loop->first)

                <div class="col-md-6 bignews">
                    <figure>
                         <a href="/view/{{ $post->id }}" target="_blank"><img src="{{ $post->featured }}" class="img-responsive"></a>


                    <a href="/view/{{ $post->id }}" target="_blank">
                    <div class="titledara">{{ $post->title }}</div>
                    <div class="detaildara">
                    {{ str_limit(strip_tags($post->textcontent), $limit = 40, $end = '...') }}
                     </div>
                    </a>
                </div>
                 <div class="col-md-6">
                 <ul class="list-unstyled row clearfix">
            @else
                    <li class="clearfix col-sm-6 col-xs-6 col-md-6">
                        <figure>
                            <a href="/view/{{ $post->id }}" target="_blank"><img src="{{ $post->featured }}" class="img-responsive"></a>
                        </figure>
                        <div class="captionnews">
                            <a href="/view/{{ $post->id }}" target="_blank">{{ $post->title }}</a>
                        </div>
                    </li>
            @endif
            @endforeach
                </ul>
            </div>
        </div>

    @elseif($site->format2_type ==4)
        <div class="row10">
            <div class="life70">
                <ul class="list-unstyled row clearfix list-5">
                    @foreach ($posts_1 as $post)
                    <li class="clearfix col-xs-6 col-md-4">
                        <figure>
                            <a href="/view/{{ $post->id }}" target="_blank"><img src="{{ $post->featured }}" class="img-responsive"></a>
                        </figure>
                        <div class="captionnews">
                            <a href="/view/{{ $post->id }}">{{ str_limit(strip_tags($post->title), $limit = 40, $end = '...') }}</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="life40">
                    @foreach($array_banner as $area)
        @if(strpos($area->areaname,'L1-Home(464x387)') !==false )
              @if($area->banner[0]->is_show==1)
                <a href="{{ $area->banner[0]->linkurl }}" target="_blank">
                <img src="{{ $area->banner[0]->linkimage }}" class="img-responsive"></a>
              @endif
        @endif
    @endforeach


            </div>
        </div>

    <div class="clearfix"></div>
    @endif
        <div class="wraphottag">
                    <span class="hottag">Hot tag</span>
                        <div class="grouptag">
                        @foreach($array_tag_1 as $tags)
                            <a href="/tag/{{ $tags["slug"] }}" class="tagin">{{ $tags["name"] }}</a>
                        @endforeach
                    </div>
                </div>
    </section>