<style>
    li .breadcrumb {
        color: #fff !important;
    }

    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 9999;
    }

    /* CSS for the popup content */
    .popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        width: 30%;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@extends('layouts.app')
@section('content')
<main>
    <div class="p-0 m-0 pb-5 pt-2" style="background-color: #0c233b; color:white">
        <div class="p-0 m-0 pb-5">
            <div class="p-0 m-0 pb-5">
                <div class="p-0 m-0 pb-3">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="pt-1 "><a href="{{ route('home') }}"><i class="fal fa-home-alt" style="color: white;"></i></a></li>
                            <li class="pt-1"><a href="{{ route('experts') }}" style="color: white !important;"> &nbsp;&nbsp;/&nbsp;&nbsp;Find Mentor</a></li>
                            <li class="pt-1"><a aria-current="page" style="color: white !important;"> &nbsp;&nbsp;/&nbsp;&nbsp;{{ $experts->name }}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="Sec2">
        <div class="container">
            <div class="container">
                <div class="row ExpDetail">
                    <div class="col-lg-7">
                        <div class="mt-0" style="margin-top: -180px !important;">
                            <a>
                                @php
                                $imageFormats = ['webp', 'jpg', 'jpeg', 'png']; // Define the supported image formats
                                $foundImage = false;
                                @endphp

                                @foreach ($imageFormats as $format)
                                @php
                                $imagePath = 'uploads/expert/' . $experts->profile . '.' . $format;
                                @endphp

                                @if (file_exists(public_path($imagePath)))
                                <img src="{{ asset($imagePath) }}" class="popup-image" style="height: 250px; width:250px;border-radius:50%; border:3px solid white">
                                @php $foundImage = true; @endphp
                                @break
                                @endif
                                @endforeach

                                @if (!$foundImage)
                                <img src="{{ asset('frontend/image/no-img.webp') }}" class="popup-image" style="height:250px; width:250px; border-radius:50%;">
                                @endif
                            </a>

                        </div>
                        <h3 class="h5 text-black mt-3 mb-2" style="font-size: 38px;color:#0c233b !important">{{ $experts->name }}@if ($experts->top_expert == 1)<span>&nbsp;<img src="{{ asset('uploads/expert/jpg/verify.png') }}" height="28px" width="28px"></span>@endif</h3>
                        <small class="lh-n d-block mb-3" style="font-size: 22px;color:rgba(12, 35, 59, 0.8)">
                            @if (count($experts->roles) > 0)
                            <span>
                                @foreach ($experts->roles as $roles)
                                @if (!empty($roles->roleinfo) && $loop->iteration < 3) {{ $roles->roleinfo->title }} {{ $loop->iteration < 1 ? ', ' : '' }} @endif @endforeach </span>,
                                    @endif
                                    @if(!empty($experts->compnay_name))
                                    <span>{{$experts->compnay_name}}</span>
                                    @endif
                        </small>
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="px-2 py-1 me-3" style="border: 1px solid rgba(0,0,0,0.4);border-radius:8px">
                                <a href="#" style="font-size: 14px !important;color:rgba(12, 35, 59, 1)"><i class="fa-solid fa-circle-play" style="color: #1678fb;"></i>&nbsp;Play Intro</a>
                            </div>
                            <div class="px-2 py-1 mx-3" style="border: 1px solid rgba(0,0,0,0.4);border-radius:8px">
                                <a href="#" style="font-size: 14px !important;color:rgba(12, 35, 59, 1)"><img src="{{ asset('frontend/image/calendar-1.png') }}" height="14px" width="14px">&nbsp;Check Availability</a>
                            </div>
                            <div class="px-2 py-1 mx-3" style="border: 1px solid rgba(0,0,0,0.4);border-radius:8px">
                                <a href="#" style="font-size: 14px !important;color:rgba(12, 35, 59, 1)"><i class="fa-sharp fa-solid fa-paper-plane" style="color: #1678fb;"></i>&nbsp;Share</a>
                            </div>
                        </div>
                        <h5 class="pt-5 h3" style="color:rgba(12, 35, 59, 1)">Expertise</h5>
                        @if (count($experts->expertise) > 0)
                        <div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    @foreach ($experts->expertise as $expertise)
                                    @if ($loop->iteration == 4)
                                    <br>
                                    @endif
                                    @if (!empty($expertise->expertiseinfo) && $loop->iteration < 6) <span class="d-inline-block" style="{{ $loop->count < 4 ? '' : '' }}">
                                        <div class="px-4 py-2 mt-3 me-3" style="background-color:rgba(22, 120, 251, 0.1);color: rgba(12, 35, 59, 1);font-size: 12px; border-radius:16px">{{ $expertise->expertiseinfo->title }}
                                        </div>
                                        </span>
                                        @endif
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        <h5 class="pt-3 h3" style="color:rgba(12, 35, 59, 1)">Industries</h5>
                        @if (!empty($experts->industries))
                        <div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    @foreach ($experts->industries as $industry)
                                    @php $industry = \App\Models\Industry::find($industry->industry_id); @endphp
                                    @if (!empty($industry) ) <span class="d-inline-block" style="{{ $loop->count < 4 ? '' : '' }}">
                                        <div class="px-4 py-2 mt-3 me-3" style="background-color:rgba(22, 120, 251, 0.1);color: rgba(12, 35, 59, 1);font-size: 12px; border-radius:16px">{{ $industry->title ?? '' }}
                                        </div>
                                    </span>
                                    @endif
                                    @if ($loop->iteration % 3 ==0)
                                    <br>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="text-center d-flex justify-content-between mb-2">
                            @if (Auth::user())
                            @php
                            $slots = \App\Models\SlotBook::where(['expert_id' => $experts->id, 'user_id' => Auth::user()->id])->count();
                            @endphp
                            @if ($slots > 0)
                            <a href="javascript:void(0)" class="btn btn-thm3 px-3 SendMessage">
                                <i class="fal fa-comment-alt-lines m-0 me-1"></i> Message me
                            </a>
                            @endif
                            @endif
                        </div>
                        @if (!empty($notesection->description))
                        <div class="Proceed d-none">{{ $notesection->description ?? '' }}</div>
                        @endif
                        <div class="">
                            <div class="{{ empty(\Auth::guard('expert')->user()) && empty(\Auth::guard('admin')->user()) && count($experts->slotcharges) > 0 && count($experts->availabilities) > 0 ? 'mx-lg-3' : 'ms-lg-3' }}">
                                <h3 class="h3 thm mt-4" style="color:rgba(12, 35, 59, 1)">About</h3>
                                <div class="CmsPage">
                                    {!! $experts->bio !!}
                                </div>
                                @if (count($experts->publishreviews) > 0)
                                <h3 class="h3 thm mt-4 py-4" style="color:rgba(12, 35, 59, 1)">What mentees say</h3>
                                @foreach ($experts->publishreviews as $item)
                                <div class="card-body">
                                    <div class="d-flex justify-content-start align-items-start">
                                        <div class="img">

                                            @php
                                            $imageFormats = ['webp', 'jpg', 'jpeg', 'png']; // Define the supported image formats
                                            $foundImage = false;
                                            @endphp

                                            @foreach ($imageFormats as $format)
                                            @php
                                            $imagePath = 'uploads/user/' . $item->user->profile . '.' . $format;
                                            @endphp

                                            @if (file_exists(public_path($imagePath)))
                                            <img src="{{ asset($imagePath) }}" style="height: 50px; width:50px;border-radius:50%; border:3px solid white">
                                            @php $foundImage = true; @endphp
                                            @break
                                            @endif
                                            @endforeach

                                            @if (!$foundImage)
                                            <img src="{{ asset('frontend/image/no-img.webp') }}" style="height:50px; width:50px; border-radius:50%;">
                                            @endif
                                        </div>
                                        <div class="ps-2">
                                            <h4 class="thm m-0 h5" style="color:rgba(12, 35, 59, 1)">{{ $item->user->name ?? '' }}</h4>
                                            <span class="star" title="star" data-title="{{ $item->rating ?? '0' }}"></span>
                                        </div>
                                        <small class="text-secondary ps-2" style="padding-top: 7px;"> &nbsp;on {{ date('l d M, Y', strtotime($item->created_at)) }}</small>
                                    </div>
                                    <p class="mt-3">{{ $item->description ?? '' }}</p>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="container shadow rounded border bg-white p-3 ms-5" style="margin-top: -225px !important;">
                            <div class="text-center fw-semibold py-2" style="font-size: 23px;border-bottom:1px solid rgba(0,0,0,0.3);color:#0c233b;">Packages</div>
                            <div class="pb-2 pt-3">
                                <div class="d-flex justify-centent-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" height="auto" width="100%" checked>
                                    <label class="form-check-label" for="flexRadioDefault1" style="font-size: 15px;">
                                        <div class="ms-2" style="font-size: 17px;color:#0c233b;">Growth Hacking for your Startup</div>
                                    </label>
                                </div>
                                <div class="ps-3 ms-2 d-flex align-items-center" style="font-size: 10px;color:#0c233b;">
                                    <img src="{{ asset('frontend/image/clock_time.png') }}" height="10px" width="10px">
                                    &nbsp; 1 X 30min Session
                                </div>
                            </div>
                            <div class="py-3">
                                <div class="d-flex justify-centent-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" height="auto" width="100%">
                                    <label class="form-check-label" for="flexRadioDefault1" style="font-size: 15px;">
                                        <div class="ms-2" style="font-size: 17px;color:#0c233b;">Marketing Planning and Strategy</div>
                                    </label>
                                </div>
                                <div class="ps-3 ms-2 d-flex align-items-center" style="font-size: 10px;color:#0c233b;">
                                    <img src="{{ asset('frontend/image/clock_time.png') }}" height="10px" width="10px">
                                    &nbsp; 1 X 60min Session
                                </div>
                            </div>
                            <div class="pt-2 pb-4">
                                <div class="d-flex justify-centent-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" height="auto" width="100%">
                                    <label class="form-check-label" for="flexRadioDefault1" style="font-size: 15px;">
                                        <div class="ms-2" style="font-size: 17px;color:#0c233b;">Product Finding to Competitive Analysis</div>
                                    </label>
                                </div>
                                <div class="ps-3 ms-2 d-flex align-items-center" style="font-size: 10px;color:#0c233b;">
                                    <img src="{{ asset('frontend/image/clock_time.png') }}" height="10px" width="10px">
                                    &nbsp; 5 X 60min Session
                                </div>
                            </div>
                            <!-- Add this code where you want to display the popup -->
                            <div id="popup" class="popup-overlay" style="border-radius:15px 15px 0 0">
                                <div class="popup-content" style="background-color: #0c233b;border-radius:15px">
                                    <!-- Content of the popup goes here -->
                                    <a id="closeBtn" class="btn mt-3 mx-2"><i class="fa-sharp fa-solid fa-arrow-left" style="color: #ffffff;"></i></a>
                                    <div class="row pb-3 px-3 pt-2">
                                        <div class="col-8">
                                            <div class="h4 text-white pt-2">Growth Hacking for your Startup</div>
                                        </div>
                                        <div class="col-4">
                                            <div class="img">
                                                @php
                                                $imageFormats = ['webp', 'jpg', 'jpeg', 'png']; // Define the supported image formats
                                                $foundImage = false;
                                                @endphp
                                                @foreach ($imageFormats as $format)
                                                @php
                                                $imagePath = 'uploads/expert/' . $experts->profile . '.' . $format;
                                                @endphp

                                                @if (file_exists(public_path($imagePath)))
                                                <img src="{{ asset($imagePath) }}" class="popup-image" style="height: 100px; width:100px;border-radius:50%;">
                                                @php $foundImage = true; @endphp
                                                @break
                                                @endif
                                                @endforeach

                                                @if (!$foundImage)
                                                <img src="{{ asset('frontend/image/no-img.webp') }}" class="popup-image" style="height:250px; width:250px; border-radius:50%;">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3" style="background-color: rgba(244, 249, 255, 1);border-radius: 0 0 15px 15px;">
                                    <div class="d-flex align-items-start ">
                                        <div class="pe-2 pt-2"><i class="fa-solid fa-calendar-days w-100" style="color: #0c233b;font-size:30px"></i></div>
                                        <div>
                                        <div class="fw-semibold fs-large text-black">1 x Growth Hacking for your Startup</div>
                                        <div class="pb-3">30mins per session</div>
                                        </div>
                                    </div>
                                        <div class="py-2" style="border-bottom: 1px solid rgba(0,0,0,0.3);border-top: 1px solid rgba(0,0,0,0.3); font-size:13px">Are you a startup founder seeking rapid and sustainable growth? Our 1:1 Growth Hacking program is tailored specifically for startups like yours, providing personalized guidance and strategies to catapult your business forward.eting strategiesally increase your customer base.</div>
                                        <div class="d-flex justify-content-between align-items-center pt-2">
                                            <div class="d-flex align-items-center">
                                            @if($experts->defaultcharges)
                                            <img src="{{ asset('frontend/image/Rs..png') }}" height="auto" width="29px" class="pt-1">&nbsp;
                                            @if($experts->defaultcharges->charges > 0 )
                                            <span class="fw-semibold" style="color: rgba(75, 174, 79, 1);font-size:26px;line-height:0">{{ round(($experts->defaultcharges->charges) + ($experts->defaultcharges->charges * 0) / 100) }}/-</span>
                                            @else
                                            <span class="fw-semibold" style="color: rgba(75, 174, 79, 1);font-size:26px">{{ round(($experts->charge) + ($experts->charge * 0) / 100) }}/-</span>
                                            @endif
                                            @endif
                                            </div>
                                            <a href="" class="btn text-white" style="background-color: #0c233b;">Buy Package</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add this code to your existing "View Detail" button -->
                            <div class="text-center pt-2" style="border-top:1px solid rgba(0,0,0,0.3);">
                                <a href="#" class="btn text-white bg-primary my-3" style="width:90%" onclick="openPopup()">View Detail</a>
                                <a href="#" class="btn text-primary mt-2 mb-3" style="width:90%; background-color:rgba(225, 238, 255, 1)">View All Packages</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-none">
                <div class=" col-sm-3">
                    @if (count($experts->videos) > 0)
                    <div class="card">
                        <video height="240" controls>
                            <source src="{{asset('uploads/expert/video/'.$video->video)}}" type="video/mp4" />
                            Your browser does not support the video tag.
                            <a style="text-align: center;" href="{{route('experts',['alias'=>$video->expert->user_id,'type'=>'videos','v'=>$video->video_id,'check'=>Request::segment(2)])}}" class="card-body">
                                <h3 style="text-align: center;">{{$video->title ?? ''}}</h3>
                                <p class="text-secondary me-3"><i class="far fa-user thm"></i>
                                    {{$video->expert->name ?? ''}}
                                </p>
                                @if(!empty($video->industries))
                                <small style="text-align: center;" class="text-secondary"><i class="far fa-tag thm"></i>
                                    @foreach(json_decode($video->industries) as $industry)
                                    @php $industry = \App\Models\Industry::find($industry); @endphp
                                    {{$industry->title ?? ''}} {{!$loop->last?'+':''}}
                                    @endforeach
                                </small>
                                @endif
                            </a>
                        </video>

                    </div>
                    @endif

                </div>

            </div>
        </div>
    </section>
</main>

<div class="modal fade RighSide BookS AddPro" id="BookExpert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="BookExpertLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form class="modal-content bookingmodalform">
            @csrf
            <input type="hidden" name="expert" value="{{ $experts->id }}">
            <div class="modal-header p-0 border-0">
                <!-- <h2 class="h5 modal-title" id="BookExpertLabel">Select times</h2> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body PopupDetail py-3 p-4 pb-0">
                <div class="sTimeScreen">
                    <div class="ContainBOx">
                        <h3 class="h4 thm fw-bold mb-3 d-flex justify-content-between align-items-center">Select
                            Duration</h3>
                        <div class="row justify-content-between">
                            <div class="col-lg-6">
                                <div class="pb-2 mb-2">
                                    <ul class="p-0 mb-0 TimeBox TopTimeBox">
                                        @foreach ($experts->slotcharges as $charges)
                                        <li>
                                            <div class="form-check">
                                                <label style="cursor:pointer" class="form-check-label d-flex" for="s{{ $loop->iteration }}">
                                                    <input type="radio" onchange="gettimeslots()" class="form-check-input me-3" value="{{ $charges->time->minute }}" name="Sizes" id="s{{ $loop->iteration }}" autocomplete="off" @checked($loop->iteration == 1)>
                                                    <span>{{ $charges->time->title }}
                                                        <small class="d-block fw-normal" style="font-size:12px">per sessions will be of {{ $charges->time->minute }} minutes</small>
                                                    </span>
                                                    <span class="fw-normal ms-3">Rs.{{ $charges->charges + ($charges->charges * 0 / 100) }}</span>
                                                </label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 Pcalendar">
                                <h3 class="h4 thm fw-bold mb-3 d-flex justify-content-between align-items-center">Pick
                                    the Date</h3>
                                <input type="hidden" onchange="gettimeslots()" class="form-control inlinecal d-none" id="dob" onchange="gettimeslots()" value="{{date('Y-m-d')}}" name="booking_date" placeholder="Date of Birth">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="h4 thm fw-bold timeheadingbox mb-3 justify-content-between align-items-center">
                                    Select the Time slot</h3>
                                <div class="SetTimeBox"></div>
                            </div>
                        </div>
                    </div>
                    <div class="position-sticky footerbox border-top">
                        <div class="price m-0 h4">
                            <strong>Price:</strong>
                            <i class="Ricon">&#8377;</i>
                            <span class="mprice">0</span>/-
                            <span class="h6 small d-block d-block d-sm-inline-block">(Per Session)</span>
                        </div>
                        <input type="hidden" name="booking_price" value="0">
                        <span>
                            <button class="btn btn-thm4 bsbtn m-0">Book Now <i class="fal fa-chevron-right ms-2"></i></button>
                            <button type="button" class="btn btn-thm4 m-0 bpbtn" style="display: none" disabled><i class="fad fa-spinner-third fa-spin me-1"></i> Loading...</button>
                            <button class="btn btn-thm3 bsbtn m-0" type="button" data-bs-dismiss="modal" aria-label="Close">Cancel
                                <i class="fal fa-chevron-right ms-2"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
@push('css')
<title>Expert introduction : {{ project() }}</title>
<meta name="description" content="Welcome to expert Bells">
<meta name="keywords" content="Welcome to expert Bells">
<style>
    body>main,
    body section {
        overflow: inherit !important
    }

    .Sec2 .card.ProBlock {
        border-radius: 9px !important;
        overflow: hidden !important
    }

    .ProBlock>.card-header {
        height: 350px !important
    }

    .star {
        font-size: 20px !important
    }

    .Proceed {
        border-radius: 15px;
        padding: 12px 20px;
        background: rgb(var(--thmrgb3)/.1);
        color: var(--thm3);
        text-align: center;
        margin-top: 15px
    }

    .ExpDetail .position-sticky {
        top: 70px
    }

    .Sec2 .ExpInfo.card {
        border: 1px solid rgb(var(--thmrgb3)/.15) !important;
        border-radius: var(--bs-border-radius-lg) !important
    }

    .Sec2 .ExpInfo.card .price {
        font-size: 15px
    }

    @media (min-width:992px) {}

    @media (min-width:1200px) {
        .ExpDetail>div.col-lg-6 {
            width: calc(100% - 660px)
        }

        .ExpDetail>div.col-lg-9 {
            width: calc(100% - 330px)
        }

        .ExpDetail>div.col-lg-3:first-child,
        .ExpDetail>div.col-lg-3:nth-child(2) {
            width: 330px
        }
    }

    @media (min-width:1600px) {
        .ExpDetail>div.col-lg-6 {
            width: calc(100% - 680px)
        }

        .ExpDetail>div.col-lg-9 {
            width: calc(100% - 340px)
        }

        .ExpDetail>div.col-lg-3:first-child,
        .ExpDetail>div.col-lg-3:nth-child(2) {
            width: 340px
        }
    }

    .ReviewBlock {
        border: none !important;
        background: none !important
    }

    .ReviewBlock>div {
        border-top: 1px solid rgb(var(--blackrgb)/.1) !important;
        padding: 15px 0 0;
        margin-top: 15px;
        display: flex;
        justify-content: space-between
    }

    .ReviewBlock>div:first-child {
        border: none !important;
        margin-top: 0
    }

    .ReviewBlock>div .img {
        width: 75px
    }

    .ReviewBlock>div .img img {
        height: 60px;
        width: 60px;
        border-radius: 50%;
        box-shadow: 0 2px 3px rgb(var(--blackrgb)/.3)
    }

    .ReviewBlock>div>div {
        width: calc(100% - 60px)
    }

    .ReviewBlock>div .star {
        margin-left: 0
    }

    .ReviewBlock>div h4 {
        font-size: 16px;
        margin-top: 0;
        font-weight: 600
    }

    .ReviewBlock>div>div>span:last-child {
        font-size: 12px !important
    }

    .ComRole {
        column-gap: 9px;
        display: flex;
        flex-wrap: wrap
    }

    .ComRole span {
        display: flex;
        width: calc(50% - 5px);
        padding: 4px 9px;
        background: rgb(var(--blackrgb)/.1);
        margin: 0 0 9px;
        border-radius: 3px;
        background-color: #0c233b;
        color: #fff;
        align-items: center;
        justify-content: center;
    }

    .card-border {
        margin: 10px 0;
        border: 1px solid #d3cdd3;
        padding: 10px;
        border-radius: 7px;
    }

    .flatpickr-day.flatpickr-disabled,
    .flatpickr-day.flatpickr-disabled:hover {
        color: rgb(var(--blackrgb)/.4) !important
    }

    .sTimeScreen .position-sticky {
        padding-bottom: 20px !important;
    }

    @media (max-width:992px) {
        .PopupDetail {
            max-height: 90vh;
            overflow: auto
        }

        .sTimeScreen .position-sticky .btn.btn-thm3.bsbtn {
            display: none
        }
    }

    @media (max-width:767px) {
        .BookS .sTimeScreen .position-sticky .price {
            font-size: 18px !important
        }
    }
</style>
@endpush
@push('js')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $(document).ready(function() {
        gettimeslots();
    });

    $('.SendMessage').on('click', function() {
        $('input[name=to_recipient_email]').val("{{ $experts->email }}");
        $('input[name=to_recipient_email]').attr('readonly', true);
        $('.ToBox').hide();
    });
</script>
<script>
    // Function to open the popup
    function openPopup() {
        var popup = document.getElementById('popup');
        popup.style.display = 'block';
        document.body.classList.add('popup-open');
    }

    // Function to close the popup
    function closePopup() {
        var popup = document.getElementById('popup');
        popup.style.display = 'none';
        document.body.classList.remove('popup-open');
    }

    // Add event listener to the close button
    var closeBtn = document.getElementById('closeBtn');
    closeBtn.addEventListener('click', closePopup);
</script>
<x-user.message-popup />
@endpush