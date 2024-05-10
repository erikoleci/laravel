<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            margin-top: 15px;
            margin-bottom: 15px;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            background: white;
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #0e7482;
            color: white;
            border-bottom: 1px solid #0e7482;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        .text-right{
            text-align: right;
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .message{
            font-size:18px;
            border: 0px white solid;
        }
        .title{
            font-size:25px;
            border: 0px white solid;
        }
        .verifyButton{
            text-decoration:none;
            color:#ffffff;
            background:#0e7482;
            border-radius:5px;
            font-size:14px;
            line-height:18px;
            text-align:center;
            font-weight:500;
            padding:12px 25px;
            margin-left:auto;
            margin-right:auto;
        }
        .verifyDiv{
            justify-content: center !important;
            display: flex;

        }
        .pronto-color{
            color:#0e7482;
        }
        .pronto-bg{
            background-color:#0e7482;
        }
        .procediBtn{
            text-decoration:none;
            color:#ffffff;
            border-radius:5px;
            font-size:14px;
            line-height:18px;
            text-align:center;
            font-weight:600;
            padding:12px 25px;
        }
        .text-white{
            color:white;
        }
        .logoStyle{
            width:50%;
            max-width:300px;
            padding: 10px;
        }
        .logoMin{
            width:50%;
            max-width:150px;
        }
        body{
            background: #f0f3f8
        }
        .emailFooter{
            margin-top:30px;
            margin-bottom: 5px;
        }
        .emailFooter p{
            margin-bottom: 5px;
        }
    </style>
    @yield('style')

</head>
<body>
<div class="invoice-box">

    <img src="{{asset('images/logo.png')}}" alt="logo" class="logoStyle">

    @yield('content')

    <div class="emailFooter">
        <p>
            <strong> </strong>
        </p>
        <img src="{{asset('images/logo.png')}}" alt="logoMin" class="logoMin">
    </div>
</div>
</body>
</html>
