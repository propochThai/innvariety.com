@extends('layouts.app')


@section('content')
	<div class="container">



		<div class="panel panel-body">
			<div class="form-group">

	  				<div class="text-right">

	  					<a href="{{ route('category.create') }}" class="btn btn-success">
	  		

	  						Create a category
	  					</a>
	  				</div>
	  </div>
			<table class="table table-hover">
					<thead>
						<th>
						Category name
						</th>
						<th>
						Editing
						</th>
						<th>
						Deleting
						</th>
					</thead>
					<tbody>
						@foreach($categories as $category)

							<tr>
								<td>
									{{ $category->name }}
								</td>
								<td>
								<a href="{{ route('category.edit',['id' => $category->id]) }}" class="btn btn-xs btn-info">
								Edit
								</a>

								</td>

								<td>
								<a href="{{ route('category.delete',['id' => $category->id]) }}" class="btn btn-xs btn-danger">
								Delete
								</a>

								</td>
							</tr>

						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="3">
							{{ $categories->links() }}
							</td>
						</tr>

					</tfoot>
			</table>
		</div>
	</div>
@stop