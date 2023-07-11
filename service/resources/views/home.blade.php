<?php $active = Request::segment(2); ?>


@include('inc.html')

<head>
    <title>{!! $meta->meta_title !!}</title>
    <meta name="keywords" content="{!! $meta->meta_keywords !!}">
    <meta name="description" content="{!! $meta->meta_description !!}">
    <style>
        .shorttext {
            transition: all .5s;
            font-size: 14px;
            margin: 0;
            color: #333;
            display: -webkit-box;
            overflow: hidden !important;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            height: 95px !important
        }

        .shorttext p {
            overflow: hidden !important
        }

        .quicki {
            position: relative !important;
            right: -5px !important
        }

        /*.TestSec .item{padding-bottom:30px;transition:all .5s}
.TestSec .active .item{transform:scale(1.2);opacity:1}*/
        .TestSec .active {
            z-index: 2
        }

        .TestSec .active .item .card {
            box-shadow: 0 5px 12px rgb(0 0 0/.2)
        }

        .TestSec .active .item .card::after {
            opacity: 1
        }

        .TestSec .active .item .card .text p {
            color: #000 !important
        }

        .TestSec .active .item .card .nametext p {
            color: #666 !important
        }

        .TestSec .active .item .card .nametext h4 {
            color: #066531
        }

        .TestSec .card {
            border-radius: 15px;
            position: relative;
            color: #000;
            border: none;
            width: calc(100% - 38px);
            margin: 20px 12px;
            margin-top: 50px;
            margin-left: auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 5px 12px rgb(0 0 0/.2);
            transition: all .5s
        }

        .TestSec .card::after {
            position: absolute;
            content: '';
            z-index: 0;
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            opacity: 0;
            border-radius: 15px 150px 15px 60px;
            background: linear-gradient(-45deg, rgb(220 220 220) 0, rgb(255 255 255) 75%);
            transition: all .5s
        }

        .TestSec .card>div {
            position: relative;
            z-index: 1
        }

        .TestSec .card>div.text {
            min-height: 105px
        }

        .TestSec .card .img {
            width: 99px;
            margin: -35px 0 0 -40px;
            height: 99px;
            border-radius: 50%;
            background: #eee;
            box-shadow: 0 3px 8px rgb(0 0 0/.2);
            position: relative;
            overflow: hidden;
            transition: all .5s
        }

        .TestSec .card .img img {
            width: 100%;
            min-height: 100%;
            border-radius: 50%;
            border: 5px solid #fff
        }

        .TestSec .card .img::after {
            position: absolute;
            content: '';
            height: 100%;
            width: 100%;
            border-radius: 50%;
            background: transparent;
            box-shadow: 0 0 6px rgb(0 0 0/.4);
            z-index: -1
        }

        .TestSec .card .nametext {
            width: calc(100% - 80px);
            margin-left: auto;
            color: #000;
            text-align: left
        }

        .TestSec .card .nametext p {
            color: #888 !important;
            transition: all .5s
        }

        .TestSec .card .text p,
        .TestSec .card .text p~* {
            font-size: 15px !important;
            color: #000 !important;
            line-height: 170% !important;
            /*display:-webkit-box;overflow:hidden;-webkit-box-orient:vertical;-webkit-line-clamp:5;*/
            transition: all .5s;
            background: none !important;
            margin: 9px 0 0 !important
        }

        .TestSec .owl-nav {
            position: static;
            margin: 0 auto;
            height: auto;
            width: 80px;
            transition: all .5s;
            display: flex;
            justify-content: space-between
        }

        .TestSec .owl-nav button.owl-next,
        .TestSec .owl-nav button.owl-prev {
            width: 32px !important;
            height: 32px !important;
            border-radius: 50% !important;
            opacity: 1 !important;
            position: static !important;
            transition: all .5s
        }

        .TestSec .owl-nav button.owl-next span,
        .TestSec .owl-nav button.owl-prev span {
            line-height: 32px;
            font-size: 28px;
            margin-top: -6px
        }

        .TestSec .owl-nav button.owl-next:hover,
        .TestSec .owl-nav button.owl-prev:hover {
            box-shadow: 0 4px 6px rgb(0 0 0/.4);
            opacity: 1
        }

        @media only screen and (max-width:600px) {
            .TestSec .card>div.d-flex {
                display: block !important
            }

            .TestSec .card,
            .TestSec .card .nametext {
                width: 100% !important;
                text-align: center
            }

            .TestSec .card .img {
                margin: -65px auto 12px
            }
        }

        body {
            background-color: #FAFAFB !important;
        }
    </style>

    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" onload="this.rel='stylesheet'" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />

    @include(' inc.header') @php $Slider=DB::table('sliders')->where(['main_heading'=>0,'status'=>1])->get();

    $TopSlider = DB::table('sliders')->where(['main_heading'=>1,'status'=>1])->first();

    @endphp
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" onload="this.rel='stylesheet'" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <section class="Home MainSlider my-lg-5">
        <div class="px-3 mx-3 px-lg-5 mx-lg-5">
            <div class="row valign-wrapper">
                <div class="col-12 col-lg-6">
                    @php
                    $str = $TopSlider->img_alt ?? '';
                    $data = Helper::TwoColor($str);
                    $data_1 = $data[0];
                    $data_2 = $data[1];
                    @endphp

                    @if(!empty($TopSlider))
                    <h1 class="h2 Heading black-text">{{$data_1}} <span class="mcolor">{{$data_2}}</span></h1>
                    <br>
                    <h2 class="mt25px h5 fw600">{{$TopSlider->image}}</h2>
                    <div class="text-start"><a href="{{url('enquire')}}" class="btn btn-main1 btn-thm4 btn-lg my-4 me-3 fw-bold" style="background-color:#0c233b !important;color: white !important; border: 1px solid black; font-size: 15px">Enquire Now</a></div>
                    @endif

                </div>
                <div class="col-12 col-lg-6">
                    <div class="BannerImg">
                        <span><span><span></span></span></span>
                        <div>
                            <div class="Text">
                                @foreach($Slider as $Ro)

                                <h3>{{$Ro->img_alt}} <strong>{{$Ro->image}}</strong></h3>

                                @endforeach


                            </div>
                            <span><span><span></span></span></span>
                            <svg viewBox="0 0 47.11 40.68" class="LPinImage">
                                <rect fill="#65256d" width="6.97" height="22.52" />
                                <rect fill="#65256d" x="12.83" width="6.97" height="31.78" />
                                <rect fill="#65256d" x="26.48" width="6.97" height="36.11" />
                                <rect fill="#65256d" x="40.14" width="6.97" height="40.68" />
                            </svg>
                            <img class="LPinImage1 lazyload" data-src="{{asset('resources/assets/frontend/images/banner-img.svg')}}" src="{{asset('resources/assets/frontend/images/banner-img.svg')}}" alt="{{$meta->meta_title}}" width="450" height="424">
                            <img class="w100 lazyload" data-src="{{asset('resources/assets/frontend/images/Laptop.webp')}}" src="{{asset('resources/assets/frontend/images/Laptop.webp')}}" alt="{{$meta->meta_title}}" width="700" height="625">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- All Section -->
    @if(!empty($AboutUs->short_description))
    <section class="Home BannerBottom">
        <div class="px-3 mx-3 px-lg-5 mx-lg-5">
            <div class="row valign-wrapper">
                <div class="col s12">
                    <h1 class="h2 Heading black-text">{{$data1}} <span class="mcolor">{{$data2}}</span></h1>
                    {!! $AboutUs->short_description !!}
                    <a href="{!! url('about-us') !!}" class="btn btn-main3 mt10px">Read More <svg viewBox="0 0 15.61 11.54">
                            <polygon points="15.16 5.3 9.86 0 8.45 1.41 11.75 4.71 0 4.71 0 6.71 11.86 6.71 8.45 10.13 9.86 11.54 15.16 6.24 15.61 5.77 15.16 5.3" />
                        </svg></a>
                </div>
            </div>
        </div>
    </section>

    @endif

    <style>
        .section1 a {
            text-decoration: none !important;
        }

        .card-box4 {
            transition: all .5s;
        }

        .card-box4:hover {
            transform: scale(1.05);
        }
    </style>
    <div id="section2">
        <section id="services" class="mb-5 py-5">
            <div class="px-3 mx-3 px-lg-5 mx-lg-5 section1">
                <div class="col s12">
                    <h1 class="h2 Heading black-text">{{$plan1}} <span class="mcolor">{{$plan2}}</span></h1>
                    <div class="w70">
                        {!!$plan_heading->description!!}
                    </div>
                </div>
                <div class="row">

                    @php
                    $a = 0;
                    @endphp

                    @foreach ($price as $i)
                    @php
                    $a = $a + 1;
                    $imggg = 'pimg'.$a;
                    @endphp

                    <div class="col-md-5 col-xl-3 service-sec mb-5 mb-lg-0" style="border-radius: 15px">
                        <div class="card card-box4 shadow" style="border-radius: 15px;height: 220px">
                            <a href="{{url($i['data']->alias)}}" target="_blank">
                                <div class="text-center p-3">
                                    <span class="border rounded-circle px-2 py-3" style="background-color:rgba(240, 249, 254, 1);">
                                        <img src="{{ asset('resources/assets/frontend/images/'.$imggg.'.png') }}" alt="" class="py-2">
                                    </span>
                                    <h6 class="text-center text-dark py-1"><strong>{{ $i['data']->title }}</strong></h6>
                                    <p class="text-muted" style="font-size: 14px">{{ $i['data']->banner_text2 }}</p>
                                    <p class="text-center">
                                    <div class="text-primary" target="_blank">Know More</div>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach

                    <div class="text-lg-end text-end py-3">
                        <a href="#" class="text-primary">See all services <img src="{{asset('resources/assets/frontend/images/Arrow 1.png')}}"></a>
                    </div>
                </div>
            </div>

        </section>
    </div>


    @if(count($taxes)>0)
    <section class="Home pt0">
        <div class="px-3 mx-3 px-lg-5 mx-lg-5">
            <div class="row">
                @if(!empty($tax->home_description))
                <div class="col-lg-6">
                    {!!$tax->home_description!!}
                    <a href="{{url('/tax-detail/'.$tax->alias)}}" class="btn btn-main3 mt10px">Read More <svg viewBox="0 0 15.61 11.54">
                            <polygon points="15.16 5.3 9.86 0 8.45 1.41 11.75 4.71 0 4.71 0 6.71 11.86 6.71 8.45 10.13 9.86 11.54 15.16 6.24 15.61 5.77 15.16 5.3" />
                        </svg></a>
                </div>
                @endif
                <div class="col-lg-6">
                    @foreach($taxes as $tax)
                    <div class="TaxBlock w90">
                        <div class="img"><img class="lazyload" data-src="{{asset('resources/assets/frontend/images/Pimg.png')}}" alt="{{$meta->meta_title}}" height="70" width="70"></div>
                        <div class="Text">
                            <h4 class="h6 m0">{{$tax->title}}</h4>
                            <p class=" grey-text text-lighten">{{$tax->heading}}</p>
                        </div>
                        <div class="Price">
                            <p>{{$tax->currency}} <span>{{$tax->price}}</span></p>
                            <a href="{{url('/tax-detail/'.$tax->alias)}}" class="btn btn-main3">Apply Now</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif


    @php $ArrData = DB::table('why_choose_us')->where(['status'=>1])->get(); @endphp


    @if(count($ArrData)>0)
    <section class="Home pt0 py-5 my-5">
        <div class="px-3 mx-3 px-lg-5 mx-lg-5">
            <div class="row">
                <div class="col s12 l5">
                    <h3 class="h1 Heading1 lh-n">{{$reason_heading1}} <span class="mcolor">{{$reason_heading2}}</span></h3>
                    <ul class="ul-list">
                        @foreach($ArrData as $Roes) <li>{!! $Roes->alt !!}</li> @endforeach
                    </ul>
                </div>
                <div class="col s12 l7">
                    <div class="ChooseImg">
                        <span></span>
                        <img class="lazyload w100" data-src="{{asset('resources/assets/frontend/images/ChooseImg.svg')}}" alt="{{$meta->meta_title}}" style="z-index:3; position:relative;" height="305" width="700">
                        <img class="graph lazyload" data-src="{{asset('resources/assets/frontend/images/choose-bg-graph.svg')}}" height="170" width="275" alt="{{$meta->meta_title}}">
                        <svg class="MinGraph" viewBox="0 0 67.58 49.32">
                            <rect class="GraphBox" x="1.37" y="1.37" width="64.85" height="46.59" rx="3.4" />
                            <path class="GraphLine" d="M534.54,1235c4.62,0,4.62-6.31,9.24-6.31s4.62-11.14,9.23-11.14,3.34,7.26,8,7.26,5.9-19,10.51-19,4.62,8.34,9.24,8.34,4.62-8.34,9.24-8.34" transform="translate(-528.46 -1192.92)" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endif

    <style>
        .connect-size1 {
            font-size: 25px;
        }

        @media (max-width: 770px) {
            .connect-size1 {
                font-size: 16px;
            }

        }

        .connect-size4 {
            font-size: 50px;
        }

        @media (max-width: 770px) {
            .connect-size4 {
                font-size: 28px;
            }

        }

        .connect-size5 {
            font-size: 35px;
        }

        @media (max-width: 770px) {
            .connect-size5 {
                font-size: 22px;
            }

        }

        .connect-size2 p {
            font-size: 17px;
        }

        @media (max-width: 770px) {
            .connect-size2 p {
                font-size: 12px;
            }

        }

        .connect-size2 {
            font-size: 17px;
        }

        @media (max-width: 770px) {
            .connect-size2 p {
                font-size: 12px;
            }

        }

        .connect-size3 {
            /*font-size: 20px;*/
        }

        @media (max-width: 770px) {
            .connect-size3 {
                font-size: 28px;
            }

        }

        .card-box2 {
            background-color: rgba(255, 255, 255, 1);
            transition: background-color 0.5s ease;
        }

        .image-bin1 {
            background-image: url("https://www.expertbells.com/frontend/image/binoculars1.svg");
            background-size: 160px;
            background-position: center;
            background-repeat: no-repeat;
        }

        .image-bin2 {
            background-image: url("https://www.expertbells.com/frontend/image/binoculars3.svg");
            background-size: 100px;
            background-position: center;
            background-repeat: no-repeat;
        }

        .image-bin3 {
            background-image: url("https://www.expertbells.com/frontend/image/binoculars2.svg");
            background-size: 120px;
            background-position: center;
            background-repeat: no-repeat;
        }

        .card-box2:hover {
            background-color: rgba(12, 35, 59, 1);
        }

        .card-box2:hover h4 {
            color: white !important;
        }

        .card-box2:hover .connect-size2,
        .card-box2:hover .connect-size2 * {
            color: white;
        }

        .image-opacity {
            opacity: 0.7;
            /* Change the value to your desired opacity */
        }
    </style>
    <section class="ConnectSec mb-3 py-5 my-5">
        <div class="px-3 mx-3 px-lg-5 mx-lg-5">
            <div class="row">
                <div class="col-12 wow slideInDown">
                    <h3 class="h1 Heading1 lh-n">Connect with <span class="mcolor">Mentor</span> in Easy Steps
                </div>
                <div class="connect-size1">Book 1:1 session with Top mentors around the world to help you out in your learning<br> journey of your career or Startup.</div>
            </div>
            <div class="d-none d-md-block col-lg-12 wow slideIn">
                <div class="d-flex justify-content-center step m-0 mt-md-5 mt-4">
                    <div class="card card-box2 shadow mx-2 mx-lg-3 mx-xl-5 mb-md-4 mb-2 px-4 pt-4 pb-5" style="border-radius: 16px; width: 250px">
                        <h3 class="connect-size5" style="color: rgba(12, 120, 251);"> 01</h3>
                        <h4 class="mb-2 connect-size1" style="color: rgba(12, 35, 59);">Browse Mentor</h4>
                        <div class="connect-size2 image-bin1">Find Mentors that will help you solve the problems you are facing in your Startup with their expertise.</div>
                    </div>
                    <div class="card card-box2 shadow mx-2 mx-lg-3 mx-xl-5 mb-md-4 mb-2 px-4 pt-4 pb-5" style="border-radius: 16px; width: 250px">
                        <h3 class="connect-size5" style="color: rgba(12, 120, 251);"> 02</h3>
                        <h4 class="mb-2 connect-size1" style="color: rgba(12, 35, 59);">Book 1:1 Session</h4>
                        <div class="connect-size2 image-bin2">Get personalized guidance from top mentors worldwide - Book 1-on-1 sessions to solve your problems.</div>
                    </div>
                    <div class="card card-box2 shadow mx-2 mx-lg-3 mx-xl-5 mb-md-4 mb-2 px-4 pt-4 pb-5" style="border-radius: 16px; width: 250px">
                        <h3 class="connect-size5" style="color: rgba(12, 120, 251);"> 03</h3>
                        <h4 class="mb-2 connect-size1" style="color: rgba(12, 35, 59);">Get Mentorship</h4>
                        <div class="connect-size2 image-bin3">Get personalized advice by the mentor to clarify the things you are struggling with.</div>
                    </div>
                </div>
            </div>
            <div class="d-block d-md-none col-lg-12 wow slideIn">
                <div class="step m-0 mt-4">
                    <div class="d-flex justify-content-center">
                        <div class="card card-box2 shadow mb-3 px-3 pt-3 pb-4" style=" border-radius:16px;width: 250px">
                            <h3 class="connect-size5" style="color: rgba(12, 120, 251);"> 01</h3>
                            <h4 class="mb-2 h3 connect-size1" style="color: rgba(12, 35, 59);">Browse Mentor</h4>
                            <span class="connect-size2">Find Mentors that will help you solve the problems you are facing in your Startup with their expertise.</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="card card-box2 shadow mb-3 px-3 pt-3 pb-4" style=" border-radius:16px;width: 250px">
                            <h3 class="connect-size5" style="color: rgba(12, 120, 251);"> 02</h3>
                            <h4 class="mb-2 h3 connect-size1" style="color: rgba(12, 35, 59);">Book 1:1 Session</h4>
                            <span class="connect-size2">Get personalized guidance from top mentors worldwide - Book 1-on-1 sessions to solve your problems.</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="card card-box2 shadow mb-3 px-3 pt-3 pb-4" style=" border-radius:16px;width: 250px">
                            <h3 class="connect-size5" style="color: rgba(12, 120, 251);"> 03</h3>
                            <h4 class="mb-2 h3 connect-size1" style="color: rgba(12, 35, 59);">Get Mentorship</h4>
                            <span class="connect-size2">Get personalized advice by the mentor to clarify the things you are struggling with.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    @include('inc.testimonials')

    <div class="my-5 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <h1 class="h1 thm px-3 py-2" style="line-height: 1.5">Subscribe to our Newsletter</h1>
                    <p class="h5 text-secondary">Receive updates instanly</p>
                    <div class="col-12">
                        <div class="">
                            <form action="{{url('/newsletter-save')}}" method="post">
                                @csrf
                                <div class="input-field bg-white d-flex justify-content-center align-items-center px-3 py-2 shadow" style="border-radius: 50px;">
                                    <img src="{{asset('../frontend/img/mail.svg')}}" alt="mail" height="20" width="30">
                                    <input type="text" name="email" id="Newsletter" placeholder="Enter your email address" required style="border:none !important">
                                    <label for="Newsletter" class="active"></label>
                                    <button type="submit" class="btn btn-news d-flex justify-content-center align-items-center px-4 py-4" style="background-color:#0c233b; color:white;border-radius: 50px">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('inc.footer')
    <!-- OwlCarousel2 CSS -->
    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" onload="this.rel='stylesheet'" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#Plans").owlCarousel({
                items: 5,
                loop: false,
                dots: false,
                nav: true,
                responsiveClass: true,
                responsive: {
                    250: {
                        items: 1
                    },
                    320: {
                        items: 1
                    },
                    460: {
                        items: 2
                    },
                    600: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 4
                    },
                    1200: {
                        items: 4
                    },
                    1600: {
                        items: 5
                    }
                }
            });
            $("#Blog").owlCarousel({
                items: 4,
                loop: false,
                dots: false,
                nav: true,
                responsiveClass: true,
                responsive: {
                    250: {
                        items: 1
                    },
                    320: {
                        items: 1
                    },
                    460: {
                        items: 2
                    },
                    600: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    },
                    1600: {
                        items: 5
                    }
                }
            });
            $("#Clients").owlCarousel({
                items: 6,
                center: true,
                loop: true,
                dots: false,
                nav: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    250: {
                        items: 1
                    },
                    320: {
                        items: 2
                    },
                    460: {
                        items: 2
                    },
                    600: {
                        items: 3.6
                    },
                    768: {
                        items: 4
                    },
                    992: {
                        items: 4
                    },
                    1200: {
                        items: 6
                    },
                    1600: {
                        items: 6
                    }
                }
            });
            $("#Testimonial").owlCarousel({
                items: 5,
                center: true,
                loop: true,
                dots: true,
                nav: false,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    250: {
                        items: 1
                    },
                    320: {
                        items: 1
                    },
                    460: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 4
                    },
                    1200: {
                        items: 4
                    },
                    1400: {
                        items: 5
                    }
                }
            });
            $("#TestSec").owlCarousel({
                items: 2,
                loop: true,
                dots: false,
                nav: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    250: {
                        items: 1
                    },
                    320: {
                        items: 1
                    },
                    460: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    768: {
                        items: 1.2,
                        center: true
                    },
                    992: {
                        items: 1.5,
                        center: true
                    },
                    1200: {
                        items: 2
                    },
                    1600: {
                        items: 2
                    }
                }
            });
            $('#sqcontact').click(function() {
                $(".qform").addClass("pull")
            });
        });
    </script>