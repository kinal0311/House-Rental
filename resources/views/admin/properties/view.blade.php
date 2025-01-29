@extends('layout.partials.master')
{{-- <style>
    .property-image {
        width: 200px; /* Set the desired width */
        height: 200px; /* Set the desired height */
        object-fit: cover; /* This ensures the image will cover the area without distortion */
    }
</style> --}}

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
                            <tr>
                                <th class="text-nowrap" scope="row">Property Images</th>
                                <td>
                                    <div class="row">
                                        @foreach ($property->images as $image)
                                            <div class="col-md-3 mb-3">
                                                <img src="{{ asset($image->image_url) }}" alt="{{ $image->alt_text }}" class="img-fluid h-75 w-75">
                                            </div>
                                        @endforeach
                                    </div>
                                    @if($property->images->isEmpty())
                                        <p>No images available</p>
                                    @endif
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

