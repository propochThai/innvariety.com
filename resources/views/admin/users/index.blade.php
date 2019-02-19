@extends('layouts.app')


@section('content')
	<div class="container">



		<div class="panel panel-body">
			<div class="form-group">

	  				<div class="text-right">

	  					<a href="{{ route('user.create') }}" class="btn btn-success">
	  						Create a User
	  					</a>
	  				</div>
	  			</div>
			<table class="table table-hover">
					<thead>
					<th>
						Image
						</th>
						<th>
						Name
						</th>
						
						<th>
						Permission
						</th>
						<th>
						Editing
						</th>
						<th>
						Deleting
						</th>
					</thead>
					<tbody>
						@if(count($users) >0)
						@foreach($users as $user)
							<tr>
								<td>
									<img src='{{ $user->avatar }}' alt='avatar' width='60px' height="60px" style="border-radius: 50%;">
								</td>
								<td>
									{{ $user->name }}
								</td>

									<td>
									{{ $user->role->name }}
								</td>
								<td>
								<a href="{{ route('user.edit',['id' => $user->id]) }}" class="btn btn-xs btn-info">
								Edit
								</a>

								</td>
								<td>
								<a href="{{ route('user.delete',['id' => $user->id]) }}" class="btn btn-xs btn-danger">
								Delete
								</a>
							</tr>

						@endforeach
						@else

							<tr>
                                          <th colspan="5" class="text-center">No users yet.</th>
                                    </tr>
						@endif
					</tbody>
			</table>
		</div>
	</div>
@stop