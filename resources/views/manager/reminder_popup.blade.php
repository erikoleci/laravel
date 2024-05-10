@extends('layouts.app')

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        img {
            max-width: 100%;
        }

        body {
            background-color: #e6e6e6;
            display: flex;
            height: 100vh;
            width: 100vw;
        }

        .container {
            width: 1600px;
            max-width: 100%;
            margin: auto;
            padding: 0!important;
        }

        .display {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .display .display-item {
            flex-grow: 1;
            flex-basis: 1px;
            display: flex;
            justify-content: space-around;
            max-width: 100%;
        }

        .card {
            width: 426px;
            max-width: 100%;
            min-height: 530px;
            overflow: hidden;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            background-color: white;
            position: relative;
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            flex-direction: column;
            background-color:white!important;
        }
        .card .card-top {
            -webkit-flex-basis: 141px;
            flex-basis: 141px;
            flex-shrink: 1;
            background-color: rgba(0, 0, 0, 0.2);
            background-position: center;
            background-size: cover;
        }
        .card .card-profile {
            flex-basis: 90px;
            flex-shrink: 1;
        }
        .card .card-profile .profile-image {
            overflow: hidden;
            border-radius: 100%;
            position: absolute;
            left: calc(50% - 90px);
            top: calc(25% - 80px);
            width: 180px;
            height: 180px;
            background-size: cover;
            background-position: center;
        }
        .card .card-info {
            flex-basis: 56,66665%;
            flex-grow: 1;
            padding: 0 15px;
            text-align: center;
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            flex-direction: column;
        }

        .card .card-info .info-title h3 {
            font-weight: 400;
        }
        .card .card-info .info-follow {
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.3);
            font-size: 1em;
            color: #cab735;
            justify-content: center;
        }
        .card .card-info .info-follow > div {
            flex-grow: 1;
            flex-basis: 1px;
            min-height: 20px;
        }
        .card .card-info .info-bio {
            font-size: 17px;
            padding: 46px 4px 0px;
        }
        .card .card-info .info-social {
            flex-grow: 1;
            padding: 15px 0;
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }
        .card .card-info .info-social .social-icons {
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            justify-content: space-around;
        }
        .card .card-info .info-social .social-icons .sm {
            flex-basis: 40px;
            height: 40px;
            transition: all .3s ease-in-out;
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            justify-content: space-around;
            flex-direction: column;
            text-align: center;
            background-size: 100% 200%;
            background-position-y: 10%;
            font-size: 2em;
            color: rgba(0, 0, 0, 0.8);
            cursor: pointer;
        }
        .card .card-info .info-social .social-icons .sm:hover {
            background-position-y: 100%;
            color: white;
            border-radius: 4px;
        }
        .card .card-info .info-social .social-icons .sm.facebook {
            background-image: linear-gradient(transparent 50%, royalblue 50%);
        }
        .card .card-info .info-social .social-icons .sm.pint {
            background-image: linear-gradient(transparent 50%, green 50%);
        }
        .card .card-info .info-social .social-icons .sm.px500 {
            background-image: linear-gradient(transparent 50%, rgba(0, 0, 0, 0.8) 50%);
        }

        .card.huxi .card-top {
            background-image: linear-gradient(black, rgba(0, 0, 0, 0.7));
        }
        .card.huxi .profile-image {
            background-image: url({{asset('images/a1logo.png')}});
        }

        .callIcons{
            color: #000;
        }

        .callIcons:hover{
            color: #fff;
        }

        .user_name{
            color: #000;
        }


    </style>




    <div class="container">
        <div class="display">
            <div class="display-item">
                <div class="card huxi">
                    <div class="card-top"></div>
                    <div class="card-profile">
                        <div class="profile-image">
                        </div>
                    </div>
                    <div class="card-info">
                        <div class="info-title">
                            <a class="user_name" href="{{url('/user_profile/'.$user->client_id)}}"><h2>{{$user->title}}</h2></a>
                            <h3>{{$user->start}}</h3>
                        </div>
                        <div class="info-follow">
                            <h3>{{$user->priority}}</h3>
                        </div>
                        <div class="info-bio">

                            {{$user->event_comment}}

                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>









