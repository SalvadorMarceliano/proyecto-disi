    <div class="wrapper">
        <!-- Sidebar  -->
        <nav style="background-color: #000942;" id="sidebar">
            <div class="sidebar-header" style="background-color: #000866;">
                <!--<h3>{{config('app.name', 'Laravel')}}</h3>-->
                <h3>Alfa y Omega</h3>
                <strong>PRO</strong>
            </div>

            <ul class="list-unstyled components">
                <!--<li class="{{'home'==request()->path()?'active':''}}">
                    <a href="{{ url('/home') }}">
                        <i class="fas fa-user"></i>
                        <b>Usuarios</b>
                    </a>                    
                </li>-->
                <li class="{{'productos'==Request::is('productos*')?'active': ''}}">
                    <a href="{{route('productos.index')}}">
                        <i class="fas fa-box-open"></i>
                        <b>Productos</b>
                    </a>
                </li>
                <li class="{{'clientes'==Request::is('clientes*')?'active': ''}}">
                    <a href="{{route('clientes.index')}}">
                        <i class="fas fa-users"></i>
                        <b>Clientes</b>
                    </a>
                </li>
                <li>
                    <a href="{{route('ventas.index')}}">
                        <i class="fas fa-dollar-sign"></i>
                        <b>Ventas</b>
                    </a>
                    <a href="{{route('facturas.index')}}">
                        <i class="fas fa-question"></i>
                        <b>Facturas</b>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-paper-plane"></i>
                        <b>Contactos</b>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <!-- <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                </div>
            </nav>
        </div>-->
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>