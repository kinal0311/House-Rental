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
                <h4 class="text-uppercase mb-0">Edit Property</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.properties.update', $property->id) }}" id="editPropertyForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') <!-- To indicate this is an update operation --> --}}


                            {{-- <div class="form-group">
                                <label for="alt_text">Alt Text</label>
                                <input type="text" class="form-control" id="alt_text" name="alt_text" value="{{ $property->alt_text }}">
                            </div> --}}

                            <div class="row">
                            <!-- Property Type -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="property_type">Property Type<span class="text-danger">*</span></label>
                                    <select name="property_type" id="property_type" class="form-control" required>
                                        <option value="" disabled>Select Property Type</option>
                                        <option value="residential" {{ $property->property_type == 'residential' ? 'selected' : '' }}>Residential</option>
                                        <option value="commercial" {{ $property->property_type == 'commercial' ? 'selected' : '' }}>Commercial</option>
                                        <option value="land" {{ $property->property_type == 'land' ? 'selected' : '' }}>Land</option>
                                        <option value="apartment" {{ $property->property_type == 'apartment' ? 'selected' : '' }}>Apartment</option>
                                        <option value="family house" {{ $property->property_type == 'family house' ? 'selected' : '' }}>Family House</option>
                                        <option value="villa" {{ $property->property_type == 'villa' ? 'selected' : '' }}>Villa</option>
                                        <option value="town house" {{ $property->property_type == 'town house' ? 'selected' : '' }}>Town House</option>
                                        <option value="office" {{ $property->property_type == 'office' ? 'selected' : '' }}>Office</option>
                                        <option value="duplex" {{ $property->property_type == 'duplex' ? 'selected' : '' }}>Duplex</option>
                                    </select>
                                    @error('property_type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Max Rooms -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="max_rooms">Max Rooms<span class="text-danger">*</span></label>
                                    <select class="form-control" name="max_rooms"  id="max_rooms" required placeholder="Enter Max Rooms" data-parsley-type="number" data-parsley-type-message="Please enter a valid number.">
                                        <option value="1" {{ $property->max_rooms == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $property->max_rooms == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $property->max_rooms == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $property->max_rooms == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5"{{ $property->max_rooms == '5' ? 'selected' : '' }}>5</option>
                                        <option value="6"{{ $property->max_rooms == '6' ? 'selected' : '' }}>6</option>
                                    </select>
                                    @error('max_rooms')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Beds -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="beds">Beds<span class="text-danger">*</span></label>
                                    <select class="form-control" name="beds"  id="beds" required placeholder="Enter Number of Beds" data-parsley-type="number" data-parsley-type-message="Please enter a valid number.">
                                        <option value="1" {{ $property->beds == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $property->beds == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $property->beds == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $property->beds == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ $property->beds == '5' ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ $property->beds == '6' ? 'selected' : '' }}>6</option>
                                    </select>
                                    @error('beds')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Baths -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="baths">Baths<span class="text-danger">*</span></label>
                                    <select class="form-control" name="baths"  id="baths"  required placeholder="Enter Number of Baths" data-parsley-type="number" data-parsley-type-message="Please enter a valid number.">
                                        <option value="1" {{ $property->baths == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $property->baths == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $property->baths == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $property->baths == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ $property->baths == '5' ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ $property->baths == '6' ? 'selected' : '' }}>6</option>
                                    </select>
                                    @error('baths')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Price -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price<span class="text-danger">*</span></label>
                                    <input type="number" name="price" id="price" class="form-control" placeholder="Enter Price" value="{{ $property->price }}" required>
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- <pre>{{ print_r($property, true) }}</pre> --}}
                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   name="status"
                                                   id="status_sale"
                                                   value="Sale"
                                                   {{ (old('status') ?? $property->status) === 'Sale' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_sale">Sale</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   name="status"
                                                   id="status_sold"
                                                   value="Sold"
                                                   {{ (old('status') ?? $property->status) === 'Sold' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_sold">Sold</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   name="status"
                                                   id="status_rent"
                                                   value="Rent"
                                                   {{ (old('status') ?? $property->status) === 'Rent' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_rent">Rent</label>
                                        </div>
                                    </div>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <!-- Area -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="area">Area (sqft)<span class="text-danger">*</span></label>
                                    <input type="number" name="area" id="area" class="form-control" placeholder="Enter Area" value="{{ $property->area }}">
                                    @error('area')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- ZIP Code -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zip_code">ZIP Code<span class="text-danger">*</span></label>
                                    <input type="text" name="zip_code" id="zip_code" class="form-control" placeholder="Enter ZIP Code" value="{{ $property->zip_code }}">
                                    @error('zip_code')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Address -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address<span class="text-danger">*</span></label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" value="{{ $property->address }}">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City<span class="text-danger">*</span></label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="Enter City" value="{{ $property->city }}">
                                    @error('city')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Agent -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="agent_id">Agent<span class="text-danger">*</span></label>
                                    <select name="agent_id" id="agent_id" class="form-control" required>
                                        <option value="" disabled>Select Agent</option>
                                        @foreach($agents as $agent)
                                            <option value="{{ $agent->id }}" {{ $property->agent_id == $agent->id ? 'selected' : '' }}>
                                                {{ $agent->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('agent_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Description -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter Description">{{  $property->description }}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Additional Features -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="additional_features">Additional Features<span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Swimming Pool" id="swimming_pool" class="form-check-input" {{ in_array('Swimming Pool', $property->additional_features) ? 'checked' : '' }}>
                                        <label for="swimming_pool" class="form-check-label">Swimming Pool</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Gym" id="gym" class="form-check-input" {{ in_array('Gym', $property->additional_features) ? 'checked' : '' }}>
                                        <label for="gym" class="form-check-label">Gym</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Garage" id="garage" class="form-check-input" {{ in_array('Garage', $property->additional_features) ? 'checked' : '' }}>
                                        <label for="garage" class="form-check-label">Garage</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Garden" id="garden" class="form-check-input" {{ in_array('Garden', $property->additional_features) ? 'checked' : '' }}>
                                        <label for="garden" class="form-check-label">Garden</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Fireplace" id="fireplace" class="form-check-input" {{ in_array('Fireplace', $property->additional_features) ? 'checked' : '' }}>
                                        <label for="fireplace" class="form-check-label">Fireplace</label>
                                    </div>
                                    @error('additional_features')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image_url">Image_url<span class="text-danger">*</span></label>
                                    <!-- Allow multiple images -->
                                    <input type="file" name="image_url[]" id="image_url" class="form-control mb-3" multiple accept="image/*">

                                    <!-- Existing image previews (if there are any) -->

                                    <div id="image-previews" class="d-flex flex-wrap">
                                        @foreach ($property->images as $image)
                                            <div class="col-md-3 mb-3">
                                                <img src="{{ asset($image->image_url) }}" alt="{{ $image->alt_text }}" class="img-fluid h-75 w-75">
                                            </div>
                                        @endforeach
                                    </div>
                                    @if($property->images->isEmpty())
                                        <p>No images available</p>
                                    @endif

                                    @error('image_url')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                        <!-- Submit Button -->
                        <div class="form-group text-right">
                            <button type="submit" id="updateProperty" class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="{{asset('assets/js/pages/admin/property/property_image/index.js')}}"></script>

@section('script')
    <script>
        $(document).ready(function() {
            $('#editPropertyForm').parsley();
        });
    </script>

@endsection
