@props(['title'])

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- @vite('resources/css/app.css') --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>{{$title}}</title>
</head>
<body>
  <style>
    nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 72px;
      background-color: #eee;
      padding-left: 30px;
      padding-right: 30px;
    }
    ul.nav-ul {
      list-style: none;
      display: flex;
      align-items: center;
    }
    ul a {
      margin:0 10px
    }
    a {
      text-decoration: none;
    }
  </style>
  <nav>
    <div class="logo">
      logo
    </div>
    <ul class="nav-ul">
      @auth
      <li><a href="{{route('login.logout')}}">deconnection</a></li>
      {{auth()->user()->name}}
      <li><a href="{{route('publications.create')}}">ajouter publication</a></li>
      @endauth
      @guest
      <li><a href="{{route('login.show')}}">se connecter</a></li>
      @endguest
      <li><a href="{{route('profile.index')}}">profile</a></li>
      <li><a href="{{route('settings.index')}}">informations</a></li>
      <li><a href="{{route('profile.create')}}">ajouter profile</a></li>
      <li><a href="{{route('publications.index')}}">publications</a></li>
    </ul>
  </nav>

  <div class="" >
    @if (session()->has('success'))
        <x-alert type='success'>
          {{session('success')}}
        </x-alert>
    @endif
  </div>


  <div class="container my-4">
    {{$slot}}
  </div>

  <div style="background: #eee; text-align:center;">@2024</div>
</body>
</html>