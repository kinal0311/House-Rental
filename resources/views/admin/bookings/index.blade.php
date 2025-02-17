@extends('layout.partials.master')
<style>
    .btn-group {
    display: flex;
    justify-content: flex-start; /* Align buttons to the left */
    gap: 5px; /* Adds space between buttons */
}

.btn-group .btn {
    flex: 1; /* Ensure all buttons take equal space */
}
</style>
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
                <a href="{{ route('admin.properties.create')}}" class="btn btn-primary btn-round"><b><i class="fa fa-plus"></i></b></a>
            </div>
        </div>

    </div>
    {{-- @include('include.flash-message') --}}
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body table-responsive" >
					<table id="propertyDataTable" class="table table-hover mb-0" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Property Id</th>
                                <th>User Id</th>
                                <th>Payment Option</th>
                                <th>Payment Status</th>
                                <th>Amound</th>
                                <th>Baths</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Area</th>
                                <th>ZIP Code</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Agent</th>
                                <th>Description</th>
                                <th>Additional Features</th>
                                <th>Action</th>
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
@if(session('sweet_success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: @json(session('sweet_success')),
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 3000,  // Auto-close after 3 seconds
            showConfirmButton: false
        });
    </script>
@endif


@if(session('sweet_error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: "{{ session('sweet_error') }}",
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
@endif
@section('script')
<script>
    var dateTableUrl = "{{ route('admin.properties.getData') }}";
    var deleteRowUrl = "{{ route('admin.properties.destroy', ':id') }}";

</script>
<script src="{{asset('assets/js/pages/admin/property/index.js')}}"></script>

@endsection

