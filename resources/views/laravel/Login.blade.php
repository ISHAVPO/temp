@include('laravel.header')

<div style="text-align:center; margin-top:50px;font-size:22px"><b> LOGIN </b></div>
<!-- @if(session()->has('error'))
    <div style="color:red;text-align:center">
        {{ session('error') }}
    </div>
@endif -->
@if(session('error'))
    <div style="color:red;text-align:center">
        {{ session('error') }}
    </div>
@endif
@if(session('message'))
    <div style="color:green;text-align:center">
        {{ session('message') }}
    </div>
@endif

<form id="form" action="" method="post">
@csrf
    <div style="margin:70px 100px 100px 300px ;width:50%">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@include('laravel.footer')
<script>
var $form = $('#form');
        $form.validate({
            rules: {
                email:{
                    required:true,
                    email:true,
    

                },
                password:{
                    required:true
              },
            },
                messages:{
                email:{
                    required:'Email must be filled' ,
                    email:'Must be a valid email id',
                    
                },
                password:{
                        required:'Password must be filled'
                },
              }
            });
                </script>
            
