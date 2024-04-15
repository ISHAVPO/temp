@include('laravel.header')


    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Open Modal
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Select your subjects</h1>
                    <button type="button" class="btn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{ url('/modal') }}" method="post">
    @csrf
                    <ol>
                        @foreach($subjects as $sub)
                        <li>
                            <input type="checkbox" name="subject[]" value="{{ $sub->id }}"> <!-- Use subject[] for multiple selections -->
                            <label>{{ $sub->sub_name }}</label>
                        </li>
                        @endforeach
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

@include('laravel.footer')
