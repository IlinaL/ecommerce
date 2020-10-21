@extends('layouts.app')

@section('style')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="panel-body">

    @if (Session::has('success'))

    <div class="alert alert-success text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p>{{ Session::get('success') }}</p>
    </div>
</div>

@endif

<style>
.StripeElement {
    border: 1px solid #ccc;
    padding: 16px 16px;
    background-color: white;
    width: 300px;

}

.StripeElement--invalid {
    border-color: #fa755a;
}

.StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
}

#cart-errors {
    color: #fefde5;
}
</style>
@endsection

@section('content')

@section('title','Checkout')

<div class="d-flex justify-content-center align-items-center form-container">

    @if (session()->has('success_message'))
    <div class="spacer"></div>
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
    @endif

    @if(count($errors) > 0)
    <div class="spacer"></div>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('checkout.store')}}" method="POST" id="payment-form"> <!-- Checkout -->
        {{ @csrf_field()}}

        <h4 class="billing-details font-weight-light text-uppercase">Billing Details</h4>
        <div class="checkout" id="forms">
            <div class="form-group">
                @if (auth()->user())

                <input type="email" id="forms" class="form-control" name="email" placeholder="E-mail address"
                    value="{{ auth()->user()->email }}" readonly>
                @else
                <input type="email" class="form-control" id="forms" name="email" value="{{ old('email') }}" required>
                @endif
            </div>
            <div class="form-group">
                <input type="text" id="forms" class="form-control" name="name" placeholder="Name"
                    value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <input type="address" id="forms" id="forms" class=" form-control" name="address" placeholder="Address"
                    value="{{ old('address') }}" required>
            </div>
            <div class="form-group">
                <input type="text" id="forms" class="form-control" name="city" placeholder="City"
                    value="{{ old('city') }}" required>
            </div>
            <div class="form-group">
                <input type="text" id="forms" class="form-control" name="postalcode" placeholder="Postal Code"
                    value="{{ old('postalcode') }}" required>
            </div>
            <div class="spacer"></div>
            <h4 class="payment-details font-weight-light text-uppercase">Payment Details</h4>

            <div class="form-group">
                <input type="text" id="forms" class="form-control" name="name_on_card" placeholder="Name on Card"
                    value="{{ old('name_on_card') }}" required>
            </div>
            <div class="form-group">

                <!-- <label for="card-element">
      Credit or debit card
    </label> -->
                <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                </div>
                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <div class="spacer"></div>
            <button type="submit" id="btn-form" class="btn  btn-lg btn-block text-uppercase"
                value="Complete Order">Complete Order</button>

    </form> <!-- END Checkout -->
</div>
</div>
@endsection

@section('script')
<script src="https://js.stripe.com/v3/" type="text/javascript"></script>

<script>
window.onload = function() {
    // Create a Stripe client.
    var stripe = Stripe(
        'pk_test_51HX8QuA7wzv4omQrFfYCRmVFkqAW2YTdaI3wUFaABtfGXLOJym9MBBXI9j2runYMMvtomvB3fu4LrhfWpoC9Oipo00P4HYqzqN'
    );

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style,
        hidePostalCode: true
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        var options = {
            name: document.getElementsByName('name_on_card').value,
            address_line1: document.getElementsByName('address').value,
            address_city: document.getElementsByName('city').value,
            address_zip: document.getElementsByName('postalcode').value,
        }

        stripe.createToken(card, options).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
}
</script>
@endsection