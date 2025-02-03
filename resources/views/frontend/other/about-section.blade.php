<div class="container">
    <div class="row">
        <div class="col">
            <div class="title-1 color-6">
                <span class="label label-gradient color-6">Agent</span>
                <h2>Meet our Agent</h2>
                <hr>
            </div>
            <div class="about-1 about-wrap arrow-white color-6">
                <div>
                    <div class="about-content row">
                        <div class="col-xl-6">
                            <div class="about-image">
                                <img src="{{ URL::asset('sheltos/assets/images/about/1.jpg') }}" class="img-fluid" alt="">
                                <div class="about-overlay"></div>
                                <div class="overlay-content">
                                    <ul>
                                        <li><a href="https://accounts.google.com/"><img
                                                    src="{{ URL::asset('sheltos/assets/images/about/icon-1.png') }}" alt=""></a>
                                        </li>
                                        <li><a href="https://twitter.com/"><img
                                                    src="{{ URL::asset('sheltos/assets/images/about/icon-2.png') }}" alt=""></a>
                                        </li>
                                        <li><a href="https://www.facebook.com/"><img
                                                    src="{{ URL::asset('sheltos/assets/images/about/icon-3.png') }}" alt=""></a>
                                        </li>
                                    </ul>
                                    <span>Connect</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="our-details">
                                <a href="agent-profile.html"><h6 class="d-flex">Ty R. Leeva <span class="label-heart color-6 ms-2"><i
                                            data-feather="heart"></i></span></h6></a>
                                <h3>Communicating with..</h3>
                                <span class="font-roboto"><i data-feather="mail" class="me-1"></i>Leeva@inspirythemes.com</span>
                                <p class="font-roboto">A real estate agent or broker is a person who represents sellers or buyers advised to consult a licensed.</p>
                                <a href="agent-profile.html" class="btn btn-gradient btn-pill color-6 mt-2"><i data-feather="eye"></i>View Portfolio</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="about-content row">
                        <div class="col-xl-6">
                            <div class="about-image">
                                <img src="{{ URL::asset('sheltos/assets/images/about/2.jpg') }}" class="img-fluid" alt="">
                                <div class="about-overlay"></div>
                                <div class="overlay-content">
                                    <ul>
                                        <li><a href="https://accounts.google.com/"><img
                                                    src="{{ URL::asset('sheltos/assets/images/about/icon-1.png') }}" alt=""></a>
                                        </li>
                                        <li><a href="https://twitter.com/"><img
                                                    src="{{ URL::asset('sheltos/assets/images/about/icon-2.png') }}" alt=""></a>
                                        </li>
                                        <li><a href="https://www.facebook.com/"><img
                                                    src="{{ URL::asset('sheltos/assets/images/about/icon-3.png') }}" alt=""></a>
                                        </li>
                                    </ul>
                                    <span>Connect</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="our-details">
                                <a href="agent-profile.html"><h6 class="d-flex">Mark Andry <span class="label-heart color-6 ms-2"><i
                                    data-feather="heart"></i></span></h6></a>
                                <h3>Sellers of property.</h3>
                                <span class="font-roboto"><i data-feather="mail" class="me-1"></i>John@inspirythemes.com</span>
                                <p class="font-roboto">They are responsible for managing employees and overseeing daily productivity.</p>
                                <a href="agent-profile.html" class="btn btn-gradient btn-pill color-6 mt-2"><i data-feather="eye"></i>View Portfolio</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="about-content row">
                        <div class="col-xl-6">
                            <div class="about-image">
                                <img src="../assets2/images/about/1.jpg" class="img-fluid" alt="">
                                <div class="about-overlay"></div>
                                <div class="overlay-content">
                                    <ul>
                                        <li><a href="https://accounts.google.com/"><img
                                                    src="{{ URL::asset('sheltos/assets/images/about/icon-1.png') }}" alt=""></a>
                                        </li>
                                        <li><a href="https://twitter.com/"><img
                                                    src="{{ URL::asset('sheltos/assets/images/about/icon-2.png') }}" alt=""></a>
                                        </li>
                                        <li><a href="https://www.facebook.com/"><img
                                                    src="{{ URL::asset('sheltos/assets/images/about/icon-3.png') }}" alt=""></a>
                                        </li>
                                    </ul>
                                    <span>Connect</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="our-details">
                                <a href="agent-profile.html"><h6 class="d-flex">John David <span class="label-heart color-6 ms-2"><i
                                    data-feather="heart"></i></span></h6></a>
                                <h3>Advised to consult </h3>
                                <span class="font-roboto"><i data-feather="mail" class="me-1"></i>John@inspirythemes.com</span>
                                <p class="font-roboto">Buyer's agents are brokers or salespersons who assist buyers by helping them.</p>
                                <a href="agent-profile.html" class="btn btn-gradient btn-pill color-6 mt-2"><i data-feather="eye"></i>View Portfolio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row">
        <div class="col">
            <div class="title-1 color-6">
                <span class="label label-gradient color-6">Agent</span>
                <h2>Meet our Agent</h2>
                <hr>
            </div>
            <div class="about-1 about-wrap arrow-white color-6">
                <div>
                    <div class="about-content row">
                        @foreach ($agents as $agent)
                        <div class="col-xl-6">
                            <div class="about-image">
                                <img src="{{ URL::asset($agent->img ?: 'path/to/default/image.jpg') }}" class="img-fluid" alt="">
                                {{-- @dd($agent->profile_image) --}}
                                <div class="about-overlay"></div>
                                <div class="overlay-content">
                                    <ul>
                                        <li><a href="https://accounts.google.com/"><img
                                                    src="{{ URL::asset('sheltos/assets/images/about/icon-1.png') }}" alt=""></a>
                                        </li>
                                        <li><a href="https://twitter.com/"><img
                                                    src="{{ URL::asset('sheltos/assets/images/about/icon-2.png') }}" alt=""></a>
                                        </li>
                                        <li><a href="https://www.facebook.com/"><img
                                                    src="{{ URL::asset('sheltos/assets/images/about/icon-3.png') }}" alt=""></a>
                                        </li>
                                    </ul>
                                    <span>Connect</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="our-details">
                                <a href="agent-profile.html"><h6 class="d-flex">{{ $agent->name }}  <span class="label-heart color-6 ms-2"><i
                                            data-feather="heart"></i></span></h6></a>
                                <h3>Communicating with..</h3>
                                <span class="font-roboto"><i data-feather="mail" class="me-1"></i>Leeva@inspirythemes.com</span>
                                <p class="font-roboto">{{ $agent->description }} </p>
                                <a href="agent-profile.html" class="btn btn-gradient btn-pill color-6 mt-2"><i data-feather="eye"></i>View Portfolio</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
