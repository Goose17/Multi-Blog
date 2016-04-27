$(document).ready(function() {
  
  //AJAX for ratingUp
  $('#post-display #thumbs-up').on('click', function() {
    var button = $(this);
    var postid = $(this).parent().find('input[name=postid]').val();
    var rating = $(this).parent().find('input[name=rating]').val();
    rating = parseFloat(rating) ? parseFloat(rating) : rating;
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
    var postid = $(this).parent().find('input[name=postid]').val();
    var rating = $(this).parent().find('input[name=rating]').val();
    rating = parseFloat(rating) ? parseFloat(rating) : rating;
    $.post('incrementController.php', {task:"ratingDown", postid:postid}, function(response){
      if (response == "ratingDown successful") {
        var newRating = rating - 1;
        button.parent().find('#rating-number').html(newRating);
        button.attr("disabled", "disabled");
      };
    });
  });
  
  //AJAX for flag
  $('#post-display #flag-up').on('click', function() {
    var button = $(this);
    var postid = $(this).parent().find('input[name=postid]').val();
    var flags = $(this).parent().find('strong[name=flag-count]').val();
    console.log(flags);
    flags = parseFloat(flags) ? parseFloat(flags) : flags;
    $.post('incrementController.php', {task:"flagUp", postid:postid}, function(response){
      if (response == "flag successful") {
        var newFlags = flags + 1;
        button.parent().find('strong[name=flag-count]').html(newFlags);
        button.attr("disabled", "disabled");
      };
    });
  });
});