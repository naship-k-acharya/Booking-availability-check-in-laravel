@extends('welcome')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <style>
        
       


/* CSS */
.button-17 {
  align-items: center;
  appearance: none;
  background-color: #fff;
  border-radius: 24px;
  border-style: none;
  box-shadow: rgba(0, 0, 0, .2) 0 3px 5px -1px,rgba(0, 0, 0, .14) 0 6px 10px 0,rgba(0, 0, 0, .12) 0 1px 18px 0;
  box-sizing: border-box;
  color: #3c4043;
  cursor: pointer;
  display: inline-flex;
  fill: currentcolor;
  font-family: "Google Sans",Roboto,Arial,sans-serif;
  font-size: 14px;
 
  font-weight: 500;
  height: 48px;
  justify-content: center;
  letter-spacing: .25px;
  line-height: normal;
  max-width: 100%;
  overflow: visible;
  padding: 2px 24px;
  position: relative;
  text-align: center;
  text-transform: none;
  transition: box-shadow 280ms cubic-bezier(.4, 0, .2, 1),opacity 15ms linear 30ms,transform 270ms cubic-bezier(0, 0, .2, 1) 0ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: auto;
  will-change: transform,opacity;
  z-index: 0;
}

.button-17:hover {
  background: #F6F9FE;
  color: #174ea6;
}

.button-17:active {
  box-shadow: 0 4px 4px 0 rgb(60 64 67 / 30%), 0 8px 12px 6px rgb(60 64 67 / 15%);
  outline: none;
}

.button-17:focus {
  outline: none;
  border: 2px solid #4285f4;
}

.button-17:not(:disabled) {
  box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
}

.button-17:not(:disabled):hover {
  box-shadow: rgba(60, 64, 67, .3) 0 2px 3px 0, rgba(60, 64, 67, .15) 0 6px 10px 4px;
}

.button-17:not(:disabled):focus {
  box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
}

.button-17:not(:disabled):active {
  box-shadow: rgba(60, 64, 67, .3) 0 4px 4px 0, rgba(60, 64, 67, .15) 0 8px 12px 6px;
}

.button-17:disabled {
  box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
}
    </style>
</head>
<body>
  
    <div style="margin-top: 100px;">
    <h1>List of rooms</h1>
    @if(session()->has('status'))
    <div class="alert alert-success" role="alert">
        This is a success alert—check it out!
    </div>
    @endif
    
        @csrf
        
        <div class="row flex-row">
        @foreach($data as $item)
        <div class="col-xs-10 col-sm-5 col-md-4" style="margin-bottom: 20px;">
            
                <div class="card-room">
                    <img   src="{{ asset('uploads/roompic/' . $item->roomphoto) }}" alt="Classic room">
                    <div class="card-room-infos">
                        <div>
                          <p>room no.{{ $item->id }}</p>
                            <h2>{{ $item->name }}</h2>
                            
                        </div>
                        <h4 class="card-room-pricing">{{ $item->prize }}</h4>
                    </div>
                </div>  
                <button class="button-17" style="float:right;">
                  <a style="text-decoration:none;" href="{{ route('booking', ['id' => $item->id]) }}">Booking</a>
              </button>
        </div>
        @endforeach
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
</body>
</html>

@stop
