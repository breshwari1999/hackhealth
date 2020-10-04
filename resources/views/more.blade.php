@extends('layout')
<html>
<head>
<title>My Profile</title>
<style>
#cards{
    box-shadow: 3px 6px 10px 3px rgba(0,0,0,0.2);
    border:solid 1px #17A589;
}
#header{
  background-color:#17A589;
  color:white;
  font-size:19px;
  font-weight:500;
  border-bottom:solid 1px #3498DB;
}
.a1,.b{
  background-color: white;
  color:black;
  font-size:14.5px;
}
tr{
  border-bottom: 0.5px solid lightgrey;
}
#regbtn{
  background-color:#17A589;
  width:130px;
  color: whitesmoke;
  font-weight: 600;
}
#regbtn:hover{
  background-color: #48C9B0;
}
</style>
</head>
<body>
  @section('content')
  <br>
<div class="row justify-content-center">
<div class="card mb-3" style="max-width: 940px;" id="cards">
@foreach($find as $f)
<div class="card-header" id="header">Personal details</div>
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="/uploads/{{$f->image}}" class="card-img" alt="..." style="height:400px">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <table class="table table-borderless" style="border-collapse:collapse;">
            <tbody>
              
            <tr>
              <th class="a1">Name:</th>
              <td class="b">{{$f->name}}</td>
          </tr>
          <tr>
            <th class="a1">Email:</th>
            <td class="b">{{$f->email}}</td>
          </tr>
          <tr>
            <th class="a1">Phone:</th>
            <td class="b">{{$f->phone}}</td>
          </tr>
          <tr>
            <th class="a1">Gender:</th>
            <td class="b">{{$f->gender}}</td>
         </tr>
         <tr>
            <th class="a1">Qualification:</th>
            <td class="b">{{$f->qualification}}</td>
          </tr>
          <tr>
            <th class="a1">Specialization:</th>
            <td class="b">{{$f->spec}}</td>
          </tr>
          <tr style="border-bottom:none">
            <th class="a1">Experience:</th>
            <td class="b">{{$f->exp}}</td>
            </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div></div></div>
<br>

  <div class="row justify-content-center">
<div class="card mb-3" style="max-width: 940px;">

<div class="card-header" id="header">Clinical details</div>
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="/uploads/{{$f->image1}}" class="card-img" alt="..." style="height:250px">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <table class="table table-borderless" style="border-collapse:collapse;">
            <tbody>
              
            <tr>
                    <th class="a1">Name:</th>
                    <td class="b">{{$f->clicname}}</td>
                </tr>
                <tr>
                      <th class="a1">Location:</th>
                       <td class="b">{{$f->location}}</td>
                </tr>
                <tr>
                      <th class="a1">Address:</th>
                      <td class="b">{{$f->address}}</td>
                </tr>
            
        </tbody>
        </table><br>
        <div class="row justify-content-center">
<a href="appoint/{{$f->id}}"><button type="submit" class="btn btn-primarys" id="regbtn">Appoint</button></a>
</div>
      </div>
    </div>
   
  </div>
  @endforeach
</div>
</div>
@endsection
</body>
</html>