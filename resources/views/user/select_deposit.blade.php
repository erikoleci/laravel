@extends('layouts.dashboard')
@section('style')
<style>
    .container {
    margin: auto 0;
    padding: 40px 0;
    display: grid;
    grid-template-columns: repeat(1, 340px);
    grid-auto-rows: 560px;
    grid-gap: 80px;
    align-items: stretch;
    }

    @media (min-width: 840px) and (max-width: 1259px) {
    .container {
    grid-template-columns: repeat(2, 340px);
    }
    }

    @media (min-width: 1400px) {
    .container {
    grid-template-columns: repeat(3, 320px);
    }
    }

    .box {
    position: relative;
    overflow: hidden;
    width: 100%;
    height: 100%;
    padding: 20px;
    box-sizing: border-box;
    text-align: center;
    background: linear-gradient(0deg, #202020, #464646);
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
    border: 3px solid #ffc98e;
    box-shadow: 0 0 0 6px #323232, 0 0 0 10px #ffc98e, 0 0 0 20px #323232;
    transition: 0.5s;
    }

    @media (min-width: 840px) {
    .box:hover {
    transform: scale(1.1);
    }
    }

    .box::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 50%;
    height: 100%;
    background: rgba(255, 255, 255, 0.1);
    pointer-events: none;
    }

    .box .title .fa {
    margin-top: 20px;
    font-size: 60px;
    color: #ffc98e;
    }

    .box .title h2 {
    color: #fff;
    margin: 20px 0 0;
    padding: 0;
    }

    .box .price h4 {
    font-size: 52px;
    color: #ffc98e;
    margin: 50px 0 50px;
    padding: 0;
    }

    .box .option ul {
    margin: 20px 0;
    padding: 0;
    list-style: none;
    }

    .box .option ul li {
    color: #fff;
    padding: 10px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .box .option ul li:last-child {
    border-bottom: none;
    }

    .box .btn {
    display: inline-block;
    background: #fbf2e7;
    color: #262626;
    font-weight: bold;
    padding: 10px 30px;
    margin-top: 20px;
    text-decoration: none;
    border-radius: 3px;
    }
    </style>
@endsection
@section('content')





    <div class="page-content-wrapper ">

        <div class="container-fluid">



            <div style="padding-top:25px;" class="col-sm-8 deposit_form">
                <h3 class="deposit_header">{{__("Select Deposit Type")}} </h3>
                <hr class="sm_separator">
                </div>


{{--           <div class="row">--}}
{{--           <div class="col-lg-9 m-t-30 centered">--}}
{{--               <h3>Test</h3>--}}

{{--           </div>--}}

{{--           </div>--}}
        <div style="margin: 0;padding-left: 16px;display: flex;justify-content: center;font-family: sans-serif;" class="m-t-40">

                            <div class="container p-t-10">
                                @if(hasanyguard(['prime','promo','bull_bear','phoenix','kings','grand_master']))
                                <div class="box">
                                    <div class="title">
                                        <img src="{{asset('/images/bank_img.png')}}" style="height:140px">

                                    </div>
                                    <div class="price m-t-10">
                                        <h4>{{__("BANK")}}</h4>
                                    </div>
                                    <div class="option">
                                        <ul>
                                            <li>1-5 {{__("Days Processing Time")}}</li>
                                            <li>0€ {{__("Comission")}} </li>
                                            <li>100% {{__("Secure")}} </li>
                                        </ul>
                                    </div>
                                    <a href="{{url(get_guard().'/deposit_bank')}}" class="btn">{{__("Deposit Now")}}</a>
                                </div>
                                @endif
                                @if(hasanyguard(['prime','promo','kings','grand_master']))
                                <div class="box">
                                    <div class="title">
                                        <img src="{{asset('/images/creditcard_icon.png')}}" style="height:140px">
                                    </div>
                                    <div class="price">
                                        <h4>{{__("CARD")}}</h4>
                                    </div>
                                    <div class="option">
                                        <ul>
                                            <li>{{__("Instant Processing Time")}}</li>
                                            <li>0€ {{__("Comission")}} </li>
                                            <li>100% {{__("Secure")}} </li>
                                        </ul>
                                    </div>
                                    <a href="{{url(get_guard().'/deposit')}}" target="_blank" class="btn">{{__("Deposit Now")}}</a>
                                </div>
                                @endif
                                @if(hasanyguard(['prime','promo','bull_bear','phoenix','kings','grand_master']))
                                <div class="box">
                                    <div class="title" style="height: 140px; display: flex; align-items: center;">
                                        <img src="{{asset('/images/logo_venus.png')}}" style="height:95px">
                                    </div>
                                    <div class="price">
                                        <h4>{{__("EXCHANGER")}}</h4>
                                    </div>
                                    <div class="option">
                                        <ul>
                                            <li>1-3 {{__("Days Processing Time")}}</li>
                                            <li>0€ {{__("Comission")}} </li>
                                            <li>100% {{__("Secure")}} </li>
                                        </ul>
                                    </div>
                                    <a href="" target="_blank" class="btn">{{__("Deposit Now")}}</a>
                                </div>
                                @endif
                            </div>



                    </div>


        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->


@endsection

@section('scripts')

@endsection
