<title>{{ $user->name }}</title>
@extends('layouts.dashboard')
@include('layouts.user_profile_functions')
@section('style')

    <style>
        @stack('user_profile_style')

    </style>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
@section('content')

    <div class="page-content-wrapper usersContainer" id="app">

        <div class="container-fluid">


            {{-- ROW 1 --}}

            <div class="padding-bottom-3x mb-2">
                <div class="row align-items-stretch">




                    {{-- USER ACCOUNT INFORMATION CARD --}}

                    <div class="col-xl-3 col-lg-4">

                        <div class="card height-100 d-flex flex-column justify-content-between">

                            <aside class="user-info-wrapper">
                                <div class="user-info">
                                    <img src="{{ asset('images/UserProfile.png') }}" alt="User">
                                    <div class="user-data">
                                        <h4>{{ $user->name }}</h4><span>{{ $user->mt4_account }}</span>
                                    </div>
                                </div>
                            </aside>

                            <nav class="list-group">
                                <div class="list-group-item d-flex align-items-center justify-content-between">
                                    <h6>Status:</h6>
                                    <p class="custom-lead-color">{{ $user->status->status }}</p>
                                </div>
                                <div class="list-group-item d-flex align-items-center justify-content-between">
                                    <h6>Note:</h6>
                                    <p class="custom-lead-color text-capitalize">{{ $user->note }}</p>
                                </div>
                                <div class="list-group-item d-flex align-items-center justify-content-between">
                                    <h6>Country:</h6>
                                    <p class="custom-lead-color">{{ $user->country }}</p>
                                </div>
                            </nav>


                        </div>


                    </div>

                    {{-- USER ACCOUNT INFROMATION CARD --}}


                    {{-- USER INFORMATION CARD --}}

                    <div class="col-xl-9 col-lg-8">

                        <div class="card user-information">





                            {{-- NAME & STATUS --}}

                            <div class="row d-flex row_input align-items-center justify-content-between">
                                <div class="input-group flex-column input-group-custom">
                                    <label class="label_custom">Client Name</label>
                                    <input disabled class="input_custom" type="text" value="{{ $user->name }}">
                                </div>


                                <div class="input-group flex-column input-group-custom">
                                    <label class="label_custom">Registered Date</label>
                                    <input class="input_custom" disabled type="text" value="{{ $user->created_at }}">
                                </div>

                            </div>

                            {{-- NAME & STATUS --}}




                            {{-- PHONE & EMAIL ROWS --}}

                            <div class="row d-flex row_input  align-items-center justify-content-between">
                                <div class="input-group flex-column input-group-custom">

                                    <label class="label_custom">Client Phone</label>
                                    <input disabled class="input_custom" type="text" value="{{ $user->phone }}">
                                </div>

                                <div class="input-group flex-column input-group-custom" style="z-index: 5;">
                                    <label class="label_custom">Client Email</label>
                                    <input class="input_custom" disabled type="text" value="{{ $user->email }}">

                                </div>
                            </div>

                            {{-- PHONE & EMAIL ROWS --}}







                            {{-- ADDRESS & DATE ROWS --}}

                            <div class="row d-flex row_input  align-items-center justify-content-between">

                                <div class="input-group flex-column">
                                    <label class="label_custom">Client Status</label>
                                    <select v-model="status" class="select input_custom">
                                        <option selected :value="{{ $user->status->id }}">{{ $user->status->status }}
                                        </option>
                                    </select>
                                </div>

                            </div>

                            {{-- ADDRESS & DATE ROWS --}}


                            <div class="row d-flex row_input align-items-center justify-content-between">
                                <div class="input-group flex-column input-group-custom">
                                    <label class="label_custom">Note</label>
                                    <input v-model="note" class="input_custom" type="text">
                                </div>


                                <div class="input-group flex-column input-group-custom">
                                    <label class="label_custom">Country</label>
                                    <input class="input_custom" disabled type="text" value="{{ $user->country }}">
                                </div>

                            </div>

                            {{-- NOTE --}}


                        </div>

                    </div>

                    {{-- USER INFORMATION CARD --}}


                </div>
            </div>

            {{-- ROW 1 --}}


            <br>


            {{-- ROW 2 --}}

            <div class="padding-bottom-3x mb-2">
                <div class="row align-items-stretch">




                    {{-- USER COMMENTS CARD --}}

                    <div class="col-xl-12 col-lg-12" style="max-height: 750px;">

                        <div class="card user-information" style="overflow-y: scroll">
                        
                            <div v-for="commentss in comments_vue"
                                class="row position-relative comment_row d-flex align-items-center justify-content-around m-t-15">

                                <div><img class="comment_logo" src="{{ asset('images/UserProfile.png') }}"></div>

                                <div class="d-flex flex-column comment_column">
                                    <h5 class="comment_name">@{{ commentss . manager_name }}</h5>
                                    <p class="comment_paragraph">@{{ commentss . comment }}</p>
                                    <span class="comment_time">@{{ commentss . created_at }}</span>
                                </div>

                            </div>


                            {{-- COMMENT --}}

                        </div>

                    </div>

                    {{-- USER COMMENTS CARD --}}

                </div>

            </div>

            {{-- ROW 2 --}}

            <br>

        </div>


    </div>


@endsection

@section('scripts')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>




    <script>


    </script>


    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function() {
                this.getComments({{ $user->id }});
            },

            data: function() {
                return {
                    note: '{{ $user->note }}',
                    status: {{ $user->status_id }},
                    id: null,
                    comment: null,
                    name: null,
                    comments_vue: [],
                    user_id: null,
                    client_id: null,
                    email: '{{ $user->email }}',

                }
            },
            methods: {



                getComments: function(c) {
                    let self = this;
                    axios.post('{{ URL::to('/get_lead_comments/') }}', {
                        id: c,
                    }).then(function(response) {
                        self.comments_vue = response.data.comments;
                    }).catch(function(error) {
                        toastr.error("Couldn't get comments! Please refresh the page!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

            }
        });

    </script>

@endsection
