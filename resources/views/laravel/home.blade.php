<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DataTables Example</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
<h1 style="text-align:center;color:blue">WELLCOME TO OUR HOME PANNEL</h1>
<div style="border:solid black ;margin-left:85%">
  <ul>
    <li>teacherCount={{$teacher}}</li>
    <li>studentCount={{$students}}</li>
    <li>monitorCount={{$monitor}}</li>
</ul>
</div>
<form action="{{url('/filter')}}" method="post">
@csrf
<span style="margin-top:20px">
<select class="form-select"  name="role" placeholder="select your role">
<option value="1">All</option>
<option value="2">Teacher</option>
<option value="3">monitor</option>
<option value="4">student</option>
</select>

<button type="submit" class="btn btn-success" name="sub">Filter</button>
</span>
</form>
<table id="example" class="display" style="width:100%">

  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Edit</th>
     
    </tr>
  </thead>
  <tbody>
    @foreach($data as $d)
    <tr>
      <td>{{$d->name}}</td>
      <td>{{$d->email}}</td>
      <td>
    @if ($d->role_id == 2)
        teacher
    @elseif ($d->role_id == 3)
        monitor
    @elseif ($d->role_id == 4)
        student
        @elseif ($d->role_id == 1)
        admin
    @endif
</td>
      <td><button class="btn btn-warning"><a href="{{route('form.edit',['id'=>$d->user_id])}}">update</a></button></td>
    </tr>
    @endforeach
  </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
</body>
</html>
