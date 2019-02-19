@extends('layouts.app')


@section('content')
	<div class="container">

	

		<div class="panel panel-body">
		<div class="form-group">

	  				<div class="text-right">

	  					<a href="{{ route('banner.create') }}" class="btn btn-success">
	  					

	  						Create a banner
	  					</a>
	  				</div>
	  			</div>
			<table class="table table-hover">
					<thead>
						<th>
						Banner Name
						</th>
						<th>
						Area
						</th>
						<th>
						Image
						</th>
						<th>
						Status
						</th>
						<th>
						DateExpire
						</th>
						<th>
						Contact
						</th>
						<th>
						Editing
						</th>
						<th>
						Deleting
						</th>
					</thead>
					<tbody>
						@if(count($banners) > 0)

						@foreach($banners as $banner)

							<tr>
							<td>
								{{ $banner->name }}
								</td>

								<td>
									{{ $banner->width }} X {{ $banner->hight }}
									
									
								</td>

								<td>
								<img src='{{ $banner->linkimage }}' alt='avatar' width='
									@if($banner->width > 500)
										400
									@else
										$banner->width
									@endif
								px' height="{{ $banner->hight }}px">
									
									
								</td>

<td>
										@if($banner->is_show ==1)
											แสดง
										@else
											ไม่แสดง
										@endif	
									
								</td>
								<td>

									{{ $banner->expire_date }}
									
								</td>
<td>
									{{ $banner->contact_email }}
									
								</td>

								<td>
								<a href="{{ route('banner.edit',['id' => $banner->id]) }}" class="btn btn-xs btn-info">
								Edit
								</a>

								</td>

								<td>
								<a href="{{ route('banner.delete',['id' => $banner->id]) }}" class="btn btn-xs btn-danger">
								Delete
								</a>

								</td>
							</tr>

						@endforeach
						@else
						<tr>
							<td colspan="7">
								No Banner yet.
							</td>
						</tr>
						@endif
						<tfoot>
						<tr>
							<td colspan="7">
							
							</td>
						</tr>


					</tfoot>
					</tbody>
			</table>
		</div>
	</div>
@stop
