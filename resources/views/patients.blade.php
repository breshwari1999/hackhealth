@extends('layout1')
<!DOCTYPE html>
<html lang="en">
<head>
<title>Patients</title>
<style>
 .heads{
  background-color:#884EA0;
  border-top: none;
  border-bottom: 2px solid whitesmoke;
  text-align:center;
  border-left:2px solid #884EA0;
 }
 table{
  font-family:'Roboto' sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table tr:nth-child(even){background-color: #E5E8E8;}
table th {
  padding-top: 14px;
  padding-bottom: 14px;
  text-align:left;
  background-color:#1ABC9C;
  color: whitesmoke;
  letter-spacing:0.5px;
  user-select: none;
  border-right: 0.5px solid lightgrey;
 }
table td
{
height:70px;
border-right: 0.5px solid lightgrey;
}

table tr .head{
  text-align:center;
  font-size:22px;
  text-transform:uppercase;
  letter-spacing:1px;
  background-color:#17A589;
  border-top: none;
  border-bottom: 2px solid whitesmoke;
  user-select: none;
  }
table td, table th {
 border-bottom: 0.5px solid lightgrey;
}
table tr:hover {background-color: #ddd;}
</style>
</head>

<body>
@section('content1')

@if(Session::has('msg'))
<script>swal("Completed!", "You Have Completed Successfully", "success")</script>
@endif
<div style="overflow-x:auto;">
  <table class="table borderless">
<tr>
  <th colspan="8" class="head">Patient List</th>
</tr>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">D.O.B</th>
      <th scope="col">Gender</th>
      <th scope="col">Date Of Appointment</th>
      <th scope="col">Confirm</th>
    </tr>

    <?php
    $i = 1; ?>
    @foreach($dis as $d)
    <tr>
    <td>{{$i++}}</td>
    <td>{{$d->name}}</td>
    <td>{{$d->email}}</td>
    <td>{{$d->phone}}</td>
    <td>{{$d->DOB}}</td>
    <td>{{$d->gender}}</td>
    <td>{{$d->created_at}}</td>
    <td style="text-align:center"> <a href="comp/{{$d->id}}"><button type="submit" class="btn btn-success"><i class='fas fa-check'></i></button></a></td>
  </tr>
  @endforeach
  </table>
</div>
@endsection
</body>
</html>
