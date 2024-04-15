@include('laravel.header')
<table class="table">
  <thead>
    <tr>
      <th>Roll no.</th>
      <th >Name</th>
      <th >Class</th>
      <th >Marks</th>
      <th >Delete</th>
      <th >Update</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        @foreach($data as $stu)

      <td>{{$stu->roll_no}}</td>
      <td>{{$stu->name}}</td>
      <td>{{$stu->class}}</td>
      <td>{{$stu->marks}}</td>
      <td><button class="btn btn-warning"><a href="{{url('/stuupdate')}}/{{$stu->roll_no}}">update</a></button></td>
      <td><button class="btn btn-danger"><a href="{{url('/studel')}}/{{$stu->roll_no}}">delete</a></button></td>
    </tr>
    @endforeach
</table>
@include('laravel.footer')