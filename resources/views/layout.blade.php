{{-- {{dd(auth()->user()->mensajes )}}  --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <title>Layout</title>
</head>
<body>
    <h1 class="fondo">E x a m e n <h1>
            <div class="navbar" >
                    {{-- col-md-8 offset-md-4 nav --}}
                    <a   href="<?php echo route('home')?>">Home</a>
                    @if(auth()->guest())
                       <a href="<?php echo route('login')?>">Login</a>
                       <a href="<?php echo route('user.crear')?>">Registrarse</a> 
                        
                    @else
                    <a href="/usuarios">Usuarios</a>
                    <a href="<?php echo route('mensajes')?>">Mensajes {{auth()->user()->name}}</a>
                    <a href="/logout">Cerrar sesion de {{auth()->user()->name}}</a>
                    @endif
                    
                </div>
            <div class="container letramediana">
                    @yield('contenido')
                   
                    {{-- <footer>CopyRigth {{date('y')}}</footer> --}}
            </div>
            
</body>
</html>