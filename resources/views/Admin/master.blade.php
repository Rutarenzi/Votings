<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="Rutagarama Axcel">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style3.css')}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
        <link rel="stylesheet" rel="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    </head>
    <body>
        <section>
            <div class="sideBar">
                <a href="#" class="logoDash"><span>UpArt</span></a>
                <nav>
                    <ul>
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="{{route('createBracnh')}}">Branches</a></li>
                        <li><a href="{{ route('AllEvent')}}">Events</a></li>
                        {{-- <li><a href="Addcontestant.html">Contestant</a></li> --}}
                    </ul>

                </nav>
                <a href="#" class="logOut">  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a><br><br><br>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div></a>

            </div>
        
        </section>


        @yield('content');
    </body>
  