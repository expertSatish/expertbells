<?php
ob_start();
$active = '';
?>
@include('inc.html')

<head>
    <title>Thankyou : Expert Bells</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="{{asset('resources/assets/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/assets/frontend/css/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('resources/assets/frontend/css/my-account.css')}}" media="screen,projection">
    @include('inc.header')
        <section class="Home grey lighten-4">
           <div class="container">
            <div class="row">
                <div class="col s12 center">
        <h1 style="color: green;">Thank You!</h1>
         <p>Thank you for your inquiry.<br>If you have any question.please contact us.</p>  <span id="countdown">5</span> seconds.</p>

    </div>
    </div>
    </div>

    <script>
        var countdownElement = document.getElementById('countdown');
        var countdown = 5; // Countdown duration in seconds

        function updateCountdown() {
            countdown--;
            countdownElement.textContent = countdown;

            if (countdown <= 0) {
                window.location.href = "{{ url('/') }}";
            } else {
                setTimeout(updateCountdown, 1000); // Update countdown every second (1000 milliseconds)
            }
        }

        updateCountdown();
    </script>


    @include('inc.footer')
   