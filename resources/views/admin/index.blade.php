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
                <a href="{{ route('admin.admin.create') }}" class="btn btn-primary btn-round"><b><i class="fa fa-plus"></i></b></a>
            </div>
        </div>

    </div>
    {{-- @include('include.flash-message') --}}
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body" >
					<table id="adminDataTable" class="table table-hover mb-0" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
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
{{-- Notiflix --}}
<script src="{{ URL::asset('assets/libs/notiflix/notiflix-2.1.2.js')}}"></script>
<script src="{{ URL::asset('assets/libs/notiflix/notiflix.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('script')
@if(session('success'))
    <p>{{ session('success') }}</p>  <!-- For Debugging -->
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: "{{ session('error') }}",
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
@endif
<script>
    var dateTableUrl = "{{ route('admin.admin.get.data') }}";
    var deleteRowUrl = "{{ route('admin.destroy', ':id') }}";
    var changeStatusUrl = "{{ route('admin.changeStatus',':id')}}";
</script>
<script src="{{asset('assets/js/pages/admin/sub-admin/index.js')}}"></script>

{{-- @include('include.table_script') --}}
@endsection

