$(document).ready(function() {
  $('input[value="Post"]').click(function(e) {
    if (!$('textarea[name="content"]').val()) {
      e.preventDefault();
      $('div[role="alert"]').removeClass('hidden');
    } else {
      $('div[role="alert"]').addClass('hidden');
    }
  });
});
