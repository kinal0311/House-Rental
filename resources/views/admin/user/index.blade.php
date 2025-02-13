@extends('layout.partials.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-lg-6 col-md-8 col-sm-8 my-2">
            <div class="page-title-box">
                {{-- <h4 class="text-uppercase mb-0">{{$dateTableTitle}}</h4> --}}
                <div class="page-title-left">
                    {{-- {{ Breadcrumbs::render('adminstore')}} --}}
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-4 col-sm-4">
            <div class="btn-group float-right mt-2 mb-2">
                {{-- <a href="{{ route('admin.admin.create') }}" class="btn btn-primary btn-round"><b><i class="fa fa-plus"></i></b></a> --}}
            </div>
        </div>

    </div>
    {{-- @include('include.flash-message') --}}
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body" >
					<table id="userDataTable" class="table table-hover mb-0" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                {{-- <th>Password</th> --}}
                                <th>Gender</th>
                                <th>Phone Number</th>
                                <th>Date of Birth</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Address</th>
                                <th>ZIP Code</th>
                                <th>Profile picture</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('script')
<script>
    var dateTableUrl = "{{ route('admin.user.user-getdata') }}";
    var deleteRowUrl = "{{ route('admin.user.destroy', ':id') }}";
    var changeStatusUrl = "{{ route('admin.userChangeStatus',':id')}}";

</script>
<script src="{{asset('assets/js/pages/admin/user/index.js')}}"></script>

{{-- @include('include.table_script') --}}
@endsection

