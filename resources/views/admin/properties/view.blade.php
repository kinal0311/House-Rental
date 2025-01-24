@extends('layout.partials.dashboard')
@section('content')

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-lg-6 col-md-8 col-sm-8 my-2">
            <div class="page-title-box">
                <h4 class="text-uppercase mb-0">Property Details</h4>
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
                                <th class="text-nowrap" scope="row">Property Id</th>
                                <td colspan="5" class="text-break">{{$property['id']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Property Type</th>
                                <td colspan="5" class="text-break">{{$property['property_type']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Max Rooms</th>
                                <td colspan="5" class="text-break">{{$property['max_rooms']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Beds</th>
                                <td colspan="5" class="text-break">{{$property['beds']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Baths</th>
                                <td colspan="5" class="text-break">{{$property['baths']}}</td>
                            </tr>                            <tr>
                                <th class="text-nowrap" scope="row">Price</th>
                                <td colspan="5" class="text-break">{{$property['price']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Status</th>
                                <td colspan="5" class="text-break">
                                    @if($property['status'] === 'Sale')
                                        <span class="badge bg-soft-success text-success">Sale</span>
                                    @elseif($property['status'] === 'Sold')
                                        <span class="badge bg-soft-danger text-danger">Sold</span>
                                    @elseif($property['status'] === 'Rent')
                                        <span class="badge bg-soft-warning text-warning">Rent</span>
                                    @else
                                        <span class="badge bg-soft-secondary text-secondary">Unknown</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Area</th>
                                <td colspan="5" class="text-break">{{$property['area']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">ZIP Code</th>
                                <td colspan="5" class="text-break">{{$property['zip_code']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Address</th>
                                <td colspan="5" class="text-break">{{$property['address']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">City</th>
                                <td colspan="5" class="text-break">{{$property['city']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Agent</th>
                                <td colspan="5" class="text-break">{{ $property['agent']['name'] }}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Description</th>
                                <td colspan="5" class="text-break">{{$property['description']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Additional Features</th>
                                <td colspan="5" class="text-break">
                                    <ul>
                                        @forelse ($property['additional_features'] as $feature)
                                            <li>{{$feature}}</li>
                                        @empty
                                            <span>no data</span>
                                        @endforelse
                                    </ul>
                                </td>
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

