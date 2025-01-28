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
                    <form action="{{ route('admin.property_image.store') }}" id="imgForm" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        @csrf  <!-- CSRF protection -->

                        <div class="form-group">
                            <label for="property_id">Property</label>
                            <select name="property_id" id="property_id" class="form-control" required data-parsley-required-message="Please select a property.">
                                <option value="" disabled selected>Select Property</option>
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}" {{ old('property_id') == $property->id ? 'selected' : '' }}>
                                        {{ $property->property_type }} <!-- Or use any other attribute like property_type -->
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image_url">Image</label>
                            <input type="file" class="form-control" id="image_url" name="image_url"  required>
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

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

@section('scripts')
<script>
    $(document).ready(function () {
        $('#imgForm').parsley();
    });
</script>
@endsection
