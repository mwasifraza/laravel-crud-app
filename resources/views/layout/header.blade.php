<!doctype html>
<html lang="en">

<head>
  @stack('title')
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Laravel Crud App</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">Home</a>
          </li>
          @if (!session("login"))
          <li class="nav-item">
            <a class="nav-link" href="{{url('/login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.create')}}">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.view')}}">View</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{url('/dashboard')}}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/logout')}}">Logout</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>