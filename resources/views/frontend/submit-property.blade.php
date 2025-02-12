<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from themes.pixelstrap.com/sheltos/main/submit-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:06 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>House Rental</title>
    <style>
    /* Red background for invalid inputs */
    .is-invalid, .is-invalid:focus {
        background-color: none !important; /* Bootstrap danger background */
        border-color: #dc3545 !important; /* Red border */
    }

    /* Red error messages */
    .parsley-errors-list {
        color: #dc3545;
        font-size: 14px;
        list-style: none;
        padding: 5px 0 0;
        margin: 0;
    }

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
    @include('frontend.layoutcss')
</head>

<body>
@include('frontend.header-orange')

        <!-- breadcrumb start -->
    <section class="breadcrumb-section p-0">
        <img src="{{ asset('sheltos/assets/images/inner-background.jpg') }}" class="bg-img img-fluid" alt="">
        <div class="container">
            <div class="breadcrumb-content">
                <div>
                    <h2>Add property</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add property</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->


    <!-- submit property section start -->
    <section class="property-wizard">
        <div class="container">
            <div class="row wizard-box">
                <div class="col-sm-12">
                    <div class="wizard-step-container row">
                       <div class="col-xxl-3 col-lg-4">
                           <div class="theme-card">
                                <ul class="wizard-steps">
                                    <li class="step-container step-1 active" data-step="1">
                                        <div class="media">
                                            <div class="step-icon">
                                                <i data-feather="chevron-right"></i>
                                                <span>1</span>
                                            </div>
                                            <div class="media-body">
                                                <h5>General</h5>
                                                <h6>Basic Information</h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step-container step-2" data-step="2">
                                        <div class="media">
                                            <div class="step-icon">
                                                <i data-feather="chevron-right"></i>
                                                <span>2</span>
                                            </div>
                                            <div class="media-body">
                                                <h5>Address</h5>
                                                <h6>Add your place</h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step-container step-3" data-step="3">
                                        <div class="media">
                                            <div class="step-icon">
                                                <i data-feather="chevron-right"></i>
                                                <span>3</span>
                                            </div>
                                            <div class="media-body">
                                                <h5>Gallery</h5>
                                                <h6>Add your media</h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step-container step-4" data-step="4">
                                        <div class="media">
                                            <div class="step-icon">
                                                <i data-feather="chevron-right"></i>
                                                <span>4</span>
                                            </div>
                                            <div class="media-body">
                                                <h5>Confirmation</h5>
                                                <h6>Complete details</h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                           </div>
                       </div>
                        <div class="wizard-form-details col-xxl-9 col-lg-8">
                            <div class="theme-card my-3">
                                <div class="wizard-step wizard-step-1 d-block">
                                    <h2>General</h2>
                                    <p class="font-roboto">Basic information about property</p>
                                    <form class="row gx-3" action="" method="POST" id="basicForm" data-parsley-validate>
                                        @csrf
                                        <div class="form-group col-sm-4">
                                            <label>Property Type<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="property_type" placeholder="Villa" required data-parsley-required-message="Property type is required">
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label>Property Status<span class="text-danger">*</span></label>
                                            <select class="form-control" name="status" required data-parsley-required-message="Select a property status">
                                                <option value="">Status</option>
                                                <option value="Sale">For Sale</option>
                                                <option value="Rent">For Rent</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label>Property Price<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="price" placeholder="$2800" required data-parsley-type="number" data-parsley-required-message="Property price is required">
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label>Max Rooms<span class="text-danger">*</span></label>
                                            <select class="form-control" name="max_rooms" required data-parsley-required-message="Select the number of rooms">
                                                <option value="">Max Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label>Beds<span class="text-danger">*</span></label>
                                            <select class="form-control" name="beds" required data-parsley-required-message="Select the number of beds">
                                                <option value="">Beds</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label>Baths<span class="text-danger">*</span></label>
                                            <select class="form-control" name="baths" required data-parsley-required-message="Select the number of baths">
                                                <option value="">Baths</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label>Area (sq ft)<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="area" placeholder="85" required data-parsley-type="number" data-parsley-required-message="Area is required">
                                        </div>

                                        {{-- <div class="form-group col-sm-4">
                                            <label>Price<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="price" placeholder="$3000" required data-parsley-type="number" data-parsley-required-message="Price is required">
                                        </div> --}}


                                        <div class="form-group col-sm-4">
                                            <label for="agent_id">Agent<span class="text-danger">*</span></label>
                                            <select name="agent_id" id="agent_id" class="form-control p-2" required data-parsley-required-message="Please select an agent.">
                                                <option value="" disabled selected>Select Agent</option>
                                                @foreach($agents as $agent)
                                                    <option value="{{ $agent->id }}" {{ old('agent_id') == $agent->id ? 'selected' : '' }}>
                                                        {{ $agent->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group col-sm-12">
                                            <label>Description<span class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="4" name="description" required data-parsley-required-message="Description is required"></textarea>
                                        </div>

                                        <div class="text-end mt-3">
                                            <button type="button" class="btn btn-gradient next1 color-2 btn-pill"  data-next-step="2">Next<i class="fas fa-arrow-right ms-2"></i></button>
                                        </div>

                                    </form>
                                </div>
                                <div class="wizard-step wizard-step-2 d-none">
                                    <h2>Address</h2>
                                    <p class="font-roboto">Add your property Location</p>
                                    <form class="row gx-3" action="" method="POST" id="addressForm" data-parsley-validate>
                                        @csrf

                                        <!-- Address -->
                                        <div class="form-group col-sm-6">
                                            <label>Address<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address" placeholder="Address of your property" required
                                                data-parsley-required-message="Address is required" data-parsley-maxlength="255">
                                        </div>

                                        <!-- Zip Code -->
                                        <div class="form-group col-sm-6">
                                            <label>Zip code<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="zip_code" placeholder="39702" required
                                                data-parsley-type="number" data-parsley-required-message="Zip code is required"
                                                data-parsley-min="1" data-parsley-min-message="Zip code must be valid">
                                        </div>

                                        <!-- City -->

                                        <div class="form-group col-sm-6">
                                            <label>City<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="city" placeholder="City" required
                                                data-parsley-required-message="City is required" data-parsley-maxlength="255">
                                        </div>

                                        <!-- Google Maps iframe -->
                                        <div class="col-sm-12">
                                            <iframe title="realestate location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583091352!2d-74.11976373946229!3d40.69766374859258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1563449626439!5m2!1sen!2sin"
                                                    allowfullscreen></iframe>
                                        </div>

                                        <div class="next-btn d-flex mt-3">
                                            <button type="button" class="btn btn-dashed prev1 color-2 prev-btn btn-pill"  data-prev-step="1"><i class="fas fa-arrow-left me-2"></i> Previous</button>
                                            <button type="button" class="btn btn-gradient next2 color-2 btn-pill"  data-next-step="3">Next<i class="fas fa-arrow-right ms-2"></i></button>
                                        </div>
                                    </form>

                                </div>
                                <div class="wizard-step wizard-step-3 d-none">
                                    <h2>Gallery</h2>
                                    <p class="font-roboto">Add your property Media</p>
                                    {{-- <label>Media<span class="text-danger">*</span></label> --}}
                                    {{-- <form class="dropzone" action="" method="POST" id="multiFileUpload" data-parsley-validate>
                                        <div class="dz-message needsclick">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <h6>Drop files here or click to upload.</h6>
                                            <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                        </div>
                                    </form> --}}

                                    <form id="galleryForm" class="row gx-3" enctype="multipart/form-data" data-parsley-validate>
                                        {{-- <input type="hidden" name="property_id" id="property_id" > --}}
                                        <div class="form-group upload-btn-box mb-0">
                                            <label>Media<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" name="image_url" multiple id="image_url"
                                                   accept="image/*"
                                                   data-parsley-required="true"
                                                   required
                                                   data-parsley-required-message="Please upload at least one image."
                                                   data-parsley-file-type-message="Only image files are allowed."
                                                   data-parsley-errors-container="#images-error"
                                                   data-parsley-filemimetypes="image/jpeg, image/png, image/jpg, image/heic, image/heif, image/webp">
                                            <div id="images-error"></div>
                                            <div id="image-previews" class="d-flex flex-wrap gap-3"></div>
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label>Additional features</label>
                                            <div class="feature-checkbox" >
                                                <label for="chk-ani">
                                                    <input class="checkbox_animated color-2" id="chk-ani" type="checkbox" name="additional_features[]" value="Emergency Exit" required data-parsley-required-message="Select at least one feature"> Emergency Exit
                                                </label>
                                                <label for="chk-ani1">
                                                    <input class="checkbox_animated color-2" id="chk-ani1" type="checkbox" name="additional_features[]" value="CCTV" required data-parsley-required-message="Select at least one feature"> CCTV
                                                </label>
                                                <label for="chk-ani2">
                                                    <input class="checkbox_animated color-2" id="chk-ani2" type="checkbox" name="additional_features[]" value="Free Wi-Fi" required data-parsley-required-message="Select at least one feature"> Free Wi-Fi
                                                </label>
                                                <label for="chk-ani3">
                                                    <input class="checkbox_animated color-2" id="chk-ani3" type="checkbox" name="additional_features[]" value="Free Parking In The Area" required data-parsley-required-message="Select at least one feature"> Free Parking In The Area
                                                </label>
                                                <label for="chk-ani4">
                                                    <input class="checkbox_animated color-2" id="chk-ani4" type="checkbox" name="additional_features[]" value="Air Conditioning" required data-parsley-required-message="Select at least one feature"> Air Conditioning
                                                </label>
                                            </div>
                                        </div>

                                        <div class="next-btn d-flex mt-3">
                                            <button type="button" class="btn prev2 btn-dashed color-2 prev-btn btn-pill" data-prev-step="2"><i class="fas fa-arrow-left me-2"></i> Previous</button>
                                            <button type="button" class="btn next3 btn-gradient color-2 btn-pill"  data-next-step="4">Next<i class="fas fa-arrow-right ms-2"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <!-- Step 4: Confirmation -->
                                <div class="wizard-step wizard-step-4 d-none">
                                    <form id="submitForm" action="" method="POST">
                                        @csrf
                                        <div class="complete-details">
                                            <div>
                                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/inner-pages/4.svg" class="img-fluid" alt="">
                                                <h3>Thank you !!</h3>
                                                <h6>Congratulations, your property has been submitted</h6>
                                                <p class="font-roboto">
                                                    Residences can be classified by and how they are connected to neighbouring residences and land.
                                                    Different types of housing tenure can be used for the same physical type.
                                                </p>
                                                <button type="button" class="btn btn-gradient color-2 step-again btn-pill">Add new property</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- submit property section end -->

@include('frontend.footer-orange')

    @yield('script')
    @include('frontend.footer-script')
    <script>
        var submitPropertyeUrl = "{{ route('submit-property.store') }}";
            // Apply validation styling on each form during step transitions

        // Preview image before upload
        $('#image_url').on('change', function (e) {
            const files = e.target.files;
            const previewContainer = $('#image-previews');
            previewContainer.empty(); // Clear previous previews

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function (event) {
                    const image = $('<img>', {
                        src: event.target.result,
                        class: 'img-thumbnail',
                        style: 'width: 100px; height: 100px; object-fit: cover;',
                    });
                    previewContainer.append(image);
                };

                reader.readAsDataURL(file);
            }
        });


    </script>


</body>

<!-- Mirrored from themes.pixelstrap.com/sheltos/main/submit-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:06 GMT -->
</html>
