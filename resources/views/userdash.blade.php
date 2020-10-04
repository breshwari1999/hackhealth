@extends('layout')
<!DOCTYPE html>
<html>
<head>
<title>user dashboard</title>
<style>
  .card-text{
    text-align:center;
    text-transform:uppercase;
    font-size:16px;
    font-weight:360;
  }
  .a1,.b{
  background-color: white;
  color:black;
  font-size:14.5px;
}
tr{
  border-bottom: 0.5px solid lightgrey;
}
  </style>
</head>
<body>
@section('content')
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand"></a>
  <form class="form-inline mr-auto ml-auto" action="search" method="post">
    @csrf
    <input class="form-control mr-sm-2" type="search" name="loc" placeholder="Enter Location" aria-label="Search">
    <button class="btn btn-primarys my-2 my-sm-0" type="submit" id="regbtn" style="width:100px">Search</button>
  </form>
</nav>
<br>
@isset($dis)
@foreach($dis as $item)
<div class="card mb-3 mr-auto ml-auto" style="max-width: 740px;box-shadow: 3px 6px 10px 6px rgba(0,0,0,0.2);">

<div class="row no-gutters">
    <div class="col-md-6">
      <img src="uploads/{{$item->image1}}" class="card-img" alt="..." style="height:290px">
    </div>
    <div class="col-md-6">
      <div class="card-body">
      <table class="table table-borderless" style="border-collapse:collapse;">
            <tbody>
              
          <tr>
            <th class="a1">Name:</th>
            <td class="b">{{$item->name}}</td>
          </tr>
          <tr>
            <th class="a1">Specification:</th>
            <td class="b">{{$item->spec}}</td>
          </tr>
          <tr>
            <th class="a1">Qualification:</th>
            <td class="b">{{$item->qualification}}</td>
          </tr>
          <tr>
            <th class="a1">Location:</th>
            <td class="b">{{$item->location}}</td>
         </tr>
        </tbody>
        </table>
        <div class="card-text">
              <a href="view/{{$item->id}}"><button type="submit" class="btn btn-primarys" id="regbtn">View</button></a>
        </div>
      </div>
    </div>
  </div>
</div>

@endforeach
@endisset
@endsection
</body>
</html>

