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
                Forex Cross Rates Widget
            </h3>        

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/currencies/forex-cross-rates/" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
    {
    "width": "100%",
    "height": 810,
    "currencies": [
      "EUR",
      "USD",
      "JPY",
      "GBP",
      "CHF",
      "AUD",
      "CAD",
      "NZD",
      "CNY",
      "TRY",
      "SEK",
      "NOK"
    ],
    "isTransparent": false,
    "colorTheme": "dark",
    "locale": "en"
  }
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
