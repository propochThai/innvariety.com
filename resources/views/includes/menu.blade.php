
<nav id="menu">
  <ul>
    @foreach($categories as $category)
    <li><a href="#">{{ $category->name }} </a>
       <ul>
        @foreach($subcategories as $subcategory)
                @if($subcategory->category_id == $category->id)
                <li><a href="/category/{{ $subcategory->slug }}">{{ $subcategory->name }}</a></li>
                @endif
             @endforeach
      </ul>
    </li>
    @endforeach
    </ul>
</nav>


<div class="wrappermain">

<header class="wrapheader">
  <div class="wrappermenu boxshadow">
    @foreach($categories as $category)
    <ul class="mainmenu container">
       <li><a href="#">{{ $category->name }} </a>
           <div class="submenu">
            <ul>
              @foreach($subcategories as $subcategory)
                @if($subcategory->category_id == $category->id)
                <li><a href="/category/{{ $subcategory->slug }}">{{ $subcategory->name }}</a></li>
                @endif
             @endforeach
            </ul>
          </div>
          </li>
    @endforeach



    </ul>
  </div>
  <div class="container relative">
  	<div class="header">
    	<a href="http://www.innvariety.com/" class="logo">
      	<img src="{{ asset('images/logo.jpg') }}"  class="logodesktop">
      </a>

      @foreach($array_banner as $area)
        @if($pagename == "HOME")
          @if(strpos($area->areaname,'H1-Home(728x90)') !==false )
              @if($area->banner[0]->is_show==1)
              <a href="{{ $area->banner[0]->linkurl }}" target="_blank"><img src="{{ $area->banner[0]->linkimage }}"class="img-responsive"></a>
              @endif
          @endif
        @elseif($pagename == "LIST")
          @if(strpos($area->areaname,'H1-List(728x90)') !==false )
               @if($area->banner[0]->is_show==1)
              <a href="{{ $area->banner[0]->linkurl }}" target="_blank"><img src="{{ $area->banner[0]->linkimage }}"class="img-responsive"></a>
              @endif
          @endif
        @elseif($pagename == "VIEW")
          @if(strpos($area->areaname,'H1-View(728x90)') !==false )
              @if($area->banner[0]->is_show==1)
              <a href="{{ $area->banner[0]->linkurl }}" target="_blank"><img src="{{ $area->banner[0]->linkimage }}"class="img-responsive"></a>
              @endif
          @endif
        @endif
      @endforeach

      <a href="#menu" class="shownav-m"><img src="{{ asset('images/menu_sub.png') }}"></a>



    </div>
  </div>
