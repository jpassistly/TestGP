<!-- JAVASCRIPT -->

<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js')}}"></script>

<!-- validation init -->
<script src="{{ URL::asset('assets/libs/jquery/jquery.validate.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/jquery/additional-methods.min.js')}}"></script>

<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>

<!-- form advanced init -->
<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>



<script>
    $('#change-password').on('submit',function(event){
        event.preventDefault();
        var Id = $('#data_id').val();
        var current_password = $('#current-password').val();
        var password = $('#password').val();
        var password_confirm = $('#password-confirm').val();
        $('#current_passwordError').text('');
        $('#passwordError').text('');
        $('#password_confirmError').text('');
        $.ajax({
            url: "{{ url('update-password') }}" + "/" + Id,
            type:"POST",
            data:{
                "current_password": current_password,
                "password": password,
                "password_confirmation": password_confirm,
                "_token": "{{ csrf_token() }}",
            },
            success:function(response){
                $('#current_passwordError').text('');
                $('#passwordError').text('');
                $('#password_confirmError').text('');
                if(response.isSuccess == false){
                    $('#current_passwordError').text(response.Message);
                }else if(response.isSuccess == true){
                    setTimeout(function () {
                        window.location.href = "{{ route('root') }}";
                    }, 1000);
                }
            },
            error: function(response) {
                $('#current_passwordError').text(response.responseJSON.errors.current_password);
                $('#passwordError').text(response.responseJSON.errors.password);
                $('#password_confirmError').text(response.responseJSON.errors.password_confirmation);
            }
        });
    });
    $(document).ready(function() {
       // Add a click event listener to buttons with the text "Update"
        $('button:contains("Update")').on('click', function(e) {
            e.preventDefault(); // Prevent the form from submitting immediately

        // SweetAlert confirmation dialog
        Swal.fire({
        title: "Are you sure?",
        text: "Do you want to update this?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, update it!",
        cancelButtonText: "No, cancel",
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            // Find the parent form and submit it
            $(this).closest('form').submit();
        }
    });
    });
});
</script>

@yield('script')

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>

@yield('script-bottom')
