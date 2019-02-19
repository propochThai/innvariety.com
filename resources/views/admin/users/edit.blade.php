@extends('layouts.app')

@section('content')

	<div class="container">
	  @include('admin.includes.errors')

	  <div class="panel panel-default">
	  	<div class="panel-heading">
	  		Edit subscriber
	  	</div>


	  <div class="panel-body">
	  		<form action='{{ route('user.update', ['id' => $user->id]) }}' name='user' id='user' method="post" enctype="multipart/form-data">
	  			{{ csrf_field() }}
	  			<div class="form-group">
	  				<label for='name'> Name </label>
	  				<input type='text' name='name' class="form-control" value='{{$user->name}}'>

	  			</div>

	  			<div class="form-group">
	  				<label for='email'> email </label>
	  				<input type='email' name='email' class="form-control" value='{{$user->email}}'>

	  			</div>

	  			<div class="form-group">
                  <label for="rule">Select Rule</label>
                  <select name="role_id" id="role_id" class="form-control input-sm">
                  		<option value=''>Select Rule</option>
                        @foreach($roles as $role)
                              <option value="{{ $role->id }}" 
                              @if($role->id == $user->role_id)
                              	selected
                              @endif
                              >
                              {{ $role->name }}
                              </option>
                        @endforeach
                  </select>
            	</div>
	  			<div class="form-group">
	  				<label for='avatar'> Avatar </label>

	  				<input type='file' name='avatar' id='avatar' class="form-control">
	  				<img src="{{ $user->avatar }}" alt="{{ $user->name }}" width="90px" height="90px" style="border-radius: 50%;">

	  			</div>	

	  			<div class="form-group">

	  				<div class="text-center">
	  					<button class="btn btn-success" type="submit">
	  						Update New User

	  					</button>
	  				</div>
	  			</div>
	  		</form>
	  </div>
	 </div>



@stop


