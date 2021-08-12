@component('mail::message')
Approval

Dear {{ $data }},<br>
You have been Approved!

https://www.eventport.lk

Thanks,<br>
{{ config('app.name') }}
@endcomponent
