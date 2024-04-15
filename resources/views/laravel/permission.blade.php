@include('laravel.header')
@if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif


<form action="{{ url('/permissions') }}" method="post">
    @csrf
    <div class="container">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Permissions</th>
                    @foreach($roles as $role)
                            <th>{{ $role->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
            @foreach($data as $d)
    <tr>
        <td>{{ $d->feature_name }}</td>
        @foreach($roles as $role)
                <td>
                    <?php
                    $permissionExists = $permissions->where('role_id', $role->id)->where('feature_id', $d->id)->isNotEmpty();
                    ?>
                    <input type="checkbox" class="btn-check-input" name="checkboxes[]" value="{{ $role->id }}-{{ $d->id }}" {{ $permissionExists ? 'checked' : '' }}>
                </td>
        @endforeach
    </tr>
@endforeach

            </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-primary" name="submit" style="margin-left: 50%">Submit</button>
</form>

@include('laravel.footer')
