<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\useregistration;
use App\doctorreg;
use Crypt;
use Session;

class usereg extends Controller
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
          'pass' => 'required',
          'repass' => 'required|same:pass'
        ]);
        $data=new useregistration();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->DOB=$request->DOB;
        $data->gender=$request->gender;
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
        $data->save();
        return redirect('/userlog');
    }

    public function login(Request $request)
    {
      $login = useregistration::where('email', $request->mail)->get();
      if($login->isEmpty()){
      return  redirect('userlog')->with('msg', 'Email not found');
      }
      else{
        if(Crypt::decrypt($login[0]->password) == $request->pass ){
          $request->session()->put('user', $login[0]->name);
          $request->session()->put('idu', $login[0]->id);
          return redirect('/userdash');
        }
        else{
          return redirect('/userlog')->with('msg', 'password invalid');
        }
      }
    }

    public function search(Request $request)
    {
      $search = doctorreg::where('location', $request->loc)->get();
      return view('/userdash', ['dis' => $search]);
    }

    public function more(Request $request, $id)
    {
      $find = doctorreg::where('id', $id)->get();
      //echo $find->location;
     
      return view('more',['find' => $find]);
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
    public function profile($id)
    {
      $find =useregistration::where('id', $id)->get();
      return view('userprofile',['dis' => $find]);
    }
    public function change($id)
    {
      $find=useregistration::find($id);
      return view('userchange',['fin'=>$find]);
    }
    public function upphoto($id,Request $request)
    {
    $data=useregistration::find($id);
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
    return redirect('/userdash');
}}
