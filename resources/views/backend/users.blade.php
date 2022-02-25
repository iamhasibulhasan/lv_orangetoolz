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
                            <li class="breadcrumb-item active">All Users</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row mb-5">
                <a href="#" id="add_user_btn" class="btn btn-primary">Add new user</a>
            </div>
            <div class="row">
                <div class="col-9">
                    <table class="table" id="all_users_tbl">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
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


<!-- Add User Modal -->
<div class="modal fade" id="add_user_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
            </div>
            <div class="modal-body">
                <form id="add_user_form">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="user_name" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="uname" id="user_name">
                    </div>
                    <div class="mb-3">
                        <label for="user_email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="uemail" id="user_email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="upass" id="user_password">
                        <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Register">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="edit_user_modal" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            </div>
            <div class="modal-body">
                <form id="edit_user_form">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="user_name" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="edit_name" id="user_name">
                        <input type="hidden" class="form-control" name="edit_id">
                    </div>
                    <div class="mb-3">
                        <label for="user_email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="edit_email" id="user_email" aria-describedby="emailHelp">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update">
                </form>
            </div>
        </div>
    </div>
</div>
