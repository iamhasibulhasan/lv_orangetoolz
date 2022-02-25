(function ($){
    $(document).ready(function (){
    //    Code Start Here
        function alertMsg(msg, icon){
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: icon,
                title: msg,
                showConfirmButton: false,
                timer: 1500
            })
        }

        $('#all_users_tbl').DataTable({
            processing:true,
            serverSide:true,
            ajax: {
                url: '/dashboard/users'
            },
            columns:[
                {
                    data:'id',
                    name:'id'
                },
                {
                    data:'name',
                    name:'name'
                },
                {
                    data:'email',
                    name:'email'
                },
                {
                    data:'action',
                    name:'action'
                }
            ]
        });


        // Add new user modal show
        $(document).on('click', '#add_user_btn', function (e){
            e.preventDefault();
            $('#add_user_modal').modal('show');
        });

    //    Add new user
        $(document).on('submit', '#add_user_form', function (e){
            e.preventDefault();
            let uname = $('#add_user_form input[name = "uname"]').val();
            let uemail = $('#add_user_form input[name = "uemail"]').val();
            let upass = $('#add_user_form input[name = "upass"]').val();

            // alert(upass);
            if (uname == ""){
                alertMsg('Name is required', 'error');
            }else if(uemail == ""){
                alertMsg('Email is required', 'error');
            }else if(upass == ""){
                alertMsg('Password is required', 'error');
            }else {
                $.ajax({
                    url:'/user-store',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data){
                        // alert(data);
                        if(data){
                            $('#add_user_modal').modal('hide');
                            $("#add_user_form")[0].reset();
                            //reload the table
                            $('#all_users_tbl').DataTable().ajax.reload();
                            alertMsg('User added successful !', 'success');
                        }


                    }
                });
            }
        });

        // delete user
        $(document).on('click', '.user-del', function (e){
            e.preventDefault();
            let id = $(this).attr('del-user-id');
            // alert(id);

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'warning',
                title: '<span style="color: black;">Are you sure?<span>',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:'/user-destroy/'+id,
                        contentType: false,
                        processData: false,
                        success: function (data){
                            // alert(data);
                            $('#all_users_tbl').DataTable().ajax.reload();
                            alertMsg('User deleted successful !', 'success');
                        }

                    });

                }else {
                    alertMsg('User deleted unsuccessful !', 'error');
                }
            })

        });
// Edit user modal show
        $(document).on('click', '.user-edit', function (e){
            e.preventDefault();
            e.preventDefault();
            let id = $(this).attr('edit-user-id');
            $.ajax({
                url:'/user-edit/'+id,
                contentType:false,
                processData:false,
                success: function (data){
                    $('#edit_user_modal form input[name="edit_id"]').val(data.id);
                    $('#edit_user_modal form input[name="edit_name"]').val(data.name);
                    $('#edit_user_modal form input[name="edit_email"]').val(data.email);
                    $('#edit_doctor_modal').modal('show');
                }
            });
            $('#edit_user_modal').modal('show');
        });

        //    User Update data
        $(document).on('submit', '#edit_user_form', function (e){
            e.preventDefault();
            $.ajax({
                url:'/user-update',
                method: 'POST',
                data : new FormData(this),
                contentType:false,
                processData: false,
                success: function (data){
                    alertMsg('User updated successful !', 'success');
                    $('#all_users_tbl').DataTable().ajax.reload();
                    $('#edit_user_modal').modal('hide');
                }
            });
        });






    //    ! Code Ends Here
    });
})(jQuery)

