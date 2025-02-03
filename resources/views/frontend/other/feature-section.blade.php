 <section class="feature-section banner-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-1 text-white">
                        <span class="label label-gradient color-6">Our</span>
                        <h2>Featured Property</h2>
                        <hr>
                    </div>
                    <div class="feature-1 arrow-light">
                        <div>
                            <div class="feature-wrapper">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-3">
                                        <div class="feature-left">
                                            <div class="property-details">
                                                <span class="font-roboto">New York</span>
                                                <a href="single-property-8.html">
                                                    <h3 class="d-flex">Merrick in Spring Way <span><span
                                                                class="label label-dark label-pill">Open
                                                                house</span></span></h3>
                                                </a>
                                                <h6  class="color-6">$9554.00*</h6>
                                                <p class="font-roboto">Different types of housing can be use same physical type.connected residences might be owned by a single entity or owned separately with an agreement covering the relationship between units and common areas and concerns.</p>
                                                <ul>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/double-bed.svg" class="img-fluid" alt="">Bed : 5</li>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths : 3</li>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">Sq Ft : 5000</li>
                                                </ul>
                                                <a href="user-favourites.html">
                                                    <span class="round-half color-6">
                                                        <i data-feather="heart"></i>
                                                    </span>
                                                </a>
                                                <div class="property-btn">
                                                    <a href="single-property-8.html" class="btn btn-dashed btn-pill color-6"
                                                        tabindex="0">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-9 order-md">
                                        <div class="feature-image">
                                            <img src="{{ URL::asset('sheltos/assets/images/property/3.jpg') }}" alt="" class="bg-img">
                                            <h4>FAMILY HOME</h4>
                                            <span class="box-color"></span>
                                            <span class="signature">
                                                <img src="{{ URL::asset('sheltos/assets/images/signature/1.png') }}" alt="">
                                            </span>
                                            <span class="label label-white label-lg color-6">Featured</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="feature-wrapper">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-3">
                                        <div class="feature-left ">
                                            <div class="property-details">
                                                <span class="font-roboto">New York</span>
                                                <a href="single-property-8.html">
                                                    <h3 class="d-flex">Allen's Across Way <span><span
                                                                class="label label-dark label-pill">Open
                                                                house</span></span></h3>
                                                </a>
                                                <h6  class="color-6">$6844.00*</h6>
                                                <p class="font-roboto">Connected residences might be owned by a single entity or owned separately with an agreement covering the relationship between units and common areas and concerns. Different types of housing can be use same physical type.</p>
                                                <ul>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/double-bed.svg" class="img-fluid" alt="">Bed : 3</li>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths : 2</li>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">Sq Ft : 1000</li>
                                                </ul>
                                                <a href="user-favourites.html">
                                                    <span class="round-half color-6">
                                                        <i data-feather="heart"></i>
                                                    </span>
                                                </a>
                                                <div class="property-btn">
                                                    <a href="single-property-8.html" class="btn btn-dashed btn-pill color-6"
                                                        tabindex="0">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-9 order-md">
                                        <div class="feature-image">
                                            <img src="{{ URL::asset('sheltos/assets/images/property/2.jpg') }}" alt="" class="bg-img">
                                            <h4>FAMILY HOME</h4>
                                            <span class="box-color"></span>
                                            <span class="signature">
                                                <img src="{{ URL::asset('sheltos/assets/images/signature/1.png') }}" alt="">
                                            </span>
                                            <span class="label label-white label-lg color-6">Featured</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





<section class="feature-section banner-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title-1 text-white">
                    <span class="label label-gradient color-6">Our</span>
                    <h2>Featured Property</h2>
                    <hr>
                </div>
                <div class="feature-1 arrow-light">
                    <div>
                        <div class="feature-wrapper">
                            <div class="row">
                                @foreach ($properties as $property)
                                <div class="col-xl-4 col-lg-3">
                                    <div class="feature-left">
                                        <div class="property-details">
                                            <span class="font-roboto">{{ $property->city }}</span>
                                            <a href="single-property-8.html">
                                                <h3 class="d-flex">{{ $property->address }}
                                                    <span>
                                                        <span class="label label-dark label-pill">{{ $property->property_type }}</span>
                                                    </span>
                                                </h3>
                                            </a>
                                            <h6 class="color-6">${{ number_format($property->price, 2) }}*</h6>
                                            <p class="font-roboto">
                                                {{ $property->description }}
                                            </p>
                                            <ul>
                                                <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/double-bed.svg" class="img-fluid" alt="">Bed : {{ $property->beds }}</li>
                                                <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths : {{ $property->baths }}</li>
                                                <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">Sq Ft : {{ $property->area }}</li>
                                            </ul>
                                            <a href="user-favourites.html">
                                                <span class="round-half color-6">
                                                    <i data-feather="heart"></i>
                                                </span>
                                            </a>
                                            <div class="property-btn">
                                                <a href="single-property-8.html" class="btn btn-dashed btn-pill color-6" tabindex="0">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-xl-8 col-lg-9 order-md">
                                    @php
                                        $firstImage = $property->images->first();
                                    @endphp

                                    @if($firstImage)
                                    <div class="feature-image">
                                        <img src="{{ URL::asset($firstImage->image_url) }}" alt="" class="bg-img">
                                        <h4>FAMILY HOME</h4>
                                        <span class="box-color"></span>
                                        <span class="signature">
                                            <img src="{{ URL::asset('sheltos/assets/images/signature/1.png') }}" alt="">
                                        </span>
                                        <span class="label label-white label-lg color-6">Featured</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="feature-section banner-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title-1 text-white">
                    <span class="label label-gradient color-6">Our</span>
                    <h2>Featured Property</h2>
                    <hr>
                </div>
                <div class="feature-1 arrow-light">
                    <div>
                        <div class="feature-wrapper">
                            @foreach ($properties as $property)
                                @if ($property->property_type == 'family house') <!-- Only show Family Home -->
                                  <!-- Slider Start -->
                                  <div class="slider-for">
                                    <div class="row">
                                            <div class="col-xl-4 col-lg-3">
                                                <div class="feature-left">
                                                    <div class="property-details">
                                                        <span class="font-roboto">{{ $property->city }}</span>
                                                        <a href="single-property-8.html">
                                                            <h3 class="d-flex">{{ $property->address }}
                                                                <span>
                                                                    <span class="label label-dark label-pill">{{ $property->property_type }}</span>
                                                                </span>
                                                            </h3>
                                                        </a>
                                                        <h6 class="color-6">${{ number_format($property->price, 2) }}*</h6>
                                                        <p class="font-roboto">
                                                            {{ $property->description }}
                                                        </p>
                                                        <ul>
                                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/double-bed.svg" class="img-fluid" alt="">Bed : {{ $property->beds }}</li>
                                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths : {{ $property->baths }}</li>
                                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">Sq Ft : {{ $property->area }}</li>
                                                        </ul>
                                                        <a href="user-favourites.html">
                                                            <span class="round-half color-6">
                                                                <i data-feather="heart"></i>
                                                            </span>
                                                        </a>
                                                        <div class="property-btn">
                                                            <a href="single-property-8.html" class="btn btn-dashed btn-pill color-6" tabindex="0">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-8 col-lg-9 order-md">
                                                @php
                                                    $firstImage = $property->images->first();
                                                @endphp

                                                @if($firstImage)
                                                <div class="feature-image">
                                                    <img src="{{ URL::asset($firstImage->image_url) }}" alt="" class="bg-img">
                                                    <h4>FAMILY HOME</h4>
                                                    <span class="box-color"></span>
                                                    <span class="signature">
                                                        <img src="{{ URL::asset('sheltos/assets/images/signature/1.png') }}" alt="">
                                                    </span>
                                                    <span class="label label-white label-lg color-6">Featured</span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Slider End -->
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
