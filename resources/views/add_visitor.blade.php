@extends('dashboard')

@section('content')

<h2 class="mt-3">visitor Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="/sub_user">Sub Management</a></li>
    	<li class="breadcrumb-item active">Add New visitor</li>
  	</ol>
</nav>

<div class="row mt-4">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">Add New  visitor</div>
			<div class="card-body">
				<form method="POST" action="{{ route('visitor.add_validation') }}">
					@csrf
					<div class="form-group mb-3">
		        		<label><b> Name</b></label>
		        		<input type="text" name="name" class="form-control" placeholder="Name" />
		        		@if($errors->has('name'))
		        		<span class="text-danger">{{ $errors->first('name') }}</span>
		        		@endif
		        	</div>

		        	<div class="form-group mb-3">
		        		<label><b>identification number</b></label>
		        		<input type="password" name="identification" class="form-control" placeholder="identificationnumber">
		        		@if($errors->has('identification number'))
		        			<span class="text-danger">{{ $errors->first('identification number') }}</span>
		        		@endif
		        	</div>
                    <div class="form-group mb-3">
		        		<label><b>phone</b></label>
		        		<input type="text" name="phone" class="form-control" placeholder="phone">
		        		@if($errors->has('phone'))
		        			<span class="text-danger">{{ $errors->first('phone') }}</span>
		        		@endif
		        	</div>
                    <div class="form-group mb-3">
		        		<label><b>Nationality</b></label>
		        		<input type="text" name="Nationality" class="form-control" placeholder="Nationality">
		        		@if($errors->has('Nationality'))
		        			<span class="text-danger">{{ $errors->first('Nationality') }}</span>
		        		@endif
		        	</div>
                    <div class="form-group mb-3">
		        		<label><b>in Time</b></label>
		        		<input type="in Time" name="in_Time" class="form-control" placeholder="in Time">
		        		@if($errors->has('in_Time'))
		        			<span class="text-danger">{{ $errors->first('in Time') }}</span>
		        		@endif
		        	</div>
                    <div class="form-group mb-3">
		        		<label><b>Notes</b></label>
		        		<input type="text" name="Notes" class="form-control" placeholder="in Time">
		        		@if($errors->has('Notes'))
		        			<span class="text-danger">{{ $errors->first('Notes') }}</span>
		        		@endif
		        	</div>
                    <div class="form-group mb-3">
		        		<label><b>out Time</b></label>
		        		<input type="out Time" name="out_Time" class="form-control" placeholder="out Time">
		        		@if($errors->has('out_Time'))
		        			<span class="text-danger">{{ $errors->first('out Time') }}</span>
		        		@endif
		        	</div>



		        	<div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary" value="Add" />

                        {{-- <a href="{{ route('visitor') }}" class="btn btn-success btn-sm float-end">Add</a> --}}
		        	</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
