@extends('dashboard')

@section('content')

<h2 class="mt-3">Visitor Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item active">Visitor Management</li>
  	</ol>
</nav>
<div class="mt-4 mb-4">
    @if(session()->has('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>
	@endif
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-6">Visitor Management</div>
                <div class="col col-md-6">
					<a href="/visit/create" class="btn btn-success btn-sm float-end">Add</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
                <div id="user_table_filter" class="dataTables_filter">
                    <div class="row">
                        <div class="col-sm-12 col-md-6" style="margin-bottom: 10px">
                            <div class="dataTables_length" id="user_table_length" >
                                <label style="display:inline-flex" >Show <select name="user_table_length" aria-controls="user_table" class="form-select form-select-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label>
                            </div>
                        </div>
                        {{-- <div class="text-center  mb-md-3">

                            <form class="container " method="GET" action="visit/search">
                              @csrf
                              <input type="search"
                              class="form-control my-2 my-lg-0"
                              name="search" id="search"
                              placeholder="Search by hotel name"

                              {{-- value="{{ $search }}" --}}

                              {{-- style="
                              width: 30%;
                              margin-left: 260px;
                              align-items: center;">
                              <button class="btn btn-info" type="submit" style="margin-top: 10px;
                              margin-right: 10px;">Search</button>
                              <a href="/hotel" >
                                <button class="btn btn-info" type="button" style="margin-top: 10px;
                              margin-right: 10px;">Reset</button>
                              </a>
                            </form> --}}

                          {{-- </div>  --}}

                        <div class="col-sm-12 col-md-6">
                            {{-- <div id="user_table_filter" class="dataTables_filter" style="float: right">
                                <label style="display:inline-flex">Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="user_table">
                                </label>
                            </div> --}}

                            <form action="{{url('/search')}}" class="form-inline my-2 my-lg-0" type="get">
                                <input type="search" class="form-control mr-sm-2" name="query" type="search" placeholder="Search Form">
                                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                            </form>

                        </div>
                </div>

                </div>
				<table class="table table-bordered" id="visitors_table">
					<thead>
						<tr>
							<th>Visitor Name</th>
							<th>Identification Number</th>
							<th>phone</th>
							<th>nationality</th>
							<th>Notes</th>
							<th>in time</th>
							<th>out time</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>
                                {{$item->visitor_name}}
                            </td>
                            <td>
                                {{$item->identification_number}}
                            </td>
                            <td>
                                {{$item->visitor_mobile_no}}
                            </td>
                            <td>
                                {{$item->nationality}}
                            </td>
                            <td>
                                {{$item->Notes}}
                            </td>
                            <td>
                                {{$item->visitor_enter_time}}
                            </td>
                            <td>
                                {{$item->visitor_out_time}}
                            </td>
                        </td>


                        <td>
                            {{-- <a href="visit/{{$item->id}}" class="btn btn-danger mt-4">Delete</a> --}}

                            <div class="mb-3">
                          <form action="visit/{{$item->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger mt-4 ">Delete</button>
                          </form>
                          </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
$(function(){

var table = $('#user_table').DataTable({
    processing:true,
    serverSide:true,
    ajax:"{{ route('visitor.fetchall') }}",
    columns:[
        {
            data:'visitor_name',
            name:'visitor_name'
        },

        {
            data:'visitor_mobile_no',
            name:'visitor_mobile_no'
        },
        {
            data:'updated_at',
            name:'updated_at'
        },
        {
            data:'action',
            name:'action',
            orderable:false
        }
    ]
});

</script>

@endsection
