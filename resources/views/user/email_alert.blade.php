@extends('layouts.dashboard')
@section('style')

    <style>

        .signup-img {
            position: relative;
            width: 385px;
            color:white;
            -webkit-background-size: cover;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .signup-form {
            width: 1015px;
            margin-top: -2px; }

        .signup-img-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
            width: 100%; }

        .register-form {
            padding: 27px 15px 15px 15px;
            margin-bottom: -8px; }

        .form-row {
            margin: 0 -30px; }
        .form-row .form-group {
            width: 50%;
            padding: 0 30px; }

        .form-input, .form-select, .form-radio {
            margin-bottom: 23px; }

        label, input {
            display: block;
            width: 100%; }

        label {
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 0px; }

        label.required {
            position: relative; }
        label.required:after {
            content: '*';
            margin-left: 2px;
            color: #b90000; }

        input {
            box-sizing: border-box;
            border: 1px solid #ebebeb;
            padding: 14px 20px;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
            font-size: 14px;
            font-family: 'Poppins'; }
        input:focus {
            border: 1px solid #329e5e; }

        .label-flex {
            justify-content: space-between;
            -moz-justify-content: space-between;
            -webkit-justify-content: space-between;
            -o-justify-content: space-between;
            -ms-justify-content: space-between; }
        .label-flex label {
            width: auto; }

        .form-link {
            font-size: 12px;
            color: #222;
            text-decoration: none;
            position: relative; }
        .form-link:after {
            position: absolute;
            content: "";
            width: 100%;
            height: 2px;
            background: #d7d7d7;
            left: 0;
            bottom: 12px; }

        .display-flex, .signup-content, .form-row, .label-flex, .form-radio-group {
            display: flex;
            display: -webkit-flex; }

        .form-submit {
            text-align: right; }

        input, select, textarea {
            outline: none;
            appearance: unset !important;
            -moz-appearance: unset !important;
            -webkit-appearance: unset !important;
            -o-appearance: unset !important;
            -ms-appearance: unset !important; }

        input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
            appearance: none !important;
            -moz-appearance: none !important;
            -webkit-appearance: none !important;
            -o-appearance: none !important;
            -ms-appearance: none !important;
            margin: 0; }

        input:focus, select:focus, textarea:focus {
            outline: none;
            box-shadow: none !important;
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            -o-box-shadow: none !important;
            -ms-box-shadow: none !important; }

        select{width: 100%;
            height: 50px;
            border: 1px solid #eee;
            border-radius: 6px;
            padding: 0 10px
            }

        .submit {
            width: 150px;
            height: 50px;
            display: inline-block;
            font-family: 'Poppins';
            font-weight: bold;
            font-size: 14px;
            padding: 10px;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px; 
            }

        .circle-icon {
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 28px;
            border: 2px solid #B4BBC1;
            border-radius: 100px;
            font-size: 14px;
            color: #B4BBC1;
            cursor: pointer;
            display: block;
            float: left;
        }
        .circle-icon.small {
            height: 25px;
            width: 25px;
            line-height: 23px;
            font-size: 11px;
        }
        .circle-icon:hover {
            color: #57636C;
            border-color: #57636C;
        }
        .circle-icon.red {
            color: #D23B3D;
            border-color: #D23B3D;
        }
        .circle-icon.red:hover {
            color: #791C1E;
            border-color: #791C1E;
        }

        .modal-open .modal{overflow-x:auto!important;}

        .select-list {
            position: relative;
            display: inline-block;
            width: 100%;
            /*margin-bottom: 47px; */
        }

        .list-item {
            position: absolute;
            width: 100%;
            z-index: 99; }
        .checkbox-wrapper {
            cursor: pointer;
            height: 20px;
            width: 20px;
            position: relative;
            display: inline-block;
            box-shadow: inset 0 0 0 1px #A3ADB2;
            border-radius: 1px;
        }
        .checkbox-wrapper input {
            opacity: 0;
            cursor: pointer;
        }
        .checkbox-wrapper input:checked ~ label {
            opacity: 1;
        }
        .checkbox-wrapper label {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            cursor: pointer;
            background: #A3ADB2;
            opacity: 0;
            transition-duration: 0.05s;
        }
        .checkbox-wrapper label:hover {
            background: #95a1a6;
            opacity: 0.5;
        }
        .checkbox-wrapper label:active {
            background: #87949b;
        }

        #main1 {
            position: fixed;
            top: 115px;
            left: 238px;
            bottom: 0;
            right: 0;
            z-index: 4;
            transition-duration: 0.3s;
            padding-left: 4px;
        }
        #main1 .overlay {
            position: absolute;
            top: 0;
            left: -10px;
            right: 0;
            bottom: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 5;
            opacity: 0;
            transition-duration: 0s;
            transition-property: opacity;
        }
        .show-main-overlay #main .overlay {
            opacity: 1;
            bottom: 0;
            transition-duration: 0.5s;
        }
        #main1 .header1 {
            padding: 44px 60px;
            border-bottom: 1px solid #EFEFEF;
            overflow: hidden;
            display:flex;
            align-items: center;
            justify-content: space-between;
            background: #112637;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }
        #main1 .header1 .page-title {
            display: block;
        }
        #main1 .header1 .page-title .sidebar-toggle-btn {
            width: 0;
            margin-top: 1px;
            padding: 11px 0 0 0;
            float: left;
            position: relative;
            display: block;
            cursor: pointer;
            transition-duration: 0.3s;
            transition-delay: 0.5s;
            opacity: 0;
            margin-right: 0;
        }
        .show-sidebar #main .header1 .page-title .sidebar-toggle-btn {
            transition-delay: 0s;
        }
        #main1 .header1 .page-title .sidebar-toggle-btn .line {
            height: 3px;
            display: block;
            background: #888;
            margin-bottom: 4px;
            transition-duration: 0.5s;
            transition-delay: 0.5s;
        }
        .show-sidebar #main .header1 .page-title .sidebar-toggle-btn .line-angle1 {
            transform: rotate(-120deg);
        }
        .show-sidebar #main .header1 .page-title .sidebar-toggle-btn .line-angle2 {
            transform: rotate(120deg);
        }
        #main1 .header1 .page-title .sidebar-toggle-btn .line-angle1 {
            width: 8px;
            margin: 0;
            position: absolute;
            top: 15px;
            left: -11px;
            transform: rotate(-60deg);
        }
        #main1 .header1 .page-title .sidebar-toggle-btn .line-angle2 {
            width: 8px;
            margin: 0;
            position: absolute;
            top: 21px;
            left: -11px;
            transform: rotate(60deg);
        }
        #main1 .header1 .page-title .icon {
            font-size: 15px;
            margin-left: 20px;
            position: relative;
            top: -5px;
            cursor: pointer;
        }
        #main1 .header1 .search-box {
            float: right;
            width: 150px;
            height: 40px;
            position: relative;
        }
        #main1 .header1 .search-box input,
        #main1 .header1 .search-box .icon {
            transition-duration: 0.3s;
        }
        #main1 .header1 .search-box input {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            border: 0;
            padding: 0;
            margin: 0;
            text-indent: 15px;
            height: 40px;
            z-index: 2;
            outline: none;
            color: #999;
            background: transparent;
            border: 2px solid #EFEFEF;
            border-radius: 5px;
            transition-timing-function: cubic-bezier(0.3, 1.5, 0.6, 1);
        }
        #main1 .header1 .search-box input:focus {
            color: #333;
            border-color: #d6d6d6;
            width: 150%;
        }
        #main1 .header1 .search-box input:focus ~ .icon {
            opacity: 1;
            z-index: 3;
            color: #61C7B3;
        }
        #main1 .header1 .search-box .icon {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 40px;
            text-align: center;
            line-height: 40px;
            z-index: 1;
            cursor: pointer;
            opacity: 0.5;
        }
        #main1 .action-bar {
            padding: 20px 60px;
            border-bottom: 1px solid #EFEFEF;
            overflow: hidden;
        }
        #main1 .action-bar li {
            float: left;
            margin-right: 10px;
        }
        #main1 #main-nano-wrapper {
            position: absolute;
            top: 122px;
            bottom: 0;
            height: auto;
        }
        #main1 .message-list {
            display: block;
        }
        #main1 .message-list li {
            position: relative;
            display: block;
            height: 50px;
            line-height: 50px;
            cursor: default;
            transition-duration: 0.3s;
        }
        #main1 .message-list li:hover,
        #main1 .message-list li.active,
        #main1 .message-list li.selected {
            background: #EFEFEF;
            transition-duration: 0.05s;
        }

        body.night #main .message-list li:hover,
        body.night #main .message-list li.active,
        body.night #main .message-list li.selected {
            background: rgba(118, 118, 118, 0.25);
            transition-duration: 0.05s;
        }
        #main1 .message-list li.active,
        #main1 .message-list li.active:hover {
            box-shadow: inset 5px 0 0 #61C7B3;
        }
        #main1 .message-list li.unread {
            font-weight: 600;
            color: black;
        }
        #main1 .message-list li .coll {
            float: left;
            position: relative;
        }
        #main1 .message-list li.blue-dot .coll-1 .dot {
            border-color: #1BC3E1;
        }
        #main1 .message-list li.orange-dot .coll-1 .dot {
            border-color: #E2A917;
        }
        #main1 .message-list li.green-dot .coll-1 .dot {
            border-color: #9AE14F;
        }
        #main1 .message-list li .coll-1 {
            width: 400px!important;
        }
        #main1 .message-list li .coll-1 .star-toggle,
        #main1 .message-list li .coll-1 .checkbox-wrapper,
        #main1 .message-list li .coll-1 .dot {
            display: block;
            float: left;
        }
        #main1 .message-list li .coll-1 .checkbox-wrapper {
            margin-top: 15px;
            margin-right: 10px;
        }
        #main1 .message-list li .coll-1 .star-toggle {
            margin-top: 15px;
        }
        #main1 .message-list li .coll-1 .title {
            position: absolute;
            top: 0;
            left: 140px;
            right: 0;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
        #main1 .message-list li .coll-2 {
            position: absolute;
            top: 0;
            left: 400px;
            right: 0;
            bottom: 0;
        }
        #main1 .message-list li .coll-2 .subject,
        #main1 .message-list li .coll-2 .date {
            position: absolute;
            top: 0;
        }
        #main1 .message-list li .coll-2 .subject {
            left: 0;
            right: 200px;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
        #main1 .message-list li .coll-2 .date {
            right: 0;
            width: 200px;
            padding-left: 40px;
        }
        #main1 .load-more-link {
            display: block;
            text-align: center;
            margin: 30px 0 100px 0;
        }
        #message {
            position: fixed;
            top: 115px;
            left: 242px;
            bottom: 0;
            width: 87%;
            z-index: 5;
            transform: translateX(200%);
            transition-duration: 0.5s;
            padding: 50px 30px;
            background: #EFEFEF;
            box-shadow: rgba(0, 0, 0, 0.05) 1px 0px 15px;
        }
        body.night #message{
            box-shadow: 1px 1px 2px rgb(255 255 255);
            background: #1f1e1e;
            z-index: 100000;
        }
        body.night #message .message-container li {
            background: #262626;
            border-color: #fff;
        }
        .show-message #message {
            transition-duration: 0.3s;
        }
        #message .header1 {
            margin-bottom: 30px;
            padding: 0;
        }
        #message .header1 .page-title {
            display: block;
            float: none;
            margin-bottom: 20px;
            position: absolute;
            top: 15px;
            left: 15px;
            font-weight: 100;
        }

        #message .header1 .page-title .icon {
            margin-top: 4px;
            margin-right: 10px;
        }
        #message .header1 .grey {
            margin-left: 10px;
            color: #999;
        }
        #message #message-nano-wrapper {
            position: absolute;
            top: 100px;
            bottom: 0;
            height: auto;
            left: 0;
            right: 0;
            width: 80%;
            margin:auto;
        }
        #message .message-container {
            padding: 0 30px;
        }
        #message .message-container li {
            padding: 25px;
            /* border: 1px solid rgba(0, 0, 0, 0.15); */
            background: #FFF;
            margin: 0 0 30px 0;
            position: relative;
        }
        #message .message-container li:hover .details .left .arrow {
            background: #61C7B3;
            border: 0px solid #61C7B3;
        }
        #message .message-container li:hover .details .left .arrow.orange {
            background: #E2A917;
            border: 0px solid #E2A917;
        }
        #message .message-container li .details {
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            overflow: hidden;
        }
        #message .message-container li .details .left {
            float: left;
            font-weight: 600;
            color: #888;
            transition-duration: 0.3s;
        }
        #message .message-container li .details .left .arrow {
            display: inline-block;
            position: relative;
            height: 2px;
            width: 20px;
            background: rgba(0, 0, 0, 0.15);
            vertical-align: top;
            margin-top: 12px;
            margin: 12px 20px 0 15px;
            border: 0px solid rgba(0, 0, 0, 0.15);
            transition-duration: 0.3s;
        }
        #message .message-container li .details .left .arrow:after {
            position: absolute;
            top: -4px;
            left: 100%;
            height: 0;
            width: 0;
            border: inherit;
            border-width: 7px;
            border-style: solid;
            content: '';
            border-right: 0;
            border-top-color: transparent;
            border-bottom-color: transparent;
            border-top-width: 5px;
            border-bottom-width: 5px;
        }
        #message .message-container li .details .right {
            float: right;
            color: #999;
        }
        #message .message-container li .message {
            margin-bottom: 40px;
            font-size: 16px;
        }
        #message .message-container li .message p:last-child {
            margin-bottom: 0;
        }
        #message .message-container li:hover .tool-box .red-hover {
            color: #D23B3D;
            border-color: #D23B3D;
        }
        #message .message-container li:hover .tool-box .red-hover:hover {
            color: #791C1E;
            border-color: #791C1E;
        }
        #message .message-container li .tool-box {
            position: absolute;
            bottom: 0;
            right: 0;
            border: 0px solid #DDDFE1;
            border-top-width: 1px;
            border-left-width: 1px;
            padding: 8px 10px;
            transition-duration: 0.3s;
        }
        #message .message-container li .tool-box a {
            margin-right: 10px;
        }
        #message .message-container li .tool-box a:last-child {
            margin-right: 0;
        }
        .show-message #message {
            transform: none;
        }
        .show-message #main {
            margin-right: 40%;
        }
        @media only screen and (min-width: 1499px) {
            #main1 .overlay {
                display: none;
            }
        }
        @media only screen and (max-width: 1500px) {
            .show-message #main {
                margin-right: 0;
            }
            .show-message #message {
                left: 241px;
                width: 85%;
            }
        }
        @media only screen and (max-width: 1024px) {
            #sidebar {
                transform: translateX(-100%);
            }
            #main1 {
                left: 0;
                box-shadow: none;
            }
            #main1 .header1 .page-title .sidebar-toggle-btn {
                margin-right: 20px;
                opacity: 1;
                width: 20px;
            }
            .show-sidebar #sidebar {
                transform: none;
            }
            .show-sidebar #main {
                transform: translateX(300px);
            }
            .show-message #main {
                margin-right: 0;
            }
            .show-message #message {
                left: 0%;
                width: 100%;
            }
           
        }
        @media only screen and (max-width: 600px) {
            #main1 .header1 .search-box {
                float: none;
                width: 100%;
                margin-bottom: -110px;
                margin-top: 70px;
            }
            #main1 .header1 .search-box input,
            #main1 .header1 .search-box input:focus {
                width: 100%;
            }
            #main1 .header1 .page-title {
                margin-bottom: 50px;
            }
            #main1 #main-nano-wrapper {
                position: absolute;
                top: 190px;
                bottom: 0;
                height: auto;
            }
            #main1 .message-list li .coll-1 {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 120px;
                width: auto;
            }
            #main1 .message-list li .coll-2 {
                right: 0;
                left: auto;
                width: 120px;
            }
            #main1 .message-list li .coll-2 .date {
                padding-left: 0;
                position: static;
            }
            #main1 .message-list li .coll-2 .subject {
                display: none;
            }
            .at-reward-card{
                width: 100%!important;
            }

            .at-reward-card__content p {
                font-size: 11px!important;
            }

            #message .message-container li{
                padding: 0!important;
            }
        }
        /**
         * Nano scroll stuff
        */
        .nano {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        .nano > .nano-content {
            position: absolute;
            overflow: scroll;
            overflow-x: hidden;
            top: 0;
            right: -14px;
            bottom: 0;
            left: -5px;
        }
        .nano > .nano-content:focus {
            outline: none;
        }
        .nano > .nano-content::-webkit-scrollbar {
            visibility: hidden;
        }
        .has-scrollbar > .nano-content::-webkit-scrollbar {
            visibility: visible;
        }
        .nano > .nano-pane {
            background: rgba(117, 117, 117, 0.2);
            position: absolute;
            width: 8px;
            right: 8px;
            top: 8px;
            bottom: 8px;
            visibility: hidden\9;
            /* Target only IE7 and IE8 with this hack */
            opacity: 0.01;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            -webkit-transition: 0.3s;
            -moz-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
        }
        .nano > .nano-pane > .nano-slider {
            background: #444;
            background: #C7C7C7;
            position: relative;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            -webkit-transition: 0.3s;
            -moz-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
            -webkit-transition-property: background;
            -moz-transition-property: background;
            -o-transition-property: background;
            transition-property: background;
        }
        .nano > .nano-pane:hover > .nano-slider,
        .nano > .nano-pane.active > .nano-slider {
            background: #A6A6A6;
        }
        .nano:hover > .nano-pane,
        .nano-pane.active,
        .nano-pane.flashed {
            visibility: visible\9;
            /* Target only IE7 and IE8 with this hack */
            opacity: 0.99;
        }

        .at-reward-card {
            z-index: 999999;
            display: -webkit-box;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            background: #FFFFFF;
            width: 479px;
            min-height: 460px;
            margin:auto;
            border-radius: 4px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            font-family: 'Open Sans', sans-serif;
            overflow: hidden;
        }
        .at-reward-card__header {
            position: relative;
            background: linear-gradient(to left, #232526, #414345);
            height: 140px;
            margin: 0 0 60px;
        }
        .at-reward-card__thumbnail {
            position: absolute;
            top: 60px;
            left: 50%;
            display: block;
            margin: 0 auto;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            width: 50%;
        }
        .at-reward-card__content {
            -webkit-box-flex: 1;
            flex-grow: 1;
            text-align: center;
        }
        .at-reward-card__content h2 {
            margin: 0 0 10px;
            padding: 0;
            color: #d0b160;
            font-size: 20px;
        }
        .at-reward-card__content p {
            margin: 0;
            padding: 0;
            color: #444444;
            font-size: 16px;
        }
        .at-reward-card__footer {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            flex-direction: row;
            height: 60px;
        }
        .at-reward-card__button {
            outline: none;
            display: block;
            background: #FAFAFA;
            width: 100%;
            border: 0;
            margin: 0 1px;
            font-size: 18px;
            line-height: 60px;
            cursor: pointer;
        }
        .at-reward-card__button:hover {
            background: #F3F3F3;
        }
        .at-reward-card__button:first-child {
            margin-left: 0;
            color: #CCCCCC;
        }
        .at-reward-card__button:last-child {
            margin-right: 0;
            color: #EB60A3;
            font-weight: 600;
        }



.badge {
    border-radius: 8px;
    padding: 4px 8px;
    text-transform: uppercase;
    font-size: .7142em;
    line-height: 12px;
    background-color: transparent;
    border: 1px solid;
    margin-bottom: 5px;
    border-radius: .875rem;
}
.bg-green {
    background-color: #39664d !important;
    color: #fff;
}

.bg-amber {
    background-color: #bd9869  !important;
    color: #fff;
}
.bg-red {
    background-color: #8b192b !important;
    color: #fff;
}
.bg-blue {
    background-color: #60bafd !important;
    color: #fff;
}
.card {
    background: #fff;
    margin-bottom: 30px;
    transition: .5s;
    border: 0;
    border-radius: .1875rem;
    display: inline-block;
    position: relative;
    width: 100%;
    box-shadow: none;
}
.action_bar .delete_all {
    margin-bottom: 0;
    margin-top: 8px
}

.action_bar .btn,
.action_bar .search {
    margin: 0
}

.mail_list .list-group-item {
    border: 0;
    padding: 15px;
    margin-bottom: 1px
}

.list-group-item:hover {
    background: #b8b8b8;
}

.media {
    margin: 0;
    width: 100%
}

.controls {
    display: inline-block;
    margin-right: 10px;
    vertical-align: top;
    text-align: center;
    margin-top: 11px
}

.controls .checkbox {
    display: inline-block
}

.checkbox label {
    margin: 0;
    padding: 10px
}

.favourite {
    margin-left: 10px
}

.thumb {
    display: inline-block
}

.thumb img {
    width: 40px
}

.media-heading a {
    color: #555;
    font-weight: normal
}

.media-heading a:hover,
.media-heading a:focus {
    text-decoration: none
}

.list-group-item .media-heading time {
    font-size: 16px;
    margin-right: 10px
}

.list-group-item .media-heading .badge {
    margin-bottom: 0;
    border-radius: 50px;
    font-weight: normal
}

.msg {
    margin-bottom: 0px;
    color: #000;
}

.checkbox{
    width:  13px;
    height: 13px;
    border: 1px solid grey;
}

.mail_list .unread {
    border-left: 2px solid
}

.mail_list .unread .media-heading a {
    color: #333;
    font-weight: 700
}

.btn-group {
    box-shadow: none
}

.bg-gray {
    background: #e6e6e6
}

.list-group-item{
    
    padding: 1.25rem .75rem 1.25rem 3.25rem;
}

@media only screen and (max-width: 767px) {
    .inbox .mail_list .list-group-item .controls {
        margin-top: 3px
    }
}




/* Invoice */


.text-left{
    color: black;
    font-weight: 800;
    width: 40%;
}
 

.invoice {
    position: relative;
    background-color: #FFF;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #42403c;
    font-size:2rem;
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    border-spacing: 2px;
    table-layout: fixed;
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    color: #000;
    width: 60%;
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}


    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>

@endsection
@section('content')



    <div class="page-content-wrapper " id="app">

        <div class="container-fluid">

            <main id="main1">
                <div class="overlay"></div>

                <header class="header1">

                    <h1 class="page-title"><a class="sidebar-toggle-btn trigger-toggle-sidebar"><span class="line"></span><span class="line"></span><span class="line"></span><span class="line line-angle1"></span><span class="line line-angle2"></span></a>Your Mailbox<a><span class="icon glyphicon glyphicon-chevron-down"></span></a></h1>



                </header>
                <div id="main-nano-wrapper" class="nano">
                    <div class="nano-content">

                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="padding-left: 5%; background: #112637!important;">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Inbox</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sent</a>
                            </li>
                          

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <ul style="padding: 0">
                                    <li v-for="email in email_bank" class="list-group-item">
                                        <div class="media" @click="openModal(email, email.type)">
                                            <div class="pull-left">
                                                <div class="controls">
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="basic_checkbox_3">
                                                        <label for="basic_checkbox_3"></label>
                                                    </div>
                                                    <a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline"></i></a>
                                                </div>
                                                <div class="thumb hidden-sm-down m-r-20"> <img src="assets/images/xs/avatar3.jpg" class="rounded-circle" alt=""> </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <a href="mail-single.html"  class="m-r-10 text-capitalize">Company Name @{{email.type}}</a>
                                                    <span class="badge bg-red">@{{email.type}}</span>
                                                    <small class="float-right text-muted"><time class="hidden-sm-down"  v-if="email" datetime="2021">@{{ email.created_at }}</time><i class="zmdi zmdi-attachment-alt"></i> </small>
                                                </div>
                                                <p class="msg"  v-if="email"> @{{ email.content }}</p>                                
                                            </div>
                                        </div>
                                    </li>
                                  </ul>
                                <a v-if="email_bank.length>10" href="#" class="load-more-link">Show more messages</a>
                            </div>



                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                               
                               <ul style="padding: 0">
                         
                              </ul>

    
                                <a v-if="email_promo.length>10" href="#" class="load-more-link">Show more messages</a>


                            </div>
    
                        </div>


                    </div>
                </div>
            </main>


            <div id="message" v-show="emailOpened&&selectedEmail.type==='Margin Call'">
                <div class="header1">
                    <h3 class="page-title"><i class="fas fa-arrow-right trigger-message-close"></i>
                    
                    </h3>
                </div>
                <div v-if="selectedEmail.receiver&&selectedEmail.receiver.name" id="message-nano-wrapper" class="nano">
                    <div class="nano-content">
                        <ul class="message-container">
                            <li class="received" style="border: none">
                                <div class="details">
                                    <div class="left">
                                        <span>Company Name Support</span>
                                        <div class="arrow orange"></div>@{{ selectedEmail.receiver.name }}
                                    </div>
                                    <div class="right">@{{ selectedEmail.receiver.created_at }}</div>
                                </div>
                                <div class="message">

                                    <div class="at-reward-card">
                                        <div class="at-reward-card__header">

                                            <img src="{{asset('/images/margin_call.png')}}" style="width:130px" class="at-reward-card__thumbnail">
                                        </div>
                                        <div class="at-reward-card__content">
                                            <h2>Dear Client!</h2>
                                            <br>
                                            <p style="padding:0 2rem">@{{ selectedEmail.content }}</p>
                                            <br>
                                            <br>
                                            <h2>Company Name Team</h2>
                                        </div>

                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div id="message" v-show="emailOpened&&selectedEmail.type==='spin'">
                <div class="header1">
                    <h3 class="page-title"><i class="fas fa-arrow-right trigger-message-close"></i>
                    
                    </h3>
                </div>
                <div v-if="selectedEmail.receiver&&selectedEmail.receiver.name" id="message-nano-wrapper" class="nano">
                    <div class="nano-content">
                        <ul class="message-container">
                            <li class="received" style="border: none">
                                <div class="details">
                                    <div class="left">
                                        <span>Company Name Finance</span>
                                        <div class="arrow orange"></div>@{{ selectedEmail.receiver.name }}
                                    </div>
                                    <div class="right">@{{ selectedEmail.receiver.created_at }}</div>
                                </div>
                                <div class="message">

                                    <div class="at-reward-card">
                                        <div class="at-reward-card__header">
                                            <img src="{{asset('/images/spin-win.png')}}" alt="at-reward-card__thumbnail" class="at-reward-card__thumbnail">
                                        </div>
                                        <div class="at-reward-card__content">
                                            <h2>Congratulations!</h2>
                                            <br>
                                            <p>You have won <span style="color:#d0b160">@{{ selectedEmail.amount }} €</span>   using Spin & Win Feature.</p>
                                            <p>Our team will proceed with the verification &</p> <p>accredit the benefited amount to your account. </p>
                                            <br>
                                            <br>
                                            <h2>Company Name Team</h2>
                                        </div>

                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="message" v-show="emailOpened&&selectedEmail.type==='bank'">
                <div class="header1">
                    <h3 class="page-title"><i class="fas fa-arrow-right trigger-message-close"></i>
                    
                    </h3>
                    
                </div>
                <div v-if="selectedEmail.receiver&&selectedEmail.receiver.name" id="message-nano-wrapper" class="nano">
                   
                    <div id="invoice">
                        <div class="invoice overflow-auto">
                            <div>
                                <header>
                                    <div class="row">
                                        <div class="col">
                                            <a target="_blank" href="https://lobianijs.com">
                                                <img src="{{asset('images/26.png')}}" style="width:30%" data-holder-rendered="true" />
                                            </a>
                                        </div>
                                       
                                    </div>
                                </header>
                                <main>
                                 
                                    <table border="0" cellspacing="0" cellpadding="0">
                                     
                                        <tbody>
                                            <tr>
                                                <td class="text-left">
                                                BENEFICARY:
                                                </td>
                                                <td  class="total">
                                                @{{ selectedEmail.beneficiary_name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td   class="text-left">
                                                IBAN    
                                                </td>
                                                
                                                <td  class="total">
                                                @{{ selectedEmail.iban }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td   class="text-left">
                                                SWIFT / BIC:
                                                </td>
                                          
                                                <td class="total">
                                                @{{ selectedEmail.swift }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left" >
                                                DESCRIPTION: 
                                                </td>
                                           
                                                <td class="total" >
                                                TRX + {{logged_in()->mt4_account}}
                                                </td>
                                            </tr>
                                            <tr>   
                                                <td class="text-left" >
                                                BENEFICARY ADDRESS:  
                                                </td>
                                               
                                                <td class="total" >
                                               @{{ selectedEmail.beneficiary_address }}
                                                </td>
                                            </tr>
                                            <tr>   
                                                
                                                <td class="text-left">
                                                BANK NAME:
                                                </td>
                                                   
                                                <td class="total">
                                                @{{ selectedEmail.bank_name}}
                                                </td>  
                                            </tr>
                                            <tr>
                                                <td class="text-left">
                                                BANK ADDRESS:
                                                </td>
                                                       
                                                <td class="total">
                                                29, STASIKRATOUS STR ,, SAMICO HOUSE,, 3RD FLOOR
                                                </td>  
                                            </tr>    
                                            
                                            <tr>
                                                
                                                <td class="text-left">
                                                LOCATION
                                                </td>
                                                           
                                                <td class="total">
                                                1065 NICOSIA (LEFKOSIA)
                                                </td> 
        
                                            </tr>
                                            <tr>
                                                <td class="text-left">
                                                COUNTRY
                                                </td>
                                                               
                                                <td class="total">
                                                CYPRUS
                                                </td> 
                                            </tr>            
        
                                            </tr>
                                        </tbody>
                                       
                                    </table>
                                
                                </main>
                                <footer>
                                    Invoice was created on a computer and is valid without the signature and seal.
                                </footer>
                            </div>
                         
                            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="message" v-if="emailOpened&&selectedEmail.type==='request'">
                <div class="header1">
                    <h3 class="page-title"><a onclick="$('body').removeClass('show-message')"  class="icon fas fa-arrow-right trigger-message-close"></a>
                
                    </h3>
                </div>
                <div v-if="selectedEmail.receiver&&selectedEmail.receiver.name" id="message-nano-wrapper" class="nano">
                    <div id="invoice">
                        <div class="invoice overflow-auto">
                            <div>
                                <header>
                                    <div class="row">
                                        <div class="col">
                                            <a target="_blank" href="">
                                                <img src="{{asset('images/26.png')}}" style="width:15%" data-holder-rendered="true" />
                                            </a>
                                        </div>
                                      
                                    </div>
                                </header>
                                <main>
                                 
                                    <table border="0" cellspacing="0" cellpadding="0">
                                     
                                        <tbody>
                                            <tr>
                                                <td class="text-left">
                                                BENEFICARY:
                                                </td>
                                                <td  class="total">
                                                @{{ selectedEmail.beneficiary_name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td   class="text-left">
                                                IBAN    
                                                </td>
                                                
                                                <td  class="total">
                                                @{{ selectedEmail.iban }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td   class="text-left">
                                                SWIFT / BIC:
                                                </td>
                                          
                                                <td class="total">
                                                @{{ selectedEmail.swift }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left" >
                                                DESCRIPTION: 
                                                </td>
                                           
                                                <td class="total" >
                                                TRX + {{logged_in()->mt4_account}}
                                                </td>
                                            </tr>
                                            <tr>   
                                                <td class="text-left" >
                                                BENEFICARY ADDRESS:  
                                                </td>
                                               
                                                <td class="total" >
                                               @{{ selectedEmail.beneficiary_address }}
                                                </td>
                                            </tr>
                                            <tr>   
                                                
                                                <td class="text-left">
                                                BANK NAME:
                                                </td>
                                                   
                                                <td class="total">
                                                @{{ selectedEmail.bank_name}}
                                                </td>  
                                            </tr>
                                            <tr>
                                                <td class="text-left">
                                                BANK ADDRESS:
                                                </td>
                                                       
                                                <td class="total">
                                                29, STASIKRATOUS STR ,, SAMICO HOUSE,, 3RD FLOOR
                                                </td>  
                                            </tr>    
                                            
                                            <tr>
                                                
                                                <td class="text-left">
                                                LOCATION
                                                </td>
                                                           
                                                <td class="total">
                                                1065 NICOSIA (LEFKOSIA)
                                                </td> 
        
                                            </tr>
                                            <tr>
                                                <td class="text-left">
                                                COUNTRY
                                                </td>
                                                               
                                                <td class="total">
                                                CYPRUS
                                                </td> 
                                            </tr>            
        
                                            </tr>
                                        </tbody>
                                       
                                    </table>
                                
                                </main>
                                <footer>
                                    Invoice was created on a computer and is valid without the signature and seal.
                                </footer>
                            </div>
                            <div class="toolbar hidden-print">
                             
                                <hr>
                            </div>
                            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>


@endsection

@section('scripts')

    <script>


        jQuery(document).ready(function($) {

            var cols = {},

                messageIsOpen = false;

            cols.showOverlay = function() {
                $('body').addClass('show-main-overlay');
            };
            cols.hideOverlay = function() {
                $('body').removeClass('show-main-overlay');
            };


            cols.showMessage = function() {
                $('body').addClass('show-message');
                messageIsOpen = true;
            };
            cols.hideMessage = function() {
                $('body').removeClass('show-message');
                $('#main .message-list li').removeClass('active');
                messageIsOpen = false;
            };


            cols.showSidebar = function() {
                $('body').addClass('show-sidebar');
            };
            cols.hideSidebar = function() {
                $('body').removeClass('show-sidebar');
            };


            // Show sidebar when trigger is clicked

            $('.trigger-toggle-sidebar').on('click', function() {
                cols.showSidebar();
                cols.showOverlay();
            });


            $('.trigger-message-close').on('click', function() {
                cols.hideMessage();
                cols.hideOverlay();
            });


            // When you click on a message, show it

            $('#main .message-list li').on('click', function(e) {
                var item = $(this),
                    target = $(e.target);

                if(target.is('label')) {
                    item.toggleClass('selected');
                } else {
                    if(messageIsOpen && item.is('.active')) {
                        cols.hideMessage();
                        cols.hideOverlay();
                    } else {
                        if(messageIsOpen) {
                            cols.hideMessage();
                            item.addClass('active');
                            setTimeout(function() {
                                cols.showMessage();
                            }, 300);
                        } else {
                            item.addClass('active');
                            cols.showMessage();
                        }
                        cols.showOverlay();
                    }
                }
            });


            // This will prevent click from triggering twice when clicking checkbox/label

            $('input[type=checkbox]').on('click', function(e) {
                e.stopImmediatePropagation();
            });



            // When you click the overlay, close everything

            $('#main > .overlay').on('click', function() {
                cols.hideOverlay();
                cols.hideMessage();
                cols.hideSidebar();
            });



            // Enable sexy scrollbars
            $('.nano').nanoScroller();



            // Disable links

            // $('a').on('click', function(e) {
            //     e.preventDefault();
            // });



            // Search box responsive stuff

            $('.search-box input').on('focus', function() {
                if($(window).width() <= 1360) {
                    cols.hideMessage();
                }
            });

        });




        /*! nanoScrollerJS - v0.8.0 - 2014
        * https://jamesflorentino.github.com/nanoScrollerJS/
        * Copyright (c) 2014 James Florentino; Licensed MIT */
        (function($, window, document) {
            "use strict";
            var BROWSER_IS_IE7, BROWSER_SCROLLBAR_WIDTH, DOMSCROLL, DOWN, DRAG, KEYDOWN, KEYUP, MOUSEDOWN, MOUSEMOVE, MOUSEUP, MOUSEWHEEL, NanoScroll, PANEDOWN, RESIZE, SCROLL, SCROLLBAR, TOUCHMOVE, UP, WHEEL, cAF, defaults, getBrowserScrollbarWidth, hasTransform, isFFWithBuggyScrollbar, rAF, transform, _elementStyle, _prefixStyle, _vendor;
            defaults = {

                paneClass: 'nano-pane',

                sliderClass: 'nano-slider',


                contentClass: 'nano-content',


                iOSNativeScrolling: false,

                preventPageScrolling: false,


                disableResize: false,


                alwaysVisible: false,

                flashDelay: 1500,

                sliderMinHeight: 20,

                sliderMaxHeight: null,

                documentContext: null,

                windowContext: null
            };


            SCROLLBAR = 'scrollbar';


            SCROLL = 'scroll';

            MOUSEDOWN = 'mousedown';

            MOUSEMOVE = 'mousemove';


            MOUSEWHEEL = 'mousewheel';

            MOUSEUP = 'mouseup';

            RESIZE = 'resize';

            DRAG = 'drag';

            UP = 'up';

            PANEDOWN = 'panedown';

            DOMSCROLL = 'DOMMouseScroll';

            DOWN = 'down';

            WHEEL = 'wheel';

            KEYDOWN = 'keydown';

            KEYUP = 'keyup';

            TOUCHMOVE = 'touchmove';

            BROWSER_IS_IE7 = window.navigator.appName === 'Microsoft Internet Explorer' && /msie 7./i.test(window.navigator.appVersion) && window.ActiveXObject;

            BROWSER_SCROLLBAR_WIDTH = null;
            rAF = window.requestAnimationFrame;
            cAF = window.cancelAnimationFrame;
            _elementStyle = document.createElement('div').style;
            _vendor = (function() {
                var i, transform, vendor, vendors, _i, _len;
                vendors = ['t', 'webkitT', 'MozT', 'msT', 'OT'];
                for (i = _i = 0, _len = vendors.length; _i < _len; i = ++_i) {
                    vendor = vendors[i];
                    transform = vendors[i] + 'ransform';
                    if (transform in _elementStyle) {
                        return vendors[i].substr(0, vendors[i].length - 1);
                    }
                }
                return false;
            })();
            _prefixStyle = function(style) {
                if (_vendor === false) {
                    return false;
                }
                if (_vendor === '') {
                    return style;
                }
                return _vendor + style.charAt(0).toUpperCase() + style.substr(1);
            };
            transform = _prefixStyle('transform');
            hasTransform = transform !== false;

            getBrowserScrollbarWidth = function() {
                var outer, outerStyle, scrollbarWidth;
                outer = document.createElement('div');
                outerStyle = outer.style;
                outerStyle.position = 'absolute';
                outerStyle.width = '100px';
                outerStyle.height = '100px';
                outerStyle.overflow = SCROLL;
                outerStyle.top = '-9999px';
                document.body.appendChild(outer);
                scrollbarWidth = outer.offsetWidth - outer.clientWidth;
                document.body.removeChild(outer);
                return scrollbarWidth;
            };
            isFFWithBuggyScrollbar = function() {
                var isOSXFF, ua, version;
                ua = window.navigator.userAgent;
                isOSXFF = /(?=.+Mac OS X)(?=.+Firefox)/.test(ua);
                if (!isOSXFF) {
                    return false;
                }
                version = /Firefox\/\d{2}\./.exec(ua);
                if (version) {
                    version = version[0].replace(/\D+/g, '');
                }
                return isOSXFF && +version > 23;
            };

            NanoScroll = (function() {
                function NanoScroll(el, options) {
                    this.el = el;
                    this.options = options;
                    BROWSER_SCROLLBAR_WIDTH || (BROWSER_SCROLLBAR_WIDTH = getBrowserScrollbarWidth());
                    this.$el = $(this.el);
                    this.doc = $(this.options.documentContext || document);
                    this.win = $(this.options.windowContext || window);
                    this.$content = this.$el.children("." + options.contentClass);
                    this.$content.attr('tabindex', this.options.tabIndex || 0);
                    this.content = this.$content[0];
                    if (this.options.iOSNativeScrolling && (this.el.style.WebkitOverflowScrolling != null)) {
                        this.nativeScrolling();
                    } else {
                        this.generate();
                    }
                    this.createEvents();
                    this.addEvents();
                    this.reset();
                }

                NanoScroll.prototype.preventScrolling = function(e, direction) {
                    if (!this.isActive) {
                        return;
                    }
                    if (e.type === DOMSCROLL) {
                        if (direction === DOWN && e.originalEvent.detail > 0 || direction === UP && e.originalEvent.detail < 0) {
                            e.preventDefault();
                        }
                    } else if (e.type === MOUSEWHEEL) {
                        if (!e.originalEvent || !e.originalEvent.wheelDelta) {
                            return;
                        }
                        if (direction === DOWN && e.originalEvent.wheelDelta < 0 || direction === UP && e.originalEvent.wheelDelta > 0) {
                            e.preventDefault();
                        }
                    }
                };


                NanoScroll.prototype.nativeScrolling = function() {
                    this.$content.css({
                        WebkitOverflowScrolling: 'touch'
                    });
                    this.iOSNativeScrolling = true;
                    this.isActive = true;
                };


                NanoScroll.prototype.updateScrollValues = function() {
                    var content;
                    content = this.content;
                    this.maxScrollTop = content.scrollHeight - content.clientHeight;
                    this.prevScrollTop = this.contentScrollTop || 0;
                    this.contentScrollTop = content.scrollTop;
                    if (!this.iOSNativeScrolling) {
                        this.maxSliderTop = this.paneHeight - this.sliderHeight;
                        this.sliderTop = this.maxScrollTop === 0 ? 0 : this.contentScrollTop * this.maxSliderTop / this.maxScrollTop;
                    }
                };


                NanoScroll.prototype.setOnScrollStyles = function() {
                    var cssValue;
                    if (hasTransform) {
                        cssValue = {};
                        cssValue[transform] = "translate(0, " + this.sliderTop + "px)";
                    } else {
                        cssValue = {
                            top: this.sliderTop
                        };
                    }
                    if (rAF) {
                        if (!this.scrollRAF) {
                            this.scrollRAF = rAF((function(_this) {
                                return function() {
                                    _this.scrollRAF = null;
                                    _this.slider.css(cssValue);
                                };
                            })(this));
                        }
                    } else {
                        this.slider.css(cssValue);
                    }
                };


                NanoScroll.prototype.createEvents = function() {
                    this.events = {
                        down: (function(_this) {
                            return function(e) {
                                _this.isBeingDragged = true;
                                _this.offsetY = e.pageY - _this.slider.offset().top;
                                _this.pane.addClass('active');
                                _this.doc.bind(MOUSEMOVE, _this.events[DRAG]).bind(MOUSEUP, _this.events[UP]);
                                return false;
                            };
                        })(this),
                        drag: (function(_this) {
                            return function(e) {
                                _this.sliderY = e.pageY - _this.$el.offset().top - _this.offsetY;
                                _this.scroll();
                                if (_this.contentScrollTop >= _this.maxScrollTop && _this.prevScrollTop !== _this.maxScrollTop) {
                                    _this.$el.trigger('scrollend');
                                } else if (_this.contentScrollTop === 0 && _this.prevScrollTop !== 0) {
                                    _this.$el.trigger('scrolltop');
                                }
                                return false;
                            };
                        })(this),
                        up: (function(_this) {
                            return function(e) {
                                _this.isBeingDragged = false;
                                _this.pane.removeClass('active');
                                _this.doc.unbind(MOUSEMOVE, _this.events[DRAG]).unbind(MOUSEUP, _this.events[UP]);
                                return false;
                            };
                        })(this),
                        resize: (function(_this) {
                            return function(e) {
                                _this.reset();
                            };
                        })(this),
                        panedown: (function(_this) {
                            return function(e) {
                                _this.sliderY = (e.offsetY || e.originalEvent.layerY) - (_this.sliderHeight * 0.5);
                                _this.scroll();
                                _this.events.down(e);
                                return false;
                            };
                        })(this),
                        scroll: (function(_this) {
                            return function(e) {
                                _this.updateScrollValues();
                                if (_this.isBeingDragged) {
                                    return;
                                }
                                if (!_this.iOSNativeScrolling) {
                                    _this.sliderY = _this.sliderTop;
                                    _this.setOnScrollStyles();
                                }
                                if (e == null) {
                                    return;
                                }
                                if (_this.contentScrollTop >= _this.maxScrollTop) {
                                    if (_this.options.preventPageScrolling) {
                                        _this.preventScrolling(e, DOWN);
                                    }
                                    if (_this.prevScrollTop !== _this.maxScrollTop) {
                                        _this.$el.trigger('scrollend');
                                    }
                                } else if (_this.contentScrollTop === 0) {
                                    if (_this.options.preventPageScrolling) {
                                        _this.preventScrolling(e, UP);
                                    }
                                    if (_this.prevScrollTop !== 0) {
                                        _this.$el.trigger('scrolltop');
                                    }
                                }
                            };
                        })(this),
                        wheel: (function(_this) {
                            return function(e) {
                                var delta;
                                if (e == null) {
                                    return;
                                }
                                delta = e.delta || e.wheelDelta || (e.originalEvent && e.originalEvent.wheelDelta) || -e.detail || (e.originalEvent && -e.originalEvent.detail);
                                if (delta) {
                                    _this.sliderY += -delta / 3;
                                }
                                _this.scroll();
                                return false;
                            };
                        })(this)
                    };
                };


                NanoScroll.prototype.addEvents = function() {
                    var events;
                    this.removeEvents();
                    events = this.events;
                    if (!this.options.disableResize) {
                        this.win.bind(RESIZE, events[RESIZE]);
                    }
                    if (!this.iOSNativeScrolling) {
                        this.slider.bind(MOUSEDOWN, events[DOWN]);
                        this.pane.bind(MOUSEDOWN, events[PANEDOWN]).bind("" + MOUSEWHEEL + " " + DOMSCROLL, events[WHEEL]);
                    }
                    this.$content.bind("" + SCROLL + " " + MOUSEWHEEL + " " + DOMSCROLL + " " + TOUCHMOVE, events[SCROLL]);
                };

                NanoScroll.prototype.removeEvents = function() {
                    var events;
                    events = this.events;
                    this.win.unbind(RESIZE, events[RESIZE]);
                    if (!this.iOSNativeScrolling) {
                        this.slider.unbind();
                        this.pane.unbind();
                    }
                    this.$content.unbind("" + SCROLL + " " + MOUSEWHEEL + " " + DOMSCROLL + " " + TOUCHMOVE, events[SCROLL]);
                };


                NanoScroll.prototype.generate = function() {
                    var contentClass, cssRule, currentPadding, options, paneClass, sliderClass;
                    options = this.options;
                    paneClass = options.paneClass, sliderClass = options.sliderClass, contentClass = options.contentClass;
                    if (!this.$el.find("." + paneClass).length && !this.$el.find("." + sliderClass).length) {
                        this.$el.append("<div class=\"" + paneClass + "\"><div class=\"" + sliderClass + "\" /></div>");
                    }
                    this.pane = this.$el.children("." + paneClass);
                    this.slider = this.pane.find("." + sliderClass);
                    if (BROWSER_SCROLLBAR_WIDTH === 0 && isFFWithBuggyScrollbar()) {
                        currentPadding = window.getComputedStyle(this.content, null).getPropertyValue('padding-right').replace(/\D+/g, '');
                        cssRule = {
                            right: -14,
                            paddingRight: +currentPadding + 14
                        };
                    } else if (BROWSER_SCROLLBAR_WIDTH) {
                        cssRule = {
                            right: -BROWSER_SCROLLBAR_WIDTH
                        };
                        this.$el.addClass('has-scrollbar');
                    }
                    if (cssRule != null) {
                        this.$content.css(cssRule);
                    }
                    return this;
                };

                NanoScroll.prototype.restore = function() {
                    this.stopped = false;
                    if (!this.iOSNativeScrolling) {
                        this.pane.show();
                    }
                    this.addEvents();
                };


                NanoScroll.prototype.reset = function() {
                    var content, contentHeight, contentPosition, contentStyle, contentStyleOverflowY, paneBottom, paneHeight, paneOuterHeight, paneTop, parentMaxHeight, right, sliderHeight;
                    if (this.iOSNativeScrolling) {
                        this.contentHeight = this.content.scrollHeight;
                        return;
                    }
                    if (!this.$el.find("." + this.options.paneClass).length) {
                        this.generate().stop();
                    }
                    if (this.stopped) {
                        this.restore();
                    }
                    content = this.content;
                    contentStyle = content.style;
                    contentStyleOverflowY = contentStyle.overflowY;
                    if (BROWSER_IS_IE7) {
                        this.$content.css({
                            height: this.$content.height()
                        });
                    }
                    contentHeight = content.scrollHeight + BROWSER_SCROLLBAR_WIDTH;
                    parentMaxHeight = parseInt(this.$el.css("max-height"), 10);
                    if (parentMaxHeight > 0) {
                        this.$el.height("");
                        this.$el.height(content.scrollHeight > parentMaxHeight ? parentMaxHeight : content.scrollHeight);
                    }
                    paneHeight = this.pane.outerHeight(false);
                    paneTop = parseInt(this.pane.css('top'), 10);
                    paneBottom = parseInt(this.pane.css('bottom'), 10);
                    paneOuterHeight = paneHeight + paneTop + paneBottom;
                    sliderHeight = Math.round(paneOuterHeight / contentHeight * paneOuterHeight);
                    if (sliderHeight < this.options.sliderMinHeight) {
                        sliderHeight = this.options.sliderMinHeight;
                    } else if ((this.options.sliderMaxHeight != null) && sliderHeight > this.options.sliderMaxHeight) {
                        sliderHeight = this.options.sliderMaxHeight;
                    }
                    if (contentStyleOverflowY === SCROLL && contentStyle.overflowX !== SCROLL) {
                        sliderHeight += BROWSER_SCROLLBAR_WIDTH;
                    }
                    this.maxSliderTop = paneOuterHeight - sliderHeight;
                    this.contentHeight = contentHeight;
                    this.paneHeight = paneHeight;
                    this.paneOuterHeight = paneOuterHeight;
                    this.sliderHeight = sliderHeight;
                    this.slider.height(sliderHeight);
                    this.events.scroll();
                    this.pane.show();
                    this.isActive = true;
                    if ((content.scrollHeight === content.clientHeight) || (this.pane.outerHeight(true) >= content.scrollHeight && contentStyleOverflowY !== SCROLL)) {
                        this.pane.hide();
                        this.isActive = false;
                    } else if (this.el.clientHeight === content.scrollHeight && contentStyleOverflowY === SCROLL) {
                        this.slider.hide();
                    } else {
                        this.slider.show();
                    }
                    this.pane.css({
                        opacity: (this.options.alwaysVisible ? 1 : ''),
                        visibility: (this.options.alwaysVisible ? 'visible' : '')
                    });
                    contentPosition = this.$content.css('position');
                    if (contentPosition === 'static' || contentPosition === 'relative') {
                        right = parseInt(this.$content.css('right'), 10);
                        if (right) {
                            this.$content.css({
                                right: '',
                                marginRight: right
                            });
                        }
                    }
                    return this;
                };


                NanoScroll.prototype.scroll = function() {
                    if (!this.isActive) {
                        return;
                    }
                    this.sliderY = Math.max(0, this.sliderY);
                    this.sliderY = Math.min(this.maxSliderTop, this.sliderY);
                    this.$content.scrollTop((this.paneHeight - this.contentHeight + BROWSER_SCROLLBAR_WIDTH) * this.sliderY / this.maxSliderTop * -1);
                    if (!this.iOSNativeScrolling) {
                        this.updateScrollValues();
                        this.setOnScrollStyles();
                    }
                    return this;
                };


                NanoScroll.prototype.scrollBottom = function(offsetY) {
                    if (!this.isActive) {
                        return;
                    }
                    this.$content.scrollTop(this.contentHeight - this.$content.height() - offsetY).trigger(MOUSEWHEEL);
                    this.stop().restore();
                    return this;
                };

                NanoScroll.prototype.scrollTop = function(offsetY) {
                    if (!this.isActive) {
                        return;
                    }
                    this.$content.scrollTop(+offsetY).trigger(MOUSEWHEEL);
                    this.stop().restore();
                    return this;
                };


                NanoScroll.prototype.scrollTo = function(node) {
                    if (!this.isActive) {
                        return;
                    }
                    this.scrollTop(this.$el.find(node).get(0).offsetTop);
                    return this;
                };



                NanoScroll.prototype.stop = function() {
                    if (cAF && this.scrollRAF) {
                        cAF(this.scrollRAF);
                        this.scrollRAF = null;
                    }
                    this.stopped = true;
                    this.removeEvents();
                    if (!this.iOSNativeScrolling) {
                        this.pane.hide();
                    }
                    return this;
                };

                NanoScroll.prototype.destroy = function() {
                    if (!this.stopped) {
                        this.stop();
                    }
                    if (!this.iOSNativeScrolling && this.pane.length) {
                        this.pane.remove();
                    }
                    if (BROWSER_IS_IE7) {
                        this.$content.height('');
                    }
                    this.$content.removeAttr('tabindex');
                    if (this.$el.hasClass('has-scrollbar')) {
                        this.$el.removeClass('has-scrollbar');
                        this.$content.css({
                            right: ''
                        });
                    }
                    return this;
                };

                NanoScroll.prototype.flash = function() {
                    if (this.iOSNativeScrolling) {
                        return;
                    }
                    if (!this.isActive) {
                        return;
                    }
                    this.reset();
                    this.pane.addClass('flashed');
                    setTimeout((function(_this) {
                        return function() {
                            _this.pane.removeClass('flashed');
                        };
                    })(this), this.options.flashDelay);
                    return this;
                };

                return NanoScroll;

            })();
            $.fn.nanoScroller = function(settings) {
                return this.each(function() {
                    var options, scrollbar;
                    if (!(scrollbar = this.nanoscroller)) {
                        options = $.extend({}, defaults, settings);
                        this.nanoscroller = scrollbar = new NanoScroll(this, options);
                    }
                    if (settings && typeof settings === "object") {
                        $.extend(scrollbar.options, settings);
                        if (settings.scrollBottom != null) {
                            return scrollbar.scrollBottom(settings.scrollBottom);
                        }
                        if (settings.scrollTop != null) {
                            return scrollbar.scrollTop(settings.scrollTop);
                        }
                        if (settings.scrollTo) {
                            return scrollbar.scrollTo(settings.scrollTo);
                        }
                        if (settings.scroll === 'bottom') {
                            return scrollbar.scrollBottom(0);
                        }
                        if (settings.scroll === 'top') {
                            return scrollbar.scrollTop(0);
                        }
                        if (settings.scroll && settings.scroll instanceof $) {
                            return scrollbar.scrollTo(settings.scroll);
                        }
                        if (settings.stop) {
                            return scrollbar.stop();
                        }
                        if (settings.destroy) {
                            return scrollbar.destroy();
                        }
                        if (settings.flash) {
                            return scrollbar.flash();
                        }
                    }
                    return scrollbar.reset();
                });
            };
            $.fn.nanoScroller.Constructor = NanoScroll;
        })(jQuery, window, document);

        //# sourceMappingURL=jquery.nanoscroller.js.map
    </script>

    <script>

        var vm = new Vue({
            el: '#app',
            mounted: function () {
                this.getAlertsAdmin();
            },

            data: function () {
                return {
                    password_old:null,
                    password:null,
                    password_confirmation:null,
                    replyErrors:[],
                    output:null,
                    inputDisabled:true,
                    email:null,
                    user_id:null,
                    amount:null,
                    collateral:null,
                    currencyCode:'EUR',
                    full_name_bank:null,
                    email_transaction:null,
                    whatsapp:null,
                    email_alerts:[],
                    email_bank:[],
                    email_promo:[],
                    user:{},
                    newEmail:{
                        receiver:{},
                        sender_id:{{logged_in()->id}},
                        subject:null,
                        content:'',
                        account_number:null,
                        balance:null,
                        credit:null,
                        equity:null,
                        margin:null,
                        free_margin:null,
                        beneficiary_name:null,
                        beneficiary_address:null,
                        bank_name:null,
                        swift:null,
                        iban:null,
                        full_name:null,
                        amount:0
                    },
                    selectedEmail:{},
                    emailOpened:false,
                    type:'alert',
                }
            },
            methods:{
                enableEditProfile(){
                    this.inputDisabled=false;
                },
                getAlertsAdmin(){
                    let self = this;
                    axios.get('/get_alerts/').then(response => {
                        self.email_bank = response.data.emails1;
                        self.user=response.data.user;

                    });
                },
                submitEmail(type){
                    let self=this;
                    self.replyErrors=[];

                    axios.post('{{URL::to('new_email')}}', {
                        email:self.newEmail,
                        type:type,
                    }).then(function(response) {
                        self.output=response.data;
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                        // toastr.success("Account changed!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

                    }).catch(function(error) {
                        // self.loading = false;
                        // self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        // toastr.error("Error changing the account!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        {{--                        window.location.hash='{{URL::to('personal_info/')}}';--}}
                    });
                },

                openModal(email, type){
                    this.emailOpened=true;
                    this.type=type;
                    let self=this;
                    self.replyErrors=[];
                    this.selectedEmail=email;
                    $('body').addClass('show-message');

                    axios.post('{{URL::to('set_read')}}', {
                        id:self.selectedEmail.id,
                    }).then(function(response) {
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                        // toastr.success("Account changed!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                    }).catch(function(error) {
                        // self.loading = false;
                        // self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        // toastr.error("Error changing the account!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        {{--                        window.location.hash='{{URL::to('personal_info/')}}';--}}
                    });
                    this.getAlertsAdmin();

                },

                getRead(read){
                    if (read)
                        return '';
                    else return 'unread';
                },

            }
        });

        // Vue.filter('formatDate', function(value) {
        //     if (value) {
        //         return moment(String(value)).format('MM/DD/YYYY hh:mm')
        //     }
        // });

        // $(document).ready(function () {
        //     $("#img1").click(function () {
        //         $('#myModal1').modal('show');
        //     });
        // });
        // $(document).ready(function () {
        //     $("#img2").click(function () {
        //         $('#myModal2').modal('show');
        //     });
        // });

    </script>
@endsection
