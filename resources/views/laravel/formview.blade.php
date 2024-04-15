@include('laravel.header')
<!-- <pre>{{print_r($data)}}</pre> -->
 <table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>NAME</th>
      <th>GENDER</th>
      <th>EMAIL</th>
      <th>PASSWORD</th>
      <th>SALARY</th>
      <TH>ROLE</TH>
      <th>DELETE</th>
      <TH>MODIFY</TH>
    </tr>
  </thead>
  <tbody>
    <tr>
        @foreach($data as $d)
      <td>{{$d->user_id}}</td>
      <td>{{$d->name}}</td>
      <td>
      @if($d->gender=='M')
        Male

        @elseif($d->gender=='F')
        Female
        @else
        Other
        @endif
    </td>
      <td>{{$d->email}}</td>
      <td>{{$d->password}}</td>
      <td>{{$d->salary}}</td>
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


      <td><button class="btn btn-danger"><a href="{{url('/form/delete/')}}/{{$d->user_id}}">delete</a></button></td>
      <td><button class="btn btn-warning"><a href="{{route('form.edit',['id'=>$d->user_id])}}">update</a></button></td>
    </tr>
    @endforeach

  </tbody>
</table>
<div class="pagination">
    {{ $data->links() }}
</div>

@include('laravel.footer')