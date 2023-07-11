<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@php $ArrData3 = DB::table('testimonial')->where(['status'=>1])->where(['slider_status'=>1])->orderby('id','DESC')->limit(4)->get(); @endphp


@if($ArrData3->count() > 0)

@php
$customer_heading = DB::table('heading')->where('heading_id', 6)->where('page', 'homepage')->first();
@endphp
<section class="d-none d-lg-block pt-0 mt-0 my-5 py-5">
    <div class="container">
        <div class="row">
            <div id="testimonial-carousel" class="col-lg-6 owl-carousel owl-theme">
                @foreach($ArrData3 as $index => $Rows)
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
                                    <div class="mt-2" style="font-size: 13px; color:rgba(144, 163, 180, 1); line-height:1.5; max-height: 6em; overflow: hidden;">
                                        {!! $Rows->content !!}
                                    </div>
                                    @if (str_word_count(strip_tags($Rows->content)) > 45)
    <button class="btn btn-link btn-sm mt-1" onclick="showFullContent(this)" style="box-shadow: none; border: none;text-decoration: none;">View More</button>
                                    @endif
                                    
                                    <script>
                                        function showFullContent(button) {
                                            var contentDiv = button.previousElementSibling;
                                            contentDiv.style.maxHeight = "none";
                                            button.style.display = "none";
                                        }
                                    </script>

                                </div>
                            </div>
                            <div class="my-3">
                                <div class="d-flex justify-content-right">
                                    <div class="me-3">
                                        <img src="{{asset('resources/assets/uploads/testimonials/'.$Rows->image)}}" style="height:55px; width:55px; border-radius:50%;">
                                    </div>
                                    <div class="Name" style="color: #000;">
                                        <h4 class="h5">{{$Rows->title}}</h4>
                                        <div class="py-0 h6 fw-normal">{{$Rows->designation}}</div>
                                        <!-- <h4 class="fw-bold" style="color: #000;">Absolutely Amazing!</h4> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                @php
                $str = $customer_heading->title;
                $data = Helper::TwoColor($str);
                $customer_heading1 = $data[0];
                $customer_heading2 = $data[1];
                @endphp
                <h3 class="h2">{{$customer_heading1}} <span class="mcolor">{{$customer_heading2}}</span></h3>
                <div class="mt-2" style="font-size: 18px; color:rgba(144, 163, 180, 1); line-height:1.5">From tense founders to successful startup through <br>mentorship</div>
            </div>
        </div>
    </div>
</section>
@endif
<script>
    $(document).ready(function() {
        $("#testimonial-carousel").owlCarousel({
            // Options and configurations
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            // Add more options as per your requirements
        });
    });
</script>
