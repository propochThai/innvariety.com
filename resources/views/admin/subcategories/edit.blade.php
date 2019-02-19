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
select option {
    margin: 40px;
    background: rgba(0, 0, 0, 0.3);
    color: #fff;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
}

select option[value="1"] { /* value not val */
    background: rgba(100, 100, 100, 0.3);
}

select option[value="2"] { /* value not val */
    background: rgba(200, 200, 200, 0.3);
}
</style>
	<div class="container">

	  @include('admin.includes.errors')

	  <div class="panel panel-default">
	  	<div class="panel-heading">
	  		Update Subcategory {{ $subcategory->name }}
	  	</div>


	  <div class="panel-body">
	  		<form action='{{ route('subcategory.update', ['id' => $subcategory->id]) }}' method="post">
	  			{{ csrf_field() }}

	  			<div class="form-group">
                  <label for="category">Select a Category</label>
                  <select name="category_id" id="category" class="form-control"required>
                  		<option value=''>Select Category</option>
                        @foreach($categories as $category)
                              <option value="{{ $category->id }}"
                              @if($category->id == $subcategory->category->id)
                              	selected 
                              @endif
                              >{{ $category->name }}</option>
                        @endforeach
                  </select>
            	</div>

	  			<div class="form-group">
	  				<label for='name'> Name </label>
	  				<input type='text' name='name' value="{{ $subcategory->name }}" class="form-control" required>

	  			</div>




	<div class="form-group">
                  <label for="style">Select a Style</label>
                  <select name="style_id" id="style_id" class="form-control" style="background: {{ $subcategory->style->color }} ; color: #FFF;" onChange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" required>
                  		<option value=''>Select Style</option>
                        @foreach($styles as $style)
                              <option style="background: {{ $style->color }} color: #FFF;" value="{{ $style->id }}"
                              @if($subcategory->style_id == $style->id)
                              	selected 
                              @endif
                              >{{ $style->name }}</option>
                        @endforeach
                  </select>
            	</div>
 

<fieldset class="scheduler-border">
    <legend class="scheduler-border">SEO</legend>
	  			
	  		
		  				<label for='title'> Title </label>
		  				<input type='text' name='title' class="form-control"  value='{{ $subcategory->title }}' required>

	  				<br>
	  				
		  				<label for='keyword'> Keyword </label>
		  				<textarea name='keyword' class="form-control" rows='5' required>{{ $subcategory->keyword }}</textarea>
	  				<br>
		  				<label for='description'> Description </label>
		  				<textarea name='description' class="form-control" rows='5' required>{{ $subcategory->description }}</textarea>
		  				

	  				<br>

	  			</fieldset>

	  			<div class="form-group">

	  				<div class="text-center">
	  					<button class="btn btn-success" type="submit">
	  						Update category

	  					</button>
	  				</div>
	  			</div>
	  		</form>
	  </div>
	 </div>
@stop

