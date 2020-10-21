@extends('layouts.app')

@section('title', 'Contact us')

@section('content')
<div class="d-flex justify-content-center align-items-center form-container">

    <form class="lg-form text-center" method="POST" action="contact">

        @csrf
        <div>
            @if(session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message')}}
            </div>
            @endif
            <h1 class="mb-5 font-weight-light text-uppercase">Contact Us</h1>

            <div class="form-group">

                <input type="text" id="forms" class="form-control" name="name" type="text" value="{{ old('name') }}"
                    required autocomplete="name" placeholder="Name" autofocus>
                <div>{{$errors->first('name')}}</div>
            </div>

            <div class="form-group">
                <input type="email" id="forms" class="form-control" name="email" type="email" value="{{ old('email') }}"
                    required autocomplete="email" placeholder="E-mail address">
                <div>{{$errors->first('email')}}</div>
            </div>

            <div class="form-group">
                <input type="subject" id="forms" class="form-control" name="subject" type="subject"
                    value="{{ old('subject') }}" required autocomplete="subject" placeholder="Subject ">
                <div>{{$errors->first('subject')}}</div>
            </div>

            <div class="form-group">
                <textarea name="message" class="form-control" id="forms" rows="6" value="{{ old('message') }}" required
                    autocomplete="message" placeholder="Message"></textarea>
                <div>{{$errors->first('message')}}</div>
            </div>

            <button type="submit" id="btn-form" class="btn mt-5  btn-lg btn-block text-uppercase"
                value="Send Message">Send Message</button>

    </form>
</div>
@endsection