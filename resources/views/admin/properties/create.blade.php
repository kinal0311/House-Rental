@extends('layout.partials.dashboard')

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
                    <form action="{{ route('admin.properties.store')}}" id="propertyForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <!-- Property Type -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="property_type">Property Type<span class="text-danger">*</span></label>
                                    <select name="property_type" id="property_type" class="form-control" required>
                                        <option value="" disabled selected>Select Property Type</option>
                                        <option value="residential">Residential</option>
                                        <option value="commercial">Commercial</option>
                                        <option value="land">Land</option>
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
                                    <input type="number" name="max_rooms" id="max_rooms" class="form-control" placeholder="Enter Max Rooms">
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
                                    <input type="number" name="beds" id="beds" class="form-control" placeholder="Enter Number of Beds">
                                    @error('beds')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Baths -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="baths">Baths</label>
                                    <input type="number" name="baths" id="baths" class="form-control" placeholder="Enter Number of Baths">
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
                                    <input type="number" name="price" id="price" class="form-control" placeholder="Enter Price" required>
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_sale" value="sale"
                                                {{ old('status') == 'sale' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="status_sale">Sale</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_sold" value="sold"
                                                {{ old('status') == 'sold' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_sold">Sold</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_rent" value="rent"
                                                {{ old('status') == 'rent' ? 'checked' : '' }}>
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
                                    <input type="number" name="area" id="area" class="form-control" placeholder="Enter Area">
                                    @error('area')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- ZIP Code -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zip_code">ZIP Code</label>
                                    <input type="text" name="zip_code" id="zip_code" class="form-control" placeholder="Enter ZIP Code">
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
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="Enter City">
                                    @error('city')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="agent_id">Agent<span class="text-danger">*</span></label>
                                    <select name="agent_id" id="agent_id" class="form-control" required>
                                        <option value="" disabled selected>Select Agent</option>
                                        @foreach($agents as $agent)
                                            <option value="{{ $agent->id }}" {{ old('agent_id') == $agent->id ? 'selected' : '' }}>
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
                                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter Description"></textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Media -->
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="media">Media</label>
                                    <input type="file" name="media" id="media" class="form-control" multiple>
                                    @error('media')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}

                            <!-- Additional Features -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="additional_features">Additional Features</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Swimming Pool" id="swimming_pool" class="form-check-input">
                                        <label for="swimming_pool" class="form-check-label">Swimming Pool</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Gym" id="gym" class="form-check-input">
                                        <label for="gym" class="form-check-label">Gym</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Garage" id="garage" class="form-check-input">
                                        <label for="garage" class="form-check-label">Garage</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Garden" id="garden" class="form-check-input">
                                        <label for="garden" class="form-check-label">Garden</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Fireplace" id="fireplace" class="form-check-input">
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="" class="btn btn-secondary">Cancel</a>
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
