@extends('layouts.app')
@section('metasection','Find a Mentor | Connecting Consultant & Digital Experts | Expertbells')
@section('twittertitle','Find a Mentor | Connecting Consultant & Digital Experts | Expertbells')
@section('twitterimage','https://www.expertbells.com/uploads/testimonial/2023-03-137356316testi-img.webp')
@section('twitterimagealt','Consultant & Digital Experts')
@section('twitterdescription','Improve your skills and reach your personal goals with the world class mentors. Find a
right mentor and consultant for your startups and entrepreneurs. Start your journey today!')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body {
        background-color: #FAFAFB;
    }

    .btn-thm4:hover {
        box-shadow: 0 20px 9px -9px rgb(var(--blackrgb)/.3)
    }

    .horizontal-here {
        width: 5%;
    }

    .font-here {
        font-size: 10px;
    }

    .image-setting {
        width: 90px;
        height: 90px;

    }

    .custom-hr {
        width: 20%;
        height: 3px;
        background-color: white !important;
        opacity: 100% !important;
        border: none;
    }

    .custom-hr1 {
        width: 5%;
        height: 8px;
        background-color: rgba(22, 120, 251, 0.3) !important;
        opacity: 100% !important;
        border: none;
        border-radius: 10px;
    }

    .bio-container {
        position: relative;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        top: 100%;
        background-color: #f9f9f9;
        /* min-width: 160px; */
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 9px 9px;
        text-decoration: none;
        display: block;
    }


    .bio-content {
        height: 6.2em;
        /* Display 4 lines of content */
        overflow: hidden;
        line-height: 1.5em;
        /* Set line height based on desired spacing */
    }

    .view-more {
        display: block;
        text-decoration: none;
    }
</style>
<style>
    .video-phones {}

    @media(max-width: 767px) {
        .video-phones {
            background-color: #0c233b !important;
            padding-bottom: 10px;
        }
    }

    .coloured-cards .card {
        margin-top: 30px;
    }

    body {
        background-color: rgba(249, 250, 251, 1);
    }

    .my-font {
        font-size: 35px;
    }

    /* Media query for tablets and larger screens */
    @media (min-width: 768px) {
        .my-font {
            font-size: 55px;
        }
    }

    /* Media query for laptops and larger screens */
    @media (min-width: 1024px) {
        .my-font {
            font-size: 65px;
        }
    }

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


    .my-font2 {
        font-size: 20px;
    }

    /* Media query for tablets and larger screens */
    @media (min-width: 768px) {
        .my-font2 {
            font-size: 30px;
        }
    }

    /* Media query for laptops and larger screens */
    @media (min-width: 1024px) {
        .my-font2 {
            font-size: 35px;
        }
    }

    .responsive-div {
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        max-width: 100%;
        padding-top: var(--padding-top);
        padding-bottom: var(--padding-bottom);
        font-size: var(--font-size);
    }

    .responsive-image {
        max-width: 100%;
        height: auto;
    }

    @media (max-width: 768px) {
        .responsive-div {
            --padding-top: 1rem;
            --padding-bottom: 1rem;
            --font-size: 1.2rem;
        }
    }

    /* Default styles for screens larger than 768px */
    .responsive-div {
        --padding-top: 2rem;
        --padding-bottom: 2rem;
        --font-size: 1.5rem;
    }

    .responsive-reg span {
        font-size: 1rem;
        padding-left: 0.75rem;
    }

    @media (max-width: 992px) {
        .responsive-reg img {
            width: 20px;
            height: 20px;
        }

        .responsive-reg span {
            font-size: 0.875rem;
        }
    }

    .align-left {
        text-align: left;
    }

    .align-right {
        text-align: right;
    }

    /* Media query for small screens */
    @media (max-width: 767px) {
        .align-left {
            text-align: left;
        }
    }

    /* Media query for large screens */
    @media (min-width: 768px) {
        .align-left {
            text-align: right;
        }
    }

    .card[data-background="image"] .title,
    .card[data-background="image"] .description,
    .card[data-background="color"] .description,
    .card[data-background="color"] .card-footer,
    .card[data-background="color"] small,
    .card[data-background="color"] .content a {
        color: #000;
    }

    .card-big-shadow {
        background-color: #ffff;
        border-radius: 25px;
    }

    .shadow-lg {
        border-radius: 15px;
    }

    .card.card-just-text .content {
        padding: 18px 16px;
        text-align: center;
    }

    .card .content {
        padding: 20px 20px 10px 20px;
    }

    .card[data-color="blue"] .category {
        color: #0C233B;
    }

    .card .category,
    .card .label {
        font-size: 18px;
        margin-bottom: 10px;
    }
</style>
<main class="HomePage">
    <section class="HearderSec Home ">
        <div class="container video-phones">
            <div class="row">
                <div class="col-12">
                    <div class="MBox  text-center">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <span class="h5 fw-normal">{{ $bannercms->heading }}</span>
                                <h1 class="mb-4">{{ $bannercms->title }}</h1>
                                {!! $bannercms->description !!}<img src="{{ asset('frontend/img/arrow.svg') }}" alt="arrow" class="ms-3" width="30" height="30">
                                </a>
                            </div>
                        </div>
                        <div class="text-center mb-4"><a href="{{ route('experts') }}" class="btn btn-thm btn-lg">Browse Mentor</a></div>

                        <div id="carouselSlide" class="carousel VideoBox slide wow zoomIn" data-bs-ride="carousel">
                            @foreach ($banners as $item)
                            <div class="carousel-item h-100 w-100 lh-0 {{$loop->iteration==1?'active':''}}">
                                @if ($item->type == 'image')
                                <x-image-box>
                                    <x-slot:image>{{ $item->image }}</x-slot>
                                        <x-slot:path>/uploads/banner/</x-slot>
                                            <x-slot:alt>{{ $item->title ?? '' }}</x-slot>
                                </x-image-box>
                                @endif

                                @if ($item->type == 'youtube')
                                <!-- <button class="playbtn play"><span></span></button> -->
                                @php
                                $arr = explode('=', $item->title);
                                @endphp
                                <div class="youtube-player" data-id="{{ $arr[1] ?? '' }}"></div>
                                @endif
                                @if ($item->type == 'video')
                                <!-- <button class="playbtn play"><span></span></button> -->
                                <video id="PVideo" autoplay muted loop playsinline preload="metadata">
                                    <source src="{{ asset('/uploads/banner/' . $item->image) }}" type="video/mp4">
                                </video>

                                @endif
                            </div>
                            @endforeach
                            @if($banners->count()>1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselSlide" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselSlide" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></button>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .card-box2 {
            background-color: rgba(255, 255, 255, 1);
            transition: background-color 0.5s ease;
        }

        .image-bin1 {
            background-image: url("{{ asset('frontend/image/binoculars1.svg') }}");
            background-size: 160px;
            background-position: center;
            background-repeat: no-repeat;
        }

        .image-bin2 {
            background-image: url("{{ asset('frontend/image/binoculars3.svg') }}");
            background-size: 100px;
            background-position: center;
            background-repeat: no-repeat;
        }

        .image-bin3 {
            background-image: url("{{ asset('frontend/image/binoculars2.svg') }}");
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
    @if ($findexperts->count() > 0)
    <section class="ConnectSec mb-3">
        <div class="container">
            <div class="row">
                <div class="col-12 wow slideInDown">
                    <div class="text-center connect-size4 fw-semibold" style="color:#0c233b">Connect with <span style="color:rgba(12,120,251)">Mentor</span> in Easy Steps </div>
                    <div class="text-center connect-size1">Book 1:1 session with Top mentors around the world to help you out in your learning<br> journey of your career or Startup.</div>
                </div>
                <div class="d-none d-md-block col-lg-12 wow slideIn">
                    <div class="d-flex justify-content-center step m-0 ps-lg-3 mt-md-5 mt-4">
                        @php
                        $a=1;
                        @endphp
                        @foreach ($findexperts as $item)
                        <div class="card card-box2 shadow mx-2 mx-lg-3 mx-xl-5 mb-md-4 mb-2 px-4 pt-4 pb-5" style="border-radius: 16px; width: 250px">
                            <h3 class="connect-size5" style="color: rgba(12, 120, 251);"> 0{{ $a }}</h3>
                            <h4 class="mb-2 h3 connect-size1" style="color: rgba(12, 35, 59);">{{ $item->title ?? '' }}</h4>
                            @if ($a == 1)
                            <div class="connect-size2 image-bin1">{!! $item->description !!}</div>
                            @elseif ($a == 2)
                            <div class="connect-size2 image-bin2">{!! $item->description !!}</div>
                            @else
                            <div class="connect-size2 image-bin3">{!! $item->description !!}</div>
                            @endif
                        </div>

                        @php $a=$a+1; @endphp
                        @endforeach
                    </div>
                </div>
                <div class="d-block d-md-none col-lg-12 wow slideIn">
                    <div class="step m-0 mt-4">
                        @php
                        $a=1;
                        @endphp
                        @foreach ($findexperts as $item)
                        <div class="d-flex justify-content-center">
                            <div class="card card-box2 shadow mb-3 px-3 pt-3" style=" border-radius:16px;width: 250px">
                                <h3 class="connect-size5" style="color: rgba(12, 120, 251);"> 0@php echo $a @endphp</h3>
                                <h4 class="mb-2 h3 connect-size1" style="color: rgba(12, 35, 59);">{{ $item->title ?? '' }}</h4>
                                <span class="connect-size2">{!! $item->description !!}</span>
                            </div>
                        </div>
                        @php $a=$a+1; @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif


    @if ($experts->count() > 0)
    <section class="py-0 my-0 d-none">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1600 200" fill="#fff"><polygon points="1600 200 1600 0 0 0 0 200 799.7 0.07 1600 200" /></svg> -->
        <div class="container">
            <div class="row wow slideInDown">
                <div class="col-12 ps-lg-5 text-center">
                    <h2 class="h1 thm">{{ $expertcms->title }}
                        <!--Top Rated Mentors-->
                    </h2>
                    <h3 class="h5 thm fw-normal d-none">{!! $expertcms->description !!}</h3>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center my-5">
                    @if ($experts->count() == 0)
                    <x-data-not-found data="Experts" />
                    @endif
                    @foreach ($experts as $expert)
                    <div class="">
                        <div class="card verify border me-3" style="border-radius: 18px !important; width:210px; height:250px;box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3);">
                            <a href="{{ route('experts', ['alias' => $expert->user_id]) }}" class="">
                                @if(!$expert->defaultcharges)
                                <small class="NotAvl text-danger">Not Available</small>
                                @endif
                                <div class="d-flex justify-content-center mt-4">
                                    <a href="{{ route('experts', ['alias' => $expert->user_id]) }}" class="">
                                        @php
                                        $imageFormats = ['webp', 'jpg', 'jpeg', 'png']; // Define the supported image formats
                                        $foundImage = false;
                                        @endphp

                                        @foreach ($imageFormats as $format)
                                        @php
                                        $imagePath = 'uploads/expert/' . $expert->profile . '.' . $format;
                                        @endphp

                                        @if (file_exists(public_path($imagePath)))
                                        <img class="image-setting" src="{{ asset($imagePath) }}" style="height: 98px; width:98px;border-radius:50%;">
                                        @php $foundImage = true; @endphp
                                        @break
                                        @endif
                                        @endforeach

                                        @if (!$foundImage)
                                        <img src="{{ asset('frontend/image/no-img.webp') }}" style="height:100px; width:100px; border-radius:50%;">
                                        @endif
                                    </a>

                                </div>
                                <div class="p-0 m-0 pt-3">
                                    <a href="{{ route('experts', ['alias' => $expert->user_id]) }}">
                                        <div class="">
                                            <div class="p-0 m-0 text-center fw-semibold" style="font-size: 17px; color:#0c233b">{{ $expert->name ?? '' }} </div>

                                            <div class="p-0 m-0 pb-2 text-center" style="font-size: 13px;color:rgba(125, 121, 121, 1)">
                                                @if (!empty($expert->roles))
                                                @foreach ($expert->roles as $roles)
                                                @if (!empty($roles->roleinfo) && $loop->iteration < 3) {{ $roles->roleinfo->title }} {{ $loop->iteration < 1 ? ', ' : '' }} @endif @endforeach @endif</div>
                                                    <p class="text-center"><span style="font-size: smaller;"><i class="fa fa-building" aria-hidden="true"></i> Pvt. Lmt.</span></p>
                                            </div>
                                    </a>

                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center text-lg-end mt-5"><a href="{{ route('experts') }}" class="h5 thm4">View More <i class="fal fa-long-arrow-right"></i></a></div>
            </div>
        </div>
    </section>
    @endif
    <style>
        .card-box:hover {
            transform: scale(1.05);
        }

        .owl-item {
            min-height: 1px;
            float: left;
            -webkit-backface-visibility: hidden;
            -webkit-tap-highlight-color: transparent;
            -webkit-touch-callout: none;
            user-select: none;
            -webkit-user-select: none;
            -webkit-user-drag: none;
            -moz-user-select: none;
            -moz-user-drag: none;
            -ms-user-select: none;
            -ms-user-drag: none;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            display: flex;
        }

        .card1 {
            border-radius: 18px !important;
            width: 210px;
            height: 250px;
            box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3);
        }
    </style>
    <section class="py-0 my-0">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1600 200" fill="#fff"><polygon points="1600 200 1600 0 0 0 0 200 799.7 0.07 1600 200" /></svg> -->
        <div class="container">
            <div class="row wow slideInDown">
                <div class="col-12">
                    <h2 class="h1 thm d-none">Find your Mentor
                        <!--Top Rated Mentors-->
                    </h2>
                    <h3 class="h5 thm fw-normal text-center">{!! $expertcms->description !!}</h3>
                </div>
            </div>
            <div class="col-12">
                <div class="d-none justify-content-center my-4 d-xl-flex" id="cardContainer">
                    <div class="owl-carousel owl-theme">
                        <div class="item pb-3">
                            <a href="https://www.expertbells.com/experts/505290" class="card-link">
                                <div class="card card1 verify border mx-3 card-box" style="border-radius: 18px !important; width:210px; height:250px;box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3);">
                                    <div class="d-flex justify-content-center mt-4">
                                        <img class="image-setting" src="{{ asset('frontend/image/mentor1.png') }}" style="height: 98px; width:98px;border-radius:50%;">
                                    </div>
                                    <div class="p-0 m-0 pt-3">
                                        <div>
                                            <div class="p-0 m-0 pb-2 text-center fw-semibold" style="font-size: 17px; color:#0c233b">Krishan Mishra</div>
                                            <div class="p-0 m-0 pb-2 text-center" style="font-size: 13px;color:rgba(125, 121, 121, 1)">
                                                Brand Head
                                                <div class="d-flex justify-content-center pt-3" style="color: #000;"><span style="font-size: 13px;"><img class="image-setting" src="{{ asset('frontend/image/jio.jpg') }}" style="height: 18px; width:auto;"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="https://www.expertbells.com/experts/717187" class="card-link">
                                <div class="card card1 verify border mx-3 card-box" style="border-radius: 18px !important; width:210px; height:250px;box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3);">
                                    <div class="d-flex justify-content-center mt-4">
                                        <img class="image-setting" src="{{ asset('frontend/image/mentor2.png') }}" style="height: 98px; width:98px;border-radius:50%;">
                                    </div>
                                    <div class="p-0 m-0 pt-3">
                                        <div class="">
                                            <div class="p-0 m-0 pb-2 text-center fw-semibold" style="font-size: 17px; color:#0c233b">Sayed Zafar</div>

                                            <div class="p-0 m-0 pb-2 text-center" style="font-size: 13px;color:rgba(125, 121, 121, 1)">
                                                Startup Advisor
                                                <p class="d-flex justify-content-center pt-3"><span style="font-size: smaller;"><img class="image-setting" src="{{ asset('frontend/image/physicswallah.png') }}" style="height: 18px; width:auto;"></span></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="https://www.expertbells.com/experts/186507" class="card-link">
                                <div class="card card1 verify border mx-3 card-box" style="border-radius: 18px !important; width:210px; height:250px;box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3);">
                                    <div class="d-flex justify-content-center mt-4">
                                        <img class="image-setting" src="{{ asset('frontend/image/mentor3.png') }}" style="height: 98px; width:98px;border-radius:50%;">
                                    </div>
                                    <div class="p-0 m-0 pt-3">
                                        <div class="">
                                            <div class="p-0 m-0 pb-2 text-center fw-semibold" style="font-size: 17px; color:#0c233b">Vaibhav Arora</div>
                                            <div class="p-0 m-0 pb-2 text-center" style="font-size: 12px;color:rgba(125, 121, 121, 1)">
                                                VP Ecommerce
                                                <p class="d-flex justify-content-center pt-3"><span style="font-size: smaller;"><img class="image-setting" src="{{ asset('frontend/image/wow.png') }}" style="height: 18px; width:auto;"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="https://www.expertbells.com/experts/876708" class="card-link">
                                <div class="card card1 verify border mx-3 card-box" style="border-radius: 18px !important; width:210px; height:250px;box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3);">
                                    <div class="d-flex justify-content-center mt-4">
                                        <img class="image-setting" src="{{ asset('frontend/image/mentor4.png') }}" style="height: 98px; width:98px;border-radius:50%;">
                                    </div>
                                    <div class="p-0 m-0 pt-3">
                                        <div class="">
                                            <div class="p-0 m-0 pb-2 text-center fw-semibold" style="font-size: 17px; color:#0c233b">Anjum Javed</div>

                                            <div class="p-0 m-0 pb-2 text-center" style="font-size: 12px;color:rgba(125, 121, 121, 1)">
                                                Digital Growth Expert
                                                <p class="d-flex justify-content-center pt-3"><span style="font-size: smaller;"><img class="image-setting" src="{{ asset('frontend/image/wns.png') }}" style="height: 18px; width:auto;"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="https://www.expertbells.com/experts/148911" class="card-link">
                                <div class="card card1 verify border mx-3 card-box" style="border-radius: 18px !important; width:210px; height:250px;box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3);">
                                    <div class="d-flex justify-content-center mt-4">
                                        <img class="image-setting" src="{{ asset('frontend/image/mentor6.png') }}" style="height: 98px; width:98px;border-radius:50%;">
                                    </div>
                                    <div class="p-0 m-0 pt-3">
                                        <div class="">
                                            <div class="p-0 m-0 pb-2 text-center fw-semibold" style="font-size: 17px; color:#0c233b">Vinod Keni</div>
                                            <div class="p-0 m-0 pb-2 text-center" style="font-size: 12px;color:rgba(125, 121, 121, 1)">
                                                Venture Capitalist
                                                <p class="d-flex justify-content-center pt-3"><span style="font-size: smaller;"><img class="image-setting" src="{{ asset('frontend/image/Rectangle 39402.png') }}" style="height: 18px; width:auto;"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="https://www.expertbells.com/experts/166072" class="card-link">
                                <div class="card card1 verify border mx-3 card-box" style="border-radius: 18px !important; width:210px; height:250px;box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3);">
                                    <div class="d-flex justify-content-center mt-4">
                                        <img class="image-setting" src="{{ asset('frontend/image/mentor7.png') }}" style="height: 98px; width:98px;border-radius:50%;">
                                    </div>
                                    <div class="p-0 m-0 pt-3">
                                        <div class="">
                                            <div class="p-0 m-0 pb-2 text-center fw-semibold" style="font-size: 17px; color:#0c233b">Arjun Vaidya</div>
                                            <div class="p-0 m-0 pb-2 text-center" style="font-size: 12px;color:rgba(125, 121, 121, 1)">
                                                Founder
                                                <p class="d-flex justify-content-center pt-3"><span style="font-size: smaller;"><img class="image-setting" src="{{ asset('frontend/image/dr_vaidya.png') }}" style="height: 18px; width:auto;"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="https://www.expertbells.com/experts/524906" class="card-link">
                                <div class="card card1 verify border mx-3 card-box" style="border-radius: 18px !important; width:210px; height:250px;box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3);">
                                    <div class="d-flex justify-content-center mt-4">
                                        <img class="image-setting" src="{{ asset('frontend/image/mentor8.png') }}" style="height: 98px; width:98px;border-radius:50%;">
                                    </div>
                                    <div class="p-0 m-0 pt-3">
                                        <div class="">
                                            <div class="p-0 m-0 pb-2 text-center fw-semibold" style="font-size: 17px; color:#0c233b">Bharat Patel</div>
                                            <div class="p-0 m-0 pb-2 text-center" style="font-size: 12px;color:rgba(125, 121, 121, 1)">
                                                CEO & Founder
                                                <p class="d-flex justify-content-center pt-3"><span style="font-size: smaller;"><img class="image-setting" src="{{ asset('frontend/image/yudiz.png') }}" style="height: 18px; width:auto;"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="https://www.expertbells.com/experts/299977" class="card-link">
                                <div class="card card1 verify border mx-3 card-box" style="border-radius: 18px !important; width:210px; height:250px;box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3);">
                                    <div class="d-flex justify-content-center mt-4">
                                        <img class="image-setting" src="{{ asset('frontend/image/mentor5.png') }}" style="height: 98px; width:98px;border-radius:50%;">
                                    </div>
                                    <div class="p-0 m-0 pt-3">
                                        <div class="">
                                            <div class="p-0 m-0 pb-2 text-center fw-semibold" style="font-size: 17px; color:#0c233b">Palakh Khanna</div>
                                            <div class="p-0 m-0 pb-2 text-center" style="font-size: 12px;color:rgba(125, 121, 121, 1)">
                                                Social Entrepreneur
                                                <div class="d-flex justify-content-center pt-3"><span style="font-size: smaller;"><img class="image-setting" src="{{ asset('frontend/image/break_the_ice.png') }}" style="height: 18px; width:auto;"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-none justify-content-center my-5 d-md-flex d-xl-none">
                    <div class="card verify border mx-3 card-box" style="border-radius: 18px !important; width:210px; height:250px;box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3);">
                        <a href="https://www.expertbells.com/experts/505290" class="">
                            <div class="d-flex justify-content-center mt-4">
                                <a href="https://www.expertbells.com/experts/505290" class="">
                                    <img class="image-setting" src="{{ asset('frontend/image/mentor1.png') }}" style="height: 98px; width:98px;border-radius:50%;">
                                </a>

                            </div>
                            <div class="p-0 m-0 pt-3">
                                <a href="https://www.expertbells.com/experts/505290">
                                    <div class="">
                                        <div class="p-0 m-0 text-center fw-semibold" style="font-size: 17px; color:#0c233b">Krishan Mishra </div>

                                        <div class="p-0 m-0 pb-2 text-center" style="font-size: 13px;color:rgba(125, 121, 121, 1)">
                                            Brand Head
                                            <div class="text-center pt-3" style="color: #000;"><span style="font-size: 13px;"><img class="image-setting" src="{{ asset('frontend/image/jio.jpg') }}" style="height: 18px; width:18px;"> Jio</span></div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </a>
                    </div>
                    <div class="card verify border mx-3 card-box" style="border-radius: 18px !important; width:210px; height:250px;box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3);">
                        <a href="https://www.expertbells.com/experts/717187" class="">
                            <div class="d-flex justify-content-center mt-4">
                                <a href="https://www.expertbells.com/experts/717187" class="">
                                    <img class="image-setting" src="{{ asset('frontend/image/mentor2.png') }}" style="height: 98px; width:98px;border-radius:50%;">
                                </a>

                            </div>
                            <div class="p-0 m-0 pt-3">
                                <a href="https://www.expertbells.com/experts/717187">
                                    <div class="">
                                        <div class="p-0 m-0 text-center fw-semibold" style="font-size: 17px; color:#0c233b">Sayed Zafar</div>

                                        <div class="p-0 m-0 pb-2 text-center" style="font-size: 13px;color:rgba(125, 121, 121, 1)">
                                            Startup Advisor
                                            <p class="text-center pt-3"><span style="font-size: smaller;"><img class="image-setting" src="{{ asset('frontend/image/physicswallah.png') }}" style="height: 18px; width:18px;"> PhysicsWallah</span></p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </a>
                    </div>
                    <div class="card verify border mx-3 card-box" style="border-radius: 18px !important; width:210px; height:250px;box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3);">
                        <a href="https://www.expertbells.com/experts/186507" class="">
                            <div class="d-flex justify-content-center mt-4">
                                <a href="https://www.expertbells.com/experts/186507" class="">
                                    <img class="image-setting" src="{{ asset('frontend/image/mentor3.png') }}" style="height: 98px; width:98px;border-radius:50%;">
                                </a>

                            </div>
                            <div class="p-0 m-0 pt-3">
                                <a href="https://www.expertbells.com/experts/186507">
                                    <div class="">
                                        <div class="p-0 m-0 text-center fw-semibold" style="font-size: 17px; color:#0c233b">Vaibhav Arora</div>

                                        <div class="p-0 m-0 pb-2 text-center" style="font-size: 12px;color:rgba(125, 121, 121, 1)">
                                            VP Ecommerce
                                            <p class="text-center pt-3"><span style="font-size: smaller;"><img class="image-setting" src="{{ asset('frontend/image/wow.png') }}" style="height: 18px; width:18px;"> Wow Skin Science</span></p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center my-5 d-md-none">
                    <div class="card verify border card-box" style="border-radius: 18px !important; width:250px; height:300px;box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3);">
                        <a href="https://www.expertbells.com/experts/505290" class="">
                            <div class="d-flex justify-content-center mt-4">
                                <a href="https://www.expertbells.com/experts/505290" class="">
                                    <img class="image-setting" src="{{ asset('frontend/image/mentor1.png') }}" style="height: 120px; width:120px;border-radius:50%;">
                                </a>

                            </div>
                            <div class="p-0 m-0 pt-3">
                                <a href="https://www.expertbells.com/experts/505290">
                                    <div class="">
                                        <div class="p-0 m-0 text-center fw-semibold" style="font-size: 20px; color:#0c233b">Krishan Mishra </div>

                                        <div class="p-0 m-0 pb-2 text-center" style="font-size: 15px;color:rgba(125, 121, 121, 1)">
                                            Brand Head
                                            <div class="text-center pt-3" style="color: #000;"><span style="font-size: 15px;"><img class="image-setting" src="{{ asset('frontend/image/jio.jpg') }}" style="height: 18px; width:18px;"> Jio</span></div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <div class="text-center text-lg-end d-none"><a href="{{ route('experts') }}" class="h5 thm4">View More <i class="fal fa-long-arrow-right"></i></a></div>
            <div class="text-center mb-3"><a href="{{ route('experts') }}" class="btn btn-thm3 btn-lg">Browse Mentor</a></div>
        </div>
    </section>
    @if ($findexpertcategories->count() > 0)
    <section class="Sec7 py-3 d-none">
        <div class="container">
            <div class="row wow slideInDown">
                <div class="col-12 mb-4">
                    <h2 class="h1 thm" style=" text-transform: capitalize;">{{ $findexpertcategorycms->title }}</h2>
                    <div class="d-none d-md-block">{!! $findexpertcategorycms->description !!}</div>
                </div>
            </div>
            <div class="row wow slideIn">
                <!-- <ul class="m-0 p-0 Cats">
                        @foreach ($findexpertcategories as $item)
                            <li><a href="{{route('expertcategory',$item->alias)}}" class="rounded-3 d-block p-2">{{ $item->title ?? '' }}</a></li>
                            @foreach ($item->expertise as $exp)
                            <li class="d-none"><a href="{{route('expertcategory',$item->alias)}}/{{$exp->alias??''}}" class="rounded-3 d-block p-2">{{ $exp->title ?? '' }}</a></li>
                            @endforeach
                        @endforeach
                    </ul> -->
                @foreach ($findexpertcategories as $item)
                <div class="col-md-3 col-sm-6 content-card">
                    <div class="shadow-lg">
                        <div class="card card-just-text" data-background="color" data-color="blue" data-radius="none">
                            <div class="content">
                                <h6 class="category"><strong>{{ $item->title ?? '' }}</strong></h6>
                                <span class="description">{{$item->short}}
                                </span>
                                <a style="color:#326CFA" href="{{route('expertcategory',$item->alias)}}" class="rounded-3 d-block p-2">Explore</a>

                            </div>
                        </div> <!-- end card -->
                    </div>
                </div>
                @endforeach
                @foreach ($findexpertcategories as $item)
                <div class="col-lg-3 col-sm-6 mb-md-4 mb-2 d-none">
                    <div class="card mx-lg-4 text-center">
                        <div class="card-body">
                            <h3 class="h4 mb-3">{{ $item->title ?? '' }}</h3>
                            {{-- <p>{{ $item->short ?? '' }}</p> --}}
                            <div class="cats">
                                @foreach ($item->expertise as $exp)
                                <a href="{{route('expertcategory',$item->alias)}}/{{$exp->alias??''}}" class="rounded-5 p-1 px-3 d-inline-block text-black">{{ $exp->title ?? '' }}</a>
                                @endforeach
                            </div><br>
                            <a href="{{route('expertcategory',$item->alias)}}" class="thm4 d-inline-block mt-3">Know
                                more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center text-lg-end mt-5"><a href="{{ route('experts') }}" class="h5 thm4">View More <i class="fal fa-long-arrow-right"></i></a></div>
        </div>
    </section>
    @endif

    <section class="AreMentor Home px-md-5 mx-lg-5 d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-7 wow slideIn">
                    <h2 class="h1 thm">{{ TwoColor($expertcategorycms->title)[0] ?? '' }} <span class="thm4">{{ TwoColor($expertcategorycms->title)[1] ?? '' }}</span></h2>
                    {!! $expertcategorycms->description !!}
                    <div class="text-center text-md-start"><a href="{{ route('becomeanexpert') }}" class="btn btn-thm4 btn-lg mt-4 mb-4">Become a Mentor</a></div>
                </div>
                <div class="col-sm-5  wow slideIn">
                    <img style="width: 90%; height: auto" src="{{asset('frontend/image/Lesson-amico.png')}}">
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="AreMentor Home d-block d-md-none">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-sm-7 wow slideIn">
                    <h2 class="h1 thm">{{ TwoColor($expertcategorycms->title)[0] ?? '' }} <span class="thm4">{{ TwoColor($expertcategorycms->title)[1] ?? '' }}</span></h2>
                    {!! $expertcategorycms->description !!}
                    <div class="text-center text-md-start"><a href="{{ route('becomeanexpert') }}" class="btn btn-thm4 btn-lg mt-4 mb-4">Become a Mentor</a></div>
                </div>
                <div class="col-sm-5  wow slideIn">
                    <img style="width: 90%; height: auto" src="{{asset('frontend/image/Lesson-amico.png')}}">
                </div>
            </div>
        </div>
        </div>
    </section>

    <style>
        .card-box1:hover {
            transform: scale(1.02);
            transition: all 0.5s ease;
        }
    </style>
    @if ($testimonials->count() > 0)
    <section class="d-none d-lg-block pt-0 mt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="Testi owl-carousel">
                        @foreach ($testimonials as $index => $testimonial)
                        <div class="testimonial-item{{ $index === 0 ? ' active' : '' }}">
                            <div class="row">
                                <div class="col-1 d-flex justify-content-end align-items-start m-0 p-0" style="font-size:97px;color: rgba(12, 35, 59, 1)">“</div>
                                <div class="col-10 mt-4 pt-3 ps-0 ms-2">
                                    <div class="">
                                        <div class="text-start">
                                            <i class="fa-solid fa-star" style="color: #e9cd16;font-size:x-small"></i>
                                            <i class="fa-solid fa-star" style="color: #e9cd16;font-size:x-small"></i>
                                            <i class="fa-solid fa-star" style="color: #e9cd16;font-size:x-small"></i>
                                            <i class="fa-solid fa-star" style="color: #e9cd16;font-size:x-small"></i>
                                            <i class="fa-solid fa-star" style="color: #e9cd16;font-size:x-small"></i>
                                            <div class="mt-2" style="font-size: 13px; color:rgba(144, 163, 180, 1); line-height:1.5">
                                                "{!! $testimonial->description !!}"
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-3">
                                    <div class="d-flex justify-content-right">
                                            <div class="me-3">
                                                @php
                                                $imageFormats = ['webp', 'jpg', 'jpeg', 'png'];
                                                $foundImage = false;
                                                @endphp

                                                @foreach ($imageFormats as $format)
                                                @php
                                                $imagePath = 'uploads/testimonial/' . $testimonial->image . '.' . $format;
                                                @endphp

                                                @if (file_exists(public_path($imagePath)))
                                                <img src="{{ asset($imagePath) }}" style="height:55px; width:55px; border-radius:50%;">
                                                @php $foundImage = true; @endphp
                                                @break
                                                @endif
                                                @endforeach

                                                @if (!$foundImage)
                                                <img src="{{ asset('frontend/image/no-img.webp') }}" style="height:55px; width:55px;border-radius:50%; ">
                                                @endif
                                            </div>
                                            <div class="Name" style="color: #000;">
                                                <h4 class="h5">{{ $testimonial->name }}</h4>
                                                <div class="py-0 h6 fw-normal">{{$testimonial->founder}}</div>
                                                <!-- <h4 class="fw-bold" style="color: #000;">Absolutely Amazing!</h4> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                    <div class="">
                        <h1 class="h1 thm">{{ $testimonialscms->title }}</h1>
                        <div class="mt-2" style="font-size: 16px; color:rgba(144, 163, 180, 1); line-height:1.5">From tense founders to successful startup through mentorship</div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endif
    @if ($testimonials->count() > 0)
    <section class="d-block d-lg-none pt-0 mt-0">
        <div class="container">
            <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                    <div class="text-center">
                        <h1 class="h1 thm">{{ $testimonialscms->title }}</h1>
                        <div class="mt-2" style="font-size: 16px; color:rgba(144, 163, 180, 1); line-height:1.5">From tense founders to successful startup through mentorship</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="Testi owl-carousel">
                        @foreach ($testimonials as $index => $testimonial)
                        <div class="testimonial-item{{ $index === 0 ? ' active' : '' }} card-box1">
                            <div class="row">
                                <div class="col-1 d-flex justify-content-end align-items-start m-0 p-0" style="font-size:50px;color: rgba(12, 35, 59, 1)">“</div>
                                <div class="col-10 mt-4 pt-3 ps-0 ms-2">
                                    <div class="">
                                        <div class="text-start">
                                            <i class="fa-solid fa-star" style="color: #e9cd16;font-size:x-small"></i>
                                            <i class="fa-solid fa-star" style="color: #e9cd16;font-size:x-small"></i>
                                            <i class="fa-solid fa-star" style="color: #e9cd16;font-size:x-small"></i>
                                            <i class="fa-solid fa-star" style="color: #e9cd16;font-size:x-small"></i>
                                            <i class="fa-solid fa-star" style="color: #e9cd16;font-size:x-small"></i>
                                            <div class="mt-2" style="font-size: 13px; color:rgba(144, 163, 180, 1); line-height:1.5">
                                                "{!! $testimonial->description !!}"
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-3">
                                        <div class="d-flex justify-content-right">
                                            <div class="me-3">
                                                @php
                                                $imageFormats = ['webp', 'jpg', 'jpeg', 'png'];
                                                $foundImage = false;
                                                @endphp

                                                @foreach ($imageFormats as $format)
                                                @php
                                                $imagePath = 'uploads/testimonial/' . $testimonial->image . '.' . $format;
                                                @endphp

                                                @if (file_exists(public_path($imagePath)))
                                                <img src="{{ asset($imagePath) }}" style="height:55px; width:55px; border-radius:50%;">
                                                @php $foundImage = true; @endphp
                                                @break
                                                @endif
                                                @endforeach

                                                @if (!$foundImage)
                                                <img src="{{ asset('frontend/image/no-img.webp') }}" style="height:55px; width:55px;border-radius:50%; ">
                                                @endif
                                            </div>
                                            <div class="Name" style="color: #000;">
                                                <h4 class="h5">{{ $testimonial->name }}</h4>
                                                <div class="py-0 h6 fw-normal">CEO, AB Pvt. Ltd.</div>
                                                <!-- <h4 class="fw-bold" style="color: #000;">Absolutely Amazing!</h4> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif




    @if ($videos->count() > 0)
    <section class="VideoG Sec3 d-none">
        <div class="container">
            <div class="row align-items-center wow slideInDown">
                <div class="col-lg-12">
                    <h2 class="h1 thm">{{ $videoscms->title }}</h2>
                    {!! $videoscms->description !!}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel VideoSec wow slideInUp">
                        @foreach ($videos as $video)
                        @php
                        if(str_contains($video->video_url,'v=')){
                        $arr = explode('=',$video->video_url);
                        }else{
                        $arr = explode('/',$video->video_url);
                        }
                        @endphp
                        <div class="item">
                            <div class="card">
                                <div class="card-header">
                                    @if ($video->video_type == 1)
                                    <div class="youtube-player" data-id="{{end($arr) ?? ''}}"></div>
                                    @endif
                                    @if($video->video_type==2)
                                    <video>
                                        <source src="{{asset('uploads/expert/video/'.$video->video)}}" type="video/mp4" />
                                    </video>
                                    <div class="play"></div>
                                    @endif
                                    <a href="{{route('experts',['alias'=>$video->expert->user_id,'type'=>'videos','v'=>$video->video_id,'check'=>Request::segment(2)])}}" class="playVideo"></a>

                                </div>
                                <a href="{{route('experts',['alias'=>$video->expert->user_id,'type'=>'videos','v'=>$video->video_id,'check'=>Request::segment(2)])}}" class="card-body">
                                    <h3>{{ $video->title }}</h3>
                                    <small class="text-secondary me-3"><i class="far fa-user thm"></i>
                                        {{ $video->expert->name ?? '' }}</small>
                                    @if (!empty($video->industries))
                                    <small class="text-secondary">
                                        <i class="far fa-tag thm"></i>
                                        @foreach (json_decode($video->industries) as $industry)
                                        @php $industry = \App\Models\Industry::find($industry); @endphp
                                        {{ $industry->title ?? '' }} {{ !$loop->last ? '+' : '' }}
                                        @endforeach
                                    </small>
                                    @endif
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="text-center"><a href="{{ url('videos') }}" class="btn btn-thm2">View All Videos <i class="fal fa-arrow-right"></i></a></div>
        </div>
    </section>
    @endif
    <section>
        <div class="mt-2 px-lg-5">
            <div class="container ps-3 px-lg-4">
                <div class="row">
                    <div class="px-2 px-lg-0 col-12 text-center">
                        <h1 class="my-font">Looking for Startup<span class="text-primary"> Compliance</span><span style="color: #0C233B;">?</span>
                        </h1>
                        <h4 class="my-font2"><span class="text-primary pb-2">Expertbells compliance</span><span style="color: #0C233B;"> is here to help you out!</span></h4>
                    </div>
                    <div class="row pt-4 ms-2 ms-lg-0">
                        <div class="d-none d-xl-block col-md-2"></div>
                        <div class="col-md-6 col-xl-5">
                            <div class="py-2"><a href="https://www.expertbells.com/service/startup-india-portal-registration" target="_blank"><img class="" src="{{ asset('frontend/image/rocket1.jpg') }}" style="width: 30px; height:auto; border: 2px solid #0c233b;border-radius: 9px; padding:5px;" alt="checked--v1" /><span class="fs-5 fs-md-4 px-lg-2" style="display: inline-block; vertical-align:bottom">&nbsp;Startup India Registration</span></a></div>
                            <div class="py-2"><a href="https://www.expertbells.com/service/private-limited-company-registrations" target="_blank"><img src="{{ asset('frontend/image/rocket2.png') }}" style="width: 30px; height:auto; border: 2px solid #0c233b;border-radius: 9px; padding:5px" alt="checked--v1" /><span class="fs-5 fs-md-4 px-lg-2" style="display: inline-block; vertical-align:bottom">&nbsp;Private Limited Registration</span></a>
                            </div>
                            <div class="py-2"><a href="https://www.expertbells.com/service/trademark-registration" target="_blank"><img src="{{ asset('frontend/image/rocket3.png') }}" style="width: 30px; height:auto; border: 2px solid #0c233b;border-radius: 9px; padding:5px" alt="checked--v1" /><span class="fs-5 fs-md-4 px-lg-2" style="display: inline-block; vertical-align:bottom">&nbsp;Trademark Registration</span></a></div>
                        </div>
                        <div class="col-md-6 col-xl-5">
                            <div class="py-2"><a href="https://www.expertbells.com/service/company-annual-filing" target="_blank"><img src="{{ asset('frontend/image/rocket4.png') }}" style="width: 30px; height:auto; border: 2px solid #0c233b;border-radius: 9px; padding:5px" alt="checked--v1" /><span class="fs-5 fs-md-4 px-lg-2" style="display: inline-block; vertical-align:bottom">&nbsp;Annual ROC Complaince</span></a></div>
                            <div class="py-2"><span class=""><a href="https://www.expertbells.com/service/partnership-firms" target="_blank"><img class="" src="{{ asset('frontend/image/rocket5.png') }}" style="width: 30px; height:auto; border: 2px solid #0c233b;border-radius: 9px; padding:5px" alt="checked--v1" /><span class="fs-5 fs-md-4 px-lg-2" style="display: inline-block; vertical-align:bottom">&nbsp;Partnership Firm Registration</span></a></span>
                            </div>
                            <div class="py-2"><a href="https://www.expertbells.com/service/msme-registration" target="_blank"><img src="{{ asset('frontend/image/rocket6.png') }}" style="width: 30px; height:auto; border: 2px solid #0c233b;border-radius: 9px; padding:5px" alt="checked--v1" /><span class="fs-5 fs-md-4 px-lg-2" style="display: inline-block; vertical-align:bottom">&nbsp;MSME Registration</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="https://www.expertbells.com/service" target="_blank" class="btn btn-thm4 btn-lg mt-5 mx-2" style="border">Check Now</a>
                    <a href="tel:+917438-99-7438" class="btn btn-thm3 btn-lg mx-2 mt-5">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
    @if ($faqs->count() > 0)
    <section class="FAQs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center wow slideInDown">
                    <span class="h4 fw-bold thm">{{ $faqscms->heading }}</span>
                    <h2 class="h1 thm">{{ $faqscms->title }}</h2>
                    {{-- <h3 class="h5 text-secondary fw-normal">Have questions ? We're here to help you.</h3> --}}
                    {!! $faqscms->description !!}
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="accordion accordion-flush Faqs" id="Faqs">
                        @foreach ($faqs as $faq)
                        <div class="accordion-item">
                            <div class="accordion-header" id="Pay{{ $loop->iteration }}">
                                <button class="accordion-button {{ $loop->iteration == 1 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#Faqs{{ $loop->iteration }}" aria-expanded="true" aria-controls="Faqs1">{{ $faq->title }}</button>
                            </div>
                            <div id="Faqs{{ $loop->iteration }}" class="accordion-collapse collapse {{ $loop->iteration == 1 ? 'show' : '' }}" aria-labelledby="Pay1" data-bs-parent="#Faqs">
                                <div class="accordion-body">{!! $faq->description !!}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="Sec5 pt-0">
        <x-newsletter />
    </section>
</main>
@endsection
@push('css')
<title>Find a Mentor | Connecting Consultant & Digital Experts | Expertbells</title>
<meta name="description" content="Improve your skills and reach your personal goals with the world class mentors. Find a right mentor and consultant for your startups and entrepreneurs. Start your journey today!">
<meta name="keywords" content="Mentor, consultant, Consulting mentors, Find a mentor, Find a consultant, mentoring">
<link rel="stylesheet" href="{{asset('frontend/css/index.min.css')}}">
@endpush

@push('js')
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" onload="this.rel='stylesheet'" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous">
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" onload="this.rel='stylesheet'" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous">
<!-- <link rel="preload" as="style" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" onload="this.rel='stylesheet'"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.compat.min.css" integrity="sha512-b42SanD3pNHoihKwgABd18JUZ2g9j423/frxIP5/gtYgfBz/0nDHGdY/3hi+3JwhSckM3JLklQ/T6tJmV7mZEw==" crossorigin="anonymous" referrerpolicy="no-referrer">

<!-- <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" onload="this.rel='stylesheet'" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer">
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<!-- <script defer src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    new WOW().init();
</script>
<!-- <script src="{{ asset('frontend/js/jquery.carouselTicker.js') }}"></script> -->
<script>
    $(document).ready(function() {
        // $(".vertical-up").carouselTicker({
        //     mode: "vertical",
        //     direction: "prev"
        // });
        // $(".vertical-down").carouselTicker({
        //     mode: "vertical",
        //     direction: "next"
        // });
        // $('.steps').slick({slidesToShow:1,slidesToScroll:1,arrows:false,fade:false,vertical:true,asNavFor:'.steps-text',autoplay:true,autoplaySpeed:3000});
        // $('.steps-text').slick({slidesToShow:3,slidesToScroll:1,vertical:true,asNavFor:'.steps',centerMode:false,focusOnSelect:true,prevArrow:".thumb-prev",nextArrow:".thumb-next"});
        // $(".Sec1 .owl-carousel").owlCarousel({animateOut:"fadeOut",animateIn:"fadeIn",items:1,margin:60,loop:true,dots:true,nav:false,navText:['<i class="fal fa-chevron-left"></i>','<i class="fal fa-chevron-right"></i>'],autoplay:true,autoplayTimeout:3000,autoplayHoverPause:true,responsiveClass:true});
        $(".ExpertsC").owlCarousel({
            items: 4,
            margin: 30,
            loop: false,
            dots: false,
            nav: false,
            navText: ['<i class="far fa-chevron-left"></i>', '<i class="far fa-chevron-right"></i>'],
            autoplay: false,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                250: {
                    items: 1,
                    margin: 15
                },
                350: {
                    items: 1,
                    margin: 15
                },
                460: {
                    items: 2,
                    margin: 15
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
                    items: 4
                }
            }
        });
        $(".VideoSec").owlCarousel({
            items: 3,
            margin: 30,
            center: false,
            loop: true,
            dots: true,
            nav: false,
            navText: ['<span></span>', '<span></span>'],
            autoplay: false,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                250: {
                    items: 1
                },
                350: {
                    items: 1
                },
                575: {
                    items: 2
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 3
                },
                1600: {
                    items: 3
                }
            }
        });
        $(".Testi").owlCarousel({
            items: 1,
            margin: 20,
            center: false,
            loop: false,
            dots: true, // Enable dots
            nav: false, // Enable navigation arrows
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsiveClass: true,
        });

        $(".Sec4 .owl-carousel").owlCarousel({
            items: 4,
            margin: 15,
            loop: false,
            dots: false,
            nav: false,
            navText: ['<i class="fal fa-chevron-left"></i>', '<i class="fal fa-chevron-right"></i>'],
            autoplay: false,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                250: {
                    items: 1
                },
                350: {
                    items: 2
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
                    items: 4
                }
            }
        });
        $(".Sec5 .owl-carousel").owlCarousel({
            items: 2,
            margin: 30,
            loop: false,
            dots: false,
            nav: true,
            navText: ['<i class="fal fa-chevron-left"></i>', '<i class="fal fa-chevron-right"></i>'],
            autoplay: false,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                250: {
                    items: 1
                },
                350: {
                    items: 1
                },
                460: {
                    items: 1
                },
                600: {
                    items: 2
                },
                768: {
                    items: 2
                },
                992: {
                    items: 2
                },
                1200: {
                    items: 2
                },
                1600: {
                    items: 2
                }
            }
        });
        $(".Sec6 .owl-carousel").owlCarousel({
            items: 7,
            margin: 30,
            loop: false,
            dots: false,
            nav: false,
            navText: ['<i class="far fa-chevron-left"></i>', '<i class="far fa-chevron-right"></i>'],
            autoplay: false,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                250: {
                    items: 2
                },
                350: {
                    items: 3
                },
                460: {
                    items: 4
                },
                600: {
                    items: 4
                },
                768: {
                    items: 5
                },
                992: {
                    items: 5
                },
                1200: {
                    items: 6
                },
                1600: {
                    items: 6
                }
            }
        });
        var ctrlVideo = document.getElementById("PVideo");
        $('.playbtn').click();
        // ctrlVideo.play();
        $('.playbtn').click(function() {
            // alert();
            if ($('.playbtn').hasClass("play")) {
                ctrlVideo.play();
                $('.playbtn').removeClass("play");
            } else {
                ctrlVideo.pause();
                $('.playbtn').addClass("play");
            }
        });
    });
</script>
<script>
    // Check if the user agent is a mobile device
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

    // Function to autoplay the video
    function autoplayVideo() {
        const video = document.getElementById('PVideo');
        video.muted = true; // Ensure the video is muted
        video.play().then(() => {
            // Autoplay started successfully
        }).catch((error) => {
            // Autoplay failed or was blocked
            // You can display a play button and handle user interaction to play the video
        });
    }

    // Autoplay the video
    if (isMobile) {
        // Add an event listener to the window's load event
        window.addEventListener('load', autoplayVideo);
    } else {
        // Autoplay the video on non-mobile devices
        autoplayVideo();
    }
</script>
<script>
    function labnolIframe(div) {
        var iframe = document.createElement('iframe');
        iframe.setAttribute(
            'src',
            'https://www.youtube.com/embed/' + div.dataset.id + '?autoplay=1&rel=0'
        );
        iframe.setAttribute('frameborder', '0');
        iframe.setAttribute('allowfullscreen', '1');
        iframe.setAttribute(
            'allow',
            'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'
        );
        div.parentNode.replaceChild(iframe, div);
    }

    function initYouTubeVideos() {
        var playerElements = document.getElementsByClassName('youtube-player');
        for (var n = 0; n < playerElements.length; n++) {
            var videoId = playerElements[n].dataset.id;
            var div = document.createElement('div');
            div.setAttribute('data-id', videoId);
            var thumbNode = document.createElement('img');
            thumbNode.src = '//i.ytimg.com/vi/ID/sddefault.jpg'.replace(
                'ID', videoId
            );
            thumbNode.alt = "Youtube Voideo";
            thumbNode.loading = "lazy";
            div.appendChild(thumbNode);
            var playButton = document.createElement('div');
            playButton.setAttribute('class', 'play');
            div.appendChild(playButton);
            div.onclick = function() {
                labnolIframe(this);
            };
            playerElements[n].appendChild(div);
        }
    }

    document.addEventListener('DOMContentLoaded', initYouTubeVideos);
</script>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        });
    });
    $(document).ready(function() {
        $("#testimonial-carousel").owlCarousel({
            items: 3,
            loop: true,
            nav: false,
            navText: ['<span class="arrow-prev"></span>', '<span class="arrow-next"></span>'],
            dots: true,
            responsive: {
                0: {
                    nav: false,
                    dots: true
                },
                768: {
                    nav: true,
                    dots: false
                }
            }
        });
    });
</script>

@endpush