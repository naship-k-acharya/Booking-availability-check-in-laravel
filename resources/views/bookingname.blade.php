
@extends('welcome');
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Room</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .card-room {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card-room img {
            width: 150px;
            height: 150px;
            border-radius: 8px;
            object-fit: cover;
            margin-right: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 style="text-align: center; margin-bottom: 30px;">Book a Room</h1>

    @isset($room)
    <div class="card-room">
        <img src="{{ asset('uploads/roompic/' . $room->roomphoto) }}" alt="Room Photo">
        <div>
            <h2>Room Name: {{ $room->name }}</h2>
            <h4 class="card-room-pricing">Prize: {{ $room->prize }}</h4>
        </div>
    </div>
 
    <form method="post" action="{{ route('bookingconform') }}" enctype="multipart/form-data">
        @csrf
        
        <input type="hidden" name="room_name" value="{{ $room->name }}">
        <input type="hidden" name="room_photo" value="{{ $room->roomphoto }}">
        <input type="hidden" name="room_prize" value="{{ $room->prize }}">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Your name">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Your email">
        </div>
        <div class="form-group">
            <label for="checkin">Check-in Date</label>
            <input type="date" class="form-control" id="checkin" name="checkin">
        </div>
        <div class="form-group">
            <label for="checkout">Check-out Date</label>
            <input type="date" class="form-control" id="checkout" name="checkout">
        </div>
        <button type="submit" class="btn btn-primary">Book Now</button>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    </form>
    @endisset
</div>
</body>
</html>
@stop