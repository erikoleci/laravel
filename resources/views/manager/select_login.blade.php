@extends('layouts.dashboard')
@section('style')
<style>

    .container{
        margin-top: 50px;
    }

    h1{
        color: #5C7CFA;
    }

    .card{
        border-radius: 15px;
        transition: transform .2s;
    }

    .card-body{
        padding: 10px;
        margin-top: -50px;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -o-transition: all 1s ease;
        transition: all 1s ease-in-out;
    }

    .heart{
        color: #989898;
        margin-top: 15px;
        margin-left: 230px;
        font-size: 30px;
        position: absolute;
        width: 40px;
        height: 40px;
        border-radius: 30px;
        padding: 0px;
        text-align: center;
    }

    .heart-active{
        color: #C50707;
    }

    .heart:hover{
        color: red;
        background-color: #f9f9f9;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -o-transition: all 1s ease;
        transition: all 1s ease-in-out;
    }

    .card-body a{
        visibility: hidden;
    }

    .card:hover > .card-body{
        margin-top: -0px;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -o-transition: all 1s ease;
        transition: all 1s ease;
    }

    .card:hover{
        transform: scale(1.02);
    }

    .card:hover > .card-body > a{
        visibility: visible;
    }

    .first-image{
        width: 100%;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .cart, .wish{
        padding: 5px;
        width: 50px;
        height: 50px;
        margin-left: -24px;
        margin-top: 0px;
        margin-right: 3px;
        background-color: #fff;
        color: #5C7CFA;
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        text-align: center;
        -ms-display: flex;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .wish{
        color: #C50707;
    }

    #toast, #toast-cart{
        padding: 10px;
        padding-left: 5px;
        position: fixed;
        width: 230px;
        height: 50px;
        top: 0;
        left: 80%;
        transform:translate(-50%);
        background-color: #EFF2FF;
        color: #76777E;
        padding: 1px;
        border-radius: 8px;
        text-align:center;
        z-index: 1;
        box-shadow: 0 0 20px rgba(0,0,0,0.3);
        visibility: hidden;
        opacity: 0;
        -ms-display: flex;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }
    #toast.show, #toast-cart.show{
        visibility:visible;
        animation:fadeInOut 3s;
    }

    @keyframes fadeInOut{
        5%,95%{opacity:1;top:50px}
        15%,85%{opacity:1;top:30px}
    }

    a{
        z-index: 0;
    }

    .side-menu{display: none;}

</style>
@endsection
@section('content')





    <div class="page-content-wrapper" id="app">

        <div class="container-fluid" style="position: absolute; left: 0;">



            <div style="padding-top:25px;" class="col-sm-8 deposit_form">
                <h3 class="deposit_header">{{__("Select Login Type")}} </h3>
                <hr class="sm_separator">
            </div>


            <div id="toast"></div>
            <div id="toast-cart"></div>
            <div class="container">
                <div class="row d-flex align-items-center justify-content-around">
                    <div class="col-lg-4">
                        <div class="card" style="width: 27rem;">

                            <img src="{{asset('images/manager_login.jpg')}}" class="first-image">
                            <div class="card-body">
                                <a style="cursor: pointer;color:#0883da;"  @click="login_manager({{logged_in()->id}}, 1)">Login Manager</a>
                                <hr>

                                    <h5 class="card-title text-center">MANAGER</h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="width: 27rem;">
                            <img src="{{asset('images/lion-min.jpg')}}" class="first-image">
                            <div class="card-body">
                                <a style="cursor: pointer; color: gold;" @click="login_manager({{logged_in()->id}}, 0)">Login Agent</a>
                                <hr>

                                    <h5 class="card-title text-center">AGENT</h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->


@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <script>
    var vm = new Vue({
    el: '#app',
    mounted: function () {
    console.log('it started');
    },

    data: function () {
    return {
    user_id:null,
    value:null,

    }
    },
    methods:{
        login_manager(user_id, val){
            console.log(val);

            // var element=document.getElementById('spinSwitch'+user_id);
            axios.post('{{URL::to('login_manager_test')}}', {
                user_id:user_id,
                value:val,
            }).then(function(response) {
                console.log(response);

                if(val===1)
                window.location.href = '{{URL::to('manager/clients/')}}';
                else
                window.location.href = '{{URL::to('manager/home/')}}';
            })
                .catch(function(error) {
                    console.log(error);
                });
        },
    }
    })
    </script>


@endsection
