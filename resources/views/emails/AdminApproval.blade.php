@component('mail::message')
Requesting for Permission

User name :{{ $data['name'] }}<br>
User Email :{{ $data['email'] }}<br>
Organization or Host name :{{ $data['organizationname'] }}<br>
Facebook URL :{{ $data['fburl'] }}<br>
LinkedIn URL :{{ $data['linkedinurl'] }}<br>
Event count planning host :{{ $data['eventcount'] }}<br>
Comments :{{ $data['comments'] }}<br>
{{ $id = $data['id'] }}
{{ $url = "https://www.eventport.lk/adminapproval/$id"}}

@component('mail::button', ['url' => $url ])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
