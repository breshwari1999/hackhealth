@extends('layout1')
<html>
<head>
<title>My Profile</title>
<style>
.card-title{
    font-family:'Roboto' sans-serif;
    font-size:32px;
    text-transform:uppercase;
    letter-spacing:1.5px;
    user-select:none;
}
.card-text{
    font-family:'Roboto' sans-serif;
    font-size:22px;
    user-select:none;
}
.card{
    box-shadow: 3px 6px 10px 3px rgba(0,0,0,0.2);
    width: 25rem;height:30rem;border-radius:8px;
}
.card-img-top{
    height:198px;width:398px;border-radius:4px
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

<body style="background-color:#F2F3F4 ">
@section('content1')
<br><br><br>



<div class="container">
    <div class="row justify-content-center">
        @foreach($dis1 as $item)
            <div class="card">
                <img src="/uploads/{{$item->image}}" class="card-img-top" alt="My Profile">
                    <div class="card-body">
                        <div style="text-align:center;">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <p class="card-text">Doctor</p> <hr>
                            <p class="card-text" style=" font-size:20px;"><i class="fas fa-envelope" aria-hidden="true" style="color:#34495E;margin-bottom:10px"></i>&nbsp;&nbsp;{{$item->email}}</p>
                  
                            <a href="/docchange/{{$item->id}}">
                            <button type="button" class="btn btn-secondarys" id="regbtn">Change Photo</button></a>
                     
                        </div>
                     </div>
                </div>
            </div>
        </div>
@endforeach
@endsection
</body>
</html>


    