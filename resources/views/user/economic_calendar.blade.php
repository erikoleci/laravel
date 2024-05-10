@extends('layouts.dashboard')
@section('style')
@endsection
@section('content')

    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row padd_1r">
            

  <div class="col-sm-10" style="margin: auto">
          
         
    <h3 class="text-center">
        Ecomomic Calendar
    </h3>  
    
    
    <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/currencies/economic-calendar/" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
    {
    "colorTheme": "dark",
    "isTransparent": false,
    "width": "100%",
    "height": "800",
    "locale": "en",
    "importanceFilter": "-1,0,1"
  }
    </script>
  </div>
  <!-- TradingView Widget END -->
                </div>
            </div>
        </div>
    </div>





@endsection

@section('scripts')
@endsection
