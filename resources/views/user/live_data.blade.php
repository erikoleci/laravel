@extends('layouts.dashboard')
@section('style')
@endsection
@section('content')

    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row padd_1r">
                                <div class="col-sm-12">


                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="display: flex;justify-content: center;margin-top: 1rem;">

                        @if(hasanyguard(['black_panther','kings','grand_master']))
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab forex_signals" data-toggle="pill" href="#pills-forex" role="tab" aria-controls="pills-forex" aria-selected="true">Forex</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-commodities" role="tab" aria-controls="pills-commodities" aria-selected="false">Commodities</a>
                        </li>
                        @endif

                        @if(hasanyguard(['bull_bear','kings','grand_master']))
                        <li class="nav-item">
                            <a class="nav-link @role('bull_bear') active @endrole" id="pills-contact-tab" data-toggle="pill" href="#pills-indices" role="tab" aria-controls="pills-indices" aria-selected="false">Indices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-stocks" role="tab" aria-controls="pills-stocks" aria-selected="false">Stocks</a>
                        </li>
                        @endif

                        @if(hasanyguard(['phoenix','kings','grand_master']))
                        <li class="nav-item">
                            <a class="nav-link @role('phoenix') active @endrole" id="pills-contact-tab" data-toggle="pill" href="#pills-crypto" role="tab" aria-controls="pills-stocks" aria-selected="false">Crypto</a>
                        </li>
                        @endif

                    </ul>






                    <div class="tab-content" id="pills-tabContent">


                        @if(hasanyguard(['black_panther','kings','grand_master']))


                        <div class="tab-pane fade show active" id="pills-forex" role="tabpanel" aria-labelledby="pills-forex">

                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <script>
                                    var color="light"
                                </script>

                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                                    {
                                        "width": "100%",
                                        "height": "900",
                                        "defaultColumn": "overview",
                                        "defaultScreen": "general",
                                        "market": "forex",
                                        "showToolbar": true,
                                        "colorTheme": "dark",
                                        "locale": "en",
                                        "isTransparent": true
                                    }
                                </script>
                            </div>

                         </div>

                        <div class="tab-pane fade" id="pills-commodities" role="tabpanel" aria-labelledby="pills-commodities">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                 <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
                                    {
                                        "width": "100%",
                                        "height": "850",
                                        "symbolsGroups": [
                                        {
                                            "name": "Commodities",
                                            "originalName": "Commodities",
                                            "symbols": [
                                                {
                                                    "name": "CME_MINI:ES1!",
                                                    "displayName": "E-Mini S&P"
                                                },
                                                {
                                                    "name": "CME:6E1!",
                                                    "displayName": "Euro"
                                                },
                                                {
                                                    "name": "COMEX:GC1!",
                                                    "displayName": "Gold"
                                                },
                                                {
                                                    "name": "NYMEX:CL1!",
                                                    "displayName": "Crude Oil"
                                                },
                                                {
                                                    "name": "NYMEX:NG1!",
                                                    "displayName": "Natural Gas"
                                                },
                                                {
                                                    "name": "CBOT:ZC1!",
                                                    "displayName": "Corn"
                                                }
                                            ]
                                        }
                                    ],
                                        "colorTheme": "dark",
                                        "isTransparent": true,
                                        "locale": "en"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        @endif



                        @if(hasanyguard(['bull_bear','kings','grand_master']))

                        <div class="tab-pane fade  @role('bull_bear') show active @endrole" id="pills-indices" role="tabpanel" aria-labelledby="pills-contact-tab"><!-- TradingView Widget BEGIN -->
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/indices/" rel="noopener" target="_blank"><span class="blue-text">Indices</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
                                    {
                                        "width": "100%",
                                        "height": "850",
                                        "symbolsGroups": [
                                        {
                                            "name": "Indices",
                                            "originalName": "Indices",
                                            "symbols": [
                                                {
                                                    "name": "OANDA:SPX500USD",
                                                    "displayName": "S&P 500"
                                                },
                                                {
                                                    "name": "OANDA:NAS100USD",
                                                    "displayName": "Nasdaq 100"
                                                },
                                                {
                                                    "name": "FOREXCOM:DJI",
                                                    "displayName": "Dow 30"
                                                },
                                                {
                                                    "name": "INDEX:NKY",
                                                    "displayName": "Nikkei 225"
                                                },
                                                {
                                                    "name": "INDEX:DEU30",
                                                    "displayName": "DAX Index"
                                                },
                                                {
                                                    "name": "OANDA:UK100GBP",
                                                    "displayName": "FTSE 100"
                                                }
                                            ]
                                        }
                                    ],
                                        "colorTheme": "dark",
                                        "isTransparent": true,
                                        "locale": "en"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>


                        <div class="tab-pane fade" id="pills-stocks" role="tabpanel" aria-labelledby="pills-contact-tab">

                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/screener/" rel="noopener" target="_blank"><span class="blue-text">Stock Screener</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                                    {
                                        "width": "100%",
                                        "height": "850",
                                        "defaultColumn": "overview",
                                        "defaultScreen": "most_capitalized",
                                        "market": "america",
                                        "showToolbar": true,
                                        "colorTheme": "dark",
                                        "locale": "en",
                                        "isTransparent": true
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                           </div>
                        @endif



                        @if(hasanyguard(['phoenix','kings','grand_master']))
                        <div class="tab-pane fade @role('phoenix') show active @endrole" id="pills-crypto" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/crypto-screener/" rel="noopener" target="_blank"><span class="blue-text">Crypto Screener</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                                    {
                                        "width": "100%",
                                        "height": "900",
                                        "defaultColumn": "overview",
                                        "defaultScreen": "general",
                                        "market": "crypto",
                                        "showToolbar": true,
                                        "colorTheme": "dark",
                                        "locale": "en",
                                        "isTransparent": true
                                    }
                                </script>
                            </div>
                        </div>

                        @endif


                    </div>








                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection
