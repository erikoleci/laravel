@extends('layouts.dashboard')
@section('style')
@endsection
@section('content')



    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="float-right page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"></a></li>
                            <li class="breadcrumb-item"><a href="#">Markets</a></li>
                            <li class="breadcrumb-item active">Stocks</li>
                        </ol>
                    </div>

                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Stocks</h4>


                            <div class="table-rep-plugin">
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table  table-striped">
                                        <thead>
                                        <tr>
                                            <th data-priority="1">SYMBOL</th>
                                            <th data-priority="3">SPREAD</th>
                                            <th data-priority="1">LEVERAGE</th>
                                            <th data-priority="3">VOLUME</th>
                                            <th data-priority="3">MARGIN CALL</th>
                                            <th data-priority="6">STOP OUT</th>
                                            <th data-priority="6">SWAP SELL</th>
                                            <th data-priority="6">SWAP BUY</th>
                                            <th data-priority="6">ORARI TRADING</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th>AAL (AMERICAN AIRLINES)</th>
                                            <td>1.3</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>

                                        <tr>
                                            <th>AAPL (APPLE)</th>
                                            <td>1.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>AMZN (AMAZON)</th>
                                            <td>1.3</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>GOOGL (GOOGLE)</th>
                                            <td>2.2</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>MSFT (MICROSOFT)</th>
                                            <td>1.9</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>NFLX (NETFLIX)</th>
                                            <td>2.4</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>TSLA (TESLA)</th>
                                            <td>1.3</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>AXP (AMERICAN EXPRESS)</th>
                                            <td>1.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>BA (BOEING)</th>
                                            <td>3.4</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>BABA (ALIBABA)</th>
                                            <td>2.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>BAC (BANK OF AMERICA)</th>
                                            <td>2.7</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>BLK (BLACK ROCK)</th>
                                            <td>5.5</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>CG (CITY GROUP)</th>
                                            <td>1.7</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>CL (COLGATE PALMOLIVE)</th>
                                            <td>4.3</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>DIS (DISNEY)</th>
                                            <td>4.7</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>EBAY (EBAY INC)</th>
                                            <td>1.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>FB (FACEBOOK)</th>
                                            <td>3.4</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>FDX (FEDEX GROUP)</th>
                                            <td>5.3</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>GM (GENERAL MOTORS)</th>
                                            <td>2.4</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>GS (GOLDMAN SACHS GROUP)</th>
                                            <td>2.3</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>HSBC (HSBC HOLDINGS)</th>
                                            <td>1.9</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>IBM (IBM)</th>
                                            <td>3.7</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>JPM (JP MORGAN)</th>
                                            <td>4.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>KO (COCA-COLA)</th>
                                            <td>5.2</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>MA (MASTERCARD)</th>
                                            <td>3.2</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>MS (MORGAN STANLEY)</th>
                                            <td>2.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>NKE (NIKE INC)</th>
                                            <td>2.7</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>RACE (FERRARI)</th>
                                            <td>2.4</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>SNP (CHINA PETROLEUM)</th>
                                            <td>4.4</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>TWTR (TWITTER)</th>
                                            <td>1.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>V (VISA INC)</th>
                                            <td>2.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>VZ (VERIZON COMMUNICATION)</th>
                                            <td>3.4</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>XOM (EXXON MOBIL)</th>
                                            <td>3.4</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.2</td>
                                            <td>-1.5</td>
                                            <td>15:30 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <th>ADS (ADIDAS SOLOMON)</th>
                                            <td>2.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.4</td>
                                            <td>-1.8</td>
                                            <td>09:00 - 17:20</td>
                                        </tr>
                                        <tr>
                                            <th>BMW</th>
                                            <td>3.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.4</td>
                                            <td>-1.8</td>
                                            <td>09:00 - 17:20</td>
                                        </tr>
                                        <tr>
                                            <th>DAI (DAIMLER)</th>
                                            <td>2.4</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.4</td>
                                            <td>-1.8</td>
                                            <td>09:00 - 17:20</td>
                                        </tr>
                                        <tr>
                                            <th>DBK ( DEUTSCHE BANK)</th>
                                            <td>2.2</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.4</td>
                                            <td>-1.8</td>
                                            <td>09:00 - 17:20</td>
                                        </tr>
                                        <tr>
                                            <th>SIE (SIEMENS)</th>
                                            <td>6.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.4</td>
                                            <td>-1.8</td>
                                            <td>09:00 - 17:20</td>
                                        </tr>
                                        <tr>
                                            <th>SSU (SAMSUNG ELECTRONICS)</th>
                                            <td>4.2</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.4</td>
                                            <td>-1.8</td>
                                            <td>09:00 - 17:20</td>
                                        </tr>
                                        <tr>
                                            <th>VOW (VOLKSWAGEN)</th>
                                            <td>2.4</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.4</td>
                                            <td>-1.8</td>
                                            <td>09:00 - 17:20</td>
                                        </tr>
                                        <tr>
                                            <th>AIR (AIRBUS GROUP)</th>
                                            <td>3.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.7</td>
                                            <td>-2</td>
                                            <td>09:00 - 17:20</td>
                                        </tr>
                                        <tr>
                                            <th>BNPP (BNP PARIBAS)</th>
                                            <td>2.4</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.7</td>
                                            <td>-2</td>
                                            <td>09:00 - 17:20</td>
                                        </tr>
                                        <tr>
                                            <th>RENA (RENAULT)</th>
                                            <td>2.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.7</td>
                                            <td>-2</td>
                                            <td>09:00 - 17:20</td>
                                        </tr>
                                        <tr>
                                            <th>SOB (SOFTBANK GROUP)</th>
                                            <td>1.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.3</td>
                                            <td>-1.7</td>
                                            <td>01:00 - 23:00</td>
                                        </tr>
                                        <tr>
                                            <th>XIAOMI (XIAOMI GROUP)</th>
                                            <td>2.2</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.3</td>
                                            <td>-1.7</td>
                                            <td>01:00 - 23:00</td>
                                        </tr>
                                        <tr>
                                            <th>AML (ASTON MARTIN LAGONDA)</th>
                                            <td>2.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-1.7</td>
                                            <td>-1.3</td>
                                            <td>09:00 - 17:20</td>
                                        </tr><tr>
                                            <th>ULVR (UNILEVER)</th>
                                            <td>2.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-1.7</td>
                                            <td>-1.3</td>
                                            <td>09:00 - 17:20</td>
                                        </tr><tr>
                                            <th>CRDI (UNICREDIT)</th>
                                            <td>2.2</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-1.4</td>
                                            <td>-1.2</td>
                                            <td>09:00 - 17:20</td>
                                        </tr><tr>
                                            <th>GASI (GENERALI ASSICURAZIONI)</th>
                                            <td>3.2</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-1.4</td>
                                            <td>-1.2</td>
                                            <td>09:00 - 17:20</td>
                                        </tr><tr>
                                            <th>JUVE (JUVENTUS FC)</th>
                                            <td>2.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-1.4</td>
                                            <td>-1.2</td>
                                            <td>09:00 - 17:20</td>
                                        </tr><tr>
                                            <th>ENI (ENI SPA)</th>
                                            <td>2.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-1.4</td>
                                            <td>-1.2</td>
                                            <td>09:00 - 17:20</td>
                                        </tr><tr>
                                            <th>XIAOMI (XIAOMI GROUP)</th>
                                            <td>2.2</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-2.3</td>
                                            <td>-1.7</td>
                                            <td>09:00 - 17:20</td>
                                        </tr><tr>
                                            <th>TLIT (TELECOM ITALIA)</th>
                                            <td>3.2</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-1.4</td>
                                            <td>-1.2</td>
                                            <td>09:00 - 17:20</td>
                                        </tr><tr>
                                            <th>ISP (INTESA SANPAOLO SPA)</th>
                                            <td>3.6</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-1.4</td>
                                            <td>-1.2</td>
                                            <td>09:00 - 17:20</td>
                                        </tr><tr>
                                            <th>PST (POSTE ITALIANE)</th>
                                            <td>4.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-1.4</td>
                                            <td>-1.2</td>
                                            <td>09:00 - 17:20</td>
                                        </tr>
                                        <tr>
                                            <th>FCHA (FIAT CHRYSLER AUTOMOBILES)</th>
                                            <td>2.8</td>
                                            <td>1:10</td>
                                            <td>0.1</td>
                                            <td>60%</td>
                                            <td>50%</td>
                                            <td>-1.4</td>
                                            <td>-1.2</td>
                                            <td>09:00 - 17:20</td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->


@endsection

@section('scripts')
    <script src="{{asset('plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js')}}"></script>
    <script>
        $(function() {
            $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });
    </script>
@endsection
