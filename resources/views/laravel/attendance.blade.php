@include('laravel.header')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-4 container-centered">
            <div class="text-center">
                @if($alreadyMarkedIn)
                    <div class="alert alert-warning" role="alert">
                        You are already marked in.
                    </div>
                @else
                    <button id="markInBtn" class="btn btn-primary btn-lg mr-2">
                        <a href="{{ url('/markIn') }}" class="text-white text-decoration-none">Mark In</a>
                    </button>
                @endif
                @if($alreadyMarkedOut)
                    <div class="alert alert-warning" role="alert">
                        You are already marked out.
                    </div>
                @else
                    <button id="markOutBtn" class="btn btn-primary btn-lg">
                        <a href="{{ url('/markOut') }}" class="text-white text-decoration-none">Mark Out</a>
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>

@include('laravel.footer')
