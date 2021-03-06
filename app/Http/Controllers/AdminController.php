<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        if (request()->ajax()){
            return datatables()->of(User::where('status', '=', 2)->orWhere('status', '=', 0)->get())->addColumn('action', function ($data){
                $output = '<a class="btn btn-primary btn-sm user-edit" edit-user-id="'.$data['id'].'" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                $output .= ' <a class="btn btn-danger btn-sm user-del" del-user-id="'.$data['id'].'" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                return $output;
            })->rawColumns(['action'])->make(true);
        }
        return view('backend.users');
    }

//    Store new user
    public function store(Request $request){
        User::create([
            'name'      =>  $request->uname,
            'email'     =>  $request->uemail,
            'password'  =>  Hash::make($request->upass),
            'status'    =>  2
        ]);
        return back();
    }

//    Delete users
    public function destroy($id)
    {
        $delete_data = User::find($id);
        $delete_data->delete();
        return back();
    }
    //    User Edit
    public function edit($id){
        $edit_data = User::find($id);
        return [
            'id'            =>  $edit_data->id,
            'name'          =>  $edit_data->name,
            'email'         =>  $edit_data->email
        ];
    }

    //    Update User
    public function update(Request $request){
        $id = $request->edit_id;
        $edit_data = User::find($id);

        $edit_data->name = $request->edit_name;
        $edit_data->email = $request->edit_email;
        $edit_data->update();
        return back();

    }

    //    User status update
    public function statusUpdate($id){
        $status = User::find($id);
        if ($status->status == 2){
            $status->status = 0;
            $status->update();
            return "User has been blocked.";
        }else{
            $status->status = 2;
            $status->update();
            return "User has been unblocked.";
        }
    }
}
