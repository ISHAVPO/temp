@include('laravel.header')

<form id="form" acttion="" method="post">
@csrf

<div style="width:50%;margin-left:300px;margin-top:100px;background-color:wheat">
  <div class="mb-3">
      <label for="name" class="form-label">NAME</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">ADDRESS</label>
      <input type="text" class="form-control" id="address" name="address">
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">PHONE NO.</label>
      <input type="text" class="form-control" id="phone" name="phone">
    </div>

    <button type="submit" class="btn btn-success" name="submit">Submit</button>
</div>
  </form>

  <script>
    $(document).ready(function() {
        $.validator.addMethod("validatename", function(value, element) {
            // return this.optional(element) || /^[a-zA-Z]{4,16}$/.test(value);
            return /^[a-zA-Z]{4,16}$/.test(value);
        }, "Please enter a valid name (4-16 characters, letters only)");

        $.validator.addMethod("mob",function(value,element){
            return /^[0-9]{10}$/.test(value);
        },"Please enter digits only of length 10");
    
        var $form = $('#form');
        $form.validate({
            rules: {
                name: {
                    required: true,
                    validatename: true,
                },
                address: {
                    required: true,
                },
                phone: {
                    required: true,
                    mob: true,
                },
            },
            messages: {
                name: {
                    required: 'Name must be filled',
                },
                address: {
                    required: 'Address must be filled',
                },
                phone: {
                    required: 'Phone no. must be filled',
                },
            },
            submitHandler: function(form) {
                // Serialize form data
                var formData = $(form).serialize();
                
                // AJAX request
                $.ajax({
                    type: 'POST',
                    url: '/ajax', 
                    data: formData,
                    success: function(response) {
                        // Display response message
                        $('#responseMessage').html(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>


  @include('laravel.footer') 