@extends('layouts.app')


@section('content')
	<div class="container">



		<div class="panel panel-body">

			<table class="table table-hover">
					<thead>
					<th>
						Title
						</th>
						<th>
						SubCategory
						</th>
						
						<th>
						Feature Image
						</th>
						<th>
						Restore
						</th>
						<th>
						Destroy
						</th>
					</thead>
					<tbody>
						@if(count($posts) >0)
						@foreach($posts as $post)

							<tr>
								<td>
									{{ $post->title }}
								</td>
									<td>
									{{ $post->subcategory->name }}
								</td>
									<td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px"></td>
								<td>
								<a href="{{ route('post.restore',['id' => $post->id]) }}" class="btn btn-xs btn-success">
								Restore
								</a>

								</td>

								<td>
								<a href="{{ route('post.kill',['id' => $post->id]) }}" class="btn btn-xs btn-danger">
								Destroy
								</a>

								</td>
							</tr>

						@endforeach
						@else

							<tr>
                                          <th colspan="5" class="text-center">No posts yet.</th>
                                    </tr>
						@endif
					</tbody>
			</table>
		</div>
	</div>
@stop