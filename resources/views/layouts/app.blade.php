<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    function recuperarVenta() {
    var select = document.querySelector('select[name="idVenta"]');
    var vent = select.options[select.selectedIndex].text.split('total:')[1].trim();
    var inputPrecio = document.querySelector('input[name="vent"]');
    inputPrecio.value = vent;
    }
    </script>

<script>
    function recuperarTotal() {
    var select = document.querySelector('select[name="idProducto"]');
    var precio = select.options[select.selectedIndex].text.split('Precio:')[1].split('Stok:')[0].trim();
    var inputPrecio = document.querySelector('input[name="precio"]');
    inputPrecio.value = precio;
    }
    </script>

    <script>
    function calcular() {
      var precio = parseFloat(document.getElementById("precio").value);
      var cantidad = parseFloat(document.getElementById("cantidad").value);
      var resultado = precio * cantidad; 
      document.getElementById("resultado").value = resultado;
    }
  </script>

<script>
    function calcularS() {
      var stok = parseFloat(document.getElementById("stok").value);
      var cantidad = parseFloat(document.getElementById("cantidad").value);
      var St = stok - cantidad;
      document.getElementById("St").value =St 
    }
  </script>

<script>
    function calcularIVA() {
      var vent = parseFloat(document.getElementById("vent").value);
      var X = 100;
      
      var resIVA1 = vent * 21; 
      var resIVA = resIVA1 / 100;
      document.getElementById("resIVA").value = resIVA;
    }
  </script> 

<script>
document.addEventListener('DOMContentLoaded', function() {
  calcularS();
});
</script>
</head>
<body>
<div id="app">
        <div id="app" class="wrapper"> 
            @guest

            @else
            @include('layouts.sidebar')
            @endguest

        <div id="content">

        <main class="py-4">
            @include('layouts.sidehead')
            @include('components.flash_alerts')
            @yield('content')
        </main>
    </div>
    
</body>
@yield('scripts')
</html>

