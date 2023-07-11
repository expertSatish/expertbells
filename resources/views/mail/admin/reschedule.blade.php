<x-mail::message>
@php
    $startDateTime = \Carbon\Carbon::parse($body['slot']['booking_start_time'])->setTimezone('Asia/Kolkata');
    $startDateTimeIST = $startDateTime->format('h:i A');
    $sessionDate = $body['slot']['booking_date'];
    $sessionDates = \Carbon\Carbon::parse($sessionDate)->format('d-m-Y');
    $bookingStartTime = \Carbon\Carbon::parse($body['slot']['booking_start_time']);
    $bookingEndTime = \Carbon\Carbon::parse($body['slot']['booking_end_time']);
    $duration = $bookingStartTime->diff($bookingEndTime);
    $hours = $duration->h;
    $minutes = $duration->i;
@endphp
<h5>Hello team,</h5>

<p>Session is booked between {{$body['booking']['expert']['name']}} and {{$body['booking']['user']['name']}} is rescheduled.</p>



Updated information of your session : 

<p>Date of Session: {{$sessionDates}}</p>
<p>Session Start time: {{$startDateTimeIST}}</p>
<p>Duration of Session: {{$hours}}hr {{$minutes}} Minutes</p>


</x-mail::message>
