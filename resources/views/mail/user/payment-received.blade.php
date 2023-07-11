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

<h5>Hi` {{$body['slot']['user']['name'] ?? $body['slot']['user_name']}},</h5>
<p>We are delighted to inform you that your session with {{$body['slot']['expert']['name'] ?? Expert}}, has been successfully booked.</p>
<p>Date of Session: {{$sessionDates}}</p>
<p>Session Start time: {{$startDateTimeIST}}</p>
<p>Duration of Session: {{$hours}}hr {{$minutes}} Minutes</p>
Amount Paid: INR {{$body['slot']['paid_amount']}} /-

<p>Thank you for choosing Expertbells for your mentorship needs. We wish you a productive and insightful session. For further queries or require assistance, please feel free to reach out to us.
</p>
<p>if you any query please contact us on <a href="mailto:{{mailsupportemail()}}">{{mailsupportemail()}}</a></p>
Sincerely<br>
The {!! config('app.name') !!} Team,<br>
Need Help ?<br>
Please feel free to contact us at <a href="mailto:{{mailsupportemail()}}">{{mailsupportemail()}}</a>
</x-mail::message>


