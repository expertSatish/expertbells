<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@extends('layouts.app')
@section('content')
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<style>
    .bluecolor {
        color: #0c233b;
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
        height: 6.0em;
        /* Display 4 lines of content */
        overflow: hidden;
        line-height: 1.5em !important;
        /* Set line height based on desired spacing */
    }

    .view-more {
        display: block;
        text-decoration: none;
    }
</style>

<main>
    <section class="inner-banner">
        <div class="section">
            <div class="bg-white"></div>
        </div>
    </section>
    <section class="pt-3 bg-white">
        <form class="container filterform">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fal fa-home-alt"></i></a></li>
                <li class="breadcrumb-item"><a aria-current="page">Find All Mentors</a></li>
            </ol>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-7">
                    <h2 class="Heading h2">Choose a Mentor. <span>Book a meeting on video call.</span></h2>
                </div>
                <div class="col-lg-4 col-md-5 text-end">
                    <input type="text" class="form-control SearchBox" name="search" placeholder="Search by name or keyword">
                </div>
            </div>
            <div class="row Filter">
                <div class="col-12">
                    <div class="d-flex flex-wrap">
                        @csrf
                        <div class="dropdown FilterDrop">
                            <a class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Expertise <span id="checkboxCount" style="color: green;"></span></a>
                            <div class="dropdown-menu p-3" style="width: 900px;">
                                <input type="text" class="form-control SearchBox" placeholder="Search...">
                                <div class="row" id="checkboxContainer">
                                    @foreach ($categories as $category)
                                    <div class="col-sm-4" style="padding:10px">
                                        <h6>{{ $category->title }}</h6>
                                        @foreach ($category->expertise as $exp)
                                        <div class="row">
                                            <div class="col-sm-12 form-check" style="padding-left:10px">
                                                <input class="form-check-input" type="checkbox" value="{{ $exp->id }}" data-bs-type="Expertise" name="expertise[]" id="exps{{ $exp->id }}">
                                                <label class="form-check-label" for="exps{{ $exp->id }}">{{ $exp->title }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="dropdown FilterDrop">
                            <a class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Role<span></span></a>
                            <div class="dropdown-menu p-3">
                                <input type="text" class="form-control SearchBox" placeholder="Search...">
                                <ul>
                                    @foreach ($roles as $role)
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" data-bs-type="Role" name="roles[]" value="{{ $role->id }}" id="role{{ $role->id }}">
                                        <label class="form-check-label" for="role{{ $role->id }}">{{ $role->title }}</label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="dropdown FilterDrop">
                            <a class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Industries<span></span></a>
                            <div class="dropdown-menu p-3">
                                <h3 class="text-u h6">Industries</h3>
                                <input type="text" class="form-control SearchBox" placeholder="Search...">
                                <ul>
                                    @foreach ($industries as $item)
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}" data-bs-type="industries" name="industries[]" id="sm{{ $item->id }}">
                                        <label class="form-check-label" for="sm{{ $item->id }}">{{ $item->title }}</label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    @if ($experts->count() == 0)
                    <x-data-not-found data="Experts" />
                    @endif
                    @foreach ($experts as $expert)
                    <div class="databox container my-5">
                        <div class="p-3" style="border-radius: 16px;border: 1px solid rgba(166, 164, 164, 1)">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="d-flex justify-content-center pt-3">
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
                                        <img src="{{ asset($imagePath) }}" style="height: 180px; width:180px;border-radius:50%;">
                                        @php $foundImage = true; @endphp
                                        @break 
                                        @endif
                                        @endforeach

                                        @if (!$foundImage)
                                        <img src="{{ asset('frontend/image/no-img.webp') }}" style="height:180px; width:185px; border-radius:50%;">
                                        @endif
                                    </a>
                                    </div>
                                    <div class="ps-lg-4 pt-4 mt-2 pb-1 pb-0 mb-0" style="font-size: 16.71px;color:rgba(12, 35, 59, 0.9)">
                                        Starts At
                                    </div>
                                    <div class="ps-lg-4 d-flex justify-content-start align-items-center">
                                        @if($expert->defaultcharges)
                                        <img src="{{ asset('frontend/image/Rs..png') }}" style=" font-size:36px">&nbsp;
                                        @if($expert->defaultcharges->charges > 0 )
                                        <span class="fw-semibold" style="color: rgba(75, 174, 79, 1);font-size:36px;line-height:0">{{ round(($expert->defaultcharges->charges) + ($expert->defaultcharges->charges * 0) / 100) }}/-</span>
                                        @else
                                        <span class="fw-semibold" style="color: rgba(75, 174, 79, 1);font-size:36px">{{ round(($expert->charge) + ($expert->charge * 0) / 100) }}/-</span>
                                        @endif
                                        @endif
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6 " style="border-right: 1px solid rgba(0, 0, 0, 0.3)">
                                    <div class="pe-4">

                                        <a href="{{ route('experts', ['alias' => $expert->user_id]) }}" class="">
                                            @if(!$expert->defaultcharges)
                                            <small class="NotAvl text-danger">Not Available</small>
                                            @endif
                                            <div class=" p-0 m-0 pb-2" style="border-bottom: 1px solid rgba(0, 0, 0, 0.3)">
                                                <a href="{{ route('experts', ['alias' => $expert->user_id]) }}">
                                                    <div class="">
                                                        <div class="p-0 m-0 bluecolor fw-semibold" style="font-size: 28px;">{{ $expert->name ?? '' }}@if ($expert->top_expert == 1)<span>&nbsp;<img src="{{ asset('uploads/expert/jpg/verify.png') }}" height="28px" width="28px"></span>@endif </div>

                                                        <div class="p-0 m-0" style="font-size: 20px;color:rgba(12, 35, 59, 0.8)">
                                                        @if (!empty($expert->roles))
                                                        @foreach ($expert->roles as $roles)
                                                            @if (!empty($roles->roleinfo) && $loop->iteration < 3)
                                                                {{ $roles->roleinfo->title }}
                                                                {{ $loop->iteration < 1 ? ', ' : '' }}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    {{ $expert->compnay_name && count($expert->expertise) > 0 ? ', ' . $expert->compnay_name : $expert->compnay_name }} </div>
                                                        </div>
                                                </a>
                                            </div>
                                            <a href="{{ route('experts', ['alias' => $expert->user_id]) }}" class="align-items-start">
                                                <div class="align-items-center">
                                                    <!-- <div class="pb-1 text-white ps-2 text-center">Expertise</div> -->
                                                    @if (!empty($expert->expertise))
                                                    <div>
                                                        <div class="row mb-3">
                                                            <div class="col-12">
                                                                <!-- <div style="padding-top:{{ $expert->expertise->count() < 3 ? '0' : '20px' }};"> -->
                                                                <!-- <div style="padding-right:{{ $expert->expertise->count() < 4 ? '0' : '20px' }}"> -->
                                                                @foreach ($expert->expertise as $expertise)
                                                                @if ($loop->iteration == 4)
                                                                <br>
                                                                @endif
                                                                @if (!empty($expertise->expertiseinfo) && $loop->iteration < 6) <span class="d-inline-block" style="{{ $loop->count < 4 ? '' : '' }}">
                                                                    <div class="px-3 py-2 mt-3 me-2" style="background-color:rgba(22, 120, 251, 0.1);color: rgba(12, 35, 59, 1);font-size: 12px; border-radius:16px">{{ $expertise->expertiseinfo->title }}
                                                                    </div>
                                                                    </span>
                                                                    @endif
                                                                    @endforeach
                                                            </div>
                                                            <!-- </div> -->
                                                            <!-- </div> -->
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </a>

                                            <div class="bg-white m-0 pt-2" style="border-top: 1px solid rgba(0, 0, 0, 0.3)">
                                                <div class="bio-container" style="font-size: 14px;">
                                                    <div class="bio-content" style="text-align: justify;">
                                                        {!! $expert->bio !!}
                                                    </div>
                                                    <div class="font-here "><a href="{{ route('experts', ['alias' => $expert->user_id]) }}" class="view-more text-primary">...more</a></div>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                    <div style="font-size: 20px;">Packages</div>
                                    @foreach($package as $res)
                                    <div class="pt-3 pb-2">
                                        <div class="row">
                                            <div class="col-1 pt-1">
                                            <i class="fa-regular fa-circle-check" style="color: #0c233b;"></i>
                                            </div>
                                            <div class="col-10" style="font-size: 16px;line-height:19.2px">{{$res->package_name}}
                                            <div class="pt-1" style="font-size: 10px;">
                                        <img src="{{ asset('frontend/image/clock_time.png') }}" height="10px" width="10px">
                                           &nbsp; {{$res->number_session}} X {{$res->time}}min Session
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class=" bg-white text-center py-3">
                                        <a class="btn" style="background-color: #0c233b; color: white;width:80%" href="{{ route('experts', ['alias' => $expert->user_id]) }}">
                                            View Plans
                                        </a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $experts->links() }}
                </div>
            </div>
        </form>
    </section>
    <!-- <x-footer-find-expert/> -->
</main>
@endsection
@push('css')
<title>Find All Experts : Expert Bells</title>
<meta name="description" content="Welcome to expert Bells">
<meta name="keywords" content="Welcome to expert Bells">
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" onload="this.rel='stylesheet'" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<style type="text/css">
    body>main,
    body section {
        overflow: inherit !important;
    }

    .SelectExperts a,
    .FilterDrop a {
        border-radius: 30px !important;
        margin: 0 0 0 auto;
        border: 1px solid rgb(var(--blackrgb)/.2);
        padding: 8px 20px;
        position: relative;
        min-width: 50px;
        display: inline-flex;
        align-items: center
    }

    .FilterDrop a {
        padding: 5px 20px
    }

    .SelectExperts a span,
    .FilterDrop a span {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        display: inline-flex;
        align-items: center;
        max-width: 150px
    }

    .SelectExperts a span:after,
    .FilterDrop a span:after {
        display: none
    }

    .SelectExperts a.show,
    .FilterDrop a.show {
        box-shadow: 0 0 0 .25rem rgb(var(--thmrgb)/.25) !important;
        border: 1px solid var(--thm)
    }

    .SelectExperts a.show:before,
    .FilterDrop a.show:before {
        position: absolute;
        content: '';
        right: 0;
        left: 0;
        margin: 0 auto;
        bottom: -17px;
        z-index: 99;
        width: 9px;
        height: 9px;
        transform: rotate(45deg);
        background: var(--white)
    }

    .SelectExperts .dropdown-menu,
    .FilterDrop .dropdown-menu {
        box-shadow: 0 0 25px rgb(var(--blackrgb)/.2);
        border-color: rgb(var(--blackrgb)/.05);
        border-radius: 15px;
        margin-top: 9px !important
    }

    .FilterDrop {
        margin: 0 9px 9px 0
    }

    .FilterDrop:last-child {
        margin-right: 0;
    }

    .FilterDrop .dropdown-menu {
        /* min-width: 350px; */
        z-index: 9;
    }

    .FilterDrop .dropdown-menu input.SearchBox {
        height: 40px;
        font-size: 16px;
        max-width: 400px;
        background-color: rgb(var(--thmrgb)/.05)
    }

    .FilterDrop .dropdown-menu>ul {
        -webkit-column-count: 2 !important;
        -moz-column-count: 2 !important;
        column-count: 2 !important;
        grid-column-gap: 20px;
        -webkit-column-gap: 20px;
        -moz-column-gap: 20px;
        column-gap: 20px;
        padding: 0;
        margin: 15px 0 0;
    }

    .FilterDrop .dropdown-menu>ul.AllCat {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
    }

    .FilterDrop .dropdown-menu>ul.AllCat>li {
        display: inline-block;
        margin: 0 0 20px;
    }

    .FilterDrop .dropdown-menu>ul.AllCat ul {
        margin: 0;
        padding: 0;
    }

    .FilterDrop .dropdown-menu>ul.AllCat h3 {
        font-size: 18px !important;
        font-weight: 600
    }

    /*.FilterDrop .dropdown-menu ul:first-child{margin-top:6rem!important}*/
    .Exptext {
        display: -webkit-box;
        overflow: hidden;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1
    }

    @media only screen and (max-width:767px) {
        .FilterDrop .dropdown-menu ul {
            -webkit-column-count: 1 !important;
            -moz-column-count: 1 !important;
            column-count: 1 !important;
            grid-column-gap: 0;
            -webkit-column-gap: 0 !important;
            -moz-column-gap: 0 !important;
            column-gap: 0 !important;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            overflow: auto;
            max-height: 400px;
            margin: 0 -16px -16px 0;
            padding: 0 9px 9px 0;
        }

        .SelectExperts .dropdown-menu li,
        .FilterDrop .dropdown-menu li {
            width: 100%;
        }

    }

    @media only screen and (max-width:575px) {
        .FilterDrop .dropdown-menu {
            max-width: 350px
        }
    }

    .SelectExperts .dropdown-menu li,
    .FilterDrop .dropdown-menu li {
        padding: 3px 20px;
        margin-bottom: 1px;
        cursor: pointer;
        white-space: nowrap
    }

    .FilterDrop .dropdown-menu li {
        padding: 3px 0
    }

    .FilterDrop .dropdown-toggle.selected {
        background: rgb(var(--thmrgb)/.1);
        border: 1px solid rgb(var(--thmrgb)/.25)
    }

    .FilterDrop .dropdown-toggle span:before {
        content: '\2022';
        padding: 0 6px;
        font-size: 9px
    }

    .FilterDrop .dropdown-toggle span:empty:before {
        display: none
    }

    .Steps .row>div {
        counter-increment: slides-num
    }

    .Steps .card {
        background: none;
        border-radius: 0
    }

    .Steps .card>* {
        border-radius: 0;
        border: none;
        background: none
    }

    .Steps .card img {
        height: 70px;
        width: auto;
        object-fit: contain;
        margin-bottom: 20px
    }

    .Steps .card h3 {
        color: var(--thm3);
        position: relative
    }

    .Steps .card h3:after {
        content: "0" counter(slides-num)".";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        font-weight: 600;
        font-size: 72px;
        color: rgb(var(--blackrgb)/.05);
        transform: translateY(-100%);
        transition: all .5s;
        z-index: -1
    }

    .Steps .card p {
        font-size: 15px;
        display: -webkit-box;
        overflow: hidden;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        margin-top: 9px
    }

    input.SearchBox {
        padding-left: 40px;
        height: 48px;
        font-size: 18px;
        margin: 0;
        width: 100%;
        background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" fill="%23666" viewBox="0 0 409.73 409.77"><path d="M878.4,589.6c-2.31-1.75-4.87-3.26-6.9-5.29q-59.18-59-118.22-118.18a33.48,33.48,0,0,1-2.94-4c-42.53,36-90.26,49.69-144,38.17-41.8-9-75-31.94-99.05-67.21-45.75-67.18-35.88-158.84,29.41-214.44,60.7-51.71,148.18-51.6,208.86-.32,34.69,29.32,54.24,67.13,57.35,112.54,3.1,45.21-11.15,85-41.18,119.46,1.18,1.23,2.22,2.38,3.32,3.48Q824.3,513,883.51,572.29c2,2,3.54,4.6,5.29,6.91v4l-6.4,6.4Zm-92-247.24c.37-79.5-64.38-145-144.82-145.17A144.41,144.41,0,0,0,496.4,341.9c-.26,79.83,63.72,144.69,144.69,145.25C720.59,487.7,786,422.34,786.39,342.36Z" transform="translate(-479.07 -179.83)" /> </svg>');
        background-repeat: no-repeat;
        background-size: 20px;
        background-position: 9px;
        margin-bottom: 9px
    }
</style>
@endpush
@push('js')
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" onload="this.rel='stylesheet'" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".CatIcons").owlCarousel({
            items: 9,
            margin: 20,
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
                    items: 2
                },
                350: {
                    items: 3
                },
                575: {
                    items: 5
                },
                768: {
                    items: 6
                },
                992: {
                    items: 7
                },
                1200: {
                    items: 8
                },
                1600: {
                    items: 9
                }
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.SelectExperts .dropdown-menu li').on('click', function(e) {
            e.preventDefault();
            var exp = $(this).data('name');
            $('.SelectExperts .dropdown-toggle span').text(exp);
        });
        $('.FilterDrop .dropdown-menu').on('click', function(event) {
            event.stopPropagation();
        });
        $('.FilterDrop .dropdown-menu input[type="checkbox"]').change(function(e) {
            // let count = $('.FilterDrop>.dropdown-toggle span').text();
            if ($(this).is(':checked') == true) {
                count = 1;
            }
            if ($(this).is(':checked') == false) {
                count = 1;
            }
            $('.filterform').submit();
        });
    });
    $('.FilterDrop .SearchBox').on("keyup", function() {
        val = $(this).val().toLowerCase();
        $(".FilterDrop ul li").each(function() {
            $(this).toggle($(this).text().toLowerCase().includes(val));
        });
    });
    $('.filterform').on('submit', function(e) {
        e.preventDefault();
        $('.databox').html(
            '<div class="text-center my-5"><i class="fad fa-spinner-third fa-spin fa-3x"></i></div>');
        $.ajax({
            data: new FormData(this),
            url: @json(route('expertsearch')),
            method: 'Post',
            dataType: 'Json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(success) {
                $('.databox').html(success.html);
            }
        });
    });
    $('input[name=search]').on('keyup', function() {
        $('.filterform').submit();
    });
</script>
<script>
    // jQuery code
    $(document).ready(function() {
        // Listen for changes in checkboxes within the container
        $('#checkboxContainer input[type="checkbox"]').change(function() {
            var checkedCount = $('#checkboxContainer input[type="checkbox"]:checked').length;
            $('#checkboxCount').text(checkedCount);
        });
    });
</script>

@endpush