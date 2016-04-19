    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="views/increment.js"></script>
    <script>
        $(document).ready(function() {
            
            $("form input").eq(0).focus();
            
            // Helper function returns true when form is ok to be submitted and false otherwise.
            function validate() {
                // Check to make sure username input is set and is at least 1 character.
                var username = $('#username-signup').val().length > 0;
                
                // Check to make sure password input is set and is at least 6 characters.
                var password = $('#password-signup').val().length > 5;
                
                // Confirms that both password input and confirm password input are the same value.
                var confirm = $('#password-signup').val() == $('#password-confirm-signup').val();
                
                return username && password && confirm;
            }
            
            // Makes sure we can't submit a form before all fields are good to go.
            $(document).on('mouseover', function() {
                var button = $('#signup-submit');
                validate() ? button.removeAttr('disabled') : button.attr('disabled', 'true');
            });
            
            // Flashy effects for password being under 6 characters.
            $('#password-signup').on('keyup', function() {
                if ($(this).val().length < 6) {
                    $(this).parent().addClass('has-error');
                    $(this).siblings('p').removeClass('hidden');
                } else {
                    $(this).parent().removeClass('has-error');
                    $(this).siblings('p').addClass('hidden');
                }
            });
            
            // Effects for mismatching passwords.
            $('body').on('mouseover', function() {
                var confirm = $('#password-confirm-signup');
                if ($('#password-signup').val()) {
                    if (confirm.val() != $('#password-signup').val()) {
                        confirm.parent().addClass('has-error');
                        confirm.siblings('p').removeClass('hidden');
                    } else {
                        confirm.parent().removeClass('has-error');
                        confirm.siblings('p').addClass('hidden');
                    }
                }
            });
            
            $('#username-signup').on('mouseenter mouseleave', function() {
               if (!$(this).val() || $(this).val().length < 1) {
                    $(this).siblings('p').removeClass('hidden');
                    $(this).parent().addClass('has-warning');
               } else {
                    $(this).siblings('p').addClass('hidden');
                    $(this).parent().removeClass('has-warning');
               }
            });
            
        });
    </script>
  </body>
</html>