@extends('layouts.dashboard')
@section('style')
<style>
    .nav-pills .nav-item.show .nav-link, .nav-pills .nav-link.active{
        background-color: #cfc17d;
    }
    a{
        color: white;
    }
</style>
@endsection
@section('content')

    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row padd_1r">
                                <div class="col-sm-12">


                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="display: flex;justify-content: center;margin-top: 1rem;">

                        

                      
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-forex" role="tab" aria-controls="pills-forex" aria-selected="true">Forex</a>
                        </li>
                    
                       
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-commodities" role="tab" aria-controls="pills-commodities" aria-selected="false">Commodities</a>
                        </li>
                   
                    

                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-indices" role="tab" aria-controls="pills-indices" aria-selected="false">Indices</a>
                        </li>
                      
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-stocks" role="tab" aria-controls="pills-stocks" aria-selected="false">Stocks</a>
                        </li>
                      

                 
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-crypto" role="tab" aria-controls="pills-stocks" aria-selected="false">Crypto</a>
                        </li>
                

                    </ul>






                    <div class="tab-content" id="pills-tabContent">


                       

                        <div class="tab-pane fade show active" id="pills-forex" role="tabpanel" aria-labelledby="pills-forex">

                            <div class="row">
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade EUR/USD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "FX:EURUSD",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/FX-EURUSD/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade EUR/GBP</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "FX:EURGBP",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/FX-EURGBP/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade EUR/JPY</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "FX:EURJPY",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/FX-EURJPY/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade EUR/RUB</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "FOREXCOM:EURRUB",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/FOREXCOM-EURRUB/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade EUR/AUD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "FX:EURAUD",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/FX-EURAUD/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade EUR/NZD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "FX:EURNZD",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/FX-EURNZD/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade USD/JPY</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "OANDA:USDJPY",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/OANDA-USDJPY/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade USD/NZD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "FX_IDC:USDNZD",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/FX_IDC-USDNZD/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade USD/GBP</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "FX_IDC:USDGBP",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/FX_IDC-USDGBP/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade USD/CAD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "OANDA:USDCAD",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/OANDA-USDCAD/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade USD/RUB</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "CURRENCYCOM:USDRUB",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/CURRENCYCOM-USDRUB/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade USD/TRY</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "OANDA:USDTRY",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/OANDA-USDTRY/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade AUD/CAD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "OANDA:AUDCAD",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/OANDA-AUDCAD/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade GBP/CAD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "OANDA:GBPCAD",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/OANDA-GBPCAD/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade NZD/CAD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "OANDA:NZDCAD",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/OANDA-NZDCAD/technicals/"
                                            }
                                        </script>
                                    </div></div>


                            </div>


                         </div>
                    



                        
                        <div class="tab-pane fade" id="pills-commodities" role="tabpanel" aria-labelledby="pills-commodities">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <!-- TradingView Widget BEGIN -->
                                    <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade Gold </span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "TVC:GOLD",
                                                "showIntervalTabs": true,
                                                "locale": "en",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/TVC-GOLD/technicals/"
                                            }
                                        </script>
                                    </div>
                                    <!-- TradingView Widget END -->
                                </div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade Platinum</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "TVC:PLATINUM",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/TVC-PLATINUM/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade Silver</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "TVC:SILVER",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/TVC-SILVER/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade Coffee C</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "ICEUS:KC1!",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/ICEUS-KC1!/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade Cocoa</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "ICEUS:CC1!",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/ICEUS-CC1!/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade Copper</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "COMEX:HG1!",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/COMEX-HG1!/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade Corn</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "CBOT:ZC1!",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/CBOT-ZC1!/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade Palladium</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "TVC:PALLADIUM",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/TVC-PALLADIUM/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade Soybean</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "CBOT:ZS1!",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/CBOT-ZS1!/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade Sugar</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "ICEUS:SB1!",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/ICEUS-SB1/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade Wheat</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "CBOT:ZW1!",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/CBOT:ZW1!/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Ligh Crude Oil</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NYMEX:CL1!",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NYMEX-CL1!/technicals/"
                                            }
                                        </script>
                                    </div></div>


                            </div>
                        </div>
                   


                        <div class="tab-pane fade" id="pills-indices" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <!-- TradingView Widget BEGIN -->
                                    <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade Dow Jones Industrial </span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "TVC:DJI",
                                                "showIntervalTabs": true,
                                                "locale": "en",
                                                "colorTheme": "dark"
                                            }
                                        </script>
                                    </div>
                                    <!-- TradingView Widget END -->
                                </div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade NASDAQ-100</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NASDAQ:NDX",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NASDAQ-NDX/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade FTSE 100</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "TVC:UKX",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/TVC-UKX/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade DAX</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "TVC:DEU30",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/TVC-DEU30/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade Euro Stoxx 50</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "TVC:SX5E",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/TVC-SX5E/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade Amsterdam Exchange</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "TVC:AEX",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/TVC-AEX/technicals/"
                                            }
                                        </script>
                                    </div></div>

                            </div>
                        </div>
                    

             
                        <div class="tab-pane fade" id="pills-stocks" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade APPLE</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NASDAQ:AAPL",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NASDAQ-AAPL/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade TESLA</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NASDAQ:TSLA",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NASDAQ-TSLA/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade AMAZON</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NASDAQ:AMZN",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NASDAQ-AMZN/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade GOOGLE</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NASDAQ:GOOGL",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NASDAQ-GOOGL/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade FACEBOOK</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NASDAQ:FB",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NASDAQ-FB/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade BOEING</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NYSE:BA",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NYSE-BA/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade NETFLIX</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NASDAQ:NFLX",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NASDAQ-NFLX/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade NVIDIA</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NASDAQ:NVDA",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NASDAQ-NVDA/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade MICROSOFT</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NASDAQ:MSFT",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NASDAQ-MSFT/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade VISA</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NYSE:V",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NYSE-V/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade ALIBABA</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NYSE:BABA",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NYSE-BABA/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade COCA-COLA</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NYSE:KO",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NYSE-KO/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade J.P. MORGAN</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NYSE:JPM",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NYSE-JPM/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade UBER</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NYSE:UBER",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NYSE-UBER/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade AMD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "NASDAQ:AMD",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/NASDAQ-AMD/technicals/"
                                            }
                                        </script>
                                    </div></div>



                            </div>

                           </div>
                      



                  
                        <div class="tab-pane fade" id="pills-crypto" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade BTC/USD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "COINBASE:BTCUSD",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/COINBASE-BTCUSD/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade BTC/EUR</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "COINBASE:BTCEUR",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/COINBASE-BTCEUR/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade BTC/GBP</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "COINBASE:BTCGBP",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/COINBASE-BTCGBP/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade ETH/USD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "COINBASE:ETHUSD",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/COINBASE-ETHUSD/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade ETH/EUR</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "COINBASE:ETHEUR",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/COINBASE-ETHEUR/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade ETH/GBP</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "COINBASE:ETHGBP",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/COINBASE-ETHGBP/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade LTC/USD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "COINBASE:LTCUSD",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/COINBASE-LTCUSD/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade LTC/USD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "COINBASE:LTCEUR",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/COINBASE-LTCEUR/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade LTC/GBP</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "COINBASE:LTCGBP",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/COINBASE-LTCGBP/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade XRP/USD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "COINBASE:XRPUSD",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/COINBASE-XRPUSD/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade XRP/EUR</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "COINBASE:XRPEUR",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/COINBASE-XRPEUR/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade XRP/JPY</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "KRAKEN:XRPJPY",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/KRAKEN-XRPJPY/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div style="width:100%;height:60px;"></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade NEO/USD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "BITFINEX:NEOUSD",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/BITFINEX-NEOUSD/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="blue-text">Trade NEO/EUR</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "BITFINEX:NEOEUR",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/BITFINEX-NEOEUR/technicals/"
                                            }
                                        </script>
                                    </div></div>
                                <div class="col-lg-4 col-md-6"> <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="{{url('/webtrader')}}" rel="noopener" target="_blank"><span class="btn btn-lg custom-btn blue-text">Trade NEO/USD</span></a></div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                            {
                                                "interval": "1m",
                                                "width": 425,
                                                "isTransparent": false,
                                                "height": 450,
                                                "symbol": "BITFINEX:NEOGBP",
                                                "showIntervalTabs": true,
                                                "locale": "it",
                                                "colorTheme": "dark",
                                                "largeChartUrl": "https://www.tradingview.com/symbols/BITFINEX-NEOGBP/technicals/"
                                            }
                                        </script>
                                    </div></div>


                            </div>
                        </div>
                     


                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection
