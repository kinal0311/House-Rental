@extends('layout.partials.master')
@section('content')

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-lg-6 col-md-8 col-sm-8 my-2">
            <div class="page-title-box">
                <h4 class="text-uppercase mb-0">Property Image Details</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th class="text-nowrap" scope="row">Image ID</th>
                                <td colspan="5" class="text-break">{{$propertyImage['id']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Property</th>
                                <td colspan="5" class="text-break">{{$propertyImage->property->property_type}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Image</th>
                                <td colspan="5">
                                    <img src="{{ URL::asset($propertyImage->image_url) }}" alt="{{$propertyImage['alt_text']}}" style="height: 200px; width: 200px; object-fit: cover;">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Alt Text</th>
                                <td colspan="5" class="text-break">{{$propertyImage['alt_text']}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Created At</th>
                                <td colspan="5" class="text-break">{{$propertyImage['created_at']->format('d M Y')}}</td>
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
