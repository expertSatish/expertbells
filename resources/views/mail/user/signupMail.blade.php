<x-mail::message>
<h5>Hi` {{$body['data']['name']}}</h5>

<p>Congratulations on joining ExpertBells! Your profile is now active, granting you access to India's top startup mentors across various industries. Take advantage of this opportunity to accelerate your startup's growth.

Here are the next steps:

1.Browse Mentors: Explore our diverse mentor pool and filter them based on your specific needs.

2.Select Your Mentor: Choose the mentor whose expertise aligns with your goals and aspirations.

3.Book a Session: Secure your session with your selected mentor and gain valuable insights for your startup.</p>

<p>With ExpertBells, you have the power to tap into the knowledge and experience of seasoned mentors. Don't wait any longer—book your session now and unlock your startup's potential.

</p>
<p>if you any query please contact us on <a href="mailto:{{mailsupportemail()}}">{{mailsupportemail()}}</a></p>
Sincerely<br>
The {!! config('app.name') !!} Team,<br>
Need Help ?<br>
Please feel free to contact us at <a href="mailto:{{mailsupportemail()}}">{{mailsupportemail()}}</a>
</x-mail::message>
