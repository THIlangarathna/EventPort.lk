@component('mail::message')
# Thank you for your Participation

We would like to thank you for attending for the Event and We hope you had fun. We are looking forward to see you at the next event. We truly appreciate your support..

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
