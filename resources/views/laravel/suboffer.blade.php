@include('laravel.header')
<h1>SUBJECTS STATUS</h1>
<table class="table table-primary">
    <thead>
    <tr>
        <th>Subject ID</th>
        <th>Subject Name</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($subjects as $index => $subject)
    <tr>
        <td>{{ $subject->subject_id }}</td>
        <td>{{ $subject_names[$index] }}</td>
        <td>{{ $subject->status }}</td>
    </tr>
    @endforeach
    </tbody>
</table>

@include('laravel.footer')
