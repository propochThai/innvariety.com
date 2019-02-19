@extends('layouts.app')


@section('content')
	<div class="container">

	

		<div class="panel panel-body">
		<div class="form-group">

	  				<div class="text-right">

	  					<a href="{{ route('subcategory.create') }}" class="btn btn-success">
	  					

	  						Create a sub category
	  					</a>
	  				</div>
	  			</div>
			<table class="table table-hover">
					<thead>
						<th>
						Sub Category name
						</th>
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
						@if(count($subcategories) > 0)

						@foreach($subcategories as $subcategory)

							<tr>
							<td>
								{{ $subcategory->name }}
								</td>

								<td>
									{{ $subcategory->category->name }}
									
								</td>
								<td>
								<a href="{{ route('subcategory.edit',['id' => $subcategory->id]) }}" class="btn btn-xs btn-info">
								Edit
								</a>

								</td>

								<td>
								<a href="{{ route('subcategory.delete',['id' => $subcategory->id]) }}" class="btn btn-xs btn-danger">
								Delete
								</a>

								</td>
							</tr>

						@endforeach
						@else
						<tr>
							<td colspan="4">
								No subcategories yet.
							</td>
						</tr>
						@endif
						<tfoot>
						<tr>
							<td colspan="4">
							{{ $subcategories->links() }}
							</td>
						</tr>


					</tfoot>
					</tbody>
			</table>
		</div>
	</div>
@stop
