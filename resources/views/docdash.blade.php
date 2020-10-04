@extends('layout1')
<!DOCTYPE html>
<html>
<head>
<title>doctor dashboard</title>
<style>
.a1,.b{
  background-color: white;
  color:black;
}

tr{
  border-bottom: 0.5px solid lightgrey;
}
#card{
  box-shadow: 3px 6px 10px 4px rgba(0,0,0,0.2);
  border:solid 1px #17A589;
}
#header{
  background-color:#17A589;
  color:white;
  font-size:19px;
  font-weight:500;
}
@media (min-width:600px) and (max-width:800px) {
    .card{
    font-size:13px;

    }}
  </style>
</head>

<body>
@section('content1')



<br><br><br>
<div class="row">
  <div class="col-sm-6">
    <div class="card" id="card">
      <div class="card-header" id="header">Personal Details</div>
      <div class="card-body">
      <table class="table table-borderless" style="border-collapse:collapse;">
       <tbody>
    <tr>
      <th class="a1">Name:</th>
      <td class="b">{{$dis->name}}</td>
    </tr>
    <tr>
    <th class="a1">Email:</th>
      <td class="b">{{$dis->email}}</td>
    </tr>
    <tr>
    <th class="a1">Phone:</th>
      <td class="b">{{$dis->phone}}</td>
    </tr>
    <tr>
    <th class="a1">gender:</th>
      <td class="b">{{$dis->gender}}</td>
    </tr>
    <th class="a1">Experience:</th>
      <td class="b">{{$dis->exp}}</td>
    </tr>
    <th class="a1">Specialization:</th>
      <td class="b">{{$dis->spec}}</td>
    </tr>
    <tr style="border-bottom:none">
    <th class="a1">Qualification::</th>
      <td class="b">{{$dis->qualification}}</td>
    </tr>
  </tbody>
</table>

      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card" id="card">
    <div class="card-header" id="header">Clinic Details</div>
      <div class="card-body">
      <table class="table table-borderless" style="border-collapse:collapse;">
       <tbody>
    <tr>
      <th class="a1">Name:</th>
      <td class="b">{{$dis->clicname}}</td>
    </tr>
    <tr>
    <th class="a1">Address:</th>
      <td class="b">{{$dis->address}}</td>
    </tr>
    <tr style="border-bottom:none">
    <th class="a1">Location:</th>
      <td class="b">{{$dis->location}}</td>
    </tr>



  </tbody>
</table>
<div style="text-align:center">
    <button type="button" class="btn btn-secondarys" id="regbtn">Edit</button></div>
      </div>
    </div>
  </div>
</div>

@endsection

</body>
</html>
