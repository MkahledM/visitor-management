@extends('dashboard')

@section('content')

<h2 class="mt-3">Department Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="/department">Department Management</a></li>
    	<li class="breadcrumb-item active">Add New Department</li>
  	</ol>
</nav>
<div class="row mt-4">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">Add New Department</div>
			<div class="card-body">
				<form method="POST" action="{{ route('department.add_validation') }}">
					@csrf
					<div class="form-group mb-3">
		        		<label><b>Department Name</b></label>
		        		<input type="text" name="department_name" class="form-control" />
		        		@if($errors->has('department_name'))
		        			<span class="text-danger">{{ $errors->first('department_name') }}</span>
		        		@endif
		        	</div>
		        	<div class="form-group mb-3">
		        		<label><b>Contact Person</b></label>
		        		<div class="row">
		        			<div class="col col-md-10">
		        				<input type="text" name="contact_person[]" class="form-control" />
		        			</div>
		        			<div class="col col-md-2">
		        				<button type="button" name="add_person" id="add_person" class="btn btn-success btn-sm">+</button>
		        			</div>
		        		</div>
		        		<div id="append_person"></div>
		        	</div>
		        	<div class="form-group mb-3">
		        		<input type="submit" class="btn btn-primary" value="Add" />
		        	</div>
				</form>
			</div>
		</div>
	</div>
</div>




@endsection
