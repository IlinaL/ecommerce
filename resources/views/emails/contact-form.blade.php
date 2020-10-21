@component('mail::message')
#Thank you for your message<br>
<strong>Name</strong> {{$data['name'] }}<br>
<strong>Email</strong> {{$data['email'] }}<br>
<strong>Subject</strong> {{$data['subject'] }}<br>
<strong>Name</strong> {{$data['message'] }}<br>



@endcomponent
