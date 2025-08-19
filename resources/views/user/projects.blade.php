@extends('layouts.dashboard')
@section('style')
    <style>


        .movie {
            -webkit-box-flex: 1;
            flex: 1;
            overflow: hidden;
        }
        .view_project{display: flex;align-items: center;justify-content: space-between;}
        .content-page > .content{margin-bottom: 0!important;}
        .cards {
            margin: auto;
            height: 100%;
            display: -webkit-box;
            display: flex;
            justify-content: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: left;
            -webkit-transition: 0.5s, left 0s;
            transition: 0.5s, left 0s;
            position: relative;
        }

        .card {
            margin: 60px;
            display: -webkit-inline-box;
            display: inline-flex;
            width: 800px;
            height: auto;
            flex-shrink: 0;
            box-shadow: 0px 5px 25px 5px rgba(0, 0, 0, 0.25);
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 5px;
            padding: 20px;
            padding-bottom: 0;
            color: #827f8e;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            cursor: pointer;
            display: flex;
            flex-direction: row;
        }
        .card .left {
            -webkit-box-flex: 1;
            flex: 1;
        }
        .card .left .cover {
            width: 220px;
            height: 309px;
            top: -50px;
            border-radius: 5px;
            position: relative;
            -webkit-transition: 0.5s 0.1s;
            transition: 0.5s 0.1s;
            box-shadow: 0px 5px 25px 5px rgba(0, 0, 0, 0.25);        }
        .card .right {
            -webkit-box-flex: 2;
            flex: 2;
            padding: 20px;
            padding-top: 10px;
            padding-bottom: 0;
        }
        .card .right h2 {
            margin: 0;
            font-weight: bold;
            font-size: 24px;
            color: #444;
        }
        .card .right h4 {
            margin-top: 10px;
            margin-bottom: 10px;
            opacity: 0.8;
            font-weight: normal;
        }
        .card .right p {
            font-size: 13px;
            line-height: 1.3;
            text-align: justify;
            opacity: 0.8;
            min-height: 5em;
            margin: 1.4rem 0;
        }
        .card .right .price {
            display: inline-block;
            margin-right: 20px;
            font-size: 13px;
        }
        .card .right button {
            padding: 5px 10px;
            background-color: #332c2c;
            color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            cursor: pointer;
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }
        .card .right button:hover {
            color: white;
            background-color: #c1a76a;}
        .card:hover {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }
        .card:hover .left .cover {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        .project_cover{width:220px;height:309px;}


    </style>
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">

@endsection
@section('content')
    <style>

    </style>
    <div style="padding-bottom: 2%;" class="page-content-wrapper"  id="app">

        <div class="container-fluid">


            <header class="header1">
                <div class="row">
                    <div class="col-lg-4 mr-lg-auto">
                        <h1 class="page-title">
                            <a class="sidebar-toggle-btn trigger-toggle-sidebar">
                                <span class="line"></span><span class="line"></span><span class="line"></span>
                                <span class="line line-angle1"></span><span class="line line-angle2"></span>
                            </a>
                            Projects <small class="text-muted">({{ count($projects) }} total)</small>
                        </h1>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" id="searchProjects" class="form-control" placeholder="Search projects...">
                        </div>
                    </div>

                    @if(onlyguard('admin'))
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg btn-primary text-white" data-toggle="modal" data-target="#projectsModal">
                            <i class="fa fa-plus"></i> Add Project
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Filter Options -->
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-secondary filter-btn active" data-filter="all">All</button>
                            <button type="button" class="btn btn-outline-secondary filter-btn" data-filter="forex">Forex</button>
                            <button type="button" class="btn btn-outline-secondary filter-btn" data-filter="commodities">Commodities</button>
                            <button type="button" class="btn btn-outline-secondary filter-btn" data-filter="indices">Indices</button>
                            <button type="button" class="btn btn-outline-secondary filter-btn" data-filter="crypto">Crypto</button>
                            <button type="button" class="btn btn-outline-secondary filter-btn" data-filter="stocks">Stocks</button>
                        </div>
                    </div>
                </div>
            </header>


            @foreach($projects as $project)
                <div class="row">
                    <div class="col-sm-12">
                    <div class="movie project-card" data-category="{{$project->category}}">
                        <div class="cards">
                            <div class="card fadeIn animated">
                                <div class="left zoomIn animated">
                                    <div class="cover" style="">
                                        @if (($project->category) == 'forex')
                                            <img src="{{asset('images/forex_cover.jpg')}}"  class="project_cover">

                                        @elseif (($project->category) == 'commodities')
                                            <img src="{{asset('images/Commodities_cover.jpg')}}"  class="project_cover">

                                        @elseif (($project->category) == 'indices')
                                            <img src="{{asset('images/indices_cover.jpg')}}" class="project_cover">

                                        @elseif (($project->category) == 'crypto')
                                            <img src="{{asset('images/crypto_cover.jpg')}}" class="project_cover">

                                        @else
                                           <img src="{{asset('images/stocks_cover.jpg')}}"  class="project_cover">
                                    @endif
                                    </div>
                                </div>
                                @if(onlyguard('admin'))
                                <h5 style="position: absolute;right: 11px;top: 0;" @click="delete_project({{$project->id}})">X</h5>
                                @endif
                                <div class="right">

                                    <h2>{{$project->title}}  <span style="color: #146faf">@if($project->read === 1) ✓✓ @else  @endif </span></h2>
                                    <h6 style="text-transform: capitalize;">Category: {{$project->category}}</h6>
                                    @if(onlyguard('admin'))
                                       <h6>Assigned to: @if($project->user) {{ $project->user->name }} <span> @if (($project->user->account_id) === 'black_panther')
                                                   <img class="rounded-circle" src="{{asset('images/users/panther_logo.png')}}" alt="user" width="65">
                                                   <span style="display: none">Black Panther</span>
                                               @elseif (($project->user->account_id) === 'bull_bear')
                                                   <img class="rounded-circle" src="{{asset('images/users/bull_logo.png')}}" alt="user" width="65">
                                                   <span style="display: none">Bull Bear</span>
                                               @elseif (($project->user->account_id) === 'phoenix')
                                                   <img class="rounded-circle" src="{{asset('images/users/phoenix_logo.png')}}" alt="user" width="65">
                                                   <span style="display: none">Phoenix</span>
                                               @elseif (($project->user->account_id) === 'kings')
                                                   <img class="rounded-circle" src="{{asset('images/users/kings_logo.png')}}" alt="user" width="65">
                                                   <span style="display: none">Kings</span>
                                               @else
                                                   <img class="rounded-circle" src="{{asset('images/users/promo_logo.png')}}" alt="user" width="65">
                                                   <span style="display: none">Promo</span>
                                               @endif </span> @else None @endif</h6>

                                    @endif

                                    @if (($project->category) == 'forex')
                                        <p>Our daily technical analysis feed provides key insights on current market trends in forex. Our in-house experts assess relevant technical FX information to deliver articles, analyst picks and in-depth insights to inform your trading strategy.The technical analysis of markets involves studying price movements and patterns. It is based on identifying supply and demand levels on price charts by observing various patterns and indicators. Technical traders project future market conditions and forecast potential price fluctuations by observing historical price patterns...</p>


                                    @elseif (($project->category) == 'commodities')
                                        <p>Prices will fluctuate in the short term, so it is not easy to make fundamental forecasts of commodities prices for short-term trades. It is even more difficult for new commodity traders to do this.It may seem like a daunting task to find all the current data and compare it to previous years to understand how prices reacted under those conditions. The goal is to forecast the supply and demand scenario for the future. It is almost impossible to do this as you will be competing against experts who have lots more data and experience not to mention resources.But with the help of our projects things will look much easier...</p>

                                    @elseif (($project->category) == 'indices')
                                        <p>Stock indexes are a popular trading vehicle, but they can't be traded directly. An index is simply a collection of stocks (or other assets) that moves according to the stocks held within it. Traders can analyze both the index and the futures/options contract they are looking to trade. Indexes don't expire, but futures and options contracts do, so traders need to make sure they are trading the appropriate contract...</p>

                                    @elseif (($project->category) == 'crypto')
                                        <p>With crypto analysis covering both technical and fundamental factors explained in a simple, concise manner, making the right decisions is made all the easier. Our projects are sure to stay up to date with changes in price that show any divergence in price patterns and possible buying and selling opportunities.Historical price data, market capitalization, trading volume, social activity, availability on exchanges, price change percentages, all combined into a single score to guide your cryptocurrency investing decisions...</p>

                                    @else
                                        <p>Stock analysis is the evaluation of a particular trading instrument, an investment sector, or the market as a whole. Stock analysts attempt to determine the future activity of an instrument, sector, or market.Stock analysis is a method for investors and traders to make buying and selling decisions. By studying and evaluating past and current data, investors and traders attempt to gain an edge in the markets by making informed decisions.Using stock analysis to vet stocks, sectors, and the market is an important method of creating the best investment strategy for one’s portfolio...</p>
                                    @endif



                                    <div class="view_project">  <div class="price">{{$project->created_at}}</div>

                                        <a href="https://.com/{{($project->url)}}" target="_blank" @click="openProject({{$project->id}})" class="add">View Project</a>  </div>

                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <hr style="background-color: #eeeeee87;">
            @endforeach


            <div class="modal fade" id="projectsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-notify modal-success" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->

                        <form method="POST" action="{{url('save_projects')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-header">
                            <p class="heading lead">Projects</p>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>
                        <div class="text-center">
                           <i style="color:green;font-size:4rem;margin:1rem 0;" class="fa fa-file-signature fa-4x mb-3 animated zoomInLeft "></i>
                        </div>
                        <div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <select name="user_id" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <input class="form-control" type="text" required="" name="title" placeholder="Tittle">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <select name="category" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                            <option value="forex">Forex</option>
                                            <option value="commodities">Commodities</option>
                                            <option value="indices">Indices</option>
                                            <option value="crypto">Crypto</option>
                                            <option value="stocks">Stocks</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <input class="form-control" type="text" required="" name="url" placeholder="Project Url">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <textarea class="form-control" name="description" placeholder="Project Description (Optional)" rows="3"></textarea>
                                </div>
                            </div>



                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <button type="submit" class="btn btn-success">CONFIRM<i class="far fa-gem ml-1 text-white"></i></button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!--/.Content-->
                </div>
            </div>



    </div>
    </div>


    <!-- END wrapper -->


    <!-- Central Modal Medium Success -->

    <!-- Central Modal Medium Success-->

@endsection

@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="{{asset('js/toastr.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function () {
                this.getUsers();
                this.initializeFilters();
            },

            data: function () {
                return {
                    replyErrors: [],
                    user_id: null,
                    id:null,
                    title:null,
                    content:null,
                    category:null,
                    url:null,
                    description:null,
                    users: [],
                    currentFilter: 'all'
                }
            },
            methods: {
                getUsers(){
                    let self = this;
                    axios.get('/get_users/').then(response => {
                        self.users = response.data;
                    });
                },
                delete_project:function(id) {

                    let self=this;

                    self.replyErrors=[];
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you won't be able to recover this user!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('delete_project')}}', {
                                id:id,
                            }).then(function(response) {
                                console.log(response);
                                self.output=response.data;
                                toastr.success("Project deleted!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                                window.location.href = '{{URL::to('admin/projects/')}}';

                            }).catch(function(error) {
                                // self.loading = false;
                                self.replyErrors = error.response.data.errors;
                                console.log(error.response.data);
                            });
                        }else{
                        }
                    })
                },
                openProject(id){

                    console.log(id);
                    let self=this;
                    axios.post('{{URL::to('set_read_project')}}', {
                        id:id,
                    }).then(function(response) {
                        console.log(response)
                    }).catch(function(error) {
                        console.log(error.response.data);
                    });
                },
                submitProjects() {
                    let self = this;
                    self.replyErrors = [];

                    axios.post('{{URL::to('save_projects')}}', {
                        user_id: self.user_id,
                        title: self.title,
                        content: self.content,
                        category: self.category,
                        url: self.url,
                        description: self.description
                    }).then(function (response) {
                        toastr.success("Project created successfully!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        window.location.reload();

                    }).catch(function (error) {
                        self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        toastr.error("Error creating project!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });
                },
                
                initializeFilters() {
                    // Search functionality
                    document.getElementById('searchProjects').addEventListener('input', function(e) {
                        let searchTerm = e.target.value.toLowerCase();
                        let projects = document.querySelectorAll('.project-card');
                        
                        projects.forEach(function(project) {
                            let title = project.querySelector('h2').textContent.toLowerCase();
                            let category = project.getAttribute('data-category').toLowerCase();
                            
                            if (title.includes(searchTerm) || category.includes(searchTerm)) {
                                project.style.display = 'block';
                            } else {
                                project.style.display = 'none';
                            }
                        });
                    });

                    // Filter functionality
                    document.querySelectorAll('.filter-btn').forEach(function(btn) {
                        btn.addEventListener('click', function() {
                            // Update active button
                            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                            this.classList.add('active');
                            
                            let filter = this.getAttribute('data-filter');
                            let projects = document.querySelectorAll('.project-card');
                            
                            projects.forEach(function(project) {
                                if (filter === 'all' || project.getAttribute('data-category') === filter) {
                                    project.style.display = 'block';
                                } else {
                                    project.style.display = 'none';
                                }
                            });
                        });
                    });
                },
            }
        });
    </script>



@endsection
