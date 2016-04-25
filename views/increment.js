$(document).ready(function() {
  
  //AJAX for ratingUp
  $('#post-display #thumbs-up').on('click', function() {
    var button = $(this);
    var postid = $(this).parent().closest('#panel-info').find('.panel-heading').find('input').val();
    var rating = $(this).parent().find('input[name=rating]').val();
    rating = parseFloat(rating) ? parseFloat(rating) : rating
    $.post('incrementController.php', {task:"ratingUp", postid:postid}, function(response){
      if (response == "ratingUp successful") {
        var newRating = rating + 1;
        button.parent().find('#rating-number').html(newRating);
        button.attr("disabled", "disabled");
      };
    });
  });
  
  //AJAX for ratingDown
  $('#post-display #thumbs-down').on('click', function() {
    var button = $(this);
    var postid = $(this).parent().closest('#panel-info').find('.panel-heading').find('input').val();
    var rating = $(this).parent().find('input[name=rating]').val();
    rating = parseFloat(rating) ? parseFloat(rating) : rating
    $.post('incrementController.php', {task:"ratingDown", postid:postid}, function(response){
      if (response == "ratingDown successful") {
        var newRating = rating - 1;
        button.parent().find('#rating-number').html(newRating);
        button.attr("disabled", "disabled");
      };
    });
  });
  
  //AJAX for flag
  $('#post-display #flag').on('click', function() {
    var button = $(this);
    var postid = $(this).parent().closest('#panel-info').find('.panel-heading').find('input').val();
    var flags = $(this).parent().find('input[name=flags]').val();
    flags = parseFloat(flags) ? parseFloat(flags) : flags
    $.post('incrementController.php', {task:"flagUp", postid:postid}, function(response){
      if (response == "flag successful") {
        var newFlags = flags + 1;
        button.parent().find('#flag-number').html(newFlags);
        button.attr("disabled", "disabled");
      };
    });
  });
});