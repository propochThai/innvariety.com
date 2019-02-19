@extends('layouts.app')

@section('content')



	<div class="container">

	  @include('admin.includes.errors')

	  <div class="panel panel-default">
	  	<div class="panel-heading">
	  		Edit a  Banner
	  	</div>


	  <div class="panel-body">
	  		<form action='{{ route('banner.update', ['id' => $banner->id]) }}' method="post" enctype="multipart/form-data">
	  			{{ csrf_field() }}


	  			<div class="form-group">
	  				<label for='name'> Name </label>
	  				<input type='text' name='name' class="form-control" value ='{{ $banner->name }}'>

	  			</div>

	  		<div class="form-group">
	  				<label for="tags">Select Area</label>
                              @foreach($areas as $area)
                                    <div class="checkbox">
                                          <label><input type="checkbox" name="areas[]" value="{{ $area->id }}" 
                                          @foreach($array_banner_selected as $area_selected)
                                          	@if($area_selected == $area->id)
                                          		checked 
                                          	@endif
                                          @endforeach
                                          @foreach($array_banner_disable as $area_disable)
                                          	@if($area_disable == $area->id)
                                          		disabled 
                                          	@endif

                                          @endforeach
                                    		
                                          >
                                          {{ $area->areaname }} ({{ $area->description }} )</label>
                                    </div>
                              @endforeach

	  			</div>


	  			<div class="form-group">
	  				<label for='name'> Width :</label>
	  				<input type='number' name='width'  style="width:50px;float:none;" value ='{{ $banner->width  }}'> <strong>Hight :</strong>
	  				<input type='number' name='hight' value ='{{ $banner->hight  }}' style="width:50px;float:none">

	  			</div>

	  			<div class="form-group">
	  				<label for='name'> Image </label>
	  				<img src="{{ $banner->linkimage }}" alt="{{ $banner->name }}" width="{{ $banner->width  }}px" height="{{ $banner->hight  }}px">
	  				<input type='file' name='linkimage' class="form-control">

	  			</div>

	  			<div class="form-group">
	  				<label for='name'> URL </label>
	  				<input type='text' name='linkurl' class="form-control"  value ='{{ $banner->linkurl  }}'>

	  			</div>

	  		
	  		    <div class="input-group date">
	  		    <label for='name'> DateExpire </label>
      <input type="text" class="form-control" name='expire_date' value ='{{ $banner->expire_date  }}'>

     			</div>

			<br>
               <div class="form-group">
            <label for='name'> Status </label><br>

            <input type="radio" name="is_show" value="1" 
            @if($banner->is_show ==1)
              checked
            @endif 
            > แสดง
          <input type="radio" name="is_show" value="0"
          @if($banner->is_show ==0)
            checked
          @endif 
          > ไม่แสดง

            

          </div>


	  			<div class="form-group">
	  				<label for='name'> ContactEmail </label>
	  				<input type='email' name='contact_email' class="form-control" value ='{{ $banner->contact_email  }}'>

	  			</div>


	  			<div class="form-group">

	  				<div class="text-center">
	  					<button class="btn btn-success" type="submit">
	  						Update banner

	  					</button>
	  				</div>
	  			</div>
	  		</form>
	  </div>
	 </div>
@stop

@section('special_js')

	  <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script>
    $( document ).ready(function() {
    		$('.input-group.date').datepicker({
 					format: 'yyyy-mm-dd',
 					autoclose: true
    			});
    });
    </script>
@stop

