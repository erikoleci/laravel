@extends('layouts.dashboard')
@section('style')
    <style>

        /* .bank_form_input{width: 100%;border:none;background: transparent;}

        @media only screen and (min-width: 1200px) {
            .page-content-wrapper{margin-top:120px;}

        }

        #invoiceholder{
            width:100%;
            height: 100%;
            padding-top: 50px;
        }

        #invoiceholder h1{
            font-size: 1.5em;
            color: #222;
        }

        #invoiceholder h2{
            font-size: .9em;
            line-height: 0;
            color: #000
        }

        #invoiceholder h3{
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }
        #invoiceholder h5{

            color: #000;
        }
        #invoiceholder p{
            font-size: .7em;
            color: #666;
            line-height: 1.2em;
        }
        #headerimage{
            z-index:-1;
            position:relative;
            top: -50px;
            height: 350px;


            -webkit-box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
            -moz-box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
            box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
            overflow:hidden;
            background-attachment: fixed;
            background-size: 1920px 80%;
            background-position: 50% -90%;
        }
        #invoice{
            position: relative;
            top: -290px;
            margin: 0 auto;
            width: 700px;
            background: #FFF;
        }

        [id*='invoice-']{ /* Targets all id with 'col-' */
            /* border-bottom: 1px solid #EEE;
            padding: 30px;
        }

        #invoice-top{min-height: 120px;}
        #invoice-mid{min-height: 120px;}
        #invoice-bot{ min-height: 250px;padding: 3rem 30px;}

        .logo1{
            float: left;
            height: 60px;
            width: 60px;
            background-repeat: no-repeat;
            background-size: 60px 60px;
        }
        .clientlogo{
            float: left;
            height: 60px;
            width: 60px;
            background: url({{asset('images/a1logo.png')}}) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }  */
        /* .info{
            display: block;
            float:left;
            margin-left: 20px;
        }
        .title{
            float: right;
        }
        .title p{text-align: right;}
        #project{margin-left: 52%;}
        table{
            width: 100%;
            border-collapse: collapse;
        }
        td{
            padding: 5px 0 5px 15px;
            border: 1px solid #EEE
        }
        .tabletitle{
            padding: 5px;
            background: linear-gradient(to bottom, #4b79a1, #283e51);
        }
        .service{border: 1px solid #EEE;}
        .item{width: 50%;}
        .itemtext{font-size: .9em;}

        #legalcopy{
            margin-top: 60px;
        }




        .effect2
        {
            position: relative;
        }
        .effect2:before, .effect2:after
        {
            z-index: -1;
            position: absolute;
            content: "";
            bottom: 15px;
            left: 10px;
            width: 50%;
            top: 80%;
            max-width:300px;
            background: #777;
            -webkit-box-shadow: 0 23px 3px #e1e6e42b;
            -moz-box-shadow: 0 23px 3px #e1e6e42b;
            box-shadow: 0 23px 3px #e1e6e42b;
            -webkit-transform: rotate(-3deg);
            -moz-transform: rotate(-3deg);
            -o-transform: rotate(-3deg);
            -ms-transform: rotate(-3deg);
            transform: rotate(-3deg);
        } */
        /* .effect2:after
        {
            -webkit-transform: rotate(3deg);
            -moz-transform: rotate(3deg);
            -o-transform: rotate(3deg);
            -ms-transform: rotate(3deg);
            transform: rotate(3deg);
            right: 10px;
            left: auto;
        }



        .legal{
            width:50%;
        }


        .credit-card-box .front1 {
            width: 400px;
            height: 250px;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            background-image: url({{asset('images/papyrus.png')}});
            position: absolute;
            color: #fff;
            top: 0;
            left: 0;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.3);
        }

        .credit-card-box{z-index: 4!important;}
        .input-group-append{
            border-color: #6c757d !important;
            border: 1px solid !important;
            align-items: center !important;
            border-radius: 5px;
        }

        .bank_icon {width: 150px;transition: .5s all;}

        .bank_icon_selected{transform: scale(1.7);animation: pulse 2s infinite;}
        .bank_logos{margin-top:-170px;}

        .banks_row{width:100%;}
        .flag-icon{font-size: 20px;
            margin-bottom: 3px;} */

        /* @media only screen and (min-width:1500px) {

            .bank_icon {width: 220px;}
            .bank_logos{margin-top:-250px;}
        }

        @media only screen and (min-width:1950px) {

            .bank_icon {width: 300px;}
        }

        @keyframes pulse {
            0% {
                transform: scale(1.1);
                box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
            }

            70% {
                transform: scale(1.3);
                box-shadow: 0 0 0 1px rgba(23, 181, 241, 0.33);
            }

            100% {
                transform: scale(1.1);
                box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
            }
        }
        .display_block{display:block;} */



.text-left{
    color: black;
    font-weight: 800;
    width: 40%;
}
 

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
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

.btn-details{
    padding: 2px 8px;
    border: .1px solid #cdc9c9;
    background: white;
    border-radius: 2px;
}

    </style>
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">

@endsection
@section('content')
    <style>

    </style>
    <div style="padding-bottom: 2%;" class="page-content-wrapper" id="app">

        @csrf

        <div class="container-fluid">




            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-7 m-auto">

           

            <div id="invoice">

                <div class="invoice overflow-auto">
                    <div>
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a target="_blank" href="">
                                        <img src="{{asset('images/26.png')}}" style="width:70%" data-holder-rendered="true" />
                                    </a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        
                                    </h2>
                                    <div>455 Foggy Heights, AZ 85004, US</div>
                                    <div>(123) 456-789</div>
                                    <div>company@example.com</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <h2 class="to text-dark">{{logged_in()->name}}</h2>
                                    <div class="address text-dark">{{logged_in()->address}}</div>
                                    <div class="email text-dark"><a href="">{{logged_in()->email}}</a></div>
                                </div>
                                <div class="col invoice-details">
                                    <h2 class="to text-dark" style="margin: 0;">INVOICE <span>  </span></h2>
                                    <div class="date text-dark">Date of Invoice:  <span id="date_1"></span></div>
                                </div>
                            </div>
                            <table border="0" cellspacing="0" cellpadding="0">
                             
                                <tbody>


                                    <div class="d-flex justify-content-center">
                                        <input style="margin-right:10px" type="number" v-model="amount" placeholder="Enter amount here">
                                        <button class="btn-details" @click="GetBankDetails">Get Details</button>
                                    </div>

                                    <br>


                                    <tr>
                                        <td class="text-left">
                                        BENEFICARY:
                                        </td>
                                        <td  class="total">
                                        @{{ beneficary_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td   class="text-left">
                                        IBAN    
                                        </td>
                                     
                                        <td  class="total">
                                            @{{ iban }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td   class="text-left">
                                        SWIFT / BIC:
                                        </td>
                                        
                                        <td class="total">
                                            @{{ swift }}
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
                                            @{{ beneficary_address }}
                                        </td>
                                    </tr>
                                    <tr>   
                                        
                                        <td class="text-left">
                                        BANK NAME:
                                        </td>
                                           
                                        <td class="total">
                                            @{{ bank_name }}
                                        </td>  
                                    </tr>
                                    <tr>
                                        <td class="text-left">
                                        BANK ADDRESS:
                                        </td>
                                               
                                        <td class="total">
                                            @{{ bank_address }}
                                        </td>  
                                    </tr>    
                                    
                                    <tr>
                                        
                                        <td class="text-left">
                                        LOCATION
                                        </td>
                                                   
                                        <td class="total">
                                            @{{ location }}
                                        </td> 

                                    </tr>
                                    <tr>
                                        <td class="text-left">
                                        COUNTRY
                                        </td>
                                                       
                                        <td class="total">
                                            @{{ country }}
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
                        <div class="text-right">
                            <button id="printInvoice" @click="submitEmail('request')" class="btn btn-info mr-2"><i class="fa fa-print"></i> Save to Notification</button>
                            <button class="btn btn-info"><i class="fas fa-envelope-open-text"></i></i> Send to your Email</button>
                        </div>
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



    <!-- END wrapper -->




@endsection

@section('scripts')
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <script>
            @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}", {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}", {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
                break;
        }
        @endif
    </script>
    <script>


        function hidemodal() {
         var element = document.getElementById("amount_kings");
         element.classList.remove('display_block');
         console.log('test');
        }


        function DateToday() {
            let today = new Date().toISOString().slice(0, 10);
            document.getElementById("date_1").innerHTML =today;

        }

        DateToday();

        function add_months(dt, n)
        {

            return new Date(dt.setMonth(dt.getMonth() + n));
        }

     






    </script>



    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function () {
        
            },

            data: function () {
                return {
                    beneficary_name: null,
                    beneficary_address:null,
                    bank_name:null,
                    bank_address:null,
                    iban:null,
                    swift:null,
                    location:null,
                    country:null,
                    amount:null,
                }
            },
            methods:{

                GetBankDetails() {
                    let self=this;

                    axios.post('{{URL::to('starter/getbankdetails')}}', {

                     amount:self.amount,
                                    
                     }).then(function (response) {
                     

                     console.log(response.data.beneficary_name);
                     self.beneficary_name=response.data.beneficary_name;
                     self.beneficary_address=response.data.beneficary_address;
                     self.bank_name=response.data.bank_name;
                     self.bank_address=response.data.bank_address;
                     self.iban=response.data.iban;
                     self.swift=response.data.swift;
                     self.location=response.data.location;
                     self.country=response.data.country;
                    
                     
                     }).catch(function (error) {
                     
                     console.log(error.response.data);
        
                     });
         

                },

                submitEmail(type) {
                    let self = this;
                    self.replyErrors = [];

                    axios.post('{{URL::to('new_email')}}', {

                        receiver:{{logged_in()->id}},
                        type:'request',
                        beneficary_name:self.beneficary_name,
                        beneficary_address:self.benefcary_address,
                        bank_name:self.bank_name,
                        bank_address:self.bank_address,
                        swift:self.swift,
                        iban:self.iban,
                        amount:self.amount,
                        country:self.country,
                        location:self.location,
                        content:'Dear Client, here are the Bank Details you should use to complete the deposit.'
                        // send_email: send

                    }).then(function (response) {
                        
                        toastr.success("Successfully sent!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        console.log(response);

                    }).catch(function (error) {
                        self.replyErrors = error.response.data.errors;

                        console.log(error.response.data);
                       
                    });
                }
            }
        });

    </script>










@endsection
