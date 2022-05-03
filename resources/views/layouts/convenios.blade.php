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
    <link rel="stylesheet" href="{{ asset('css/style_inst_conv_mov.css') }}">
    {{-- Icon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/icon_.png') }}">
</head>


<body style="background: url('{{asset('images/index/background.jpeg')}}')">
    <div class="container-fluid b-g">
        <div class="row">
            <div class="col">
                <div class="abs-center">
                    @if (auth()->check())
                        @yield('conv_cont')
                    @else
                        <div class="abs-center">
                            @yield('login')    
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
{{-- JS --}}
</html>