@extends('layout.partials.dashboard')

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
                    <form action="{{ route('admin.properties.update', $property->id) }}" id="propertyForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') <!-- To indicate this is an update operation --> --}}
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
                                    </select>
                                    @error('property_type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Max Rooms -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="max_rooms">Max Rooms</label>
                                    <input type="number" name="max_rooms" id="max_rooms" class="form-control" placeholder="Enter Max Rooms" value="{{ $property->max_rooms }}">
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
                                    <label for="beds">Beds</label>
                                    <input type="number" name="beds" id="beds" class="form-control" placeholder="Enter Number of Beds" value="{{ $property->beds }}">
                                    @error('beds')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Baths -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="baths">Baths</label>
                                    <input type="number" name="baths" id="baths" class="form-control" placeholder="Enter Number of Baths" value="{{ $property->baths }}">
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
                                                   value="sale"
                                                   {{ (old('status') ?? $property->status) === 'sale' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_sale">Sale</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   name="status"
                                                   id="status_sold"
                                                   value="sold"
                                                   {{ (old('status') ?? $property->status) === 'sold' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_sold">Sold</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   name="status"
                                                   id="status_rent"
                                                   value="rent"
                                                   {{ (old('status') ?? $property->status) === 'rent' ? 'checked' : '' }}>
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
                                    <label for="area">Area (sqft)</label>
                                    <input type="number" name="area" id="area" class="form-control" placeholder="Enter Area" value="{{ $property->area }}">
                                    @error('area')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- ZIP Code -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zip_code">ZIP Code</label>
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
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" value="{{ $property->address }}">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City</label>
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
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter Description">{{  $property->description }}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Additional Features -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="additional_features">Additional Features</label>
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#propertyForm').parsley();
        });
    </script>
@endsection
