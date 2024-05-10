@extends('layouts.dashboard')
@section('style')
@endsection
@section('content')


    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="float-right page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> </a></li>
                            <li class="breadcrumb-item"><a href="#">Markets</a></li>
                            <li class="breadcrumb-item active">FX Minors</li>
                        </ol>
                    </div>

                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">FX Minors</h4>
                            <p class="text-muted m-b-30 font-14">For more information about tradable assets of Black Panther account <a href="https:// .com/black-panther-platform"> click here.</a></p>

                            <div class="table-rep-plugin">
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table  table-striped">
                                        <thead>
                                        <tr>
                                            <th data-priority="1">SYMBOL</th>
                                            <th data-priority="3">SPREAD MAX</th>
                                            <th data-priority="1">LEVERAGE MAX</th>
                                            <th data-priority="3">SWAP LONG</th>
                                            <th data-priority="3">SWAP SHORT</th>
                                            <th data-priority="6">MARGIN CALL</th>
                                            <th data-priority="6">STOP OUT</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th>AUDCAD </th>
                                            <td>2.1</td>
                                            <td>100</td>
                                            <td>-3.4</td>
                                            <td>-6.1</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>AUDCHF </th>
                                            <td>1.8</td>
                                            <td>100</td>
                                            <td>-3.2	</td>
                                            <td>-7</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>AUDJPY </th>
                                            <td>1.7</td>
                                            <td>100</td>
                                            <td>0.8</td>
                                            <td>-4.3</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>AUDNZD </th>
                                            <td>2.4</td>
                                            <td>100</td>
                                            <td>-1.5</td>
                                            <td>-1.6</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>CADCHF </th>
                                            <td>3</td>
                                            <td>100</td>
                                            <td>0.3</td>
                                            <td>-6.2</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>CADJPY </th>
                                            <td>2.1</td>
                                            <td>100</td>
                                            <td>-1.3</td>
                                            <td>-4.5</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>CHFJPY </th>
                                            <td>2.2</td>
                                            <td>100</td>
                                            <td>-6.5</td>
                                            <td>-2.2</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <!-- Repeat -->
                                        <tr>
                                            <th>EURAUD </th>
                                            <td>2</td>
                                            <td>100</td>
                                            <td>-7.8</td>
                                            <td>2.6</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>EURCAD</th>
                                            <td>2.1</td>
                                            <td>100</td>
                                            <td>-6.3</td>
                                            <td>1.1</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>EURCHF </th>
                                            <td>2.8</td>
                                            <td>100</td>
                                            <td>-1.9</td>
                                            <td>-3.6</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>EURJPY </th>
                                            <td>1.8</td>
                                            <td>100</td>
                                            <td>-3.2</td>
                                            <td>-2.2</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>EURNZD</th>
                                            <td>3.1</td>
                                            <td>100</td>
                                            <td>-8.6</td>
                                            <td>2.3</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>GBPAUD</th>
                                            <td>2.3</td>
                                            <td>100</td>
                                            <td>-6.1</td>
                                            <td>0.8</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>GBPCAD </th>
                                            <td>3</td>
                                            <td>100</td>
                                            <td>-3.5</td>
                                            <td>-4.1</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <!-- Repeat -->
                                        <tr>
                                            <th>GBPCHF </th>
                                            <td>2.4</td>
                                            <td>100</td>
                                            <td>1.2</td>
                                            <td>-4.5</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>GBPJPY </th>
                                            <td>1.7</td>
                                            <td>100</td>
                                            <td>-2.2</td>
                                            <td>-4.1</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>GBPNZD </th>
                                            <td>2.6</td>
                                            <td>100</td>
                                            <td>-12.3</td>
                                            <td>2.5</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>NZDCAD</th>
                                            <td>3.2</td>
                                            <td>100</td>
                                            <td>-0.9</td>
                                            <td>-5.3</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>NZDCHF </th>
                                            <td>3.3</td>
                                            <td>100</td>
                                            <td>2.8</td>
                                            <td>-6.7</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>
                                        <tr>
                                            <th>NZDJPY</th>
                                            <td>2.5</td>
                                            <td>100</td>
                                            <td>2.6</td>
                                            <td>-6.1</td>
                                            <td>60%</td>
                                            <td>50%</td>

                                        </tr>


                                        </tbody>
                                    </table>
                                </div>

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
