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
<h5>Hi {{$body['slot']['expert']['name'] ?? 'Expert'}},</h5>
<p>We are delighted to inform you that your session has been successfully booked by {{$body['slot']['user']['name'] ?? 'User'}}.</p>

<p>Date of Session: {{$sessionDates}}</p>
<p>Session Start time: {{$startDateTimeIST}}</p>
<p>Duration of Session: {{$hours}}hr {{$minutes}} Minutes</p>

<p>Thank you for your commitment to mentoring and sharing your expertise with aspiring entrepreneurs. We trust that this session will be valuable and impactful for the startup seeking your guidance.</p>
<p>For any queries, please contact <a href="mailto:{{mailsupportemail()}}">{{mailsupportemail()}}</a>.</p>
Sincerely,<br>
The {!! config('app.name') !!} Team<br>
Need Help?<br>
Please feel free to contact us at <a href="mailto:{{mailsupportemail()}}">{{mailsupportemail()}}</a>
</x-mail::message>
