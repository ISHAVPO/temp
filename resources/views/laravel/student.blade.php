<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <style>
    /* Add your custom styles here */
    .navbar {
      background-color:black;
      color:white;
    }
    .navbar-brand {
      color: #fff;
    }
    .content {
      padding-top: 20px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Student Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/subjectoffered')}}">Subjects offered</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/attendance')}}">mark attendance</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{url('/logout')}}">logout</a>
          </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid content">
  <div class="row">
    <div class="col-md-12">
      <h1>Welcome to Student Panel</h1>
      <p>This is your dashboard where you can view your profile, courses, grades, and settings.</p>
    </div>
    <div class="col-md-12" style="margin-left:65%">
    <H1>ROLES</H1>
    <ul>
    </li class="nav-item">
       
        @foreach($roles as $role)
          @foreach($role->feature as $feature)
            <li class="nav-item">
          {{ $feature->feature_name }}
            </li>
          @endforeach
        @endforeach
        </ul>
        </div>
  </div>
</div>
@include('laravel.footer')