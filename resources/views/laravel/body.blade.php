@include('laravel.header')
<form id="form" action="{{($url)}}" method="post">
@csrf
<div style="text-align:center">{{$title}}</div>
  <div class="mb-3">
      <label for="name" class="form-label">NAME</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ isset($rec) ? $rec->name : '' }}">
    </div>
    <div class="form-check"> 
       <p style="text-align:left">Gender</p>
  <input  type="radio" name="gender" value="M" {{ isset($rec) && $rec->gender == 'M' ? "checked" : "" }}>
  Male

  <input type="radio" name="gender" VALUE="F" {{ isset($rec) && $rec->gender == 'F' ? "checked" : "" }}>
 Female
 
  <input type="radio" name="gender" value="O" {{ isset($rec) && $rec->gender == 'O' ? "checked" : "" }}>
 Other
</div>
 
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ isset($rec) ? $rec->email : '' }}">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
  
    <div class="mb-3">
      <label for="InputPassword" class="form-label">Password</label>
      <input type="password" class="form-control" id="InputPassword" name="password" >
    </div>
    
    <div class="mb-3">
      <label for="confirmPassword" class="form-label">ConfirmPassword</label>
      <input type="password" class="form-control" id="confirmPassword" name="confirmpassword">
    </div>
    
    <div class="mb-3">
      <label for="sal" class="form-label">SALARY</label>
      <input type="number" class="form-control" id="sal" name="salary"  value="{{ isset($rec) ? $rec->salary : '' }}">
    </div>
    <select class="form-select"  name="role">

  <option value="2">Teacher</option>
  <option value="3">monitor</option>
  <option value="4">student</option>
</select>
    
    <button type="submit" class="btn btn-success" name="sub">Submit</button>
  </form>

  @include('laravel.footer') 

  <script>
$(document).ready(function() {
    // Custom validation method for name field
    $.validator.addMethod("validatename", function(value, element) {
        // return this.optional(element) || /^[a-zA-Z]{4,16}$/.test(value);
        return /^[a-zA-Z]{4,16}$/.test(value);
    }, "Please enter a valid name (4-16 characters, letters only)");

    var $form = $('#form');
    $form.validate({
        rules: {
            name: {
                required: true,
                validatename:true,
            },
            email:{
                required:true,
                email:true
            },
            password:{
                required:true,
                minlength:8,
            },
            confirmpassword:{
                required:true,
                minlength:8,
                equalTo:"#InputPassword"
            },
            salary:{
                required:true
            },
            role:{
                required:true
            },
            gender: { 
                required: true
            }
        },
        messages:{
            name:{
                required:'Name must be filled',
            },
            email:{
                required:'Email must be filled' ,
                email:'Must be a valid email id'
            },
            password:{
                required:'Password must be filled' ,
                minlength: 'Must be at least 8 characters long' ,
            },
            confirmpassword:{
                required:'Must be filled' ,
                minlength: 'Must be at least 8 characters long' ,
                equalTo:'Must match the password'
            },
            salary:{
                required:'Salary must be filled',
            },
            role:{
                required:'Role must be filled',
            },
            gender: { 
                required: 'Gender must be selected'
            }
        }
    });
});
</script>


