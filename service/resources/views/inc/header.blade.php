

@if(Request::segment(1)=='thank-you')
<script>
  gtag('event', 'conversion', {'send_to': 'AW-648055073/XWBZCI3K5fQBEKGSgrUC'});
</script>
@endif
@php
$setting=DB::table('setting')->where('id',1)->first();
@endphp
@include('inc.meta.top-head-meta')
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=1, minimum-scale=.5, maximum-scale=5">
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
@if(Request::segment(1)!='signup' && Request::segment(1)!='login' && Request::segment(1)!='blog-detail')
@include('inc.meta.common-meta')
@endif
<link rel="icon" href="{{asset('resources/assets/frontend/images/favicon.ico')}}" type="image/x-icon">
<link rel="apple-touch-icon" href="{{asset('resources/assets/frontend/images/favicon.ico')}}">
<meta name="theme-color" content="#f3a430">
<!-- Materialize CSS -->
<link rel="stylesheet" href="{{asset('resources/assets/frontend/css/materialize.css')}}">
<!-- Main CSS -->
<link rel="stylesheet" href="{{asset('resources/assets/frontend/css/style.css')}}">
<meta name="google-site-verification" content="zj0HyuRNaYuzji2GPAjDJdz0EcIKu8T0VlQk_2bJBZc" />
<style>
  nav a {
    text-decoration: none !important;
  }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="dns-prefetch" href="//www.expertbells.com">
<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
<link rel="dns-prefetch" href="//code.jquery.com">
<link rel="dns-prefetch" href="//www.googletagmanager.com">
<link rel="dns-prefetch" href="//cdn.ampproject.org">
<link rel="dns-prefetch" href="//www.google-analytics.com">
<link rel="dns-prefetch" href="//stats.g.doubleclick.net">
<link rel="dns-prefetch" href="//www.google.com">
<link rel="dns-prefetch" href="//googleads.g.doubleclick.net">
<style type="text/css">.CartCount{position:absolute;border-radius:50%;height:16px;width:16px;display:flex;justify-content:center;align-items:center;background:#611f69;top:24%;font-size:9px;right:-2px;color:#fff;transition:all .5s}</style>
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        onload="this.rel='stylesheet'"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script>function goBack() {window.history.back();}</script>


<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '1053017305680434'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=1053017305680434&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5RHQZ5T');</script>
<!-- End Google Tag Manager -->
    <!--<link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"-->
    <!--    onload="this.rel='stylesheet'"-->
    <!--    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">-->
    <!-- Main CSS -->
<!-- Event snippet for Click on Phone Number Button on Website conversion page
In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
<script>
function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = 'https://www.expertbells.com/service/';
    }
  };
  gtag('event', 'conversion', {
      'send_to': 'AW-11161335248/e5TBCIzbi_4DENDrkcop',
      'event_callback': callback
  });
  return false;
}
</script>
</head>

<body class="scrollspy" id="top">
   <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NZPR6J2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager(noscript)-->
@include('inc.meta.top-body-meta')
    <main>
        <!-- Header -->
        <div>
  <div class="menu-main" style="background-color: #0c233b">
    <nav role="navigation" class="pushpin-demo-nav pin-top" data-target="menu" style="background-color: rgba(12,35,59,0.9) !important">
      <div class="MobileTop">
        <div class="container">
          <div class="row">
            <div class="col-2"><a href="#" data-target="nav-mobile" title="Expert Bells Mobile Menu" class="sidenav-trigger m-menu"><i class="fa fa-bars"></i></a></div>
            <div class="col-7"><a href="{{url('/')}}" class="brand-logo"><img class="sticky-logo" loading="lazy" src="{{asset('resources/assets/frontend/images/logo-w-mobile.svg .png')}}" alt="{{$setting->site_name}}" width="180" height="100%"></a></div>
            <div class="col-3 text-end">
              <!-- <a href="#" data-target="contact-no" class="sidenav-trigger"><i class="fa fa-phone"></i></a> -->
              @if(empty(Auth::user()->email))
              <!-- <a title="Sign Up'" class="sidenav-trigger" <?php if ($active == 'Sign Up') echo "class='hover'"; ?> href="{!! url('signup') !!}">Sign Up</a> -->
              <a title="Login" class="sidenav-trigger mcolor1" <?php if ($active == 'login') echo "class='hover'"; ?> href="{!! url('login') !!}">Login</a>
              @else
              <a href="{{url('my-account')}}" class="sidenav-trigger"><i class="icofont-business-man"></i></a>
              <a class="sidenav-trigger" href="{{ url('/logout') }}" onClick="event.preventDefault();  document.getElementById('logout-form').submit();"><i class="icofont-power"></i></a>
              @endif
              <!--<a href="{{ url('cart-detail') }}" class="sidenav-trigger"><i class="icofont-cart-alt"></i><span class="CartCount">{!! Cart::count() !!}</span></a>-->
            </div>
          </div>
        </div>
        <div id="nav-mobile" class="sidenav">
          <div class="sidenavTop">
            <div class="row valign-wrapper">
              <div class="col-8"><a href="{{url('/')}}" class="brand-logo">
                <!-- <img class="sticky-logo" loading="lazy" src="{{asset('/resources/assets/uploads/logo/'.$setting->site_logo)}}" width="180" height="47" alt="{{$setting->site_name}}"> -->
                <img class="sticky-logo" loading="lazy" src="{{asset('resources/assets/frontend/images/logo-w-mobile.svg .png')}}" alt="{{$setting->site_name}}" width="180" height="100%">
              </a></div>
              <div class="col-4 text-end lh-0"><a class="CMenu"><i class="icofont-arrow-right white-text"></i></a></div>
            </div>
          </div>
          <ul class="m-0">
            <!-- <li><a title="Start Business" <?php if ($active == 'Start Business') echo "class='hover'"; ?> href=" service.php">Start Business</a></li>
            <li><a title="Registration & License" <?php if ($active == 'Registration & License') echo "class='hover'"; ?> href=" service.php">Registration & License</a></li>
            <li><a title="Tax & Compliance" <?php if ($active == 'Tax & Compliance') echo "class='hover'"; ?> href=" service.php">Tax & Compliance</a></li>
            <li><a title="Trademark & Copyright" <?php if ($active == 'Trademark & Copyright') echo "class='hover'"; ?> href=" service.php">Trademark & Copyright</a></li>
            <li><a title="E-Commerce" <?php if ($active == 'E-Commerce') echo "class='hover'"; ?> href="service.php">E-Commerce</a></li>
            <li><a title="Contact Us" <?php if ($active == 'Contact Us') echo "class='hover'"; ?> href="contact-us.php">Contact Us</a></li> -->
            @php
            $Level1 = DB::table('nav_category')->where(['parent'=>0,'level'=>1,'status'=>1])->get();
            @endphp
            @foreach($Level1 as $i)
            @php
            $asd = DB::table('nav_category')->where(['parent'=>$i->id,'status'=>1,'menu_status'=>1])->count();
            @endphp
            @if($asd!=0)
            <li><a title="{{$i->title}}" class="dropdown-trigger" href="#" data-target="m{{$i->id}}">{{$i->title}} <i class="icofont-thin-down right"></i></a>
              <div id="m{{$i->id}}" class="dropdown-content full-width">
                <div class="row">
                  @php
                  $Level2 = DB::table('nav_category')->where(['parent'=>$i->id,'status'=>1,'level'=>2,'menu_status'=>1])->get();
                  @endphp
                  @foreach($Level2 as $j)
                  <div class="col-12 col-lg-6">
                    <h6>{{$j->title}}</h6>
                    <ul class="float-none w-100">
                      @php
                      $Level3 = DB::table('nav_category')->where(['parent'=>$j->id,'status'=>1,'level'=>3,'menu_status'=>1])->get();
                      @endphp
                      @foreach($Level3 as $k)
                      <li><a href="{{route('service',$k->alias)}}" title="{{$k->title}}">{{$k->title}}</a></li>
                      @endforeach
                    </ul>
                  </div>
                  @endforeach
                </div>
              </div>
            </li>
            @else
            <li><a title="{{$i->title}}" href="{{route('service',$i->alias)}}">{{$i->title}}</a></li>
            @endif
            @endforeach
            <!-- <li><a title="Tax &amp; Compliance" href=" service.php">Tax &amp; Compliance</a></li>
            <li><a title="Trademark &amp; Copyright" href=" service.php">Trademark &amp; Copyright</a></li>
            <li><a title="E-Commerce" href=" service.php">E-Commerce</a></li> -->
            <li><a title="Contact Us" href="{{url('/contact-us')}}">Contact Us</a></li>
          </ul>
        </div>
      </div>
      <div class="container hide-on-med-and-down">
        <div class="nav-wrapper row valign-wrapper">
          <div class="col-12 col-lg-2">
            <div class="brand-logo logo t-hidd m-hidd d-flex align-items-center pt-2">
              <!-- <a href="{{url('/')}}"><img loading="lazy" src="{{asset('/resources/assets/uploads/logo/'.$setting->site_logo)}}" width="180" height="47" alt="{{$setting->site_name}}"></a> -->
              <a href="{{url('/')}}"><img loading="lazy" src="{{asset('resources/assets/frontend/images/expertbells-logo-white.png')}}" width="180" height="35" alt="{{$setting->site_name}}"></a>
            </div>
          </div>
          <div class="col-12 col-lg-9">
           <ul class="hide-on-med-and-down">
    <!-- <li><a title="Home" class='hover' href="index.php">Home</a></li> -->
    @php
        $Level1 = DB::table('nav_category')->where(['parent'=>0,'level'=>1,'status'=>1,'menu_status'=>1])->get();
    @endphp
    @if(count($Level1) > 0)
    <li>
        <a title="Services" class="menu-dropdown" href="#" data-target="menu-dropdown" style="color:white">
            Services <i class="icofont-thin-down right" style="color:white !important"></i>
        </a>
        <div id="menu-dropdown" class="dropdown-content full-width">
            <div class="row">
                <div class="col-4">
                    <ul class="float-none w-100">
                        @php
                            $count = 0;
                            $columnCount = 0;
                        @endphp
                        @foreach($Level1 as $i)
                            @php
                                $Level2 = DB::table('nav_category')->where(['parent'=>$i->id,'status'=>1,'level'=>2,'menu_status'=>1])->get();
                            @endphp
                            @foreach($Level2 as $j)
                                @if($j->title !== 'Accounting & Others')
                                    @php
                                        $Level3 = DB::table('nav_category')->where(['parent'=>$j->id,'status'=>1,'level'=>3,'menu_status'=>1])->get();
                                    @endphp
                                    <li style="background-color:white !important">
                                        <a href="#" class="subheading-link fw-bold ps-2">{{$j->title}}</a>
                                        <ul class="" style="float: left !important;">
                                            @foreach($Level3 as $k)
                                                <li>
                                                    <a href="{{route('service',$k->alias)}}" title="{{$k->title}}" class="p-2 ms-0" style="font-size:11px !important; border:none !important;">{{$k->title}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @php
                                        $count++;
                                        if ($count % 3 === 0 && !$loop->last) {
                                            echo '</ul></div>';
                                            if ($columnCount < 2) {
                                                echo '<div class="col-4">';
                                                $columnCount++;
                                            }
                                            echo '<ul class="float-none w-100">';
                                        }
                                    @endphp
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </li>
    @endif
    <!-- <li><a title="Tax &amp; Compliance" href=" service.php">Tax &amp; Compliance</a></li>
    <li><a title="Trademark &amp; Copyright" href=" service.php">Trademark &amp; Copyright</a></li>
    <li><a title="E-Commerce" href=" service.php">E-Commerce</a></li> -->
    <li><a title="Mentorship" style="color:white" href="{{url('https://www.expertbells.com/experts')}}">Mentorship</a></li>
    <li><a title="Contact Us" style="color:white" href="{{url('/contact-us')}}">Contact Us</a></li>
</ul>


          </div>
          <div class="col-12 col-lg-1">
            <!--<ul class="cart">-->
            <!--  <li><a href="{{ url('cart-detail') }}"><img loading="lazy" src="{{asset('resources/assets/frontend/images/top-icon5.webp')}}" alt="Cart" width="25" height="25"><span class="CartCount">{!! Cart::count() !!}</span></a></li>-->
            <!--</ul>-->
          </div>
        </div>
      </div>
    </nav>
  </div>
</div>

        <div id="menu" class="block sticky">
        <!-- Banner Section -->