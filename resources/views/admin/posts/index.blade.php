@extends('layouts.app')


@section('content')
	<div class="container">



		<div class="panel panel-body">
			<div class="form-group">




					<div class="text-left">
							<form class="form-inline" method="GET" action="{{ route('post.search') }}">
  <div class="form-group">
    <label class="sr-only" for="exampleInputAmount">Search</label>
    <div class="input-group">
			<select name="subcategory" id="subcategory">
					<option value='' selected>Select Subcategory</option>
						@foreach($subcategories as $subcategory)
									<option  value="{{ $subcategory->id }}"
										@if($subcategory_select == $subcategory->id)
											selected
										@endif
										>{{ $subcategory->name }}</option>
						@endforeach
			</select>

      <input type="text"  size='50' name='query' id="query" placeholder="Title"  value="{{ $query_text }}">

    </div>
  </div>

  <button type="submit" class="btn btn-primary">Search</button>
  @if($query_text != '')
  <a href='{{ route('posts') }} '>clear search </a>
  @endif
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="{{ route('post.create') }}" class="btn btn-success">
	  						Create a post
	  					</a>

</form>


					</div>

	  			</div>
			<table class="table table-hover">
					<thead>
					<th>
						Create at
						</th>
					<th>
						Title
						</th>
						<th>
						SubCategory
						</th>
						<th>
						Create by
						</th>

						<th>
						Editing
						</th>
						<th>
						Gallery
						</th>
						<th>
						Deleting
						</th>
					</thead>
					<tbody>
						@if(count($posts) >0)
						@foreach($posts as $post)

							<tr>
							<td>{{ $post->contentdate  }}</td>
								<td>
									{{ $post->title }}
								</td>
									<td>
									{{ $post->subcategory->name }}
								</td>
								<td>
									<img src='{{ $post->user->avatar }}' alt='avatar' width='60px' height="60px" style="border-radius: 50%;">
								</td>

								<td>
								@if(Auth::user()->role->name=='Admin')
								<a href="{{ route('post.edit',['id' => $post->id]) }}" class="btn btn-xs btn-info">
								Edit
								</a>
								</td>
								<td>
								<a href="{{ route('gallery.editform',['id' => $post->id]) }}" class="btn btn-xs btn-success">
								Gallery
								</a>

								@else
									@if(Auth::id() == $post->user_id)
										<a href="{{ route('post.edit',['id' => $post->id]) }}" class="btn btn-xs btn-info">Edit</a>
										</td>
										<td>
										<a href="{{ route('gallery.editform',['id' => $post->id]) }}" class="btn btn-xs btn-success">
								Gallery
								</a>

									@else

									@endif
								@endif
								</td>

								<td>
								@if(Auth::user()->role->name=='Admin')
								<a href="{{ route('post.delete',['id' => $post->id]) }}" class="btn btn-xs btn-danger">
								Trash
								</a>
								@else
									@if(Auth::id() == $post->user_id)
									<a href="{{ route('post.delete',['id' => $post->id]) }}" class="btn btn-xs btn-danger">
								Trash
								</a>

								@else

									@endif
								@endif
								</td>
							</tr>

						@endforeach
						@else

							<tr>
                                          <th colspan="6" class="text-center">No posts yet.</th>
                                    </tr>
						@endif
					</tbody>
						<tfoot>
						<tr>
							<td colspan="6">
							{{ $posts->links() }}
							</td>
						</tr>
						</tfoot>
			</table>
		</div>
	</div>
@stop
