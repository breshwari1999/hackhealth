<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\doctorreg;
use Crypt;
use Session;
use Cookie;

class docreg extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'pass'  => 'required',
        'repass' => 'required|same:pass'
      ]);
        $data=new doctorreg();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->DOB=$request->DOB;
        $data->gender=$request->gender;
        $data->qualification=$request->quali;
        $data->spec=$request->spec;
        $data->exp=$request->exp;
        $data->clicname=$request->clinic;
        $data->address=$request->add;
        $data->location=$request->loc;
        $data->user=$request->user;
        $data->password=Crypt::encrypt($request->pass);
        $data->repassword=Crypt::encrypt($request->repass);
        if($request->hasfile('image'))
        {
          $file=$request->file('image');
          $extension=$file->getClientOriginalExtension();
          $filename=mt_rand().'.'.$extension;
          $file->move('uploads/',$filename);
          $data->image=$filename;

        }
        else{
          $data->image='';
        }
        if($request->hasfile('image1'))
        {
          $file=$request->file('image1');
          $extension=$file->getClientOriginalExtension();
          $filename=mt_rand().'.'.$extension;
          $file->move('uploads/',$filename);
          $data->image1=$filename;

        }
        else{
          $data->image1='';
        }
        $data->save();
        return redirect('/doclog');
    }

    public function login(Request $request)
    {
      $login = doctorreg::where('email', $request->mail)->get();
      if($login->isEmpty()){
      return  redirect('doclog')->with('msg', 'Email not found');
      }
      else{
        if(Crypt::decrypt($login[0]->password) == $request->pass ){
          $request->session()->put('doc', $login[0]->name);
          $request->session()->put('idd', $login[0]->id);
          return redirect('/docdash');
        }
        else{
          return redirect('/doclog')->with('msg', 'password invalid');
        }
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function appoint(Request $request, $id)
    {
        $doc = doctorreg::find($id);
        $doc->users()->attach(Session::get('idu'));
        return redirect('/userdash')->with('msg', 'Appointment Taken Successfully');
    }

    public function patient()
    {
      $rel = doctorreg::find(Session::get('idd'));
      $dis = $rel->users;
      return view('/patients', ['dis' => $dis]);
    }
    public function display($id)
    {
      $find1 =doctorreg::where('id', $id)->get();
      return view('docprofile',['dis1' => $find1]);
    }
    public function display1()
    {
      $rel = doctorreg::find(Session::get('idd'));
      return view('docdash', ['dis' => $rel]);
    }
    public function comp($id)
    {
      $find= doctorreg::find(Session::get('idd'));
      $find->users()->detach($id);
      return redirect('/patient')->with('msg','done');
    } 
    public function upphoto($id,Request $request)
    {
    $data=doctorreg::find($id);
    if($request->hasfile('pic'))
    {
      $file=$request->file('pic');
      $extension=$file->getClientOriginalExtension();
      $filename=mt_rand().'.'.$extension;
      $file->move('uploads/',$filename);
      $data->image=$filename;

    }
    else{
      $data->image='';
    }
    $data->save();
    return redirect('/docdash');
}
public function change($id)
    {
      $find=doctorreg::find($id);
      return view('docchange',['fin1'=>$find]);
    }
}
