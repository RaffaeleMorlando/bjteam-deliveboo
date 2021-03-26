@extends('../layouts.guest')
@section('guest-main')
    <div class="container">

        <form id="cardForm_payment" action="{{ route('checkout') }}" method="post" style="margin-top: 300px">
            @csrf
            @method('POST')
            {{-- <label for="total_price">
                    <span class="input-label">Amount</span>
                    <div class="input-wrapper amount-wrapper">
                        <input id="total_price" name="total_price" type="tel" min="1" placeholder="Amount" value="{{number_format($order['total_price'],3)}}" hidden>
                        <span>{{$order['total_price']}}</span>
                    </div>
             </label> 
            <input type="text" name="guest_name">
            <input type="text" name="guest_address"> --}}
        <div class="panel">
            <div class="panel__header"><h1>Card Payment</h1></div>
            <div class="panel__content">
                <div class="textfield--float-label">
                    <!-- Begin hosted fields section -->
                    <label class="hosted-field--label" for="card-number"><span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg></span> Card Number 
                    </label>
                    <div id="card-number" class="hosted-field"></div>
                    <!-- End hosted fields section -->
                </div>
                <div class="textfield--float-label">
                    <!-- Begin hosted fields section -->
                    <label class="hosted-field--label" for="expiration-date">
                    <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/></svg>
                    </span>
                    Expiration Date</label>
                    <div id="expiration-date" class="hosted-field"></div>
                    <!-- End hosted fields section -->
                </div>
                @foreach ($order as $key => $value)
                <input type="text" name="{{ $key }}" value="{{ $value }}" hidden>
                @endforeach
                
                
            </div>
            <div class="panel__footer"><button type="submit" onclick=" window.localStorage.clear()" class="pay-button">Pay</button></div>
        </div>
        </form>

            {{-- <form method="post" id="payment-form" action="{{ route('checkout') }}" style="width: 30%;">
                @csrf
                @method("POST")

                <section>
                    <label for="total_price">
                        <span class="input-label">Amount</span>
                        <div class="input-wrapper amount-wrapper">
                            <input id="total_price" name="total_price" type="tel" min="1" placeholder="Amount" value="{{number_format($order['total_price'],3)}}" hidden>
                            <span>{{ number_format($order['total_price'], 2)." €" }}</span>
                        </div>
                    </label>

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>
                <input type="text" name="guest_name">
                <input type="text" name="guest_address">
                <div>
                @foreach ($order as $key => $value)
                    <input type="text" name="{{ $key }}" value="{{ $value }}" hidden>
                @endforeach

                </div>
                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button class="button" type="submit" onclick=" window.localStorage.clear()"><span>Test Transaction</span></button>
            </form> --}}
            <script src="https://js.braintreegateway.com/web/3.76.0/js/client.min.js"></script>

            <script src="https://js.braintreegateway.com/web/3.76.0/js/hosted-fields.min.js"></script>

        {{-- <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script> --}}
        {{-- <script>
            var form = document.querySelector('#payment-form');
            var client_token = "{{ $token }}";

            braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
            paypal: {
            flow: 'vault'
            }
            }, function (createErr, instance) {
            if (createErr) {
            console.log('Create Error', createErr);
            return;
            }
            form.addEventListener('submit', function (event) {
            event.preventDefault();
            instance.requestPaymentMethod(function (err, payload) {
            if (err) {
                console.log('Request Payment Method Error', err);
                return;
            }
            // Add the nonce to the form and submit
            document.querySelector('#nonce').value = payload.nonce;
            form.submit();
            });
            });
            });
        </script> --}}

    </div>
        <script>
        var form = document.querySelector('#cardForm_payment');
        var client_token = "{{ $token }}";
        console.log(braintree);
    
      braintree.client.create({
        authorization: client_token,
        }, function(err, clientInstance) {
        if (err) {
            console.error(err);
             console.log("test collegamento")
            return;
        } 

        braintree.hostedFields.create({
            client: clientInstance,
            styles: {
            'input': {
                'font-size': '16px',
                'font-family': 'roboto, verdana, sans-serif',
                'font-weight': 'lighter',
                'color': 'black'
            },
            ':focus': {
                'color': 'black'
            },
            '.valid': {
                'color': 'black'
            },
            '.invalid': {
                'color': 'black'
            }
            },
            fields: {
            number: {
                selector: '#card-number',
                placeholder: '1111 1111 1111 1111'
            },
           
            expirationDate: {
                selector: '#expiration-date',
                placeholder: 'MM/YY'
            },
           
            }
        }, function(err, hostedFieldsInstance) {
            if (err) {
            console.error(err);
            return;
            }
            
            function findLabel(field) {
            return $('.hosted-field--label[for="' + field.container.id + '"]');
            }

            hostedFieldsInstance.on('focus', function (event) {
            var field = event.fields[event.emittedBy];
            
            findLabel(field).addClass('label-float').removeClass('filled');
            });
            
            // Emulates floating label pattern
            hostedFieldsInstance.on('blur', function (event) {
            var field = event.fields[event.emittedBy];
            var label = findLabel(field);
            
            if (field.isEmpty) {
                label.removeClass('label-float');
            } else if (field.isValid) {
                label.addClass('filled');
            } else {
                label.addClass('invalid');
            }
            });
            
            hostedFieldsInstance.on('empty', function (event) {
            var field = event.fields[event.emittedBy];

            findLabel(field).removeClass('filled').removeClass('invalid');
            });
            
            hostedFieldsInstance.on('validityChange', function (event) {
            var field = event.fields[event.emittedBy];
            var label = findLabel(field);

            if (field.isPotentiallyValid) {
                label.removeClass('invalid');
            } else {
                label.addClass('invalid');  
            }
            });

            $('#cardForm_payment').submit(function (event) {
            event.preventDefault();

            hostedFieldsInstance.tokenize(function (err, payload) {
                if (err) {
                console.error(err);
                return;
                }

                // This is where you would submit payload.nonce to your server
                alert('Submit your nonce to your server here!');
            });
            });
        });
        });
        </script>
@endsection

