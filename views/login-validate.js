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

            $('#signup-submit').click(function(e) {
              if (!$('#username-signup').val()) {
                e.preventDefault();
                $('#username-warning').removeClass('hidden');
                $('#username-warning').parent().parent().addClass('has-error');
              } else if (!$('#password-signup').val() || $('#password-signup').val().length < 6) {
                e.preventDefault();
                $('#p_warning').removeClass('hidden');
                $('#p_warning').parent().parent().addClass('has-error');
              } else if (!$('#password-confirm-signup').val() || $('#password-confirm-signup').val() != $('#password-signup').val()) {
                e.preventDefault();
                $('#pc_warning').removeClass('hidden');
                $('#pc_warning').parent().parent().addClass('has-error');
              }
            });

            $('#username-signup').on('keyup keydown', function() {
              if ($(this).val().length > 0) {
                $('#username-warning').addClass('hidden');
                $('#username-warning').parent().parent().removeClass('has-error');
              }
            });

            $('#password-signup').on('keyup keydown', function() {
              if ($(this).val().length > 5) {
                $('#p_warning').addClass('hidden');
                $('#p_warning').parent().parent().removeClass('has-error');
              }
            });

            $('#password-confirm-signup').on('keyup keydown', function() {
              if ($(this).val() == $('#password-signup').val()) {
                $('#pc_warning').addClass('hidden');
                $('#pc_warning').parent().parent().removeClass('has-error');
              }
            });

        });
