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
	  		Edit Hilight บันเทิง
	  	</div>


	  <div class="panel-body">
	  		<form action="{{ route('site.updatehilightnews', ['id' => $site->id]) }}" name='post' id='post' method="post" enctype="multipart/form-data">
	  			{{ csrf_field() }}

					<label for='title'> Hilight1 </label>
				<select name="post1_id" id="post1_id" class="form-control input-sm" required>
												<option value=''>Select Post</option>
													@foreach($posts as $post)
															<option value="{{ $post->id }}" @if($post->id == $site->post1_id) selected @endif>
															{{ $post->subcategory->name }}->{{ $post->title }}
															</option>
												@endforeach

								</select>
						<br/>

						<label for='title'> Hilight2 </label>
					<select name="post2_id" id="post2_id" class="form-control input-sm" required>
													<option value=''>Select Post</option>
														@foreach($posts as $post)
																<option value="{{ $post->id }}" @if($post->id == $site->post2_id) selected @endif>
																{{ $post->subcategory->name }}->{{ $post->title }}
																</option>
													@endforeach

									</select>
							<br/>

							<label for='title'> Hilight3 </label>
						<select name="post3_id" id="post3_id" class="form-control input-sm" required>
														<option value=''>Select Post</option>
															@foreach($posts as $post)
																	<option value="{{ $post->id }}" @if($post->id == $site->post3_id) selected @endif>
																	{{ $post->subcategory->name }}->{{ $post->title }}
																	</option>
														@endforeach

										</select>
								<br/>


								<label for='title'> Hilight4 </label>
								<select name="post4_id" id="post4_id" class="form-control input-sm" required>
															<option value=''>Select Post</option>
																@foreach($posts as $post)
																		<option value="{{ $post->id }}" @if($post->id == $site->post4_id) selected @endif>
																		{{ $post->subcategory->name }}->{{ $post->title }}
																		</option>
															@endforeach

											</select>
									<br/>

									<label for='title'> Hilight5 </label>
									<select name="post5_id" id="post5_id" class="form-control input-sm" required>
																<option value=''>Select Post</option>
																	@foreach($posts as $post)
																			<option value="{{ $post->id }}" @if($post->id == $site->post5_id) selected @endif>
																			{{ $post->subcategory->name }}->{{ $post->title }}
																			</option>
																@endforeach

												</select>
										<br/>



	  			<div class="form-group">

	  				<div class="text-center">
	  					<button class="btn btn-success" type="submit">
	  						Update

	  					</button>

	  				</div>
	  			</div>
	  		</form>
	  </div>
	 </div>



@stop
