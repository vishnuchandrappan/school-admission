@component('mail::message')
# Hi, {{$name}}


Good Day. Your account has been created successfully. Verify you account by clicking the button below.


@component('mail::button', ['url' => $url])
Verify Account
@endcomponent
<hr>

<br>
If button doesn't work, copy paste this url to your browser <a href="{{$url}}">{{$url}}</a>
<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
