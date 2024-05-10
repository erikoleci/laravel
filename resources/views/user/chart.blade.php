@extends('layouts.dashboard')
@section('style')
@endsection
@section('content')



    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-10" style="margin:auto" >

            <br>
            
            <h3 class="text-center">
                Advanced Real-Time Chart Widget
            </h3>        

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container" style="margin: auto">
    <div id="tradingview_e5c57"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text"> </span></a>  </div>
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script type="text/javascript">
    new TradingView.widget(
    {
    "width": '100%',
    "height": 810,
    "symbol": "NASDAQ:AAPL",
    "interval": "D",
    "timezone": "Etc/UTC",
    "theme": "dark",
    "style": "1",
    "locale": "en",
    "toolbar_bg": "#f1f3f6",
    "enable_publishing": false,
    "withdateranges": true,
    "allow_symbol_change": true,
    "container_id": "tradingview_e5c57"
  }
    );
    </script>
  </div>
  <!-- TradingView Widget END -->




                </div>
            </div>
            <!-- end row -->
            <!-- end row -->

        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->


@endsection

@section('scripts')
  
@endsection
