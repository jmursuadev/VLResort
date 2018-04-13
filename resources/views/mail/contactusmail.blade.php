@component('mail::message')
Hi Villa Resort,<br><br>
Inquiry: {{ $data['sendersubject'] }}<br><br>
- {{ $data['sendercontent'] }}<br><br>
- Email was sent by {{ $data['senderemail'] }}<br><br>
- This Mail is Auto-generated please don't reply.
@component('mail::button', ['url' => env('APP_URL')])
Visit website
@endcomponent
Thanks,<br>
{{ $data['sendername'] }}
@endcomponent