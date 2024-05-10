@extends('layouts.dashboard')
@section('style')


    <style>  .transactionsTable input {
            border-radius: 5px;
            border-top: 0;
            border: 1px outset #80767630;
        }

        a{color: #0650a0;}

        .offline {
            color: #0650a0!important;
        }

        body.night a {color: #e6c9a1;}

        body.night .offline {color: #e6c9a1!important;}


        table.dataTable tbody>tr.selected, table.dataTable tbody>tr>.selected {
            background-color: #00396b!important;
        }


        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: 0.5em;
            display: inline-block;
            width: auto;
            border: 1px solid #0650a0;
        }

        .dt-buttons{opacity:0;transition: .5s;}
        .dt-buttons:hover{opacity:1;}

        .btn-dark {
            background-color: #0650a0;
            border: 1px solid #0650a0;
            color: #ffffff;
        }

        .table-padded {
            border-collapse: separate;
            border-spacing: 0 .5rem!important;

        }

        tr{background: #f3f6f94a;transition: .3s;font-weight: 900;}
        @media only screen and (min-width:2000px){

            font-weight:17px;
        }

        body.night tr{background: #2b44bf42; color: white;}
        body.night thead tr{color:white!important;}
        .table-padded {
            border-collapse: separate;
            border-spacing: 0 .5rem!important;

        }



        .table td, .table th {border-top:0!important;}

        thead tr{background: transparent;border-spacing: 0!important;}

        .table > tbody > tr > td, .table > tfoot > tr > td, .table > thead > tr > td {
            padding: 1.5rem 1rem;
        }


        tr:hover{box-shadow: 0 2px 7px rgba(120,130,140,0.3);}



        thead tr{color:black!important;}

        .color_gold{color:#D9AD6B;}

        .modal.right .modal-dialog {
            position: fixed;
            top:71.25px;
            margin: auto;
            width: 650px;
            height: calc(100% - 71.25px);
            -webkit-transform: translate3d(0%, 0, 0);
            -ms-transform: translate3d(0%, 0, 0);
            -o-transform: translate3d(0%, 0, 0);
            transform: translate3d(0%, 0, 0);
        }

        .modal.right .modal-content {
            height: 100%;
            overflow-y: auto;
            border-radius: 0;
            border: none;
        }

        .modal.right.fade .modal-dialog {
            right: -650px;
            -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
            -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
            -o-transition: opacity 0.3s linear, right 0.3s ease-out;
            transition: opacity 0.3s linear, right 0.3s ease-out;
        }

        .modal.right.fade.show .modal-dialog {
            right: 0;
        }

        body.night .modal-content{background-color: #0d1f40}

        body.night .modal-content tr {background-color: transparent;}

        @media only screen and (min-width:2000px) {
            tr{font-size: 16px;}
        }

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="{{asset('/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')


    <div class="page-content-wrapper usersContainer" id="app">

        <div class="container-fluid">

            <div class="row mt-4">
                <div class="col-sm-12">
                    <div class="float-right page-breadcrumb">
                        <ol class="breadcrumb">
                        </ol>
                    </div>

                </div>
            </div>
            <!-- end row -->
            <div class="row mt-4">
                <div class="col-xl-12 ">
                    <div class="m-t--4">
                        <div class=" col-md-12">


                            <div class="box-outer">
                                <a class="arrow-left arrow" id="arrowLeft"><i class="fa fa-chevron-left"></i></a>
                                <a class="arrow-right arrow" id="arrowRight"><i class="fa fa-chevron-right"></i></a>
                                <div class="box-inner">
                                    <table class="table table-padded  box-outer table-responsive-fix-big call-center-table transactionsTable any1transactions any1table" style="width: 100% !important;">

                                        <thead>
                                        <tr>
                                            <th class="idInput" data-priority="1">Account</th>
                                            <th class="noInput" >Remove</th>
                                            <th data-priority="3">Client</th>
                                            <th data-priority="3">MT4 Account</th>
                                            <th data-priority="1">Fill Date</th>
                                            <th class="noInput" data-priority="1">Open</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                      @isset($surveys)
                                        @foreach($surveys->sortByDesc('id') as $survey)
                                            @isset($survey->user->manager)
                                            @if($survey->user->manager === logged_in()->id)
                                            <tr class="">
                                                <td> @if (($survey->user->account_id) === 'black_panther')
                                                        <img class="rounded-circle" src="{{asset('images/users/panther_logo.png')}}" alt="user" width="65">
                                                        <span style="display: none">Black Panther</span>
                                                    @elseif (($survey->user->account_id) === 'bull_bear')
                                                        <img class="rounded-circle" src="{{asset('images/users/bull_logo.png')}}" alt="user" width="65">
                                                        <span style="display: none">Bull Bear</span>
                                                    @elseif (($survey->user->account_id) === 'phoenix')
                                                        <img class="rounded-circle" src="{{asset('images/users/phoenix_logo.png')}}" alt="user" width="65">
                                                        <span style="display: none">Phoenix</span>
                                                    @elseif (($survey->user->account_id) === 'kings')
                                                        <img class="rounded-circle" src="{{asset('images/users/kings_logo.png')}}" alt="user" width="65">
                                                        <span style="display: none">Kings</span>
                                                    @else
                                                        <img class="rounded-circle" src="{{asset('images/users/promo_logo.png')}}" alt="user" width="65">
                                                        <span style="display: none">Promo</span>
                                                    @endif
                                                </td>
                                                <td><a>
                                                        <i class="fa fa-times font-20 deleteUser"></i>
                                                    </a></td>
                                                <td class="openBtn" data-toggle="modal" > {{$survey->user->name}}</td>
                                                <td>{{$survey->user->mt4_account}}</td>
                                                <td>{{$survey->created_at}}</td>
                                                <td><button data-toggle="modal" @click="openModal({{$survey}})" data-target="#modal{{$survey->id}}" class="openBtn btn btn-lg btn-dark">Read Survey</button></td>

                                            </tr>
                                            @endif
                                            @endisset
                                        @endforeach
                                      @endisset
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


            <div v-if="selectedSurvey" class="modal right fade" :id="getModalId()" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <table class="table transactionsTable">

                            <thead>

                            <th class="idInput" data-priority="1">QUESTIONARIO</th>

                            <hr>

                            </thead>
                            <tbody>

                            <tr>
                                <td>
                                    <h6>1. La sua fascia età è: </h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_2 }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>2. Professione: </h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_3 }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>3. Livello di Istruzione: </h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_4 }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>4. È aggiornato sull’andamento dei mercati finanziari? </h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_5 }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>5. In che tipologia di prodotti finanziari investe/ha investito: </h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_6 }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>6. Qual’è la sua fonte di reddito: </h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_7 }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>7. Qual’è la sua capacità reddituale annua netta: </h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_8 }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>8. In termini percentuali quanto riesce a risparmiare del suo reddito annuo netto: </h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_9 }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>9. Quale percentuale dei suoi risparmi investe in prodotti finanziari </h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_10 }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>10. Qual’è l’obiettivo dei suoi investimenti: </h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_11 }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>11. Qual’è il periodo di tempo per il quale desidera conservare l’investimento: </h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_12 }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>12. Ha eseguito operazioni con metodi di trading negli ultimi 3 anni? </h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_13 }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>13. Ha mai partecipato a corsi o seminari sul trading Forex o CFD? </h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_14 }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>14. Preferibilmente, quando intenderesti prelevare il tuo capitale dal portfoglio di trading: </h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_15 }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>15. Qual’è la sua reazione ai movimenti negativi di mercato:</h6>
                                    <p class="color_gold">@{{ selectedSurvey.question_16 }}</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div><!-- container fluid -->



    </div> <!-- Page content Wrapper -->


@endsection

@section('scripts')

    <!-- Required datatable js -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
    <!-- Datatable init js -->
    <script src="{{asset('pages/datatables.init.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function () {
                console.log('it started');
            },

            data: function () {
                return {
                    selectedSurvey:{
                    },
                }
            },
            methods:{
                getModalId(){
                    var output;
                    if (this.selectedSurvey && this.selectedSurvey.id) {
                        output = 'modal'+this.selectedSurvey.id;
                        console.log(output)

                        return output;
                    }
                    else
                        output = 'modal'+0;
                    return output;
                },

                openModal(survey){
                    console.log(survey.id);
                    this.selectedSurvey=survey;

                    var dialog = document.getElementById('modal'+survey.id);
                    console.log(dialog);
                    dialog.showModal();
                },


                {{--delete_withdraw:function(id) {--}}

                {{--    let self=this;--}}
                {{--    console.log('im here');--}}

                {{--    self.replyErrors=[];--}}
                {{--    swal({--}}
                {{--        title: "Are you sure?",--}}
                {{--        text: "Once deleted, you won't be able to recover this user!",--}}
                {{--        icon: "warning",--}}
                {{--        buttons: true,--}}
                {{--        dangerMode: true,--}}
                {{--    }).then((result) => {--}}
                {{--        if (result) {--}}
                {{--            axios.post('{{URL::to('delete_withdraw')}}', {--}}
                {{--                id:id,--}}
                {{--            }).then(function(response) {--}}
                {{--                console.log(response);--}}
                {{--                self.output=response.data;--}}
                {{--                window.location.href = '{{URL::to('admin/withdraws/')}}'+'?msg='+response.data;--}}

                {{--            }).catch(function(error) {--}}
                {{--                // self.loading = false;--}}
                {{--                self.replyErrors = error.response.data.errors;--}}
                {{--                console.log(error.response.data);--}}
                {{--                --}}{{--toastr.error("Error changing the password!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});--}}
                {{--                --}}{{--window.location.hash='{{URL::to('personal_info/')}}';--}}
                {{--            });--}}
                {{--        }else{--}}
                {{--            //console.log(lead_id);--}}
                {{--        }--}}
                {{--    })--}}


                {{--},--}}
            }
        })

    </script>

    <script>
        $('openBtn').on('click',function(){
            $('.modal-body').load('getContent.php?id=2',function(){
                $('#myModal').modal({show:true});
            });
        });
    </script>


@endsection
