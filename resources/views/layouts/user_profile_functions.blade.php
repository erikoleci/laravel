@push('user_profile_style')


    <style>

        .user-info-wrapper-padding {
            margin-bottom: -1px!important;
            padding-top: 30px!important;
            padding-bottom: 30px!important;
        }


        .user-info-wrapper {
            position: relative;
            width: 100%;
            margin-bottom: -1px;
            padding-top: 30px;
            padding-bottom: 30px;
            border-top-left-radius: 7px;
            border-top-right-radius: 7px;
            overflow: hidden
        }

        .user-info-wrapper .user-cover {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 120px;
            background-position: center;
            background-color: #f5f5f5;
            background-repeat: no-repeat;
            background-size: cover;
            background: linear-gradient(to top, #36414c, #0e1419); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .user-info-wrapper .user-cover .tooltip .tooltip-inner {
            width: 230px;
            max-width: 100%;
            padding: 10px 15px;
        }

        .user-info-wrapper .info-label {
            display: block;
            position: absolute;
            top: 18px;
            right: 18px;
            height: 26px;
            padding: 0 12px;
            border-radius: 13px;
            color: #606975;
            font-size: 12px;
            line-height: 26px;
            box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.18);
            cursor: pointer;
        }

        .user-info-wrapper .info-label>i {
            display: inline-block;
            margin-right: 3px;
            font-size: 1.2em;
            vertical-align: middle
        }

        .user-info-wrapper .user-info {
            position: relative;
            display: flex;
            align-items: center;
            flex-direction: column;
            z-index: 5;
            padding: 0 18px;
        }

        .user-info-wrapper .user-info .user-avatar,
        .user-info-wrapper .user-info .user-data {
            display: table-cell;
            vertical-align: top
        }

        .user-info-wrapper .user-info .user-avatar {
            position: relative;
        }

        .user-info-wrapper .user-info>img {
            width: 120px;
        }

        .user-info-wrapper .user-info .user-avatar .edit-avatar {
            display: block;
            position: absolute;
            top: -2px;
            right: 2px;
            width: 36px;
            height: 36px;
            transition: opacity .3s;
            border-radius: 50%;
            background-color: #fff;
            color: #606975;
            line-height: 34px;
            box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.2);
            cursor: pointer;
            opacity: 0;
            text-align: center;
            text-decoration: none
        }

        .user-info-wrapper .user-info .user-avatar .edit-avatar::before {
            font-family: feather;
            font-size: 17px;
            content: '\e058'
        }

        .user-info-wrapper .user-info .user-avatar:hover .edit-avatar {
            opacity: 1
        }

        .user-info-wrapper .user-info .user-data {
            padding-top: 15px;
        }

        .user-info-wrapper .user-info .user-data h4 {
            margin-bottom: 2px
        }

        .user-info-wrapper .user-info .user-data span {
            display: block;
            color: #9da9b9;
            font-size: 15px;
            text-align: center;
        }

        .user-info-wrapper+.list-group .list-group-item:first-child {
            border-radius: 0
        }

        .user-info-wrapper+.list-group .list-group-item:first-child {
            border-radius: 0;
        }
        .list-group-item:first-child {
            border-top-left-radius: 7px;
            border-top-right-radius: 7px;
        }
        .list-group-item:first-child {
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
        }
        a.list-group-item {
            padding-top: .87rem;
            padding-bottom: .87rem;
        }
        a.list-group-item, .list-group-item-action {
            transition: all .25s;
            color: #606975;
            font-weight: 500;
        }
        .with-badge {
            position: relative;
            padding-right: 3.3rem;
        }
        .list-group-item {
            border-color: #e1e7ec;
            text-decoration: none;
        }
        .list-group-item {
            position: relative;
            display: block;
            padding: .5rem .5rem;
            margin-bottom: -1px;
            background: transparent;
            border: .1px outset #ffffff26;
        }

        .list-group-item p {
            margin-bottom: 0;

        }

        .badge.badge-primary {
            background-color: #0da9ef;
        }

        .with-badge .badge {
            position: absolute;
            top: 50%;
            right: 1.15rem;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .list-group-item i {
            margin-top: -4px;
            margin-right: 8px;
            font-size: 1.1em;
        }


        .actions{
            background: linear-gradient(to top, #141e30, #243b55);
            width: 50%;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50px;
        }

        .actions .icons {
            font-size: 17px;
        }


        .actions:not(:last-child){
            border-right: 1px solid white;
            border-bottom-left-radius: 5px;
        }


        .actions:last-child {
            border-bottom-right-radius: 5px;
        }



        .comment {
            display: block;
            position: relative;
            margin-bottom: 30px;
            padding-left: 66px
        }

        .comment .comment-author-ava {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 50px;
            border-radius: 50%;
            overflow: hidden
        }

        .comment .comment-author-ava>img {
            display: block;
            width: 100%
        }

        .comment .comment-body {
            position: relative;
            padding: 24px;
            border: 1px solid #e1e7ec;
            border-radius: 7px;
            background-color: #fff
        }

        .comment .comment-body::after,
        .comment .comment-body::before {
            position: absolute;
            top: 12px;
            right: 100%;
            width: 0;
            height: 0;
            border: solid transparent;
            content: '';
            pointer-events: none
        }

        .comment .comment-body::after {
            border-width: 9px;
            border-color: transparent;
            border-right-color: #fff
        }

        .comment .comment-body::before {
            margin-top: -1px;
            border-width: 10px;
            border-color: transparent;
            border-right-color: #e1e7ec
        }

        .comment .comment-title {
            margin-bottom: 8px;
            color: #606975;
            font-size: 14px;
            font-weight: 500
        }

        .comment .comment-text {
            margin-bottom: 12px
        }

        .comment .comment-footer {
            display: table;
            width: 100%
        }

        .comment .comment-footer>.column {
            display: table-cell;
            vertical-align: middle
        }

        .comment .comment-footer>.column:last-child {
            text-align: right
        }

        .comment .comment-meta {
            color: #9da9b9;
            font-size: 13px
        }

        .comment .reply-link {
            transition: color .3s;
            color: #606975;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: .07em;
            text-transform: uppercase;
            text-decoration: none
        }

        .comment .reply-link>i {
            display: inline-block;
            margin-top: -3px;
            margin-right: 4px;
            vertical-align: middle
        }

        .comment .reply-link:hover {
            color: #0da9ef
        }

        .comment.comment-reply {
            margin-top: 30px;
            margin-bottom: 0
        }

        @media (max-width: 576px) {
            .comment {
                padding-left: 0
            }
            .comment .comment-author-ava {
                display: none
            }
            .comment .comment-body {
                padding: 15px
            }
            .comment .comment-body::before,
            .comment .comment-body::after {
                display: none
            }
        }

        .card{
            background: transparent;
            border: 0.1px solid #ffffff5e;
            border-radius: 5px;
            box-shadow: 2px 5px 9px rgb(0 0 0 / 21%);
        }

        body.night .card{
            background: #1e262f;
        }


        body.night .actions:not(:last-child){
            border-right: 1px solid #222222 ;
        }

        .user-information{
            height: 100%;
            box-sizing: border-box;
            overflow: hidden;
            padding: 2.5rem 3.5rem;
        }

        .input-group-custom{
            width: 48%;
        }

        .label_custom{
            margin-bottom: .1rem;
        }



        body.night .input_custom{
            background: #f3f3f3;
        }

        .row_input{
            margin-bottom: 2.5rem;
        }

        .note_textarea{
            width: 100%;
            height: 100px;
            padding: .5rem 1rem;
        }

        .phone-icons{
            width: 35px;
            margin-right: 7px;

        }

        .tooltip {
            position: relative;
            display: inline-block;
            opacity:1;
        }

        /* Tooltip text */
        .tooltip .tooltiptext {
            visibility: hidden;
            background-color: #17191b;
            color: #fff;
            text-align: center;
            padding: 5px 0;
            border-radius: 6px;
            position: absolute;
            z-index: 1;
            width: 70px;
            bottom: 115%;
            left: 50%;
            margin-left: -38px;
        }

        /* Show the tooltip text when you mouse over the tooltip container */
        .tooltip:hover .tooltiptext {
            visibility: visible;
        }

        .add_comment{
            margin-left: auto;
            margin-top: 6px;
            background: #1BBAE1;
            color: white;
            padding: 5px 14px;
            border: none;
            border-radius: 4px;
            border-radius: 4px;
        }

        .add_comment:hover{
            background: #1d9ebd;
        }

        .border_row{
            border-bottom: 1px dotted #dbe1e845;
            margin-right: -3.5rem;
            margin-left: -3.5rem;
            padding-bottom: 15px;
            padding-left: 2.5rem;
            padding-right: 2.5rem;
        }

        .row_header{
            margin-left: -3.5rem;
            margin-top: -2.5rem;
            padding: 10px;
            margin-right: -3.5rem;
            background: #354250cf;
            border-bottom: 1px dotted #ffffff59;
            margin-bottom: 25px;
        }

        .comment_row{
            background: #afa9a22e;
            padding: 2px 5px 11px;
            border-radius: 5px;
        }


        .body.night .comment_row{
            background: #afa9a20d;
        }


        .comment_logo{
            width: 70px;
        }

        .comment_time{
            font-size: 11px;
            font-style: italic;
            color: #8c9698;
        }

        .comment_paragraph{
            margin-bottom: 5px;
            font-size: 14px;
            /*width: 80%;*/
        }

        .comment_name{
            margin-bottom: 0;
        }


        comment_image_column{
            width: 10%;
        }

        .comment_column{
            width: 90%;
        }



        .card::-webkit-scrollbar {
            width: 3px;
        }

        .card::-webkit-scrollbar-track {
            background: transparent;
        }
        .card::-webkit-scrollbar-thumb {
            background-color: grey;
            border-radius: 20px;
            border: 2px solid grey;
        }

        .calendar-icon{
            padding: 14px 15px;
            background: #5f9ea099;
            border-radius: 100%;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px outset;
        }

        .calendar-div{
            background: #f0f8ff0a;
            border-bottom: .02px solid #ffffffa6;
        }

        .m-r-auto{
            margin-right: auto;
        }

        .completed{
            font-size: 19px;
            color: #2bab61;
        }

        .pending{
            font-size: 19px;
            color: #fff;
        }

        .canceled{
            font-size: 19px;
            color: red;
        }

        .add_event{
            cursor:pointer;
        }

        .sms-header{
            background: linear-gradient(to bottom, #0f2027, #203a43, #2c5364);
            color: white;
            border-bottom: 1px solid #1bbae1;
        }

        .sms-icon{
            color: white;
            font-size: 70px;
            text-align: center;
            margin: auto;
        }

        .delete_icon{
            position: absolute;
            top: 7px;
            margin: 0;
            right: 7px;
            font-size: 17px;
            cursor: pointer;
        }

        .height-100{
            height: 100%;
        }

    </style>

@endpush


