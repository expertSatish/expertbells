function goBack(){window.history.back()}function maxLengthCheck(e){e.value.length>e.maxLength&&(e.value=e.value.slice(0,e.maxLength))}function increment_val(){var e=$("#qty").val(),t=parseInt(e)+1;$("#qty").val(t)}function decrement_quantity(){var e=$("#qty").val(),t=$("#qty");if($(t).val()>1){var o=parseInt(e)-1;$("#qty").val(o)}}function counter(){var e=setInterval((function(){var t=parseInt($(".preloader-counter").text());$(".preloader-counter").text((++t).toString()),100==t&&(clearInterval(e),$(".preloader-counter").addClass("hide"),$(".preloader").addClass("active"))}),40)}$((function(){$("[data-bs-toggle=tooltip").tooltip()})),counter(),$(document).ready((function(){var e=window.location;$(".navbar .LastH li a").filter((function(){return this.href==e})).parent().addClass("active"),$(".navbar .LastH li .dropdown-menu a").filter((function(){return this.href==e})).closest(".nav-item").addClass("active").closest(".dropdown").addClass("active");var t,o=jQuery(".SerMenu"),n=o.outerHeight()+-100,a=o.find('a[href*="#"]'),r=a.map((function(){var e=jQuery(this).attr("href"),t=e.substring(e.indexOf("#")),o=jQuery(t);if(o.length)return o}));a.click((function(e){var t=jQuery(this).attr("href"),o=t.substring(t.indexOf("#"));offsetTop="#"===t?0:jQuery(o).offset().top-n+3,jQuery("html, body").stop().animate({scrollTop:offsetTop},300),e.preventDefault()})),jQuery(window).scroll((function(){var e=jQuery(this).scrollTop()+n,t=r.map((function(){if(jQuery(this).offset().top<e)return this})),o=(t=t[t.length-1])&&t.length?t[0].id:"";a.parent().removeClass("active"),o&&a.parent().end().filter("[href*='#"+o+"']").parent().addClass("active")})),$(".SearchBox .dropdown-menu").find("a").click((function(e){e.preventDefault();$(this).attr("href").replace("#","");var t=$(this).text();$(".SearchBox #search_concept").text(t)})),$(document).click((function(e){$(e.target).is("#navigatin , #navigatin *")})),$(".menubar").click((function(e){"true"===$(this).attr("aria-expanded")?($("body").css("overflow","hidden"),e.stopPropagation()):"false"===$(this).attr("aria-expanded")&&($("body").css("overflow","inherit"),e.stopPropagation())})),$(".MenuBar .logo .navbar-toggler").click((function(e){$("body").css("overflow","inherit")})),$(".counter-count").each((function(){$(this).prop("Counter",0).animate({Counter:$(this).text()},{duration:5e3,easing:"swing",step:function(e){$(this).text(Math.ceil(e))}})})),$(window).width()>992&&($(".MenuLeft").addClass("show"),$(window).scroll((function(){$(this).scrollTop()>38?$(".navbar.menu>.st").addClass("is-fixed"):$(".navbar.menu>.st").removeClass("is-fixed"),$(this).scrollTop()>50?$("#scroll-top").fadeIn():$("#scroll-top").fadeOut()}))),$(window).width()<991&&$(window).scroll((function(){$(this).scrollTop()>60?($(".navbar.menu>.st").addClass("is-fixed"),$(".BuyBtnBox").addClass("fullboxby"),$(".cartbox.right .card-footer").addClass("fullboxby")):($(".navbar.menu>.st").removeClass("is-fixed"),$(".BuyBtnBox").removeClass("fullboxby"),$(".cartbox.right .card-footer").removeClass("fullboxby")),$(this).scrollTop()>50?$("#scroll-top").fadeIn():$("#scroll-top").fadeOut()})),$("#scroll-top").click((function(){return $("body,html").animate({scrollTop:0},600),!1})),$(".SignUpMobal").click((function(){$("#login").hasClass("show")&&($("#login").modal("hide"),$("#SignUp").modal("show"),$("body").addClass("modal-SignUp"))})),$(".LoginMobal").click((function(){$("#SignUp").hasClass("show")&&($("#SignUp").modal("hide"),$("body").removeClass("modal-SignUp"),$("#login").modal("show"))})),$(".btn-close").click((function(){$("body").removeClass("modal-SignUp")})),$("#loginsec").click((function(){$(".ForgotSec").removeClass("active"),$(".LoginSec").addClass("active")})),$("#fpsec").click((function(){$(".LoginSec").removeClass("active"),$(".ForgotSec").addClass("active")})),$("#lpass-icon").click((function(){$(this).hasClass("fa-eye")?($(this).removeClass("fa-eye"),$(this).addClass("fa-eye-slash"),$(".lpass").attr("type","password")):($(this).removeClass("fa-eye-slash"),$(this).addClass("fa-eye"),$(".lpass").attr("type","text"))})),$("#npass-icon").click((function(){$(this).hasClass("fa-eye")?($(this).removeClass("fa-eye"),$(this).addClass("fa-eye-slash"),$(".npass").attr("type","password")):($(this).removeClass("fa-eye-slash"),$(this).addClass("fa-eye"),$(".npass").attr("type","text"))})),$("#cpass-icon").click((function(){$(this).hasClass("fa-eye")?($(this).removeClass("fa-eye"),$(this).addClass("fa-eye-slash"),$(".cpass").attr("type","password")):($(this).removeClass("fa-eye-slash"),$(this).addClass("fa-eye"),$(".cpass").attr("type","text"))})),$(".CountrySelect .dropdown-menu").find("li").click((function(e){e.preventDefault();var o=$(this).data("code"),n=$(this).data("text"),a=$(this).data("code");$(".CountrySelect #CountryName").text(o),$(".CountrySelect a .flagicon").removeClass("fi-"+t).addClass("fi-"+a),$(".CountrySelect #ccode").val(n),t=a})),$(".CurrencySelect .dropdown-menu").find("li").click((function(e){e.preventDefault();var t=$(this).data("code"),o=$(this).data("name");$(".CurrencySelect .dropdown-toggle i").text(t),$(".CurrencySelect .dropdown-toggle span").text(o)})),$(window).width()<991&&($("#AccMenuBar").removeClass("d-none"),$("#AccountMenu").addClass("collapse")),$(".countrylist .SearchConCode").on("keyup",(function(){val=$(this).val().toLowerCase(),$(".countrylist li").each((function(){$(this).toggle($(this).text().toLowerCase().includes(val))}))})),$(".MenuAll .Mmenu").click((function(e){e.stopPropagation()}))})),jQuery.event.special.touchstart={setup:function(e,t,o){this.addEventListener("touchstart",o,{passive:!t.includes("noPreventDefault")})}},jQuery.event.special.touchmove={setup:function(e,t,o){this.addEventListener("touchmove",o,{passive:!t.includes("noPreventDefault")})}};let isNumber=e=>{let t=e.which?e.which:e.keyCode;return!(46!=t&&t>31&&(t<48||t>57))};function clearAllInterval(){const e=window.setInterval((function(){}),Number.MAX_SAFE_INTEGER);for(let t=1;t<e;t++)window.clearInterval(t)}function sendEmailVerificationotp(){let e=$("input[name=email]").val();$(".email-error").html(""),$(".evsbtn").hide(),$(".evpbtn").show(),$.ajax({data:{email:e,_token:$("meta[name=csrf-token]").attr("content")},dataType:"Json",method:"POST",url:UserEmailVerify,success:function(e){toastr.success(e.success),$(this).hide(),$(".CustomerInfo+.OTPbox").show(),$("input[name=oldemailotp]").val(e.otp),$(".resendcounter").show(),$(".resendemail").hide(),$(".evsbtn").hide(),$(".evpbtn").hide();var t=setInterval((function(){o=Number(o)-1,n.innerText=o+"s",0==o&&(clearInterval(t),$("#seconds-counter").html("30s"),$(".resendcounter").hide(),$(".resendemail").show())}),1e3),o=30,n=document.getElementById("seconds-counter")},error:function(e){void 0!==e.responseJSON.errors.email&&$(".email-error").text(e.responseJSON.errors.email),$(".evsbtn").show(),$(".evpbtn").hide()}})}function sendMobileVerificationotp(){let e=$("input[name=mobile]").val();$(".mobile-error").html(""),$(".mvsbtn").hide(),$(".mvpbtn").show(),$.ajax({data:{mobile:e,_token:$("meta[name=csrf-token]").attr("content")},dataType:"Json",method:"POST",url:UserMobileVerify,success:function(e){toastr.success(e.success),$(this).hide(),$(".CountryBox+.OTPbox").show(),$("input[name=oldmobileotp]").val(e.otp),$(".m-resendcounter").show(),$(".m-resendemail").hide(),$(".mvsbtn").show(),$(".mvpbtn").hide(),$(".otppre").html("OTP is : "+e.otp);var t=setInterval((function(){o=Number(o)-1,n.innerText=o+"s",0==o&&(clearInterval(t),$("#m-seconds-counter").html("30s"),$(".m-resendcounter").hide(),$(".m-resendemail").show())}),1e3),o=30,n=document.getElementById("m-seconds-counter")},error:function(e){void 0!==e.responseJSON.errors.mobile&&$(".mobile-error").text(e.responseJSON.errors.mobile),$(".mvsbtn").show(),$(".mvpbtn").hide()}})}function userlogin(){$(".error").html(""),$(".usbtn").hide(),$(".uvpbtn").show();let e=$(".uemailnmobile").val();clearAllInterval(),$.ajax({data:{_token:$("meta[name=csrf-token]").attr("content"),email:e},url:UserLoginUrl,method:"POST",dataType:"Json",success:function(t){let o=String(e).slice(0,2),n=String(e).slice(-3);toastr.success(t.success),$(".UserLogin .OTPbox").show(),$(".usersendfor").html("Sent to <strong>"+o+"*******"+n+"</strong>");var a=30;$(".userresendcounter").show(),$(".userresendemail").hide();var r=setInterval((function(){a=Number(a)-1,s.innerText=a+"s",0==a&&(clearInterval(r),$("#user-seconds-counter").html("30s"),$(".userresendcounter").hide(),$(".userresendemail").show())}),1e3),s=document.getElementById("user-seconds-counter");$(".usbtn").show(),$(".uvpbtn").hide(),$(".userotppreview").html("Your Otp Is: "+t.otp)},error:function(e){void 0!==e.responseJSON.errors.email&&$(".u-email-error").text(e.responseJSON.errors.email),void 0!==e.responseJSON.errors.terms_conditions&&$(".trmer2").text(e.responseJSON.errors.terms_conditions),$(".UserLogin .OTPbox").hide(),clearAllInterval(),$(".usbtn").show(),$(".uvpbtn").hide()}})}function expertlogin(){$(".error").html(""),$(".esbtn").hide(),$(".evpbtn").show();let e=$("input[name=e_email_mobile]").val();clearAllInterval(),$.ajax({data:{_token:$("meta[name=csrf-token]").attr("content"),email:e},url:ExpertLoginUrl,method:"POST",dataType:"Json",success:function(t){let o=String(e).slice(0,2),n=String(e).slice(-3);toastr.success(t.success),$(".ExpertLogin .OTPbox").show(),$(".expertsendfor").html("Sent to <strong>"+o+"*******"+n+"</strong>");var a=30;$(".expertresendcounter").show(),$(".expertresendemail").hide();var r=setInterval((function(){a=Number(a)-1,s.innerText=a+"s",0==a&&(clearInterval(r),$("#expert-seconds-counter").html("30s"),$(".expertresendcounter").hide(),$(".expertresendemail").show())}),1e3),s=document.getElementById("expert-seconds-counter");$(".esbtn").show(),$(".evpbtn").hide(),$(".expertotppreview").html("Your Otp Is: "+t.otp)},error:function(e){void 0!==e.responseJSON.errors.email&&$(".e-email-error").text(e.responseJSON.errors.email),void 0!==e.responseJSON.errors.terms_and_conditions&&$(".trmer").text(e.responseJSON.errors.terms_and_conditions),$(".ExpertLogin .OTPbox").hide(),clearAllInterval(),$(".esbtn").show(),$(".evpbtn").hide()}})}function generatescheduledchart(){$(".ScheduledChatBox").html('<div class="text-center my-5"><i class="fad fa-spinner-third fa-spin" style="font-size:15px;"></i> Loading...</div>');const e=$("select[name=scheduledyear]").val();$.ajax({url:scheduledcharturl,data:{year:e},method:"Get",dataType:"Json",success:function(e){const t={type:"line",data:{labels:[e.month[0],e.month[1],e.month[2],e.month[3],e.month[4],e.month[5],e.month[6],e.month[7],e.month[8],e.month[9],e.month[10],e.month[11]],datasets:[{label:"Scheduled Calls",backgroundColor:"rgb(19 94 173)",borderColor:"rgb(19 94 173)",data:[e.data[0],e.data[1],e.data[2],e.data[3],e.data[4],e.data[5],e.data[6],e.data[7],e.data[8],e.data[9],e.data[10],e.data[11]]}]},options:{}};$(".ScheduledChatBox").html('<canvas id="myChart"></canvas>');var o=document.getElementById("myChart").getContext("2d");new Chart(o,t)}})}function generateclosescheduledchart(){$(".CloseScheduledChatBox").html('<div class="text-center my-5"><i class="fad fa-spinner-third fa-spin" style="font-size:15px;"></i> Loading...</div>');const e=$("select[name=closescheduledyear]").val();$.ajax({url:closescheduledcharturl,data:{year:e},method:"Get",dataType:"Json",success:function(e){const t={type:"line",data:{labels:[e.month[0],e.month[1],e.month[2],e.month[3],e.month[4],e.month[5],e.month[6],e.month[7],e.month[8],e.month[9],e.month[10],e.month[11]],datasets:[{label:"Close Scheduled",backgroundColor:"rgb(255 99 132)",borderColor:"rgb(255 99 132)",data:[e.data[0],e.data[1],e.data[2],e.data[3],e.data[4],e.data[5],e.data[6],e.data[7],e.data[8],e.data[9],e.data[10],e.data[11]]}]},options:{}};$(".CloseScheduledChatBox").html('<canvas id="myChart2"></canvas>');var o=document.getElementById("myChart2").getContext("2d");new Chart(o,t)}})}function generaterescheduledchart(){$(".ReScheduledChatBox").html('<div class="text-center my-5"><i class="fad fa-spinner-third fa-spin" style="font-size:15px;"></i> Loading...</div>');const e=$("select[name=rescheduledyear]").val();$.ajax({url:rescheduledcharturl,data:{year:e},method:"Get",dataType:"Json",success:function(e){const t={type:"line",data:{labels:[e.month[0],e.month[1],e.month[2],e.month[3],e.month[4],e.month[5],e.month[6],e.month[7],e.month[8],e.month[9],e.month[10],e.month[11]],datasets:[{label:"Rescheduled Calls",backgroundColor:"rgb(32 185 5)",borderColor:"rgb(32 185 5)",data:[e.data[0],e.data[1],e.data[2],e.data[3],e.data[4],e.data[5],e.data[6],e.data[7],e.data[8],e.data[9],e.data[10],e.data[11]]}]},options:{}};$(".ReScheduledChatBox").html('<canvas id="myChart3"></canvas>');var o=document.getElementById("myChart3").getContext("2d");new Chart(o,t)}})}function generatepiechart(){$(".PieChatBox").html('<div class="text-center my-5"><i class="fad fa-spinner-third fa-spin" style="font-size:15px;"></i> Loading...</div>');const e=$("select[name=pieyear]").val();$.ajax({url:generatepiecharturl,data:{year:e},method:"Get",dataType:"Json",success:function(e){const t={type:"pie",data:{labels:["Scheduled Calls","Close Calls","Rescheduled Calls"],datasets:[{label:"My First Dataset",data:[e.data[0],e.data[1],e.data[2]],backgroundColor:["rgb(54, 162, 235)","rgb(255, 99, 132)","rgb(255, 205, 86)"],hoverOffset:4}]}};$(".PieChatBox").html('<canvas id="mypie" style="max-width:230px;margin:0 auto"></canvas>');var o=document.getElementById("mypie").getContext("2d");new Chart(o,t)}})}function generatematerialchart(){$(".MaterialChatBox").html('<div class="text-center my-5"><i class="fad fa-spinner-third fa-spin" style="font-size:15px;"></i> Loading...</div>');const e=$("select[name=materialyear]").val();$.ajax({url:generatematerialcharturl,data:{year:e},method:"Get",dataType:"Json",success:function(e){google.charts.load("current",{packages:["bar"]}),google.charts.setOnLoadCallback((function(){var t=google.visualization.arrayToDataTable([["Month","Booking","Tax","TDS","Earning"],e.data[0],e.data[1],e.data[2],e.data[3],e.data[4],e.data[5],e.data[6],e.data[7],e.data[8],e.data[9],e.data[10],e.data[11]]);$(".MaterialChatBox").html('<div id="multi" class="w-100" style="height:400px"></div>');var o=document.getElementById("multi");new google.charts.Bar(o).draw(t,google.charts.Bar.convertOptions({chart:{subtitle:"Year 2022"}}))}))}})}function f1(){document.execCommand("bold",!1,null)}function f10(){document.execCommand("underline",!1,null)}function f2(){document.execCommand("italic",!1,null)}function f3(){document.getElementById("fake_textarea").style.textAlign="left"}function f4(){document.getElementById("fake_textarea").style.textAlign="center"}function f5(){document.getElementById("fake_textarea").style.textAlign="right"}function f6(){let e=$("#fake_textarea").html(),t=getSelectionText(),o=t.toUpperCase();t=e.replace(t,o),$("#fake_textarea").html(t)}function f7(){let e=$("#fake_textarea").html(),t=getSelectionText(),o=t.toLowerCase();t=e.replace(t,o),$("#fake_textarea").html(t)}function f8(){let e=$("#fake_textarea").html(),t=getSelectionText(),o=t.toLowerCase().replace(/\b./g,(function(e){return e.toUpperCase()}));t=e.replace(t,o),$("#fake_textarea").html(t)}function f9(){$("#fake_textarea").html(""),$("#fake_textarea").css("")}function f11(){let e=$("#fake_textarea").html(),t=getSelectionText();if(""!=t){let o='<span style="font-size:15px;">'+t+"</span>";t=e.replace(t,o),$("#fake_textarea").html(t)}}function f12(){let e=$("#fake_textarea").html(),t=getSelectionText();if(""!=t){let o='<span style="font-size:20px;">'+t+"</span>";t=e.replace(t,o),$("#fake_textarea").html(t)}}function f13(){let e=$("#fake_textarea").html(),t=getSelectionText();if(""!=t){let o='<span style="font-size:25px;">'+t+"</span>";t=e.replace(t,o),$("#fake_textarea").html(t)}}function f14(){let e=$("#fake_textarea").html(),t=getSelectionText();if(""!=t){let o='<span style="font-size:30px;">'+t+"</span>";t=e.replace(t,o),$("#fake_textarea").html(t)}}function getSelectionText(){var e="";return window.getSelection?e=window.getSelection().toString():document.selection&&"Control"!=document.selection.type&&(e=document.selection.createRange().text),e}$(document).on("keypress",".inputTextBox",(function(e){var t=new RegExp("^[a-zA-Z ]+$"),o=String.fromCharCode(e.charCode?e.charCode:e.which);if(!t.test(o))return e.preventDefault(),!1})),$(".mobileformbtn").on("click",(function(){sendMobileVerificationotp()})),$(".resendemobileformbtn").on("click",(function(){sendMobileVerificationotp()})),$(".emailformbtn").on("click",(function(){sendEmailVerificationotp()})),$(".resendemailformbtn").on("click",(function(){sendEmailVerificationotp()})),$(".mvcsbtn").on("click",(function(){let e=$("input[name=mobileotp1]").val(),t=$("input[name=mobileotp2]").val(),o=$("input[name=mobileotp3]").val(),n=$("input[name=mobileotp4]").val(),a=$("input[name=oldmobileotp]").val();$(".mobileotp-error").html(""),$(".mvcsbtn").hide(),$(".mvcpbtn").show();let r=e+t+o+n;1==isNaN(parseInt(e))?($("input[name=mobileotp1]").focus(),$(".mvcsbtn").show(),$(".mvcpbtn").hide()):1==isNaN(parseInt(t))?($("input[name=mobileotp2]").focus(),$(".mvcsbtn").show(),$(".mvcpbtn").hide()):1==isNaN(parseInt(o))?($("input[name=mobileotp3]").focus(),$(".mvcsbtn").show(),$(".mvcpbtn").hide()):1==isNaN(parseInt(n))?($("input[name=mobileotp4]").focus(),$(".mvcsbtn").show(),$(".mvcpbtn").hide()):a!=r?($(".mobileotp-error").html("Invalid OTP!"),$("input[name=mobileotp1]").val(""),$("input[name=mobileotp2]").val(""),$("input[name=mobileotp3]").val(""),$("input[name=mobileotp4]").val(""),$(".mvcsbtn").show(),$(".mvcpbtn").hide()):($(".MobileOTPbox").hide(),$(".mvspbtn").show(),$(".mvpbtn").hide(),$(".mvsbtn").hide(),$("input[name=mobileverify]").val(1))})),$(".evcsbtn").on("click",(function(){let e=$("input[name=emailotp1]").val(),t=$("input[name=emailotp2]").val(),o=$("input[name=emailotp3]").val(),n=$("input[name=emailotp4]").val(),a=$("input[name=oldemailotp]").val();$(".emailotp-error").html("");let r=e+t+o+n;1==isNaN(parseInt(e))?$("input[name=emailotp1]").focus():1==isNaN(parseInt(t))?$("input[name=emailotp2]").focus():1==isNaN(parseInt(o))?$("input[name=emailotp3]").focus():1==isNaN(parseInt(n))?$("input[name=emailotp4]").focus():a!=r?($(".emailotp-error").html("Invalid OTP!"),$("input[name=emailotp1]").val(""),$("input[name=emailotp2]").val(""),$("input[name=emailotp3]").val(""),$("input[name=emailotp4]").val("")):($(".EmailOTPbox").hide(),$(".evspbtn").show(),$(".evpbtn").hide(),$("input[name=emailverify]").val(1))})),$(".step1form").on("submit",(function(e){e.preventDefault(),$(".sbtn").hide(),$(".pbtn").show(),$(".error").html(""),$.ajax({data:new FormData(this),url:UserFirstStepUrl,method:"POST",dataType:"Json",cache:!1,contentType:!1,processData:!1,success:function(e){window.location.href=e.redirect},error:function(e){void 0!==e.responseJSON.errors.first_name&&$(".first-error").text(e.responseJSON.errors.first_name),void 0!==e.responseJSON.errors.mobile&&$(".mobile-error").text(e.responseJSON.errors.mobile),void 0!==e.responseJSON.errors.mobileverify&&$(".mobile-error").text(e.responseJSON.errors.mobileverify),void 0!==e.responseJSON.errors.email&&$(".email-error").text(e.responseJSON.errors.email),void 0!==e.responseJSON.errors.emailverify&&$(".email-error").text(e.responseJSON.errors.emailverify),void 0!==e.responseJSON.errors.password&&$(".password-error").text(e.responseJSON.errors.password),void 0!==e.responseJSON.errors.billing_address&&$(".address-error").text(e.responseJSON.errors.billing_address),$(".sbtn").show(),$(".pbtn").hide()}})})),$(".lresendemobileformbtn").on("click",(function(e){userlogin()})),$(".userloginform").on("click",(function(e){userlogin()})),$(".checkuserloginotp").on("submit",(function(e){let t=$("input[name=usermobileotp1]").val(),o=$("input[name=usermobileotp2]").val(),n=$("input[name=usermobileotp3]").val(),a=$("input[name=usermobileotp4]").val();$(".user-mobileotp-error").html(""),$(".otpsvbtn").hide(),$(".otppcbtn").show();let r=t+o+n+a;if(e.preventDefault(),1==isNaN(parseInt(t)))$("input[name=usermobileotp1]").focus(),$(".otpsvbtn").show(),$(".otppcbtn").hide();else if(1==isNaN(parseInt(o)))$("input[name=usermobileotp2]").focus(),$(".otpsvbtn").show(),$(".otppcbtn").hide();else if(1==isNaN(parseInt(n)))$("input[name=usermobileotp3]").focus(),$(".otpsvbtn").show(),$(".otppcbtn").hide();else if(1==isNaN(parseInt(a)))$("input[name=usermobileotp4]").focus(),$(".otpsvbtn").show(),$(".otppcbtn").hide();else{let e=new FormData(this);e.append("otp",r),e.append("email",$(".uemailnmobile").val()),$.ajax({data:e,url:UserLoginCheckOtp,method:"POST",dataType:"Json",cache:!1,contentType:!1,processData:!1,success:function(e){window.location.href=e.redirect},error:function(e){void 0!==e.responseJSON.errors.otp&&$(".user-mobileotp-error").text(e.responseJSON.errors.otp),void 0!==e.responseJSON.errors.email&&$(".u-email-error").text(e.responseJSON.errors.email),$("input[name=usermobileotp1]").val(""),$("input[name=usermobileotp2]").val(""),$("input[name=usermobileotp3]").val(""),$("input[name=usermobileotp4]").val(""),$(".otpsvbtn").show(),$(".otppcbtn").hide()}})}})),$(".expertresendeformbtn").on("click",(function(e){expertlogin()})),$(".expertloginform").on("click",(function(e){expertlogin()})),$(".checkexpertloginotp").on("submit",(function(e){let t=$("input[name=expertmobileotp1]").val(),o=$("input[name=expertmobileotp2]").val(),n=$("input[name=expertmobileotp3]").val(),a=$("input[name=expertmobileotp4]").val();$(".expert-mobileotp-error").html(""),$(".eotpsvbtn").hide(),$(".eotppcbtn").show();let r=t+o+n+a;if(e.preventDefault(),1==isNaN(parseInt(t)))$("input[name=expertmobileotp1]").focus(),$(".eotpsvbtn").show(),$(".eotppcbtn").hide();else if(1==isNaN(parseInt(o)))$("input[name=expertmobileotp2]").focus(),$(".eotpsvbtn").show(),$(".eotppcbtn").hide();else if(1==isNaN(parseInt(n)))$("input[name=expertmobileotp3]").focus(),$(".eotpsvbtn").show(),$(".eotppcbtn").hide();else if(1==isNaN(parseInt(a)))$("input[name=expertmobileotp4]").focus(),$(".eotpsvbtn").show(),$(".eotppcbtn").hide();else{let e=new FormData(this);e.append("otp",r),e.append("email",$("input[name=e_email_mobile]").val()),$.ajax({data:e,url:ExpertLoginCheckOtp,method:"POST",dataType:"Json",cache:!1,contentType:!1,processData:!1,success:function(e){window.location.href=e.redirect},error:function(e){void 0!==e.responseJSON.errors.otp&&$(".expert-mobileotp-error").text(e.responseJSON.errors.otp),void 0!==e.responseJSON.errors.email&&$(".e-email-error").text(e.responseJSON.errors.email),$("input[name=expertmobileotp1]").val(""),$("input[name=expertmobileotp2]").val(""),$("input[name=expertmobileotp3]").val(""),$("input[name=expertmobileotp4]").val(""),$(".eotpsvbtn").show(),$(".eotppcbtn").hide()}})}})),$(".newsletterform").on("submit",(function(e){$(".ncsbtn").hide(),$(".nspbtn").show(),e.preventDefault(),$.ajax({data:new FormData(this),url:newsletterform,method:"POST",dataType:"Json",cache:!1,contentType:!1,processData:!1,success:function(e){$(".newsletterform").trigger("reset"),toastr.success(e.message),$(".ncsbtn").show(),$(".nspbtn").hide()},error:function(e){void 0!==e.responseJSON.errors.subscribe_email&&toastr.error(e.responseJSON.errors.subscribe_email),$(".ncsbtn").show(),$(".nspbtn").hide()}})})),$(".jobapply").on("submit",(function(e){$(".error").html(""),$(".jsvbtn").hide(),$(".jpbtn").show(),e.preventDefault(),$.ajax({data:new FormData(this),url:RequestJobUrl,method:"POST",dataType:"Json",cache:!1,contentType:!1,processData:!1,success:function(e){$(".jsvbtn").show(),$(".jpbtn").hide(),$(".jobapply").trigger("reset"),toastr.options={closeButton:!0,progressBar:!0},toastr.success(e.success),$("#ApplyPopup").modal("hide")},error:function(e){void 0!==e.responseJSON.errors.name&&$(".name-error").text(e.responseJSON.errors.name),void 0!==e.responseJSON.errors.email&&$(".email-error").text(e.responseJSON.errors.email),void 0!==e.responseJSON.errors.phone&&$(".phone-error").text(e.responseJSON.errors.phone),void 0!==e.responseJSON.errors.experience&&$(".experience-error").text(e.responseJSON.errors.experience),void 0!==e.responseJSON.errors.message&&$(".message-error").text(e.responseJSON.errors.message),void 0!==e.responseJSON.errors.resume&&$(".resume-error").text(e.responseJSON.errors.resume),$(".jsvbtn").show(),$(".jpbtn").hide()}})})),$(".comtform").on("submit",(function(e){$(".error").html(""),$(".bcsbtn").hide(),$(".bcpbtn").show(),e.preventDefault(),$.ajax({data:new FormData(this),url:commentform,method:"POST",dataType:"Json",cache:!1,contentType:!1,processData:!1,success:function(e){$(".bcsbtn").show(),$(".bcpbtn").hide(),$(".comtform").trigger("reset"),toastr.options={closeButton:!0,progressBar:!0},toastr.success(e.message)},error:function(e){void 0!==e.responseJSON.errors.name&&$(".nmerr").text(e.responseJSON.errors.name),void 0!==e.responseJSON.errors.email&&$(".emerr").text(e.responseJSON.errors.email),void 0!==e.responseJSON.errors.message&&$(".cmerr").text(e.responseJSON.errors.message),$(".bcsbtn").show(),$(".bcpbtn").hide()}})}));