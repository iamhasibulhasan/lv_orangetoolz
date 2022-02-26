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
                            <li class="breadcrumb-item active">Upload Files</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row mb-5">
                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <form id="upload_file_form" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="form-group">
                                    <label for="">File Name (txt,csv)</label>
                                    <input name="file_name" type="text" class="form-control" placeholder="File Name" required>
                                </div>
                                <div class="form-group">
                                    <input name="file" type="file" class="form-control">
                                </div>
                                <input type="submit" class="btn btn-primary btn-block">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection




