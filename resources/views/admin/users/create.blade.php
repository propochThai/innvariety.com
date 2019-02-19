@extends('layouts.app')

@section('content')

	<div class="container">
	  @include('admin.includes.errors')

	  <div class="panel panel-default">
	  	<div class="panel-heading">
	  		Create User
	  	</div>


	  <div class="panel-body">
	  		<form action='{{ route('user.store') }}' name='post' id='post' method="post" enctype="multipart/form-data">
	  			{{ csrf_field() }}
	  			<div class="form-group">
	  				<label for='name'> Name </label>
	  				<input type='text' name='name' class="form-control">

	  			</div>

	  			<div class="form-group">
	  				<label for='email'> email </label>
	  				<input type='email' name='email' class="form-control">

	  			</div>

	  			<div class="form-group">
	  				<label for='password'> password </label>
	  				<input type='text' name='password' class="form-control">

	  			</div>

	  			
	  			<div class="form-group">

	  			
	  				<label for='confirm'> confirm </label>
	  				 <input id="password-confirm" type="text" class="form-control" name="password_confirmation" required>

	  			</div>


	  			<div class="form-group">
                  <label for="rule">Select Rule</label>
                  <select name="role_id" id="role_id" class="form-control input-sm">
                  		<option value=''>Select Rule</option>
                        @foreach($roles as $role)
                              <option value="{{ $role->id }}">
                              {{ $role->name }}
                              </option>
                        @endforeach
                  </select>
            	</div>


            	

	  			<div class="form-group">
	  				<label for='avatar'> Avatar </label>
	  				<input type='file' name='avatar' id='avatar' class="form-control">

	  			</div>

	  			

	  			<div class="form-group">

	  				<div class="text-center">
	  					<button class="btn btn-success" type="submit">
	  						Create New User

	  					</button>
	  				</div>
	  			</div>
	  		</form>
	  </div>
	 </div>



@stop


