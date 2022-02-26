<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function allFiles(){
        if (request()->ajax()){
            return datatables()->of(File::latest()->get())->addColumn('action', function ($data){
                $output = '<a href="#" class="btn btn-primary btn-sm file-group" file-id="'.$data['id'].'" href="#">Group</a>';
                return $output;
            })->rawColumns(['action'])->make(true);
        }
        return view ('backend.all-files');
    }
    public function uploadFile(){
        return view ('backend.upload-file');
    }

//    store file
    public function store(Request $request){
        $unique_name='';
        if($request->hasFile('file')){
            $txt = $request->file('file');
            $unique_name = $request->file_name.'-'.time().'.'.$txt->getClientOriginalExtension();
            $txt-> move(public_path('media/'), $unique_name);
//            return $unique_name;
        }

        File::create([
            'name'      =>  $request->file_name,
            'file'      =>  $unique_name,
        ]);
//        echo $unique_name;
        return back();
    }

//    Group
    public function group($id){
        $linecount = 0;
        $file = File::find($id);
        $file_name = 'media/'.$file->file;

        $group1 = "group".rand(10,100).".txt";
        $group2 = "group".rand(11,20).".txt";
        $new = fopen('media/'.$group1, "w") or die("Unable to open file!");
        $new2 = fopen('media/'.$group2, "w") or die("Unable to open file!");
        $myfile = fopen($file_name, "r") or die("Unable to open file!");
// Output one line until end-of-file
        while(!feof($myfile)) {
            if($linecount< 100){
                fwrite($new, fgets($myfile));
                $first_group = 100;
            }else if($linecount>100){
                fwrite($new2, fgets($myfile));
            }
            $second_group = $linecount -100;
             $linecount++;
        }
        fclose($myfile);

        return [
            $first_group,
            $second_group,
            $group1,
            $group2
        ];
}

//Group View
    public function groupView($file_name){



        return view('backend.group-view',[
                'file_name' =>  $file_name
            ]);
    }

}
