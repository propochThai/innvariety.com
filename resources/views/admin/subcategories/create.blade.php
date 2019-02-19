@extends('layouts.app')

@section('content')


<style type="text/css">
	
fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
    width:inherit; /* Or auto */
    padding:0 10px; /* To give a bit of padding on the left and right */
    border-bottom:none;
    margin-bottom: 10px;

}
</style>
	<div class="container">

	  @include('admin.includes.errors')

	  <div class="panel panel-default">
	  	<div class="panel-heading">
	  		Create a new Sub Category
	  	</div>


	  <div class="panel-body">
	  		<form action='{{ route('subcategory.store') }}' method="post">
	  			{{ csrf_field() }}

				<div class="form-group">
                  <label for="category">Select a Category</label>
                  <select name="category_id" id="category" class="form-control" required>
                  		<option value=''>Select Category</option>
                        @foreach($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                  </select>
            	</div>
            	<div class="form-group">
	  				<label for='name'> Name </label>
	  				<input type='text' name='name' class="form-control" placeholder="ชื่อหมวดย่อย" required>

	  			</div>

	<div class="form-group">
                  <label for="style">Select a Style</label>
                  <select name="style_id" id="style_id" class="form-control" style="background: #009966; color: #FFF;" onChange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" required>
                  		<option value=''>Select Style</option>
                        @foreach($styles as $style)
                              <option style="background: {{ $style->color }} color: #FFF;"  value="{{ $style->id }}">{{ $style->name }}</option>
                        @endforeach
                  </select>
            	</div>
 

<fieldset class="scheduler-border">
    <legend class="scheduler-border">SEO</legend>
	  			
	  		
		  				<label for='title'> Title </label>
		  				<input type='text' name='title' class="form-control" required>

	  				<br>
	  				
		  				<label for='keyword'> Keyword </label>
		  				<textarea name='keyword' class="form-control" rows='5' required></textarea>
		  				

	  				<br>

	  				
		  				<label for='description'> Description </label>
		  				<textarea name='description' class="form-control" rows='5' required></textarea>
		  				

	  				<br>

	  			</fieldset>
	  			

	  

	  			<div class="form-group">

	  				<div class="text-center">
	  					<button class="btn btn-success" type="submit">
	  						Store sub category

	  					</button>
	  				</div>
	  			</div>
	  		</form>
	  </div>
	 </div>
@stop

