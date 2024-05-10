@extends('layouts.dashboard')
@section('style')
<style>
    .overlay{width: 100%;height: 100vh; position: absolute;bottom:0;left:0;z-index:1500000000;}

</style>

@endsection
@section('content')

    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row padd_1r">
                                <div class="col-sm-12">


                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="display: flex;justify-content: center;margin-top: 1rem;">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-forex" role="tab" aria-controls="pills-forex" aria-selected="true">Trading Hours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-commodities" role="tab" aria-controls="pills-commodities" aria-selected="false">Trading Hours 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-indices" role="tab" aria-controls="pills-indices" aria-selected="false">Sentiment</a>
                        </li>
                    </ul>






                    <div class="tab-content" id="pills-tabContent">




                        <div class="tab-pane fade show active" id="pills-forex" role="tabpanel" aria-labelledby="pills-forex">

{{--                            <div class="overlay">--}}
{{--                            </div>--}}
                            <div><script type="text/javascript">DukascopyApplet = {"type":"fxmarkethours","params":{"showHeader":false,"displayMainMenu":true,"displayTimezoneChange":true,"displayInstrumentChange":true,"displaySpreadIndicator":false,"displayVolumeIndicator":true,"displayVolatilityIndicator":false,"displayFollowButton":false,"allowTimezoneChange":true,"allowInstrumentChange":true,"defaultTimezone":0,"showIndicator":"2","defaultFollowMode":true,"worldMapColor":"red","hoursBackground":"#444f5f","hoursActiveBackground":"#7d92b0","hoursTextColor":"#ffffff","currentHourBGColor":"#f9fdff","dstHourColor":"#0cf6ff","indicatorBarColor":"#5090c6","graphPointsColor":"#ffffff","spreadTopGraphColor":"#208c1c","spreadBottomGraphColor":"#dc0e0e","volatilityGraphColor":"#146fba","availableInstruments":"l:","instrument":"EUR/USD","width":"100%","height":"860px","adv":"popup","lang":"en"}};</script><script type="text/javascript" src="https://freeserv-static.dukascopy.com/2.0/core.js"></script></div>
                            </div>


                        <div class="tab-pane fade" id="pills-commodities" role="tabpanel" aria-labelledby="pills-commodities">
                            <table id="" class="table any1table">
                                <thead>
                                <tr class="row-1">
                                    <th colspan="2" class="column-1">Stocks</th><th class="column-3">Trading Hours in GMT</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="row-2">
                                    <td class="column-1">Australian shares/ ETFs</td><td class="column-2">Monday – Friday</td><td class="column-3">00:05 – 05:55</td>
                                </tr>
                                <tr class="row-3">
                                    <td class="column-1">Austrian shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 09:59, 10:04 – 15:24</td>
                                </tr>
                                <tr class="row-4">
                                    <td class="column-1">Belgium shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 15:25</td>
                                </tr>
                                <tr class="row-5">
                                    <td class="column-1">Czech shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:20 – 14:14</td>
                                </tr>
                                <tr class="row-6">
                                    <td class="column-1">Danish shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:01 – 14:55</td>
                                </tr>
                                <tr class="row-7">
                                    <td class="column-1">Finish shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 15:25</td>
                                </tr>
                                <tr class="row-8">
                                    <td class="column-1">French shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:01 – 15:30</td>
                                </tr>
                                <tr class="row-9">
                                    <td class="column-1">German Shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 15:25</td>
                                </tr>
                                <tr class="row-10">
                                    <td class="column-1">Greek shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:35 – 14:00</td>
                                </tr>
                                <tr class="row-11">
                                    <td class="column-1">HK shares</td><td class="column-2">Monday – Friday</td><td class="column-3">01:35 – 03:35, 05:05 – 07:55</td>
                                </tr>
                                <tr class="row-12">
                                    <td class="column-1">Dutch shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:01 – 15:25</td>
                                </tr>
                                <tr class="row-13">
                                    <td class="column-1">Italian shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 15:20</td>
                                </tr>
                                <tr class="row-14">
                                    <td class="column-1">Norwegian shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:10 -14:15</td>
                                </tr>
                                <tr class="row-15">
                                    <td class="column-1">Polish shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:10 – 14:44</td>
                                </tr>
                                <tr class="row-16">
                                    <td class="column-1">Portuguese shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 15:25</td>
                                </tr>
                                <tr class="row-17">
                                    <td class="column-1">South African shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:06 – 14:49</td>
                                </tr>
                                <tr class="row-18">
                                    <td class="column-1">Spanish shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:01 – 15:30</td>
                                </tr>
                                <tr class="row-19">
                                    <td class="column-1">Swedish shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 15:25</td>
                                </tr>
                                <tr class="row-20">
                                    <td class="column-1">UK shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 15:30</td>
                                </tr>
                                <tr class="row-21">
                                    <td class="column-1">UK-listed Foreign shares</td><td class="column-2">Monday – Friday</td><td class="column-3">07:25 – 14:29</td>
                                </tr>
                                <tr class="row-22">
                                    <td class="column-1">USA shares/ETFs</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-23">
                                    <td colspan="3" class="column-1"><h3>Asian, Pacific and African Indices</h3></td>
                                </tr>
                                <tr class="row-24">
                                    <td class="column-1">Australia200</td><td class="column-2">Sunday – Friday</td><td class="column-3">23:52 – 06:30, 07:15 – 21:00</td>
                                </tr>
                                <tr class="row-25">
                                    <td class="column-1">China50</td><td class="column-2">Monday – Friday</td><td class="column-3">01:50 – 08:30, 09:05 – 17:40</td>
                                </tr>
                                <tr class="row-26">
                                    <td class="column-1">China300</td><td class="column-2">Monday – Friday</td><td class="column-3">01:35 – 03:55, 05:05 – 07:55</td>
                                </tr>
                                <tr class="row-27">
                                    <td class="column-1">HongKong45</td><td class="column-2">Monday – Friday</td><td class="column-3">01:15 – 04:00, 05:02 – 08:30, 09:16 – 18:45</td>
                                </tr>
                                <tr class="row-28">
                                    <td class="column-1">India50</td><td class="column-2">Monday – Friday</td><td class="column-3">01:05 – 10:00</td>
                                </tr>
                                <tr class="row-29">
                                    <td class="column-1">MSCITaiwan</td><td class="column-2">Monday – Friday</td><td class="column-3">00:50 – 05:40, 06:50 – 14:50</td>
                                </tr>
                                <tr class="row-30">
                                    <td colspan="3" class="column-1"> <h3>European Indices</h3></td>
                                </tr>
                                <tr class="row-31">
                                    <td class="column-1">Amsterdam25</td><td class="column-2">Monday – Friday</td><td class="column-3">06:02-19:59</td>
                                </tr>
                                <tr class="row-32">
                                    <td class="column-1">Europe50</td><td class="column-2">Monday – Friday</td><td class="column-3">06:00-19:59</td>
                                </tr>
                                <tr class="row-33">
                                    <td class="column-1">France40</td><td class="column-2">Monday – Friday</td><td class="column-3">22:05-20:15, 20:30-21:00</td>
                                </tr>
                                <tr class="row-34">
                                    <td class="column-1">Germany30</td><td class="column-2">Monday – Friday</td><td class="column-3">22:05-20:15, 20:30-21:00</td>
                                </tr>
                                <tr class="row-35">
                                    <td class="column-1">Italy40</td><td class="column-2">Monday – Friday</td><td class="column-3">07:01 – 15:40</td>
                                </tr>
                                <tr class="row-36">
                                    <td class="column-1">Norway20</td><td class="column-2">Monday – Friday</td><td class="column-3">07:01 – 15:15</td>
                                </tr>
                                <tr class="row-37">
                                    <td class="column-1">Poland20</td><td class="column-2">Monday – Friday</td><td class="column-3">07:51 – 15:49</td>
                                </tr>
                                <tr class="row-38">
                                    <td class="column-1">Sweden30</td><td class="column-2">Monday – Friday</td><td class="column-3">07:01 – 15:25</td>
                                </tr>
                                <tr class="row-39">
                                    <td class="column-1">Spain35</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 17:55</td>
                                </tr>
                                <tr class="row-40">
                                    <td class="column-1">Swiss20</td><td class="column-2">Monday – Friday</td><td class="column-3">06:05 – 19:55</td>
                                </tr>
                                <tr class="row-41">
                                    <td class="column-1">UK100</td><td class="column-2">Monday – Friday</td><td class="column-3">22:05-20:15, 20:30-21:00</td>
                                </tr>
                                <tr class="row-42">
                                    <td colspan="3" class="column-1"><h3>US Indices</h3></td>
                                </tr>
                                <tr class="row-43">
                                    <td class="column-1">Dollar Index</td><td class="column-2">Monday – Friday</td><td class="column-3">00:05 – 20:55</td>
                                </tr>
                                <tr class="row-44">
                                    <td class="column-1">Japan225</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:01 -24:00, 00:00 -20:15</td>
                                </tr>
                                <tr class="row-45">
                                    <td class="column-1">TECH100</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:01 -24:00, 00:00 -20:15</td>
                                </tr>
                                <tr class="row-46">
                                    <td class="column-1">USA2000</td><td class="column-2">Monday – Friday</td><td class="column-3">00:00-21:10, 21:35-22:00, 23:05-00:00</td>
                                </tr>
                                <tr class="row-47">
                                    <td class="column-1">USA30</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:01 -24:00, 00:00 -20:10</td>
                                </tr>
                                <tr class="row-48">
                                    <td class="column-1">USA500</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:01 -24:00, 00:00 -20:15</td>
                                </tr>
                                <tr class="row-49">
                                    <td class="column-1">VIX</td><td class="column-2">Monday – Friday</td><td class="column-3">00:00-20:10, 22:01-00:00</td>
                                </tr>
                                <tr class="row-50">
                                    <td colspan="3" class="column-1"> <h3>Cash Indices</h3></td>
                                </tr>
                                <tr class="row-51">
                                    <td class="column-1">100UK</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:05-20:15, 20:30-21:00</td>
                                </tr>
                                <tr class="row-52">
                                    <td class="column-1">AUS200</td><td class="column-2">Sunday – Friday</td><td class="column-3">23:52 – 06:30, 07:15 – 21:00</td>
                                </tr>
                                <tr class="row-53">
                                    <td class="column-1">DE30</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:05-20:15, 20:30-21:00</td>
                                </tr>
                                <tr class="row-54">
                                    <td class="column-1">EU50</td><td class="column-2">Monday – Friday</td><td class="column-3">06:01 – 19:59</td>
                                </tr>
                                <tr class="row-55">
                                    <td class="column-1">FRA40</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:05-20:15, 20:30-21:00</td>
                                </tr>
                                <tr class="row-56">
                                    <td class="column-1">HK33</td><td class="column-2">Sunday – Friday</td><td class="column-3">01:15 – 04:00, 05:00 – 08:30, 09:15 – 18:59</td>
                                </tr>
                                <tr class="row-57">
                                    <td class="column-1">JPN225</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:05 – 20:55</td>
                                </tr>
                                <tr class="row-58">
                                    <td class="column-1">SPA35</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 17:55</td>
                                </tr>
                                <tr class="row-59">
                                    <td class="column-1">US100</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:05-20:15, 20:30-21:00</td>
                                </tr>
                                <tr class="row-60">
                                    <td class="column-1">US30</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:05-20:15, 20:30-21:00</td>
                                </tr>
                                <tr class="row-61">
                                    <td class="column-1">US500</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:05-20:15, 20:30-21:00</td>
                                </tr>
                                <tr class="row-62">
                                    <td colspan="3" class="column-1"><h3>Metals</h3></td>
                                </tr>
                                <tr class="row-63">
                                    <td class="column-1">Copper</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:01 – 24:00, 00:00 -20:55</td>
                                </tr>
                                <tr class="row-64">
                                    <td class="column-1">Gold</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:01 – 24:00, 00:00 -20:55</td>
                                </tr>
                                <tr class="row-65">
                                    <td class="column-1">Platinum</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:01 – 24:00, 00:00 -20:55</td>
                                </tr>
                                <tr class="row-66">
                                    <td class="column-1">Palladium</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:01 – 24:00, 00:00 -20:55</td>
                                </tr>
                                <tr class="row-67">
                                    <td class="column-1">Silver</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:01 – 24:00, 00:00 -20:55</td>
                                </tr>
                                <tr class="row-68">
                                    <td colspan="3" class="column-1"> <h3>Blends</h3></td>
                                </tr>
                                <tr class="row-69">
                                    <td class="column-1">US Tech</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-70">
                                    <td class="column-1">E-Commerce</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-71">
                                    <td class="column-1">Social Media</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-72">
                                    <td class="column-1">Bill Ackman</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-73">
                                    <td class="column-1">Cannabis</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-74">
                                    <td class="column-1">Guru</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-75">
                                    <td class="column-1">Trade War Losers</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-76">
                                    <td class="column-1">Trade War Winners</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-77">
                                    <td class="column-1">Winners</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-78">
                                    <td class="column-1">Dogs of the Dow</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-79">
                                    <td class="column-1">Einhorn</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-80">
                                    <td class="column-1">Gerstner</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-81">
                                    <td class="column-1">Icahn</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-82">
                                    <td class="column-1">Warren Buffet</td><td class="column-2">Monday – Friday</td><td class="column-3">13:31 – 20:00</td>
                                </tr>
                                <tr class="row-83">
                                    <td colspan="3" class="column-1"> <h3>Soft &amp; Agriculturre Commodities</h3></td>
                                </tr>
                                <tr class="row-84">
                                    <td class="column-1">Cocoa</td><td class="column-2">Monday – Friday</td><td class="column-3">08:46 – 17:29</td>
                                </tr>
                                <tr class="row-85">
                                    <td class="column-1">Coffee</td><td class="column-2">Monday – Friday</td><td class="column-3">08:16 – 17:29</td>
                                </tr>
                                <tr class="row-86">
                                    <td class="column-1">Cotton No2</td><td class="column-2">Monday – Friday</td><td class="column-3">01:05-18:15</td>
                                </tr>
                                <tr class="row-87">
                                    <td class="column-1">Sugar</td><td class="column-2">Monday – Friday</td><td class="column-3">07:31 – 16:59</td>
                                </tr>
                                <tr class="row-88">
                                    <td class="column-1">Corn</td><td class="column-2">Monday – Friday</td><td class="column-3">00:05-12:40, 13:35-18:10</td>
                                </tr>
                                <tr class="row-89">
                                    <td class="column-1">Rice</td><td class="column-2">Monday – Friday</td><td class="column-3">00:05-01:55, 13:35-18:10</td>
                                </tr>
                                <tr class="row-90">
                                    <td class="column-1">Soybeans</td><td class="column-2">Monday – Friday</td><td class="column-3">00:05-12:40, 13:35-18:10</td>
                                </tr>
                                <tr class="row-91">
                                    <td class="column-1">Wheat</td><td class="column-2">Monday – Friday</td><td class="column-3">00:05-12:40, 13:35-18:10</td>
                                </tr>
                                <tr class="row-92">
                                    <td colspan="3" class="column-1"><h3>Energy Commodities</h3></td>
                                </tr>
                                <tr class="row-93">
                                    <td class="column-1">Brent Oil</td><td class="column-2">Monday – Thursday</td><td class="column-3">00:01 – 22:00</td>
                                </tr>
                                <tr class="row-95">
                                    <td class="column-1">Heating Oil</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:01 – 24:00, 00:00 -20:55</td>
                                </tr>
                                <tr class="row-96">
                                    <td class="column-1">Natural Gas</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:01 – 24:00, 00:00 -20:55</td>
                                </tr>
                                <tr class="row-97">
                                    <td class="column-1">Crude Oil</td><td class="column-2">Sunday – Friday</td><td class="column-3">22:01 – 24:00, 00:00 -20:55</td>
                                </tr>
                                <tr class="row-98">
                                    <td colspan="3" class="column-1"><h3>Government Bonds</h3></td>
                                </tr>
                                <tr class="row-99">
                                    <td class="column-1">GER10YBond</td><td class="column-2">Monday – Friday</td><td class="column-3">06:00 – 20:00</td>
                                </tr>
                                <tr class="row-100">
                                    <td class="column-1">Gilt10Y</td><td class="column-2">Monday – Friday</td><td class="column-3">07:10 – 17:00</td>
                                </tr>
                                <tr class="row-101">
                                    <td class="column-1">TBond30</td><td class="column-2">Sunday – Thursday</td><td class="column-3">22:01 – 24:00, 00:00 -20:59</td>
                                </tr>
                                <tr class="row-103">
                                    <td class="column-1">TNote10</td><td class="column-2">Sunday – Thursday</td><td class="column-3">22:01 – 24:00, 00:00 -20:59</td>
                                </tr>
                                <tr class="row-105">
                                    <td colspan="3" class="column-1"> <h3>FX</h3></td>
                                </tr>
                                <tr class="row-106">
                                    <td class="column-1">All Major FX Pairs</td><td class="column-2">Sunday – Friday</td><td class="column-3">21:05 – 20:55</td>
                                </tr>
                                <tr class="row-107">
                                    <td class="column-1">NOK (Norwegian Krone) FX pairs</td><td class="column-2">Sunday – Thursday</td><td class="column-3">21:15 – 24:00, 00:00 – 20:57</td>
                                </tr>
                                <tr class="row-109">
                                    <td class="column-1">SEK (Swedish Krona) FX pairs</td><td class="column-2">Sunday – Thursday</td><td class="column-3">21:15 – 24:00, 00:00 – 20:57</td>
                                </tr>
                                <tr class="row-111">
                                    <td class="column-1">HUF (Hungarian Forint) FX pairs</td><td class="column-2">Sunday – Thursday</td><td class="column-3">21:15 – 24:00, 00:00 – 20:57</td>
                                </tr>
                                <tr class="row-113">
                                    <td class="column-1">CZK (Czech Koruna) FX pairs</td><td class="column-2">Monday – Friday</td><td class="column-3">07:17 – 14:14</td>
                                </tr>
                                <tr class="row-114">
                                    <td class="column-1">RON (Romanian Leu) FX pairs</td><td class="column-2">Monday – Friday</td><td class="column-3">07:20 – 11:55</td>
                                </tr>
                                <tr class="row-115">
                                    <td class="column-1">RUB (Russian Ruble) FX pairs</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 16:00</td>
                                </tr>
                                <tr class="row-116">
                                    <td class="column-1">PLN (Polish zloty) FX pairs</td><td class="column-2">Sunday – Thursday</td><td class="column-3">21:15 – 24:00, 00:00 – 20:57</td>
                                </tr>
                                <tr class="row-118">
                                    <td colspan="3" class="column-1"> <h3>Cryptocurrencies</h3></td>
                                </tr>
                                <tr class="row-119">
                                    <td class="column-1">Bitcoin Futures</td><td class="column-2">Sunday – Thursday</td><td class="column-3">00:00-20:55, 22:05-00:00</td>
                                </tr>
                                <tr class="row-121">
                                    <td class="column-1">Ripple, Ethereum, Litecoin, Dash, Bitcoin Cash</td><td class="column-2">24/7 (subject to system maintenance, trading might be interrupted on Sundays)</td><td class="column-3"></td>
                                </tr>
                                <tr class="row-122">
                                    <td colspan="3" class="column-1"> <h3>EU Blends</h3></td>
                                </tr>
                                <tr class="row-123">
                                    <td class="column-1">BrexitLosersBlend</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 15:30</td>
                                </tr>
                                <tr class="row-124">
                                    <td class="column-1">BrexitWinnersBlend</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 15:30</td>
                                </tr>
                                <tr class="row-125">
                                    <td class="column-1">FashionBlend</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 15:20</td>
                                </tr>
                                <tr class="row-126">
                                    <td class="column-1">UK High Street</td><td class="column-2">Monday – Friday</td><td class="column-3">07:05 – 15:30</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="tab-pane fade" id="pills-indices" role="tabpanel" aria-labelledby="pills-contact-tab"><!-- TradingView Widget BEGIN -->

                        </div>





                    </div>








                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection
