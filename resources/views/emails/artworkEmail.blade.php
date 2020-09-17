@component('mail::message')
# Introduction

Hallo {{ $data['friend_name']}}, {{$data['your_name']}}({{$data['your_email']}}) wilt graag dit kunstwerk onder uw aandacht brengen. 


@component('mail::button', ['url' => $data['url']])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
