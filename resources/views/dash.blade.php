
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bootstrap Dashboard</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
  .sidebar {
    background-color: #f8f9fa;
  }
  .main-content {
    background-color: #fff;
    min-height: 100vh;
  }
</style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 sidebar">
        <h2>Sidebar</h2>
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{url('/home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/about')}}">About</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="{{url('/feature')}}">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/create/subject')}}">Create subject</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/subjectview')}}">View Subjects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/permissions')}}">permissions</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('/form/view')}}">View Page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/logout')}}">logout</a>
          </li>
        </ul>
      </div>
      <!-- Main Content -->
      <div class="col-md-9 main-content">
        <h1>Welcome to our website</h1>
        <p>you can register yourself for free</p>
        <p>This is where you can view all your important information.</p>
        <p>Feel free to navigate through the sidebar View page to explore users of our website.</p>
      </div>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
