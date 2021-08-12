@component('mail::message')
# Invitation

We would like to thank you for attending for the Event and We hope you had fun. We are looking forward to see you at the next event. We truly appreciate your support.

Event Name : {{ $data['eventname'] }}<br>
Event Description : {{ $data['description'] }}<br>
Event Venue : {{ $data['venue'] }}<br>
Event Date : {{ $data['date'] }}<br>
Event Start time : {{ $data['starttime'] }}<br>
Event End time: {{ $data['endtime'] }}<br>
{{ $id = $data['id'] }}
{{ $url = "https://www.eventport.lk/confirm/$id"}}

@component('mail::button', ['url' => $url ])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
