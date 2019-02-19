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
	  		Edit Site
	  	</div>


	  <div class="panel-body">
	  		<form action="{{ route('site.update', ['id' => $site->id]) }}" name='post' id='post' method="post" enctype="multipart/form-data">
	  			{{ csrf_field() }}


<fieldset class="scheduler-border">
    <legend class="scheduler-border">SEO</legend>


	  				<label for='title'> Title </label>
	  				<input type='text' name='name' class="form-control" value="{{ $site->name }}" required>


		  			<br>

		  				<label for='keyword'> Keyword </label>
		  				<textarea name='keyword' class="form-control" rows='5'required>{{ $site->keyword }}</textarea>


	  				<br>


		  				<label for='description'> Description </label>
		  				<textarea name='description' class="form-control" rows='5' required>{{ $site->description }}</textarea>


	  				<br>

	  			</fieldset>


<fieldset class="scheduler-border">
    <legend class="scheduler-border">Social</legend>


	  				<label for='title'> Facebook </label>
	  				<input type='text' name='facebook' class="form-control" value="{{ $site->facebook }}" required>
	  				<br>
	  				<label for='title'> Twister </label>
	  				<br>
	  				<input type='text' name='twister' class="form-control" value="{{ $site->twister }}" required>
	  				<br>
<label for='title'> Title </label>
	  				<input type='text' name='youtube' class="form-control" value="{{ $site->youtube }}" required>






	  			</fieldset>

<fieldset class="scheduler-border">
    <legend class="scheduler-border">Display</legend>


	

	  				<label for='title'> Section1 </label>
	  				<br>
	  				<select name="subcategory2_id" id="subcategory2_id" class="form-control input-sm" required >
                  		<option value=''>Select Category</option>
                        @foreach($subcategories as $subcategory)

                              	<option value="{{ $subcategory->id }}" @if($subcategory->id == $site->subcategory2_id) selected @endif>
                              	{{ $subcategory->category->name }}->{{ $subcategory->name }}
                              	</option>
                        @endforeach
                  </select>
                      <br>
                  	 <input type="radio" name="format2_type" value="2" @if($site->format2_type == 2) checked @endif> Format1 (แสดง content ภาพเล็ก  10 content สูงสุด)<br>
  					<input type="radio" name="format2_type" value="3" @if($site->format2_type == 3) checked @endif> Format2 (แสดง content ภาพใหญ่  5 content สูงสุด)<br>
  					<input type="radio" name="format2_type" value="4" @if($site->format2_type == 4) checked @endif> Format3(แสดง content เล็ก  4 content สูงสุด มี banner ด้านขวา)<br>
  					<br>
	  				<br>


					<label for='title'> Section2 </label>
	  				<select name="subcategory3_id" id="subcategory3_id" class="form-control input-sm" required >
                  		<option value=''>Select Category</option>
                        @foreach($subcategories as $subcategory)
                              	<option value="{{ $subcategory->id }}" @if($subcategory->id == $site->subcategory3_id) selected @endif>
                              	{{ $subcategory->category->name }}->{{ $subcategory->name }}
                              	</option>
                        @endforeach
                  </select>
                        <br>
                  	 <input type="radio" name="format3_type" value="2" @if($site->format3_type == 2) checked @endif> Format1 (แสดง content ภาพเล็ก  10 content สูงสุด)<br>
  					<input type="radio" name="format3_type" value="3" @if($site->format3_type == 3) checked @endif> Format2 (แสดง content ภาพใหญ่  5 content สูงสุด)<br>
  					<input type="radio" name="format3_type" value="4" @if($site->format3_type == 4) checked @endif> Format3(แสดง content เล็ก  4 content สูงสุด มี banner ด้านขวา)<br>
  					<br>
	  				<br>


	  				<label for='title'> Section3 </label>
	  				<br>
	  				<select name="subcategory4_id" id="subcategory4_id" class="form-control input-sm" required >
                  		<option value=''>Select Category</option>
                        @foreach($subcategories as $subcategory)

                              	<option value="{{ $subcategory->id }}" @if($subcategory->id == $site->subcategory4_id) selected @endif>
                              	{{ $subcategory->category->name }}->{{ $subcategory->name }}
                              	</option>
                        @endforeach
                  </select>
                    <br>
                  	 <input type="radio" name="format4_type" value="2" @if($site->format4_type == 2) checked @endif> Format1 (แสดง content ภาพเล็ก  10 content สูงสุด)<br>
  					<input type="radio" name="format4_type" value="3" @if($site->format4_type == 3) checked @endif> Format2 (แสดง content ภาพใหญ่  5 content สูงสุด)<br>
  					<input type="radio" name="format4_type" value="4" @if($site->format4_type == 4) checked @endif> Format3(แสดง content เล็ก  4 content สูงสุด มี banner ด้านขวา)<br>
  					<br>
	  				<br>

          <label for='title'> Section4 </label>
            <br>
					<select name="subcategory5_id" id="subcategory5_id" class="form-control input-sm" required >
                  		<option value=''>Select Category</option>
                        @foreach($subcategories as $subcategory)

                              	<option value="{{ $subcategory->id }}" @if($subcategory->id == $site->subcategory5_id) selected @endif>
                              	{{ $subcategory->category->name }}->{{ $subcategory->name }}
                              	</option>
                        @endforeach
                  </select>
                     <br>
                  	 <input type="radio" name="format5_type" value="2" @if($site->format5_type == 2) checked @endif> Format1 (แสดง content ภาพเล็ก  10 content สูงสุด)<br>
  					<input type="radio" name="format5_type" value="3" @if($site->format5_type == 3) checked @endif> Format2 (แสดง content ภาพใหญ่  5 content สูงสุด)<br>
  					<input type="radio" name="format5_type" value="4" @if($site->format5_type == 4) checked @endif> Format3(แสดง content เล็ก  4 content สูงสุด มี banner ด้านขวา)<br>
  					<br>
	  				<br>


             <label for='title'> Section5 </label>
            <br>
          <select name="subcategory6_id" id="subcategory6_id" class="form-control input-sm" required >
                      <option value=''>Select Category</option>
                        @foreach($subcategories as $subcategory)

                                <option value="{{ $subcategory->id }}" @if($subcategory->id == $site->subcategory6_id) selected @endif>
                                {{ $subcategory->category->name }}->{{ $subcategory->name }}
                                </option>
                        @endforeach
                  </select>
                     <br>
                     <input type="radio" name="format6_type" value="2" @if($site->format6_type == 2) checked @endif> Format1 (แสดง content ภาพเล็ก  10 content สูงสุด)<br>
            <input type="radio" name="format6_type" value="3" @if($site->format6_type == 3) checked @endif> Format2 (แสดง content ภาพใหญ่  5 content สูงสุด)<br>
            <input type="radio" name="format6_type" value="4" @if($site->format6_type == 4) checked @endif> Format3(แสดง content เล็ก  4 content สูงสุด มี banner ด้านขวา)<br>
            <br>
            <br>



             <label for='title'> Section6 </label>
            <br>
          <select name="subcategory7_id" id="subcategory7_id" class="form-control input-sm" required >
                      <option value=''>Select Category</option>
                        @foreach($subcategories as $subcategory)

                                <option value="{{ $subcategory->id }}" @if($subcategory->id == $site->subcategory7_id) selected @endif>
                                {{ $subcategory->category->name }}->{{ $subcategory->name }}
                                </option>
                        @endforeach
                  </select>
                     <br>
                     <input type="radio" name="format7_type" value="2" @if($site->format7_type == 2) checked @endif> Format1 (แสดง content ภาพเล็ก  10 content สูงสุด)<br>
            <input type="radio" name="format7_type" value="3" @if($site->format7_type == 3) checked @endif> Format2 (แสดง content ภาพใหญ่  5 content สูงสุด)<br>
            <input type="radio" name="format7_type" value="4" @if($site->format7_type == 4) checked @endif> Format3(แสดง content เล็ก  4 content สูงสุด มี banner ด้านขวา)<br>
            <br>
            <br>







	  			</fieldset>



	  			<div class="form-group">

	  				<div class="text-center">
	  					<button class="btn btn-success" type="submit">
	  						Edit post

	  					</button>

	  				</div>
	  			</div>
	  		</form>
	  </div>
	 </div>



@stop
