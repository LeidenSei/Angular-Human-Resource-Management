<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InfoRequest;
use DB;
class InfoController extends Controller
{
    public function index()  {
        $data=DB::table('info')->get();
        return view('Home',compact('data'));
    }
    public function app() {
        return view('App');
    }
    public function insert(InfoRequest $req) {
        $validated = $req->validated();
 
        // Retrieve a portion of the validated input data...
        $validated = $req->safe()->only(['name', 'email','phone']);
        $validated = $req->safe()->except(['name', 'email','phone']);

        $fileName = $req->image->getClientOriginalName();
        $req->merge(['image'=>$fileName]);
        $req->image->storeAs('public/images',$fileName);
        DB::table('info')->insert(
            [
                'name'=>$req->name,
                'email'=>$req->email,
                'phone'=>$req->phone,
                'birthday'=>$req->birthday,
                'salary'=>$req->salary,
                'image'=>$fileName,
                'sex'=>$req->sex
            ]
        );
        return redirect()->route('index');
    }

    public function fix($id)  {
        $dataFix=DB::table('info')->find($id);
        return view('Fix',compact('dataFix'));
    }
Heloee gitdd
    public function afterFix(InfoRequest $req,$id)  {
        $dataFix=DB::table('info')->find($id);
        $validated = $req->validated();
 
        // Retrieve a portion of the validated input data...
        $validated = $req->safe()->only(['name', 'email','phone']);
        $validated = $req->safe()->except(['name', 'email','phone']);

        if($req->image==''){
            $fileName=$dataFix->image;
            
        } else{
            $fileName = $req->image->getClientOriginalName();
            $req->image->storeAs('public/images',$fileName);
        }

        $req->merge(['image'=>$fileName]);
        
        
        
        DB::table('info')->where('id',$id)->update([
            'name'=>$req->name,
            'email'=>$req->email,
            'phone'=>$req->phone,
            'birthday'=>$req->birthday,
            'salary'=>$req->salary,
            'image'=>$fileName,
            'sex'=>$req->sex
        ]);
        return redirect()->route('index');
    }
}
