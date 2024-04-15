@include('laravel.header')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <main>
                    <h1>Main Content</h1>
                    <form action="" method="post">
                        @csrf
                        <label for="add">Add Feature</label>
                        <input type="text" name="add" id="add">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </main>
            </div>
            <div class="col-md-4">
                <aside>
                    <h2>Features</h2>
                    <ul>
                        @foreach($data as $d)
                        <li>{{$d->feature_name}}</li>
                        @endforeach
                    </ul>
                   
                </aside>
            </div>
        </div>
    </div>
@include('laravel.footer')