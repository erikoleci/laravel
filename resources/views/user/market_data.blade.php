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
              Market Data
            </h3>        

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/cryptocurrencies/" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
    {
    "title": "Cryptocurrencies",
    "title_raw": "Cryptocurrencies",
    "title_link": "/markets/cryptocurrencies/prices-all/",
    "width": "100%",
    "height": 810,
    "locale": "en",
    "showSymbolLogo": true,
    "symbolsGroups": [
      {
        "name": "Overview",
        "symbols": [
          {
            "name": "BITSTAMP:BTCUSD"
          },
          {
            "name": "BITSTAMP:ETHUSD"
          },
          {
            "name": "BITSTAMP:XRPUSD"
          },
          {
            "name": "COINBASE:BCHUSD"
          },
          {
            "name": "COINBASE:LTCUSD"
          },
          {
            "name": "BITFINEX:IOTUSD"
          }
        ]
      },
      {
        "name": "Bitcoin",
        "symbols": [
          {
            "name": "BITSTAMP:BTCUSD"
          },
          {
            "name": "COINBASE:BTCEUR"
          },
          {
            "name": "COINBASE:BTCGBP"
          },
          {
            "name": "BITFLYER:BTCJPY"
          },
          {
            "name": "CEXIO:BTCRUB"
          },
          {
            "name": "CME:BTC1!"
          }
        ]
      },
      {
        "name": "XRP",
        "symbols": [
          {
            "name": "BITSTAMP:XRPUSD"
          },
          {
            "name": "KRAKEN:XRPEUR"
          },
          {
            "name": "KORBIT:XRPKRW"
          },
          {
            "name": "BITSO:XRPMXN"
          },
          {
            "name": "BINANCE:XRPBTC"
          },
          {
            "name": "BITTREX:XRPETH"
          }
        ]
      },
      {
        "name": "Ethereum",
        "symbols": [
          {
            "name": "COINBASE:ETHUSD"
          },
          {
            "name": "KRAKEN:ETHEUR"
          },
          {
            "name": "KRAKEN:ETHGBP"
          },
          {
            "name": "KRAKEN:ETHJPY"
          },
          {
            "name": "POLONIEX:ETHBTC"
          },
          {
            "name": "KRAKEN:ETHXBT"
          }
        ]
      },
      {
        "name": "Bitcoin Cash",
        "symbols": [
          {
            "name": "COINBASE:BCHUSD"
          },
          {
            "name": "BITSTAMP:BCHEUR"
          },
          {
            "name": "CEXIO:BCHGBP"
          },
          {
            "name": "BITSTAMP:BCHBTC"
          },
          {
            "name": "HITBTC:BCHETH"
          },
          {
            "name": "KRAKEN:BCHXBT"
          }
        ]
      }
    ],
    "colorTheme": "dark"
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
