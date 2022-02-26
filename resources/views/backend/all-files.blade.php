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
                    <table class="table" id="all_files_tbl">
                        <thead>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">File</th>
                        <th scope="col">Action</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection

{{--Group Modal--}}
<div class="modal fade" id="new_group">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">All Groups</h2>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Group</th>
                        <th scope="col">Member</th>
                        <th scope="col">Information</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td id="g1_name">Mark</td>
                        <td id="g1_count">Otto</td>
                        <td>
                            <a id="group1" href="#" class="btn btn-primary btn-sm group">Show</a>
                        </td>
                    </tr>
                    <tr>
                        <td id="g2_name">Mark</td>
                        <td id="g2_count">Otto</td>
                        <td>
                            <a id="group2" href="#" class="btn btn-primary btn-sm group">Show</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



