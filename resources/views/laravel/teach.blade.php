<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <style>
    .sidebar {
      background-color: #333;
      color: #fff;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 sidebar">
      <h2>Sidebar</h2>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="{{url('/student/request')}}">Students Requests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Monitors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/showattendance')}}">Attendance</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/logout')}}">logout</a>
        </li>
      </ul>
      <div class="col-md-12" >
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
    <div class="col-md-9">
      <h1>Main Content</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Sed nec ligula in nunc feugiat tempor. Curabitur quis lectus sed libero fermentum fermentum. Phasellus auctor sit amet elit eget tincidunt. Ut sit amet posuere felis.</p>
    </div>
   
  </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
