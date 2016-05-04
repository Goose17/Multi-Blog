$(document).ready(function() {
  $('input[value="Post"]').click(function(e) {
    if (!$('textarea').val() || !$('input[name="title"]').val()) {
      e.preventDefault();
      $('div[role="alert"]').removeClass('hidden');
    } else {
      $('div[role="alert"]').addClass('hidden');
    }
  });
});
