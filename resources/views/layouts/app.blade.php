<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- BT style --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
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
                            <div class="col-2">
                                @if (auth()->user()->rol_id == '6')
                                    <a href="{{ route('users.index') }}" class="btn me-5 pt-1 pb-1 ps-3 pe-3">Gestor de Usuarios</a>
                                @endif
                            </div>
                            <div class="offset-9 col-1">
                                <a href="{{route('login.destroy')}}" 
                                class="btn me-5 pt-1 pb-1 ps-3 pe-3 log-out border border-dark">Logout</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
    <script src="{{asset('js/index.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                'title': 'Felicidades',
                'text': '{{$message}}',
                'icon': 'success'
            })
        </script>
    @endif
</body>

</html>