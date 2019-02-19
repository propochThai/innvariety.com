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
	 <script type="text/javascript">
	 /*
	 $('#category_id').change(function(e) {

    	alert($('#category_id'));
	 		console.log(e);
	 		var category_id = e.target.value;
	 		$.get('/ajax-subcat?category_id='+category_id,function(data){
	 			console.log(data);
	 		});
	});
	*/
	function changeEventHandler(e) {
		var category_id = e.target.value;
		$.get('/admin/ajax-subcat?category_id='+category_id,function(data){
				$('#subcategory_id').empty();
				$('#subcategory_id').html(data);
				/*
	 			$.each(data, function(index, subcatObj)
	 			{
	 				$('#subcategory_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>')
;	 			});
*/
	 		});
        
      }
	 	
	 </script>

	<div class="container">
	  @include('admin.includes.errors')

	  <div class="panel panel-default">
	  	<div class="panel-heading">
	  		Create a new post
	  	</div>


	  <div class="panel-body">
	  		<form action='{{ route('post.store') }}' name='post' id='post' method="post" enctype="multipart/form-data">
	  			{{ csrf_field() }}
	  			<div class="form-group">
	  				<label for='title'> Title </label>
	  				<input type='text' name='title' class="form-control" required>

	  			</div>
	  			<div class="input-group date">
	  		    <label for='name'> Create </label>
      <input type="text" class="form-control" name='contentdate' value ={{ date('Y-m-d') }} required>

     			</div>

	  			<div class="form-group">
                  <label for="category">Select a Category</label>
                  <select name="category_id" id="category_id" class="form-control input-sm" onchange="changeEventHandler(event);"required >
                  		<option value=''>Select Category</option>
                        @foreach($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                  </select>
            	</div>

            	<div class="form-group">
                  <label for="subcategory">Select a SubCategory</label>
                  <select name="subcategory_id" id="subcategory_id"  class="form-control input-sm" required>
                  		
                  </select>
            	</div>

	  			<div class="form-group">
	  				<label for='feature'> Featured image  <b><font color='red'>รูปแนวนอนขนาด 750 x 380 พิกเซล</font></b></label>
	  				<input type='file' name='featured' id='featured' class="form-control">

	  			</div>

	  			<div class="form-group">
	  				<label for='content'> Content </label>
	  				<textarea name='textcontent' id='textcontent' cols="5" rows="10" class="form-control" required></textarea>


	  			</div>

	  				<div class="form-group">
	  				<label for='tags'> Tags </label>
	  				<input type="text" name="tags" id="tags" class="form-control" required>
	  				


	  			</div>

	  			


	  			<div class="form-group">
	  				<label for='content'> Video </label>
	  				<textarea name='videocontent' id='videocontent' cols="5" rows="3" class="form-control"></textarea>


	  			</div>


<fieldset class="scheduler-border">
    <legend class="scheduler-border">SEO</legend>
	  			
	  		
		  			
	  				
		  				<label for='keyword'> Keyword </label>
		  				<textarea name='keyword' class="form-control" rows='5'></textarea>
		  				

	  				<br>

	  				
		  				<label for='description'> Description </label>
		  				<textarea name='description' class="form-control" rows='5'></textarea>
		  				

	  				<br>

	  			</fieldset>

	  			<div class="form-group">

	  				<div class="text-center">
	  					<button class="btn btn-success" type="submit">
	  						Store post

	  					</button>
	  				</div>
	  			</div>
	  		</form>
	  </div>
	 </div>



@stop

@section('special_js')

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
	  <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

<script>


	var tags = [
    @foreach ($tags as $tag)
    {tag: "{{$tag}}" },
    @endforeach
];
	

$( document ).ready(function() {
    $('#tags').selectize({
        delimiter: ',',
        persist: false,
        valueField: 'tag',
        labelField: 'tag',
        searchField: 'tag',
        options: tags,
        create: function(input) {
            return {
                tag: input
            }
        }
    });


  $('#textcontent').summernote({
  	height: 500
  });


});






    $( document ).ready(function() {
    		$('.input-group.date').datepicker({
 					format: 'yyyy-mm-dd',
 					autoclose: true
    			});
    });
   </script> 
@stop



