@extends('layouts.dashboard')
@section('style')

    <style>.title-head {

            font-weight: 800;
            font-size: 45px;
            line-height: 45px;
            padding: 10px 0 20px;
            position: relative;
            text-transform: uppercase;

        }

        .title-head-subtitle p {
            position: relative;
            display: inline-block;
            text-transform: uppercase;
            margin-bottom: 25px;
            font-size: 16px;

        }



        .title-head-subtitle p:before {
            position: absolute;
            content: "";
            height: 2px;
            right: -50px;
            top: 13px;
            width: 30px;
            background:#D2B666 ;
        }
        .title-head-subtitle p:after {
            position: absolute;
            content: "";
            height: 2px;
            left: -50px;
            top: 13px;
            width: 30px;
            background:#D2B666 ;
        }

        .title-head span{color: #D2B666;}

        .about-text{font-size:16px;}
        .title-about{text-transform: uppercase;}
        .table_custom{border: 1px solid black; text-align: center;}
        .table_custom thead{background: #216ab5;}



        body.night .table_custom{border: 1px solid white;color: white;}

         .custom_icon{font-size: 50px;
             color: #216ab5;}

        .custom_icon1{font-size: 27px;
             }

        .icon {
            position: relative;
            width: 32px;
            height: 32px;
            display: block;
            fill: rgba(51, 51, 51, 0.5);
            margin-right: 20px;
            -webkit-transition: all .2s ease-out;
            transition: all .2s ease-out;
        }

        .icon.active {
            color: #216ab5;
        }

        .icon.big {
            width: 64px;
            height: 64px;
            fill: rgba(51, 51, 51, 0.5);
        }

        #wrapper1 {
            width: 900px;
            height: 400px;
            margin: auto;
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: left;
            justify-content: left;
            overflow: hidden;
        }

        body.night #wrapper1{background: linear-gradient(to top, #000000, #434343);
            border: 3px outset #216ab585;
            border-top: none;
           }

        #left-side {
            height: 70%;
            width: 23%;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding: 0;
        }

        #left-side ul{padding:15px 0;}
        #left-side ul li {
            padding-top: 10px;
            padding-bottom: 10px;
            display: -webkit-box;
            display: flex;
            line-height: 34px;
            color: rgba(51, 51, 51, 0.5);
            font-weight: 500;
            cursor: pointer;
            -webkit-transition: all .2s ease-out;
            transition: all .2s ease-out;
        }

        body.night #left-side ul li { color: rgba(255, 255, 255, 0.7);}

        #left-side ul li:hover {
            color: white;
            -webkit-transition: all .2s ease-out;
            transition: all .2s ease-out;
        }
        #left-side ul li.active {
            color: black;
            font-weight: bold;
        }


        body.night #left-side ul li.active {
            color: white;
            font-weight: bold;
        }
        #left-side ul li.active:hover > .icon {
            fill: #white;
        }

        #border {
            height: 288px;
            width: 1px;
            background-color: white;
        }
        #border #line.one {
            width: 5px;
            height: 54px;
            background-color: #216ab5;
            margin-left: -2px;
            margin-top: 35px;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }
        #border #line.two {
            width: 5px;
            height: 54px;
            background-color: #216ab5;
            margin-left: -2px;
            margin-top: 89px;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }
        #border #line.three {
            width: 5px;
            height: 54px;
            background-color: #216ab5;
            margin-left: -2px;
            margin-top: 143px;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }
        #border #line.four {
            width: 5px;
            height: 54px;
            background-color: #216ab5;
            margin-left: -2px;
            margin-top: 197px;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        #border #line.fifth {
            width: 5px;
            height: 54px;
            background-color: #216ab5;
            margin-left: -2px;
            margin-top: 227px;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        #right-side {
            height: 300px;
            width: 77%;
            overflow: hidden;
        }
        #right-side #first, #right-side #second, #right-side #third, #right-side #fourth,#right-side #fifth {
            height: 300px;
            -webkit-transition: all .6s ease-in-out;
            transition: all .6s ease-in-out;
            margin-top: -350px;
            opacity: 0;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
        }

        #right-side #first.active{margin-top: 0;}
        #right-side #second.active{margin-top: 50px;}
        #right-side #third.active{margin-top: 100px;}
        #right-side #fourth.active{margin-top: 150px;}
        #right-side #fifth.active{margin-top: 200px;}


        body.night #right-side #first h1 {
            font-weight: 800;
            color: white;
        }
        body.night #right-side #second h1 {
            font-weight: 800;
            color: white;
        }
        body.night #right-side #third h1 {
            font-weight: 800;
            color: white;
        }
        body.night #right-side #fourth h1 {
            font-weight: 800;
            color: white;}
        body.night #right-side #fifth h1 {
            font-weight: 800;
            color: white;}


        #right-side #first h1, #right-side #second h1, #right-side #third h1, #right-side #fourth h1, #right-side #fifth h1 {
            font-weight: 800;
            color: black;
        }



        #right-side #first p, #right-side #second p, #right-side #third p, #right-side #fourth p, #right-side #fifth p {
            color: black;
            font-weight: 500;
            padding-left: 30px;
            padding-right: 30px;
        }

        body.night #right-side #first p {
            color: white;
            font-weight: 500;
            padding-left: 30px;
            padding-right: 30px;
        }
        body.night #right-side #second p {
            color: white;
            font-weight: 500;
            padding-left: 30px;
            padding-right: 30px;
        }
        body.night #right-side #third p{
            color: white;
            font-weight: 500;
            padding-left: 30px;
            padding-right: 30px;
        }
        body.night #right-side #fourth p {
            color: white;
            font-weight: 500;
            padding-left: 30px;
            padding-right: 30px;
        }

        body.night #right-side #fifth p {
            color: white;
            font-weight: 500;
            padding-left: 30px;
            padding-right: 30px;
        }

        #right-side #first.active, #right-side #second.active, #right-side #third.active, #right-side #fourth.active  {
            color: black;
            opacity: 1;
            -webkit-transition: all .6s ease-in-out;
            transition: all .6s ease-in-out;
        }

        #right-side #fifth.active{ color: black;
            opacity: 1;
            -webkit-transition: all .6s ease-in-out;
            transition: all .6s ease-in-out;}

    </style>
@endsection
@section('content')

    <div class="page-content-wrapper ">

        <div class="container-fluid">


                    <div class="row text-center">
                        <h2 class="title-head centered">RISK <span>MANAGEMENT</span></h2>
                        <div class="title-head-subtitle col-lg-12">
                            <p>Tecniche di Risk Management per Trader Attivi</p>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-12 col-md-7 col-lg-10 centered">
                            <p class="about-text">Money o Risk Management: è l’elemento fondamentale per il successo. Il Money Management, in parole povere, vi dice su quanti contratti (o azioni, o asset) potete lavorare in un certo momento considerando determinati parametri di portafoglio e rischio. È praticamente impossibile guadagnare denaro senza un uso corretto di tecniche di Money/Risk Management. </p>
                            <p class="about-text">Un Risk Management che analizza il rischio legato alla posizione assunta è imprescindibile per chi opera sui mercati. È necessario essere consapevoli di quanto sia difficile recuperare denaro dopo aver subito una grossa perdita poiché sarà richiesta una performance sempre più elevata in funzione delle dimensioni della perdita stessa.</p>

                        </div>
                    </div>


                        <div class="col-sm-7 centered">
                            <div class="takeaways">
                                <h3 class="takeaways_h3">
                                    {{__("AD ESEMPIO")}} </h3>
                                <div id="mntl-sc-block-callout-body_1-0" class="comp mntl-sc-block-callout-body mntl-text-block">
                                    <ul><li class="m-b-10">{{__("Se da un capitale iniziale di 100 Euro perdete il 50%, restate con 50 Euro (100- (100*50/100)=50)")}}</li><li class="m-b-10">{{__("Ma se, partendo da 50 Euro, riguadagnate la stessa percentuale che avete perso, il 50%, arrivate a 75 Euro (50+(50*50/100)=75)")}}</li><li class="m-b-10">{{__("Per comprendere meglio il concetto, ecco una tabella:")}}</li></ul> </div>
                            </div>
                        </div>

                        <div class="row m-t-40">

                            <div class="col-sm-12 col-md-7 col-lg-6 centered">
                                <table class="table table_custom">
                                    <thead>
                                    <th>PERDITA</th>
                                    <th>RECUPERO</th>
                                    </thead>
                                    <tbody>
                                    <tr><td>-10%</td><td>11%</td></tr>
                                    <tr><td>-20%</td><td>25%</td></tr>
                                    <tr><td>-30%</td><td>43%</td></tr>
                                    <tr><td>-40%</td><td>67%</td></tr>
                                    <tr><td>-50%</td><td>100%</td></tr>
                                    <tr><td>-60%</td><td>100%</td></tr>
                                    <tr><td>-70%</td><td>150%</td></tr>
                                    <tr><td>-80%</td><td>233%</td></tr>
                                    <tr><td>-90%</td><td>400%</td></tr>
                                    <tr><td>-100%</td><td>900%</td></tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>


                            <div class="row m-t-40">
                                <div class="col-sm-12 col-md-7 col-lg-10 centered">
                                    <p class="about-text">Il Money Management non va confuso con lo stop loss. Il posizionamento di uno stop non ha nulla a che fare col “quanto”. Le statistiche confermano che il 90% dei traders perde denaro, il 5% raggiunge il break-even e solo il 5% riesce a guadagnare. Spesso, il trader perdente potrebbe far parte di quel 10% che almeno raggiunge il break-even se solo fosse capace di dimensionare correttamente le proprie operazioni. </p>
                                    <p class="about-text">La corretta gestione del rischio è la differenza tra un trading vincente ed uno perdente. L’operare correttamente sul mercato è costituito al 90% dal Money e Portfolio Management; un fatto, questo, che la maggior parte delle persone non riescono o non vogliono comprendere. Una volta che si ha il corretto Money Management, la disciplina e la psicologia completano la figura del buon investitore.</p>
                                </div>
                            </div>

                            <div class="container m-t-40">
                            <div class="row about-content m-t-40 m-b-30">
                                <div class="col-sm-12 col-md-7 m-t-40 col-lg-6">
                                    <p class="about-text">Il Money Management “base” deve essere ben chiaro, a chi si accinge ad operare sui mercati, che il punto fondamentale da tenere a mente è la protezione e la salvaguardia del proprio capitale. Solo se riuscirete a non diminuire l'efficienza del vostro capitale potrete sperare di rimanere abbastanza a lungo sul mercato per poter continuare ad operare. Se vi convincete di questo, se lo riterrete assai più importante del cercare disperatamente un gain, presi dalla frenesia che è assai simile a quella che assale i giocatori di azzardo, allora siete a buon punto.</p>
                                    <p class="about-text">Innanzitutto ponete la massima attenzione al drawdown, inteso come “la quantità di denaro che si può perdere nella attività di trading, espressa in termini di percentuale del capitale totale a disposizione”. (NB. Il drawdown è la differenza tra un picco ed una valle in un grafico di una equity line). Il sistema di trading o la tecnica operativa che intendete adottare, o che avete usato fino ad oggi, deve presentare un drawdown massimo tale da non intaccare l'efficienza del vostro capitale. Vediamo a grandi linee alcuni elementi guida.</p>
                                    </div>


                                <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                                    <img id="about-us" style="width:500px;" class="img-responsive img-about-us" src="{{asset('images/risk_management.png')}}" alt="about us">
                                </div>
                            </div>
                            </div>


                           <div class="row text-center m-t-40">
                               <div class="title-head-subtitle col-lg-12">
                                   <p>Tecniche di Risk Management per Trader Attivi</p>
                               </div>
                           </div>

                                          <div class="row m-t-40">
                               <div class="col-sm-12 col-md-7 col-lg-10 centered">
                                   <p class="about-text">Suggerimenti generali per una semplice gestione del rischio nel trading Il Money Management può essere applicato utilizzando svariate tecniche e strategie. Dalle più semplici, legate al "buon senso" a quelle più complesse costituite dall'applicazione di modelli matematici. </p>
                                   <p class="about-text">Per la maggior parte dei traders può essere sufficiente l'applicazione delle regole del "buon senso" per riuscire a sopravvivere a lungo ed in maniera profittevole al proprio sistema di trading ed al mercato. Vediamo quali sono le regole principali per una corretta gestione del rischio:</p>
                               </div>
                           </div>


                    <div class="row m-t-40 p-t-10">
                        <div id="wrapper1">
                            <div id="left-side">
                                <ul>
                                    <li class="choose active">
                                        <div class="icon active">
                                            <i class="fas custom_icon1 fa-money-bill-wave"></i>
                                        </div>
                                        Capitali Adeguati
                                    </li>
                                    <li class="pay">
                                        <div class="icon">
                                            <i class="fas custom_icon1 fa-exclamation-triangle"></i>
                                        </div>
                                        Rischio
                                    </li>
                                    <li class="wrap">
                                        <div class="icon">
                                            <i class="far fa-chart-bar custom_icon1"></i>
                                        </div>
                                        Stop-Orders
                                    </li>
                                    <li class="ship">
                                        <div class="icon">
                                            <i class="fas custom_icon1 fa-percent"></i>
                                        </div>
                                        Rapporto
                                    </li>
                                    <li class="volatilita">
                                        <div class="icon">
                                            <i class="fas custom_icon1 fa-exchange-alt"></i>
                                        </div>
                                        Volatilità
                                    </li>
                                </ul>
                            </div>

                            <div id="border">
                                <div id="line" class="one"></div>
                            </div>

                            <div id="right-side">
                                <div id="first" class="active">
                                    <div class="icon big">
                                        <i class="fas custom_icon fa-money-bill-wave"></i>
                                    </div>

                                    <h1>Non essere sottocapitalizzati</h1>

                                    <p>Importante è avere dei capitali adeguati allo strumento (future o azionario) sul quale ci accingiamo ad operare e non prendere eccessivi rischi. Questi due princìpi aiutano a sopravvivere abbastanza a lungo per poter essere in condizione di prosperare. Esistono numerosi esempi di traders con piccoli capitali che sono stati "eliminati" velocemente all'inizio della loro carriera</p>
                                </div>
                                <div id="second">
                                    <div class="icon big">
                                        <i class="fas custom_icon fa-exclamation-triangle"></i>
                                    </div>

                                    <h1>Rischiare, una piccola percentuale </h1>

                                    <p>Rischiare, nella singola operazione, solamente una piccola percentuale del capitale a disposizione, preferibilmente non più del 5% del proprio portafoglio. Si possono accumulare delle fortune, nel lungo periodo, anche facendo trading solo con 2-3 contratti per volta. L'importante è sopravvivere abbastanza a lungo per continuare a lavorare sul mercato, senza esserne "spazzati via" (wiped-out). </p>
                                </div>
                                <div id="third">
                                    <div class="icon big">
                                        <i class="far fa-chart-bar custom_icon"></i>
                                    </div>

                                    <h1>Usate stop-orders reali</h1>

                                    <p>Inseriteli subito dopo aver assunto posizione sul mercato. Gli stop-loss "mentali" non funzionano! 4.	Limitate il rischio del vostro intero portafoglio al massimo al 20%. In altre parole, se doveste subire stop-loss contemporaneamente in tutte le posizioni che avevate assunto, fate in maniera che vi rimanga ancora l'80% del capitale di partenza. </p>

                                </div>
                                <div id="fourth">
                                    <div class="icon big">
                                        <i class="fas custom_icon fa-percent"></i>
                                    </div>

                                    <h1>Rapporto Reward/Risk  </h1>

                                    <p>Mantenete un rapporto reward/risk (= rendimento/rischio) minimo di 2:1 e preferibilmente 3:1 o più. In altre parole, se rischiate 1 punto cercate di avere un target di almeno 2, meglio 3 punti. Prendete il profitto quando la posizione è a vostro favore. Una volta che il profitto che state realizzando nella operazione ha superato la cifra che corrispondeva al vostro rischio iniziale, chiudete una parte della posizione e portate lo stop-loss sul valore del breakeven. </p>

                                </div>

                                <div id="fifth">
                                    <div class="icon big">
                                        <i class="fas custom_icon fa-exchange-alt"></i>
                                    </div>

                                    <h1>Volatilità </h1>

                                    <p>Studiate la volatilità del mercato sul quale vi accingete ad operare ed adeguate la dimensione della posizione (position sizing) alle condizioni della volatilità stessa. Assumere posizioni più piccole in mercati altamente volatili. Siate consci del fatto che la volatilità è ciclica. </p>

                                </div>
                            </div>
                        </div>

                    </div>



        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
        }



        $(".choose").click(function() {
            $(".choose").addClass("active");
            $(".choose > .icon").addClass("active");
            $(".pay").removeClass("active");
            $(".wrap").removeClass("active");
            $(".ship").removeClass("active");
            $(".volatilita").removeClass("active");
            $(".pay > .icon").removeClass("active");
            $(".wrap > .icon").removeClass("active");
            $(".ship > .icon").removeClass("active");
            $(".volatilita > .icon").removeClass("active");
            $("#line").addClass("one");
            $("#line").removeClass("two");
            $("#line").removeClass("three");
            $("#line").removeClass("four");
            $("#line").removeClass("fifth");
        })

        $(".pay").click(function() {
            $(".pay").addClass("active");
            $(".pay > .icon").addClass("active");
            $(".choose").removeClass("active");
            $(".wrap").removeClass("active");
            $(".ship").removeClass("active");
            $(".volatilita").removeClass("active");
            $(".choose > .icon").removeClass("active");
            $(".wrap > .icon").removeClass("active");
            $(".ship > .icon").removeClass("active");
            $(".volatilita > .icon").removeClass("active");
            $("#line").addClass("two");
            $("#line").removeClass("one");
            $("#line").removeClass("three");
            $("#line").removeClass("four");
            $("#line").removeClass("fifth");
        })

        $(".wrap").click(function() {
            $(".wrap").addClass("active");
            $(".wrap > .icon").addClass("active");
            $(".pay").removeClass("active");
            $(".choose").removeClass("active");
            $(".ship").removeClass("active");
            $(".volatilita").removeClass("active");
            $(".pay > .icon").removeClass("active");
            $(".choose > .icon").removeClass("active");
            $(".ship > .icon").removeClass("active");
            $(".volatilita > .icon").removeClass("active");
            $("#line").addClass("three");
            $("#line").removeClass("two");
            $("#line").removeClass("one");
            $("#line").removeClass("four");
            $("#line").removeClass("fifth");
        })

        $(".ship").click(function() {
            $(".ship").addClass("active");
            $(".ship > .icon").addClass("active");
            $(".pay").removeClass("active");
            $(".wrap").removeClass("active");
            $(".choose").removeClass("active");
            $(".volatilita").removeClass("active");
            $(".pay > .icon").removeClass("active");
            $(".wrap > .icon").removeClass("active");
            $(".choose > .icon").removeClass("active");
            $(".volatilita > .icon").removeClass("active");
            $("#line").addClass("four");
            $("#line").removeClass("two");
            $("#line").removeClass("three");
            $("#line").removeClass("one");
            $("#line").removeClass("fifth");
        })

        $(".volatilita").click(function() {
            $(".volatilita").addClass("active");
            $(".ship").removeClass("active");
            $(".volatilita > .icon").addClass("active");
            $(".ship > .icon").removeClass("active");
            $(".pay").removeClass("active");
            $(".wrap").removeClass("active");
            $(".choose").removeClass("active");
            $(".pay > .icon").removeClass("active");
            $(".wrap > .icon").removeClass("active");
            $(".choose > .icon").removeClass("active");
            $("#line").removeClass("four");
            $("#line").removeClass("two");
            $("#line").removeClass("three");
            $("#line").removeClass("one");
            $("#line").addClass("fifth");
        })

        $(".choose").click(function() {
            $("#first").addClass("active");
            $("#second").removeClass("active");
            $("#third").removeClass("active");
            $("#fourth").removeClass("active");
            $("#fifth").removeClass("active");
        })

        $(".pay").click(function() {
            $("#first").removeClass("active");
            $("#second").addClass("active");
            $("#third").removeClass("active");
            $("#fourth").removeClass("active");
            $("#fifth").removeClass("active");
        })

        $(".wrap").click(function() {
            $("#first").removeClass("active");
            $("#second").removeClass("active");
            $("#third").addClass("active");
            $("#fourth").removeClass("active");
            $("#fifth").removeClass("active");
        })

        $(".ship").click(function() {
            $("#first").removeClass("active");
            $("#second").removeClass("active");
            $("#third").removeClass("active");
            $("#fourth").addClass("active");
            $("#fifth").removeClass("active");
        })

        $(".volatilita").click(function() {
            $("#first").removeClass("active");
            $("#second").removeClass("active");
            $("#third").removeClass("active");
            $("#fourth").removeClass("active");
            $("#fifth").addClass("active");
        })

    </script>
@endsection
