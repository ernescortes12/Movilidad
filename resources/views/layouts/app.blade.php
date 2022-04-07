<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- BT style --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- CSS own --}}
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_activities.css') }}">
    {{-- Icon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/icon_.png') }}">
</head>


<body style="background: url('{{asset('images/index/background.jpeg')}}')">
    <div class="container-fluid b-g">
        <div class="row ">
            <div class="col">
                @if (auth()->check())
                    <div class="row shadow-lg">
                        <div class="d-flex justify-content-end align-items-center mt-3 nav-bar">
                            @csrf
                            <a href="{{route('login.destroy')}}" 
                                class="border me-5 pt-1 pb-1 ps-3 pe-3 rounded-pill log-out border border-dark">Logout</a>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col">        
                            <div class="abs-center-act">
                            @yield('act_content')
                        </div>
                    </div>
                </div>
                @else
                    <div class="abs-center">
                        @yield('login')    
                @endif
            </div>
        </div>
        </div>
    </div>
</body>
{{-- JS --}}
<script src="{{asset('js/coord-other.js')}}"></script>
<script src="{{asset('js/ori.js')}}"></script>
{{-- <script src="{{asset('js/die.js')}}"></script> --}}
</html>