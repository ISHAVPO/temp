@include('laravel.header')

<form action="{{ $url }}" method="post">
    @csrf
    <h1>{{ $title }}</h1>
    <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" value="{{ isset($subject) ? $subject->sub_name : '' }}">
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label">Description</label>
        <input type="text" class="form-control" id="desc" name="desc" value="{{ isset($subject) ? $subject->sub_desc : '' }}">
    </div>
    <div class="mb-3">
        <label for="teacher" class="form-label">Assign teacher</label>
        <select class="form-select" name="teacher">
            @foreach($teacher as $teach)
                <option value="{{ $teach->user_id }}" {{ isset($subject) && $subject->teacher_assigned == $teach->user_id ? 'selected' : '' }}>
                    {{ $teach->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success" name="sub">Submit</button>
</form>

@include('laravel.footer')
