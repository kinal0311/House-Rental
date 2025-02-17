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
<div class="container-fluid mb-5">
    <div class="row mt-2">
        <div class="col-lg-6 col-md-8 col-sm-8 my-2 ">
            <div class="page-title-box">
                <h4 class="text-uppercase mb-0">Add Property</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.properties.store')}}" id="propertyForm" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        @csrf


                        <div class="row">
                            <!-- Property Type -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="property_type">Property Type<span class="text-danger">*</span></label>
                                    <select name="property_type" id="property_type" class="form-control" required data-parsley-required-message="Please select a property type.">
                                        <option value="" disabled selected>Select Property Type</option>
                                        <option value="residential">Residential</option>
                                        <option value="commercial">Commercial</option>
                                        <option value="land">Land</option>
                                        <option value="apartment">Apartment</option>
                                        <option value="family house">Family House</option>
                                        <option value="villa">Villa</option>
                                        <option value="town house">Town House</option>
                                        <option value="office">Office</option>
                                        <option value="duplex">Duplex</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Max Rooms -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="max_rooms">Max Rooms<span class="text-danger">*</span></label>
                                    <select class="form-control" name="max_rooms"  id="max_rooms" required placeholder="Enter Max Rooms" data-parsley-type="number" data-parsley-type-message="Please enter a valid number.">
                                        <option value="">Max Rooms</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <!-- Beds -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="beds">Beds<span class="text-danger">*</span></label>
                                    <select class="form-control" name="beds"  id="beds" required placeholder="Enter Number of Beds" data-parsley-type="number" data-parsley-type-message="Please enter a valid number.">
                                        <option value="">Beds</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Baths -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="baths">Baths<span class="text-danger">*</span></label>
                                    <select class="form-control" name="baths"  id="baths"  required placeholder="Enter Number of Baths" data-parsley-type="number" data-parsley-type-message="Please enter a valid number.">
                                        <option value="">Baths</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Price -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price<span class="text-danger">*</span></label>
                                    <input type="number" name="price" id="price" class="form-control" required placeholder="Enter Price" required data-parsley-required-message="Please enter the price." data-parsley-min="1" data-parsley-min-message="The price must be at least 1.">
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status<span class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_sale" value="Sale" required data-parsley-errors-container="#statusError" data-parsley-required-message="Please select a status.">
                                            <label class="form-check-label" for="status_sale">Sale</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_sold" value="Sold">
                                            <label class="form-check-label" for="status_sold">Sold</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_rent" value="Rent">
                                            <label class="form-check-label" for="status_rent">Rent</label>
                                        </div>
                                    </div>
                                    <div id="statusError" class="text-danger"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Area -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="area">Area (sqft)<span class="text-danger">*</span></label>
                                    <input type="number" name="area" id="area" class="form-control" required placeholder="Enter Area" data-parsley-type="number" data-parsley-type-message="Please enter a valid area size.">
                                </div>
                            </div>

                            <!-- ZIP Code -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zip_code">ZIP Code<span class="text-danger">*</span></label>
                                    <input type="text" name="zip_code" id="zip_code" class="form-control" required placeholder="Enter ZIP Code" data-parsley-pattern="^\d{5}$" data-parsley-pattern-message="Please enter a valid ZIP Code.">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Address -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address<span class="text-danger">*</span></label>
                                    <input type="text" name="address" id="address" class="form-control" required placeholder="Enter Address">
                                </div>
                            </div>

                            <!-- City -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City<span class="text-danger">*</span></label>
                                    <input type="text" name="city" id="city" class="form-control" required placeholder="Enter City">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Agent -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="agent_id">Agent<span class="text-danger">*</span></label>
                                    <select name="agent_id" id="agent_id" class="form-control" required data-parsley-required-message="Please select an agent.">
                                        <option value="" disabled selected>Select Agent</option>
                                        @foreach($agents as $agent)
                                            <option value="{{ $agent->id }}" {{ old('agent_id') == $agent->id ? 'selected' : '' }}>
                                                {{ $agent->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Payment Type (Radio Buttons) -->
                            <div class="col-md-6" id="payment_type_section">
                                <div class="form-group">
                                    <label>Payment Type<span class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="payment_type" id="payment_type_full" value="1" required>
                                            <label class="form-check-label" for="payment_type_full">Full Payment</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="payment_type" id="payment_type_token" value="2">
                                            <label class="form-check-label" for="payment_type_token">Token Amount</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Property Status (Radio Buttons) -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Property Status<span class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="property_status" id="property_status_active" value="1" required>
                                            <label class="form-check-label" for="property_status_active">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="property_status" id="property_status_inactive" value="0">
                                            <label class="form-check-label" for="property_status_inactive">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <!-- Token Amount (Input) -->
                            <div class="col-md-6" id="token_amount_box" style="display: none;">
                                <div class="form-group">
                                    <label for="token_amount">Token Amount</label>
                                    <input type="number" name="token_amount" id="token_amount" class="form-control" placeholder="Enter Token Amount" min="0" step="any" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <!-- Description -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control" rows="4" required placeholder="Enter Description"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="additional_features">Additional Features<span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Swimming Pool" id="swimming_pool" class="form-check-input" >
                                        <label for="swimming_pool" class="form-check-label">Swimming Pool</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Gym" id="gym" class="form-check-input">
                                        <label for="gym" class="form-check-label">Gym</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Garage" id="garage" class="form-check-input" >
                                        <label for="garage" class="form-check-label">Garage</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Garden" id="garden" class="form-check-input" >
                                        <label for="garden" class="form-check-label">Garden</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="additional_features[]" value="Fireplace" id="fireplace" class="form-check-input" >
                                        <label for="fireplace" class="form-check-label">Fireplace</label>
                                    </div>
                                    @error('additional_features')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group upload-btn-box mb-0">
                                    {{-- <input type="hidden" name="booking_id" id="booking_id" value="{{ $property->id }}"> --}}
                                    <label for="image_url">Image<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="image_url[]" multiple id="image_url"
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
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alt_text">Alt Text</label>
                                    <input type="text" class="form-control" id="alt_text" name="alt_text" value="{{ old('alt_text') }}">
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

@section('script')
<script src="{{asset('assets/js/pages/admin/property/property_image/index.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#propertyForm').parsley();
    });
    // Handle the changes based on the selected Status
document.querySelectorAll('input[name="status"]').forEach((elem) => {
    elem.addEventListener("change", function () {
        var status = document.querySelector('input[name="status"]:checked').value;
        var fullPaymentRadio = document.getElementById("payment_type_full");
        var tokenPaymentRadio = document.getElementById("payment_type_token");
        var paymentTypeSection = document.getElementById("payment_type_section");
        var tokenAmountBox = document.getElementById("token_amount_box");

        // Handle Rent status: Full Payment must be selected, disable Token Amount option
        if (status === "Rent") {
            fullPaymentRadio.disabled = false;
            tokenPaymentRadio.disabled = true;
            if (!fullPaymentRadio.checked) {
                fullPaymentRadio.checked = true;  // Automatically select Full Payment
            }
            paymentTypeSection.style.display = "block";  // Show Payment Type Section
            tokenAmountBox.style.display = "none";  // Hide Token Amount field when Rent is selected
        }
        // Handle Sold status: Hide Payment Type Section
        else if (status === "Sold") {
            paymentTypeSection.style.display = "none";  // Hide Payment Type Section
            tokenAmountBox.style.display = "none";  // Hide Token Amount field if displayed
        }
        // Handle Sale status: Enable both options, show Token Amount field if selected
        else if (status === "Sale") {
            tokenPaymentRadio.disabled = false;
            paymentTypeSection.style.display = "block";  // Show Payment Type Section
            if (tokenPaymentRadio.checked) {
                tokenAmountBox.style.display = "block";  // Show Token Amount field if Token Payment is selected
            } else {
                tokenAmountBox.style.display = "none";  // Hide Token Amount field if Full Payment is selected
            }
        }
    });
});

// Handle the changes based on the selected Payment Type
document.querySelectorAll('input[name="payment_type"]').forEach((elem) => {
    elem.addEventListener("change", function () {
        var paymentType = document.querySelector('input[name="payment_type"]:checked').value;
        var tokenAmountBox = document.getElementById("token_amount_box");

        // Show or hide the Token Amount field based on the Payment Type selection
        if (paymentType === "2") {  // Token Amount selected
            tokenAmountBox.style.display = "block";
        } else {  // Full Payment selected
            tokenAmountBox.style.display = "none";
        }
    });
});

// Handle calculation of Token Amount (10% of Total Price)
document.getElementById("price").addEventListener("input", function () {
    var Price = parseFloat(this.value);
    var tokenAmountField = document.getElementById("token_amount");

    if (!isNaN(Price) && Price > 0) {
        var tokenAmount = Price * 0.10;  // 10% of Total Price
        tokenAmountField.value = tokenAmount.toFixed(2);  // Set the token amount to 10% of the total price
    } else {
        tokenAmountField.value = "";  // Clear Token Amount if Total Price is invalid
    }
});

</script>
@endsection
