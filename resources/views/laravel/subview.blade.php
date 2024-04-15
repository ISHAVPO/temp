@include('laravel.header')
 <table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>subject name</th>
      <th>subject description</th>
      <th>teacher assigned</th>
      <th>DELETE</th>
      <TH>MODIFY</TH>
    </tr>
  </thead>
  <tbody>
    <tr>
        @foreach($subject as $sub)
      <td>{{$sub->id}}</td>
      <td>{{$sub->sub_name}}</td>
      <td>{{$sub->sub_desc}}</td>
      <td>{{$sub->teacher_assigned}}</td>
      <td><button class="btn btn-danger"><a href="{{url('/subjectdel')}}/{{$sub->id}}">delete</a></button></td>
      <td><button class="btn btn-warning"><a href="{{url('/subjectedit')}}/{{$sub->id}}">update</a></button></td>
    </tr>
    @endforeach

  </tbody>
</table>


@include('laravel.footer')