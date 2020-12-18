
@push('css')
    <style>
        /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
    </style>
@endpush

@push('js')
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('js/stripe.js') }}"></script>
@endpush
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shopping Cart') }}
            
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="mt-5">Amount : {{ session('cart')->totalPrice }}$</div>
        <form action="/charge" method="post" id="payment-form" class="mt-8">
            @csrf
            <div class="form-row">
              <label for="card-element">
                Credit or debit card
              </label>
              <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
              </div>
          
              <!-- Used to display form errors. -->
              <div id="card-errors" role="alert"></div>
            </div>
          
            <button class="bg-red-500 hover:bg-red-700 p-2 rounded-2 my-8">Submit Payment</button>
          </form>
       
      </div>
    
</x-app-layout>
