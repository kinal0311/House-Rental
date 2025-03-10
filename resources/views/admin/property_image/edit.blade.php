@extends('layout.partials.master')

@section('content')
<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-lg-6 col-md-8 col-sm-8 my-2">
            <div class="page-title-box">
                <h4 class="text-uppercase mb-0">Add Property</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Form to create Property Image -->
                    <form action="{{ route('admin.property_image.update', $propertyImage->id) }}" id="imgForm" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        @csrf  <!-- CSRF protection -->

                        <div class="form-group">
                            <label for="property_id">Property<span class="text-danger">*</span></label>
                            <select name="property_id" id="property_id" class="form-control" required data-parsley-required-message="Please select a property.">
                                <option value="" disabled>Select Property</option>
                                @foreach($property as $properties)
                                    <option value="{{ $properties->id }}" {{ $propertyImage->property_id == $properties->id ? 'selected' : '' }}>
                                        {{ $properties->property_type }}
                                    </option>
                                @endforeach
                            </select>
                            @error('property_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="image">Image_url<span class="text-danger">*</span></label>
                            <input type="file" name="image_url" id="image_url" class="form-control mb-3 w-50">

                            <!-- Existing image preview if there is an existing image -->
                            @if($propertyImage->image_url != '')
                            <img class="border rounded p-0 pic_preview" src="{{URL::asset($propertyImage->image_url)}}" alt="your image" style="height: 200px;width: 200px; object-fit: cover;" id="existing-img"/>
                            @endif

                            <!-- New image preview (hidden initially) -->
                            <img class="border rounded p-0 pic_preview" id="new-img" style="height: 200px; width: 200px; object-fit: cover; display: none;" src="" alt="new image" />

                            @error('image_url')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alt_text">Alt Text</label>
                            <input type="text" class="form-control" id="alt_text" name="alt_text" value="{{ $propertyImage->alt_text }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#imgForm').parsley();
    });
</script>
@endsection
