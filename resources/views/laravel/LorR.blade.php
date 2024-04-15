@include('laravel.header')
<form action="" method="post">
    @csrf
    <div class="container mt-5">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="bg-light p-4 rounded">
                    <p class="text-center mb-3" style="font-size: 24px;text-align=center">Login or Register</p>
                    <span>
                    <button type="submit" class="btn btn-primary btn-block" style="margin-left:33%">
                        <a href="{{ route('form.login') }}" class="text-white text-decoration-none">Login</a>
                    </button>
                    <button type="submit" class="btn btn-primary btn-block">
                        <a href="{{ url('/form') }}" class="text-white text-decoration-none">Register</a>
                    </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</form>

@include('laravel.footer')


