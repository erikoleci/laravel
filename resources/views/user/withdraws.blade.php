@extends('layouts.dashboard')
@section('style')
  <style>
 

.rwd-table {
  width: 100%;
}
.rwd-table tr {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}
.rwd-table th {
  display: none;
}
.rwd-table td {
  display: block;
}
.rwd-table td:first-child {
  padding-top: .5em;
}
.rwd-table td:last-child {
  padding-bottom: .5em;
}
.rwd-table td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 6.5em;
  display: inline-block;
}
@media (min-width: 480px) {
  .rwd-table td:before {
    display: none;
  }
}
.rwd-table th, .rwd-table td {
  text-align: left;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    display: table-cell;
    padding: .25em .5em;
  }
  .rwd-table th:first-child, .rwd-table td:first-child {
    padding-left: 0;
  }
  .rwd-table th:last-child, .rwd-table td:last-child {
    padding-right: 0;
  }
}


.rwd-table {
  background: #34495E;
  color: #fff;
  border-radius: .4em;
  overflow: hidden;
}
.rwd-table tr {
  border-color: #46637f;
}
.rwd-table th, .rwd-table td {
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    padding: 1em !important;
  }
}
.rwd-table th, .rwd-table td:before {
  color: #cbac76;
}

  </style>
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
   


            <div class="row">
                <div class="col-md-12 m-auto">
                    <h3 style="font-weight:200;text-align:center">WITHDRAWS HISTORY</h2>
                        <br>
                    <table class="rwd-table">
                        <tr>
                          <th>No</th>
                          <th>Amount</th>
                          <th>Beneficary Name</th>
                          <th>Bank Address</th>
                          <th>Bank Name</th>
                          <th>IBAN</th>
                          <th>SWIFT</th>
                          <th>Status</th>
                          <th>Requested Time</th>
                          

                        </tr>
                        <tr v-if="withdraws" v-for="wthd in withdraws">
                          <td data-th="">#WTHD@{{wthd.id}}</td>
                          <td data-th="">@{{wthd.amount}}</td>
                          <td data-th="">@{{wthd.beneficary_name}}</td>
                          <td data-th="">@{{wthd.bank_name}}</td>
                          <td data-th="">@{{wthd.bank_address}}</td>
                          <td data-th="">@{{wthd.iban}}</td>
                          <td data-th="">@{{wthd.swift}}</td>
                          <td data-th="">@{{wthd.status}}</td>
                          <td data-th="">@{{wthd.created_at}}</td>
                        </tr>

                      
                                                 
                      </table>
                      <br>
                      <h4 v-if="withdraws.length===0" style="text-align: center;font-weight:200"> 
                        You have not submited any withdraw yet.
                    </h4>
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
                this.GetUserWithdraws();
            },

            data: function () {
                return {
                 id:null,
                 amount:null,
                 beneficary_name:null,
                 beneficary_address:null,
                 bank_name:null,
                 bank_address:null,
                 iban:null,
                 swift:null,
                 status:null,
                 time:null,
                 withdraws:null,
                }
            },
            methods:{

                GetUserWithdraws(){
                    
                    let self = this;

                    axios.post('{{URL::to('starter/getuserwithdraws')}}', {
                         id:{{logged_in()->id}}
                    })
                    .then(function (response) {
                      
                        console.log(response);

                        self.withdraws=response.data;
                    
                    })
                    .catch(function(error){

                        console.log(error);

                    })
                
                    }
         
            }
        })

    </script>
@endsection