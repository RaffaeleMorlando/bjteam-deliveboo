<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="container">
    <div>
        <form method="post" id="payment-form" action="{{ route('checkout') }}" style="width: 30%;">
            @csrf
            @method("POST")
    
            <section>
                <label for="amount">
                    <span class="input-label">Amount</span>
                    <div class="input-wrapper amount-wrapper">
                        <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="{{$order['total_price']}}" hidden>
                        <span>{{$order['total_price']}}</span>
                    </div>
                </label>
    
                <div class="bt-drop-in-wrapper">
                    <div id="bt-dropin"></div>
                </div>
            </section>
    
            <input id="nonce" name="payment_method_nonce" type="hidden" />
            <button class="button" type="submit" onclick=" window.localStorage.clear()"><span>Test Transaction</span></button>
        </form>
    </div>
    
    
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
    <script>
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
    </script>
</body>
</html>
