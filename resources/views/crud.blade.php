@include('laravel.header')
<form id="stu" method="post">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Enter your name</label>
    <input type="text" class="form-control" id="name" name="name" >
  </div>
  <div class="mb-3">
    <label for="class" class="form-label">Class</label>
    <input type="text" class="form-control" id="class" name="class">
  </div>
  <div class="mb-3">
    <label for="marks" class="form-label">Marks</label>
    <input type="number" class="form-control" id="marks" name="marks">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@include('laravel.footer')