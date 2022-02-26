@extends('backend.layouts.app')

@section('main-content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{Auth::user()->name}}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">All Files</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-9">
                    <table class="table" id="group_view">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Number</th>
                            <th scope="col">Mail</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Hasibul Hasan</td>
                            <td>01747979703</td>
                            <td>mdhasibulhasan.dev@gmail.com</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Afia Rahman</td>
                            <td>01745874534</td>
                            <td>dola@gmail.com</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Abu Raihan</td>
                            <td>01748874534</td>
                            <td>akash@gmail.com</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Tithi Ghosh</td>
                            <td>01748874534</td>
                            <td>tithi@gmail.com</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Dipto Mondol</td>
                            <td>01748874534</td>
                            <td>dipto@gmail.com</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Abu Raihan</td>
                            <td>01748874534</td>
                            <td>akash@gmail.com</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection




