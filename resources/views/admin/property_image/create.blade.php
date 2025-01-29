@extends('layout.partials.master')
<style>

.upload-img-box {
    max-width: 95px;
    height: 105px;
    border-radius: 18px;
    width: 100%;
}
.upload-box .img-bg {
    background-repeat: no-repeat;
    background-position: center;
    background-size: 100%;
    background-color: #f7f2e9;
}
.upload-img-box .delete-image-btn {
    top: 1px;
    right: 0px;
    padding: 2px 5px;
    font-size: 12px;
    width: 30px;
    height: 30px;
    background-color: transparent;
    border: none;
}

</style>
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
                    <form action="{{ route('admin.property_image.store') }}" id="imgForm" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        @csrf  <!-- CSRF protection -->

                        <div class="form-group">
                            <label for="property_id">Property<span class="text-danger">*</span></label>
                            <select name="property_id" id="property_id" class="form-control" required data-parsley-required-message="Please select a property.">
                                <option value="" disabled selected>Select Property</option>
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}" {{ old('property_id') == $property->id ? 'selected' : '' }}>
                                        {{ $property->property_type }} <!-- Or use any other attribute like property_type -->
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{--
                        <div class="form-group">
                            <label for="image_url">Image</label>
                            <input type="file" class="form-control" id="image_url" name="image_url"  required>
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        <div class="form-group upload-btn-box mb-0">
                            {{-- <input type="hidden" name="booking_id" id="booking_id" value="{{ $property->id }}"> --}}
                            <label for="image_url">Image<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="image_url" multiple id="image_url"
                                   accept="image/*"
                                   data-parsley-required="true"
                                   required
                                   data-parsley-required-message="Please upload at least one image."
                                   data-parsley-file-type-message="Only image files are allowed."
                                   data-parsley-errors-container="#images-error"
                                   data-parsley-filemimetypes="image/jpeg, image/png, image/jpg, image/heic, image/heif, image/webp">
                            <div id="images-error"></div>
                        </div>

                        <div id="image-previews" class="d-flex flex-wrap gap-3"></div>

                        <div class="form-group">
                            <label for="alt_text">Alt Text</label>
                            <input type="text" class="form-control" id="alt_text" name="alt_text" value="{{ old('alt_text') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Save Image</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{asset('assets/js/pages/admin/property/property_image/index.js')}}"></script>

@endsection
