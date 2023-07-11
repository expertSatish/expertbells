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
<p>Session is booked between {{$body['slot']['expert']['name'] ?? 'Expert'}} and {{$body['slot']['user']['name'] ?? 'Expert'}}.</p>

<p>Date of Session: {{$sessionDates}}</p>
<p>Session Start time: {{$startDateTimeIST}}</p>
<p>Duration of Session: {{$hours}}hr {{$minutes}} Minutes</p>
Amount Paid: INR {{$body['slot']['paid_amount']}} /-
<p>For any query please contact <a href="mailto:{{mailsupportemail()}}">{{mailsupportemail()}}</a></p>
Sincerely<br>
The {!! config('app.name') !!} Team,<br>
Need Help ?<br>
Please feel free to contact us at <a href="mailto:{{mailsupportemail()}}">{{mailsupportemail()}}</a>
</x-mail::message>
