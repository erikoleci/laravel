@extends('layouts.dashboard')

@section('title', __('Forbidden'))
@section('code', '403')

@section('content')



    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="float-right page-breadcrumb">
                        <ol class="breadcrumb">
                        </ol>
                    </div>

                </div>
            </div>
            <!-- end row -->
            <div class="row m-0">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <div class="message-div">
                                {{ __($exception->getMessage() ?: 'Forbidden')}}
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->


@endsection

@section('scripts')
    <script src="{{asset('plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js')}}"></script>
    <script>
        $(function() {
            $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });
    </script>
@endsection
