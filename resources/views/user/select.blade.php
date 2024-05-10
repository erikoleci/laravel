<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width" charset="utf-8">
    <title> </title>

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">

    <style media="screen">
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }




        html, body {
            width: 100%;
            height: 100vh;
            overflow: hidden;
            background: #22222A;
            font-family: 'Fira Mono', monospace;
            -webkit-font-smoothing: antialiased;
            font-size: .88rem;
            color: #bdbdd5;
        }

        .content-width {
            width: 86%;
            height: 100vh;
            margin: 0 auto;
        }

        .slideshow {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .slideshow-items {
            position: relative;
            width: 100%;
            height: 300px;
        }

        .item {
            position: absolute;
            width: 100%;
            height: auto;
            top:-50px;
        }

        .item-image-container {
            position: relative;
            width: 38%;

        }

        .item-image-container::before {
            content: '';
            position: absolute;
            top: -1px;
            left: 0;
            width: 101%;
            height: 101%;
            background: #22222aab;
            opacity: 0;
            z-index: 1;
        }

        .item-image {
            position: relative;
            width: 100%;
            height: auto;
            opacity: 0;
            display: block;
            /* transition: property name | duration | timing-function | delay  */
            transition: opacity .3s ease-out .45s;
            box-shadow: -30px -25px 0 #0a0a0a;
        }

        .item.active .item-image {
            opacity: 1;
        }

        .item.active .item-image-container::before {
            opacity: .8;
        }

        .item-description {
            position: absolute;
            top: 182px;
            right: 0;
            width: 50%;
            padding-right: 4%;
            line-height: 1.8;
            z-index: 11561561522311236;
            height: 15px;
        }

        a {
            color: inherit;
            text-decoration: inherit;
        }


        .item-header {
            position: absolute;
            top: 150px;
            left: -1.8%;
            z-index: 100;
        }

        .item-header1{

            top: 265px!important;
            left: 0%!important;
            z-index: 100;
        }
        .item-header a{
            display: none;
            z-index: 0;
        }

        .item-header .vertical-part {
            margin: 0 -4px;
            font-family: 'Montserrat', sans-serif;
            -webkit-font-smoothing: auto;
            font-size: 7vw;
            color: #fff;
        }

        .vertical-part {
            overflow: hidden;
            display: inline-block;
            font-size: 18.5px;
        }

        .vertical-part b {
            display: flex;
            transform: translateY(100%);
        }

        .item-header .vertical-part b {
            transition: .5s;
        }

        .item-description .vertical-part b {
            display: none;
            z-index: 0;
            transition: .21s;
        }

        .item.active .item-header .vertical-part b {
            transform: translateY(0);
        }

        .item.active .item-header a {
            display: block;
            position: relative;
            z-index: 14522222222222;
        }

        .item.active .item-description .vertical-part b {
            transform: translateY(0);
            display: flex!important;
            z-index: 11515;
        }


        .item.active .item-description .vertical-part b .style-4 {
            display: flex;
        }


        .item.active .item-description .vertical-part b .style-5 {
            display: flex;
        }

        .item.active .item-description .vertical-part b .style-5:hover i {
            transform: scaleX(1);
        }


        .item.active .item-description .vertical-part b .style-4:hover i {
            transform: scaleY(1);
        }

        /* Controls ----------------------------------------------------------------------*/
        .controls {
            position: relative;
            text-align: right;
            z-index: 1000;
        }

        .controls ul {
            list-style: none;
        }

        .controls ul li {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin: 3px;
            background:#bdbdd5;;
            cursor: pointer;
        }



        .controls ul li.active {
            background:#6a6a77;;
        }



        /* Buttons style */


        .btn {
            position: relative;
            display: flex;
            width: 200px;
            height: 45px;
            border: 1px solid hsl(0, 0%, 100%);
            margin-right:15px;
        }

        .btn:hover .btn-txt {
            color: #b79f2b;
            transition-delay: .4s;
        }

        .d-flex{
            /* display:flex; */
            align-items:center;
            margin-top: 25px;
            z-index: -1;
            display: none;
        }

        .displ{
            display: flex;
            z-index:1520002;
        }

        .vertical-part{
            z-index: -5;}

        i {
            content: '';
            width: 100%;
            height: 100%;
            transition: all .5s  cubic-bezier(1,.49,.16,.96);
            background: hsl(0, 0%, 100%);
        }

        i:nth-child(1) {transition-delay: .02s;}
        i:nth-child(2) {transition-delay: .04s;}
        i:nth-child(3) {transition-delay: .06s;}
        i:nth-child(4) {transition-delay: .08s;}
        i:nth-child(5) {transition-delay: .10s;}
        i:nth-child(6) {transition-delay: .12s;}
        i:nth-child(7) {transition-delay: .14s;}
        i:nth-child(8) {transition-delay: .16s;}
        i:nth-child(9) {transition-delay: .18s;}
        i:nth-child(10) {transition-delay: .2s;}


        .btn-txt {
            position: absolute;
            width: 100%;
            font-size: 15px;
            font-weight: 800;
            line-height: 3;
            letter-spacing: 4px;
            text-align: center;
            text-transform: uppercase;
            color: hsl(0, 0%, 100%);
            transition: all .4s cubic-bezier(1,.49,.16,.96);
        }



        .style-4,
        .style-5 {
            flex-direction: row;
            display:none;
        }


        .style-5 i {transform-origin: center left;}

        .style-4 i {transform-origin: center top;}

        .style-5 i {
            transform: scaleX(0);
        }

        .style-4 i {
            transform: scaleY(0);
        }


        @media all and (max-width: 567px) {


            #d-flex1{z-index: 1561561561561561561561561561561561561561561561561561561156156156156}


            .content-width {
                width: 90%;
                min-height: 100vh;
                height: auto;
                margin: 0 auto;
                overflow: auto;
            }


            .slideshow {
                position: relative;
                width: 100%;
                display: flex;
                flex-direction: column;
                padding: 30px 0;
            }


            .slideshow-items {
                position: relative;
                width: 100%;
                height: 300px;
            }

            .item {
                position: absolute;
                width: 100%;
                height: auto;
                display: flex!important;
                flex-direction: column;
                justify-content: space-between;
            }


            .item-image-container {
                position: relative;
                width: 100%;
            }


            .item-description {
                position: relative;
                width: 100%;
                line-height: 1.8;
                z-index: 11561561522311236;
                height: 100%;
                padding-bottom: 20px;
            }


            .vertical-part {
                overflow: hidden;
                display: inline-block;
                font-size: 18px;
            }


            .d-flex {
                margin-top: 0px;
            }

            .btn {
                width: 141px;
                height: 40px;
            }


            .btn-txt {
                font-size: 18px;
                line-height: 2.3;
            }


            .item-header1 {
                top:182px!important;
                left: 6%!important;
            }

            .item-header {
                left: 5%;
            }

        }

        .error-msg{
            position: absolute;
            top: 10%;
            z-index: 12556156156156156;
            left: 50%;
            color: red;
            font-size: 20px;
        }



    </style>

</head>




<body>



<div class="content-width">
    <div class="slideshow">
        <!-- Slideshow Items -->
        <div class="slideshow-items">
            @if(isset( $_GET['regError']))
                <h3 class="error-msg">
                    {{$_GET['regError']}}
                </h3>
            @endif
            <div class="item">
                <div class="item-image-container">
                    <img class="item-image" src="{{asset('images/login-pr.jpg')}}" />
                 </div>
                <!-- Staggered Header Elements -->
                <div class="item-header">
                    <a href="">
                    <span class="vertical-part"><b>P</b></span>
                    <span class="vertical-part"><b>R</b></span>
                    <span class="vertical-part"><b>I</b></span>
                    <span class="vertical-part"><b>M</b></span>
                    <span class="vertical-part"><b>E</b></span>
                    </a>
                </div>
                <!-- Staggered Description Elements -->
                <div class="item-description">
          <span class="vertical-part">
            <b>Affidabili, </b>
          </span>
                    <span class="vertical-part">
            <b>semplici, </b>
          </span>
                    <span class="vertical-part">
            <b>innovativi!</b>
          </span>
                    <span class="vertical-part">
            <b>In</b>
          </span>
                    <span class="vertical-part">
            <b> ,</b>
          </span>
                    <span class="vertical-part">
            <b>vogliamo</b>
          </span>
                    <span class="vertical-part">
            <b>sempre</b>
          </span>
                    <span class="vertical-part">
            <b>offrirti</b>
          </span>
                    <span class="vertical-part">
            <b>la</b>
          </span>
                    <span class="vertical-part">
            <b>migliore</b>
          </span>
                    <span class="vertical-part">
            <b>esperienza</b>
          </span>
                    <span class="vertical-part">
            <b>di</b>
          </span>
                    <span class="vertical-part">
            <b>trading.</b>
          </span>
                    <span class="vertical-part">
            <b>Offriamo</b>
          </span>
                    <span class="vertical-part">
            <b>accesso</b>
          </span>
                    <span class="vertical-part">
            <b>al</b>
          </span>
                    <span class="vertical-part">
            <b>mercato</b>
          </span>
                    <span class="vertical-part">
            <b>globale</b>
          </span>
                    <span class="vertical-part">
            <b>del</b>
          </span>
                    <span class="vertical-part">
            <b>forex</b>
          </span>
                    <span class="vertical-part">
            <b>trading.</b>
          </span>
                    <span class="vertical-part">
            <b>Non</b>
          </span>
                    <span class="vertical-part">
            <b>importa</b>
          </span>
                    <span class="vertical-part">
            <b>se</b>
          </span>
                    <span class="vertical-part">
            <b>sei</b>
          </span>
                    <span class="vertical-part">
            <b>un</b>
          </span>
                    <span class="vertical-part">
            <b>principante</b>
          </span>
                    <span class="vertical-part">
            <b>o</b>
          </span>
                    <span class="vertical-part">
            <b>un</b>
          </span>
                    <span class="vertical-part">
            <b>esperto,</b>
          </span>
                    <span class="vertical-part">
            <b>siamo</b>
          </span>
                    <span class="vertical-part">
            <b>sempre</b>
          </span>
                    <span class="vertical-part">
            <b>qui</b>
          </span>
                    <span class="vertical-part">
            <b>per</b>
          </span>
                    <span class="vertical-part">
            <b>aiutarti.</b>
          </span>
                    <span class="vertical-part">
            <b>Iscriviti</b>
          </span>
                    <span class="vertical-part">
            <b>per</b>
          </span>
                    <span class="vertical-part">
            <b>un</b>
          </span>
                    <span class="vertical-part">
            <b>conto</b>
          </span>
                    <span class="vertical-part">
            <b>live</b>
          </span>
                    <span class="vertical-part">
            <b>per</b>
          </span>
                    <span class="vertical-part">
            <b>provare</b>
          </span>
                    <span class="vertical-part">
            <b>la</b>
          </span>
                    <span class="vertical-part">
            <b>nostra</b>
          </span>
                    <span class="vertical-part">
            <b>piattaforma</b>
          </span>
                    <span class="vertical-part">
            <b>e</b>
          </span>
                    <span class="vertical-part">
            <b>tutti</b>
          </span>
                    <span class="vertical-part">
            <b>i</b>
          </span>
                    <span class="vertical-part">
            <b>vantaggi</b>
          </span>
                    <span class="vertical-part">
            <b>che</b>
          </span>
                    <span class="vertical-part">
            <b>offre.</b>
          </span>

                    <br>
                    <br>
                    <br>
                    <br>

          <span id="d-flex1" class="d-flex vertical-part">
            <b>
           <div class="btn style-4">
              <i></i>
              <i></i>
              <i></i>
              <i></i>
              <i></i>
              <i></i>
              <i></i>
              <i></i>
              <i></i>
              <i></i>
             <span class="btn-txt"><a href="">Register</a></span>
            </div>
            <div class="btn style-5">
              <i></i>
              <i></i>
              <i></i>
              <i></i>
              <i></i>
              <i></i>
              <i></i>
              <i></i>
              <i></i>
              <i></i>
              <span class="btn-txt"><a href="">Login</a></span>
            </div>
           </b>
         </span>

                </div>
            </div>
            <div class="item">
                <div class="item-image-container">
                    <img class="item-image" src="{{asset('images/login-lg.jpg')}}" />
                </div>
                <!-- Staggered Header Elements -->
                <div class="item-header">
                    <a href="">
                    <span class="vertical-part"><b>L</b></span>
                    <span class="vertical-part"><b>E</b></span>
                    <span class="vertical-part"><b>G</b></span>
                    <span class="vertical-part"><b>A</b></span>
                    <span class="vertical-part"><b>C</b></span>
                    <span class="vertical-part"><b>Y</b></span>
                    </a>
                </div>
                <!-- Staggered Description Elements -->
                <div class="item-description">
          <span class="vertical-part">
            <b>Ad</b>
          </span>
                    <span class="vertical-part">
            <b> </b>
          </span>
                    <span class="vertical-part">
            <b>crediamo</b>
          </span>
                    <span class="vertical-part">
            <b>che</b>
          </span>
                    <span class="vertical-part">
            <b>i</b>
          </span>
                    <span class="vertical-part">
            <b>nostri</b>
          </span>
                    <span class="vertical-part">
            <b>clienti</b>
          </span>
                    <span class="vertical-part">
            <b>meritano</b>
          </span>
                    <span class="vertical-part">
            <b>il</b>
          </span>
                    <span class="vertical-part">
            <b>meglio</b>
          </span>
                    <span class="vertical-part">
            <b>e</b>
          </span>
                    <span class="vertical-part">
            <b>ci</b>
          </span>
                    <span class="vertical-part">
            <b>impegniamo</b>
          </span>
                    <span class="vertical-part">
            <b>ogni</b>
          </span>
                    <span class="vertical-part">
            <b>giorno</b>
          </span>
                    <span class="vertical-part">
            <b>per</b>
          </span>
                    <span class="vertical-part">
            <b>offrirlo.</b>
          </span>
                    <span class="vertical-part">
            <b>Scegli</b>
          </span>
                    <span class="vertical-part">
            <b>l'innovazione</b>
          </span>
                    <span class="vertical-part">
            <b>e</b>
          </span>
                    <span class="vertical-part">
            <b>la</b>
          </span>
                    <span class="vertical-part">
            <b>tecnologia</b>
          </span>
                    <span class="vertical-part">
            <b>all'avanguardia</b>
          </span>
                    <span class="vertical-part">
            <b>di</b>
          </span>
                    <span class="vertical-part">
            <b>un</b>
          </span>
                    <span class="vertical-part">
            <b>conto</b>
          </span>
                    <span class="vertical-part">
            <b>di</b>
          </span>
                    <span class="vertical-part">
            <b>trading</b>
          </span>
                    <span class="vertical-part">
            <b>creato</b>
          </span>
                    <span class="vertical-part">
            <b>per</b>
          </span>
                    <span class="vertical-part">
            <b>offrirti</b>
          </span>
                    <span class="vertical-part">
            <b>un'irripetibile</b>
          </span>
                    <span class="vertical-part">
            <b>esperienza</b>
          </span>
                    <span class="vertical-part">
            <b>di</b>
          </span>
                    <span class="vertical-part">
            <b>trading.</b>
          </span>
                    <span class="vertical-part">
            <b>Negozia</b>
          </span>
                    <span class="vertical-part">
            <b>i</b>
          </span>
                    <span class="vertical-part">
            <b>mercati</b>
          </span>
                    <span class="vertical-part">
            <b>in</b>
          </span>
                    <span class="vertical-part">
            <b>un</b>
          </span>
                    <span class="vertical-part">
            <b>conto</b>
          </span>
                    <span class="vertical-part">
            <b>con</b>
          </span>
                    <span class="vertical-part">
            <b>condizioni</b>
          </span>
                    <span class="vertical-part">
            <b>altamente</b>
          </span>
                    <span class="vertical-part">
            <b>competitive</b>
          </span>
                    <span class="vertical-part">
            <b>e</b>
          </span>
                    <span class="vertical-part">
            <b>stabilisci</b>
          </span>
                    <span class="vertical-part">
            <b>basi</b>
          </span>
                    <span class="vertical-part">
            <b>solide</b>
          </span>
                    <span class="vertical-part">
            <b>per</b>
          </span>
                    <span class="vertical-part">
            <b>il</b>
          </span>
                    <span class="vertical-part">
            <b>tuo</b>
          </span>
                    <span class="vertical-part">
            <b>portafoglio</b>
          </span>
                    <span class="vertical-part">
            <b>di</b>
          </span>
                    <span class="vertical-part">
            <b>trading.</b>
          </span>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="d-flex vertical-part">
                        <b>
                            <div class="btn style-4">
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <span class="btn-txt"><a href="">Register</a></span>
                            </div>
                            <div class="btn style-5">
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <span class="btn-txt"><a href="">Login</a></span>
                            </div>
                        </b>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item-image-container">
                    <img class="item-image" src="{{asset('images/login-hg.jpg')}}" />
                </div>
                <!-- Staggered Header Elements -->
                <div class="item-header">
                    <a href="">
                    <span class="vertical-part"><b>H</b></span>
                    <span class="vertical-part"><b>O</b></span>
                    <span class="vertical-part"><b>L</b></span>
                    <span class="vertical-part"><b>Y</b></span>
                    </a>
                </div>
                <div class="item-header item-header1">
                    <a href="">
                    <span class="vertical-part"><b>G</b></span>
                    <span class="vertical-part"><b>R</b></span>
                    <span class="vertical-part"><b>A</b></span>
                    <span class="vertical-part"><b>I</b></span>
                    <span class="vertical-part"><b>L</b></span>
                    </a>
                </div>
                <!-- Staggered Description Elements -->
                <div class="item-description">
          <span class="vertical-part">
            <b>Noi</b>
          </span>
                    <span class="vertical-part">
            <b>da</b>
          </span>
                    <span class="vertical-part">
            <b> </b>
          </span>
                    <span class="vertical-part">
            <b>crediamo</b>
          </span>
                    <span class="vertical-part">
            <b>che</b>
          </span>
                    <span class="vertical-part">
            <b>il</b>
          </span>
                    <span class="vertical-part">
            <b>successo</b>
          </span>
                    <span class="vertical-part">
            <b>non</b>
          </span>
                    <span class="vertical-part">
            <b>è</b>
          </span>
                    <span class="vertical-part">
            <b>una</b>
          </span>
                    <span class="vertical-part">
            <b>destinazione,</b>
          </span>
                    <span class="vertical-part">
            <b>ma</b>
          </span>
                    <span class="vertical-part">
            <b>un</b>
          </span>
                    <span class="vertical-part">
            <b>percorso</b>
          </span>
                    <span class="vertical-part">
            <b>che</b>
          </span>
                    <span class="vertical-part">
            <b>vogliamo</b>
          </span>
                    <span class="vertical-part">
            <b>fare</b>
          </span>
                    <span class="vertical-part">
            <b>insieme.</b>
          </span>
                    <span class="vertical-part">
            <b>Per</b>
          </span>
                    <span class="vertical-part">
            <b>questo</b>
          </span>
                    <span class="vertical-part">
            <b>ha</b>
          </span>
                    <span class="vertical-part">
            <b>finalmente</b>
          </span>
                    <span class="vertical-part">
            <b>lanciato</b>
          </span>
                    <span class="vertical-part">
            <b>un</b>
          </span>
                    <span class="vertical-part">
            <b>conto</b>
          </span>
                    <span class="vertical-part">
            <b>che</b>
          </span>
                    <span class="vertical-part">
            <b>risponde</b>
          </span>
                    <span class="vertical-part">
            <b>alle</b>
          </span>
                    <span class="vertical-part">
            <b>necessità</b>
          </span>
                    <span class="vertical-part">
            <b>e</b>
          </span>
                    <span class="vertical-part">
            <b>richieste</b>
          </span>
                    <span class="vertical-part">
            <b>anche</b>
          </span>
                    <span class="vertical-part">
            <b>dei</b>
          </span>
                    <span class="vertical-part">
            <b>clienti</b>
          </span>
                    <span class="vertical-part">
            <b>più</b>
          </span>
                    <span class="vertical-part">
            <b>esigenti</b>
          </span>
                    <span class="vertical-part">
            <b>e</b>
          </span>
                    <span class="vertical-part">
            <b>rigorosi.</b>
          </span>
                    <span class="vertical-part">
            <b>I</b>
          </span>
                    <span class="vertical-part">
            <b>mercati</b>
          </span>
                    <span class="vertical-part">
            <b>raramente</b>
          </span>
                    <span class="vertical-part">
            <b>incontrati</b>
          </span>
                    <span class="vertical-part">
            <b>in</b>
          </span>
                    <span class="vertical-part">
            <b>altre</b>
          </span>
                    <span class="vertical-part">
            <b>società,</b>
          </span>
                    <span class="vertical-part">
            <b>uniti</b>
          </span>
                    <span class="vertical-part">
            <b>in</b>
          </span>
                    <span class="vertical-part">
            <b>un</b>
          </span>
                    <span class="vertical-part">
            <b>solo</b>
          </span>
                    <span class="vertical-part">
            <b>account</b>
          </span>
                    <span class="vertical-part">
            <b>con</b>
          </span>
                    <span class="vertical-part">
            <b>strumenti</b>
          </span>
                    <span class="vertical-part">
            <b>e</b>
          </span>
                    <span class="vertical-part">
            <b>indicatori</b>
          </span>
                    <span class="vertical-part">
            <b>esclusivamente</b>
          </span>
                    <span class="vertical-part">
            <b>disponibili</b>
          </span>
                    <span class="vertical-part">
            <b>solo</b>
          </span>
                    <span class="vertical-part">
            <b>qui.</b>
          </span>
                    <span class="vertical-part">
            <b>Registrati</b>
          </span>
                    <span class="vertical-part">
            <b>subito</b>
          </span>
                    <span class="vertical-part">
            <b>nel</b>
          </span>
                    <span class="vertical-part">
            <b>conto</b>
          </span>
                    <span class="vertical-part">
            <b>live</b>
          </span>
                    <span class="vertical-part">
            <b>e</b>
          </span>
                    <span class="vertical-part">
            <b>approfitta</b>
          </span>
                    <span class="vertical-part">
            <b>della</b>
          </span>
                    <span class="vertical-part">
            <b>vasta</b>
          </span>
                    <span class="vertical-part">
            <b>gama</b>
          </span>
                    <span class="vertical-part">
            <b>di</b>
          </span>
                    <span class="vertical-part">
            <b>opportunità.</b>
          </span>

                    <br>
                    <br>
                    <br>
                    <br>

                    <div class="d-flex vertical-part">
                        <b>
                            <div class="btn style-4">
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <span class="btn-txt"><a href="">Register</a></span>
                            </div>
                            <div class="btn style-5">
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <span class="btn-txt"><a href="">Login</a></span>
                            </div>
                        </b>
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="item-image-container">
                   <img class="item-image" src="{{asset('images/login-gm.jpg')}}" />
                </div>
                <!-- Staggered Header Elements -->
                <div class="item-header">
                    <a href="">
                    <span class="vertical-part"><b>G</b></span>
                    <span class="vertical-part"><b>R</b></span>
                    <span class="vertical-part"><b>A</b></span>
                    <span class="vertical-part"><b>N</b></span>
                    <span class="vertical-part"><b>D</b></span>
                    </a>
                </div>
                <div class="item-header item-header1">
                    <a href="">
                    <span class="vertical-part"><b>M</b></span>
                    <span class="vertical-part"><b>A</b></span>
                    <span class="vertical-part"><b>S</b></span>
                    <span class="vertical-part"><b>T</b></span>
                    <span class="vertical-part"><b>E</b></span>
                    <span class="vertical-part"><b>R</b></span>
                    </a>
                </div>
                <!-- Staggered Description Elements -->
                <div class="item-description">
          <span class="vertical-part">
            <b>La</b>
          </span>
                    <span class="vertical-part">
            <b>strada</b>
          </span>
                    <span class="vertical-part">
            <b>verso</b>
          </span>
                    <span class="vertical-part">
            <b>il</b>
          </span>
                    <span class="vertical-part">
            <b>successo</b>
          </span>
                    <span class="vertical-part">
            <b>comincia</b>
          </span>
                    <span class="vertical-part">
            <b>dalla</b>
          </span>
                    <span class="vertical-part">
            <b>scelta</b>
          </span>
                    <span class="vertical-part">
            <b>del</b>
          </span>
                    <span class="vertical-part">
            <b>giusto</b>
          </span>
                    <span class="vertical-part">
            <b>partner</b>
          </span>
                    <span class="vertical-part">
            <b>nel</b>
          </span>
                    <span class="vertical-part">
            <b>percorso!</b>
          </span>
                    <span class="vertical-part">
            <b>Noi</b>
          </span>
                    <span class="vertical-part">
            <b>da</b>
          </span>
                    <span class="vertical-part">
            <b> </b>
          </span>
                    <span class="vertical-part">
            <b>vediamo</b>
          </span>
                    <span class="vertical-part">
            <b>il</b>
          </span>
                    <span class="vertical-part">
            <b>cliente</b>
          </span>
                    <span class="vertical-part">
            <b>non</b>
          </span>
                    <span class="vertical-part">
            <b>semplicemente</b>
          </span>
                    <span class="vertical-part">
            <b>come</b>
          </span>
                    <span class="vertical-part">
            <b>un</b>
          </span>
                    <span class="vertical-part">
            <b>trader</b>
          </span>
                    <span class="vertical-part">
            <b>ma</b>
          </span>
                    <span class="vertical-part">
            <b>un</b>
          </span>
                    <span class="vertical-part">
            <b>asset</b>
          </span>
                    <span class="vertical-part">
            <b>importante</b>
          </span>
                    <span class="vertical-part">
            <b>per</b>
          </span>
                    <span class="vertical-part">
            <b>la</b>
          </span>
                    <span class="vertical-part">
            <b>società.</b>
          </span>
                    <span class="vertical-part">
            <b>Non</b>
          </span>
                    <span class="vertical-part">
            <b>importa</b>
          </span>
                    <span class="vertical-part">
            <b>se</b>
          </span>
                    <span class="vertical-part">
            <b>sei</b>
          </span>
                    <span class="vertical-part">
            <b>un</b>
          </span>
                    <span class="vertical-part">
            <b>principiante</b>
          </span>
                    <span class="vertical-part">
            <b>o</b>
          </span>
                    <span class="vertical-part">
            <b>senza</b>
          </span>
                    <span class="vertical-part">
            <b>la</b>
          </span>
                    <span class="vertical-part">
            <b>giusta</b>
          </span>
                    <span class="vertical-part">
            <b>esperienza,</b>
          </span>
                    <span class="vertical-part">
            <b>noi</b>
          </span>
                    <span class="vertical-part">
            <b>sapremo</b>
          </span>
                    <span class="vertical-part">
            <b>come</b>
          </span>
                    <span class="vertical-part">
            <b>assistirti</b>
          </span>
                    <span class="vertical-part">
            <b>e</b>
          </span>
                    <span class="vertical-part">
            <b>dirigerti</b>
          </span>
                    <span class="vertical-part">
            <b>a</b>
          </span>
                    <span class="vertical-part">
            <b>raggiungere</b>
          </span>
                    <span class="vertical-part">
            <b>i</b>
          </span>
                    <span class="vertical-part">
            <b>tuoi</b>
          </span>
                    <span class="vertical-part">
            <b>obiettivi.</b>
          </span>
                    <span class="vertical-part">
            <b>Registrati</b>
          </span>
                    <span class="vertical-part">
            <b>nel</b>
          </span>
                    <span class="vertical-part">
            <b>nostro</b>
          </span>
                    <span class="vertical-part">
            <b>conto</b>
          </span>
                    <span class="vertical-part">
            <b>live</b>
          </span>
                    <span class="vertical-part">
            <b>e</b>
          </span>
                    <span class="vertical-part">
            <b>approfitta</b>
          </span>
                    <span class="vertical-part">
            <b>dalle</b>
          </span>
                    <span class="vertical-part">
            <b>svariate</b>
          </span>
                    <span class="vertical-part">
            <b>possibilità</b>
          </span>
                    <span class="vertical-part">
            <b>d’investimento.</b>
          </span>

                    <br>
                    <br>
                    <br>
                    <br>

                    <div class="d-flex vertical-part">
                        <b>
                            <div class="btn style-4">
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <span class="btn-txt"><a href="">Register</a></span>
                            </div>
                            <div class="btn style-5">
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <span class="btn-txt"><a href="">Login</a></span>
                            </div>
                        </b>
                    </div>
                </div>
            </div>

        </div>
        <div class="controls">
            <ul>
                <li class="control" data-index="0"></li>
                <li class="control" data-index="1"></li>
                <li class="control" data-index="2"></li>
                <li class="control" data-index="3"></li>
            </ul>
        </div>
    </div>
</div>





<script type="text/javascript">


    const items = document.querySelectorAll('.item'),
        controls = document.querySelectorAll('.control'),
        buttons = document.querySelectorAll('.d-flex'),
        headerItems = document.querySelectorAll('.item-header'),
        descriptionItems = document.querySelectorAll('.item-description'),
        activeDelay = .76,
        interval = 5000;

    let current = 0;

    const slider = {
        init: () => {
            controls.forEach(control => control.addEventListener('click', e => {slider.clickedControl(e);}));
            controls[current].classList.add('active');
            items[current].classList.add('active');
            buttons[current].classList.add('displ');
        },
        nextSlide: () => {// Increment current slide and add active class
            slider.reset();
            if (current === items.length - 1) current = -1; // Check if current slide is last in array
            current++;
            controls[current].classList.add('active');
            items[current].classList.add('active');
            buttons[current].classList.add('displ');
            slider.transitionDelay(headerItems);
            slider.transitionDelay(descriptionItems);
        },
        clickedControl: e => {// Add active class to clicked control and corresponding slide
            slider.reset();
            clearInterval(intervalF);

            const control = e.target,
                dataIndex = Number(control.dataset.index);

            control.classList.add('active');
            items.forEach((item, index) => {
                if (index === dataIndex) {// Add active class to corresponding slide
                    item.classList.add('active');
                    buttons[dataIndex].classList.add('displ');
                }
            });
            current = dataIndex; // Update current slide
            slider.transitionDelay(headerItems);
            slider.transitionDelay(descriptionItems);
            intervalF = setInterval(slider.nextSlide, interval); // Fire that bad boi back up
        },
        reset: () => {// Remove active classes
            items.forEach(item => item.classList.remove('active'));
            controls.forEach(control => control.classList.remove('active'));
            buttons.forEach(button => button.classList.remove('displ'));
        },
        transitionDelay: items => {// Set incrementing css transition-delay for .item-header & .item-description, .vertical-part, b elements
            let seconds;

            items.forEach(item => {
                const children = item.childNodes; // .vertical-part(s)
                let count = 1,
                    delay;

                item.classList.value === 'item-header' ? seconds = .015 : seconds = .007;

                children.forEach(child => {// iterate through .vertical-part(s) and style b element
                    if (child.classList) {
                        item.parentNode.classList.contains('active') ? delay = count * seconds + activeDelay : delay = count * seconds;
                        child.firstElementChild.style.transitionDelay = `${delay}s`; // b element
                        count++;
                    }
                });
            });
        } };


    let intervalF = setInterval(slider.nextSlide, interval);
    slider.init();
</script>
</body>


</html>
