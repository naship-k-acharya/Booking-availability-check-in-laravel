@extends('welcome');
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add rooms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <style>

.container{
    margin-top:50px; 
       
    }
    </style>
</head>
<body>

    <div class="container ">
        <h1>add room here </h1>
        
<form method="post" action="{{route('add')}}" enctype="multipart/form-data" >
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Room name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="room name is here">
     
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Prize</label>
      <input type="text" name="prize" class="form-control" id="exampleInputPassword1" placeholder="prize is here">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Picture of room</label>
        <input type="file" name="roomphoto" class="form-control-file" id="exampleFormControlFile1">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
</body>
</html>

@stop