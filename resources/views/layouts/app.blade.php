<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Fonts Icons - Awesome 5-->
        <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{!! asset('assets/img/favicon.ico') !!}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Condomínio BA') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <!-- JQuery -->
        <script src="js/jquery-3.3.1.min.js"></script>  
        
        <!-- Anúncios do Google Adsense -->
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-9352891206341061",
                enable_page_level_ads: true
            });
        </script>
        
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'CondominioBA') }}
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            @can('stakes_index')
                            <li><a href="{{route('stakes.index')}}"><i class="fas fa-home"></i></a></li>
                            @endcan
                            @can('adm')
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fas fa-cog"></i>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('roles.index')}}"><i class="fas fa-address-book"></i> Perfis</a></li>
                                    <li><a href="{{route('permissions.index')}}"><i class="fas fa-ban"></i> Permissões</a></li>
                                    <li><a href="{{route('role-users.index')}}"><i class="fas fa-user-secret"></i> Usuários-Perfis</a></li>
                                    <li><a href="{{route('users.index')}}"><i class="fas fa-users"></i> <span class="badge">{!!DB::table('users')->count()!!}</span></a></li>
                                </ul>
                            </li>
                            @endcan
                            @can('calendar_index')
                            <li><a href="{{route('calendars.index')}}">Calendário</a></li>
                            @endcan
                            @can('interview_index')
                            <li><a href="{{route('interviews.index')}}">Entrevistas</a></li>
                            @endcan
                            <li class="dropdown">
                                @can('caravan_user_index')
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Caravanas
                                    <span class="caret"></span>
                                </a>
                                @endcan
                                <ul class="dropdown-menu">
                                    @can('caravan_user_index')
                                    <li><a href="{{route('caravan-users.index')}}">Reservas</a></li>
                                    @endcan
                                    @can('caravan_index')
                                    <li><a href="{{route('caravans.index')}}">Administrar</a></li>
                                    @endcan
                                </ul>
                            </li> 
                            <li class="dropdown"> 
                                @can('called_index')  
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Chamados
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('calleds.index')}}">Indicações</a></li>
                                </ul>
                                @endcan
                            </li>
                            <li class="dropdown">
                                @can('equipment_rent_index')
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Equipamentos
                                    <span class="caret"></span>
                                </a>
                                @endcan
                                <ul class="dropdown-menu">
                                    @can('equipment_rent_index')
                                    <li><a href="{{route('equipment-rents.index')}}">Empréstimos</a></li>
                                    @endcan
                                    @can('equipment_index')
                                    <li><a href="{{route('equipments.index')}}">Lista de Equipamentos</a></li>
                                    @endcan
                                </ul>
                            </li>
                            
                            @can('sacramental_meeting_index')
                            <li><a href="{{route('sacramental-meetings.index')}}">Sacramental</a></li>
                            @endcan
                               
                            <li class="dropdown">
                                @can('contact_create')
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Suporte
                                    <span class="caret"></span>
                                </a>
                                @endcan
                                <ul class="dropdown-menu">
                                    @can('contact_create')
                                    <li><a href="{{route('contacts.create')}}">Enviar Mensagem</a></li>
                                    @endcan
                                    @can('contact_index')
                                    <li><a href="{{route('contacts.index')}}">Ver Respostas</a></li>
                                    @endcan
                                </ul>
                            </li>
                            
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest    
                            <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                            <li><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Registrar</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fas fa-user-circle"></i> 
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{route('users.edit', auth()->user()->id)}}">
                                            <i class="fas fa-user"></i> 
                                            Editar Perfil
                                        </a>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> 
                                            SAIR
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <!--alertas-->
            @if (session('alertSuccess'))
                <div class="alert alert-success text-center">
                    {{ session('alertSuccess') }}
                </div>
                @elseif(session('alertDanger'))
                    <div class="alert alert-danger text-center">
                        {{ session('alertDanger') }}
                    </div>
            @endif
            <!--fim do alerta-->
            
            @yield('content')

            <div class="text-center">
                <p></p>
                <p>Copyright &#174 2018-{{date('Y')}} | by Davi Bispo - (82) 99969-3407 | davi-bispo@hotmail.com</p>
                <p><i>(Este não é um site oficial de A Igreja de Jesus Cristo dos Santos dos Últimos Dias)</i></p>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        
        <!-- Tooltip -->
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        
  
        
        <!-- Contador de caracteres do mensagem -->
        <script>
            function mostrarResultado(box,num_max,campospan){
                var contagem_carac = box.length;
                if (contagem_carac != 0){
                    document.getElementById(campospan).innerHTML = contagem_carac + " caracteres digitados";
                    if (contagem_carac == 1){
                        document.getElementById(campospan).innerHTML = contagem_carac + " caracter digitado";
                    }
                    if (contagem_carac >= num_max){
                        document.getElementById(campospan).innerHTML = "Limite de caracteres excedido!";
                    }
                }else{
                    document.getElementById(campospan).innerHTML = "Ainda não temos nada digitado..";
                }
            }
            function contarCaracteres(box,valor,campospan){
                var conta = valor - box.length;
                document.getElementById(campospan).innerHTML = "Você ainda pode digitar " + conta + " caracteres";
                if(box.length >= valor){
                    document.getElementById(campospan).innerHTML = "Opss.. você não pode mais digitar..";
                    document.getElementById("message").value = document.getElementById("message").value.substr(0,valor);
                }	
            }
        </script>
         
    </body>
</html>
