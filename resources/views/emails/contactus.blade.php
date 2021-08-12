@component('mail::message')
Contact Us

Name :{{ $data['name'] }}<br>
Email :{{ $data['email'] }}<br>
Subject :{{ $data['subject'] }}<br>
Message :{{ $data['message'] }}<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
