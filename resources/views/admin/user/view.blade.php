@extends('layout.partials.dashboard')
@section('content')

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-lg-6 col-md-8 col-sm-8 my-2">
            <div class="page-title-box">
                <h4 class="text-uppercase mb-0">User Details</h4>
            </div>
        </div>
    </div>
    @php
    // $name = $store->getTranslations('name');
    @endphp
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body" >
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th class="text-nowrap" scope="row">Id</th>
                                <td colspan="5" class="text-break">{{$user['id']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Profile Picture</th>
                                <td colspan="5" class="text-break">
                                    <img class="border rounded p-0 pic_preview" src="{{URL::asset($user->img)}}" alt="your image" style="height: 200px;width: 200px; object-fit: cover;" id="existing-img"/>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Name</th>
                                <td colspan="5" class="text-break">{{$user['name']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Email</th>
                                <td colspan="5" class="text-break">{{$user['email']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Gender</th>
                                <td colspan="5" class="text-break">{{$user['gender']}}</td>
                            </tr>                            <tr>
                                <th class="text-nowrap" scope="row">Phone Number</th>
                                <td colspan="5" class="text-break">{{$user['phone_number']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Date of Birth</th>
                                <td colspan="5" class="text-break">{{$user['dob']}}</td>
                            </tr>                            <tr>
                                <th class="text-nowrap" scope="row">Status</th>
                                    <td colspan="5">
                                        @if($user->status == 1)
                                        <span class="badge bg-soft-success text-success">Active</span>
                                        @elseif($user->status == 0)
                                        <span class="badge bg-soft-danger text-danger">Inactive</span>
                                        @endif
                                    </td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Description</th>
                                <td colspan="5" class="text-break">{{$user['description']}}</td>
                            </tr>                            <tr>
                                <th class="text-nowrap" scope="row">Address</th>
                                <td colspan="5" class="text-break">{{$user['address']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">ZIP Code</th>
                                <td colspan="5" class="text-break">{{$user['zip_code']}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>


@endsection

