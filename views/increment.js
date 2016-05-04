$(document).ready(function() {

  //AJAX for ratingUp
  $('#post-display #thumbs-up').on('click', function() {
    var button = $(this);
    var otherButton = $(this).parent().find('button[id="thumbs-down"]');
    var postid = $(this).parent().find('input[name="postid"]').val();
    var rating = $(this).parent().find('strong[id="rating-number"]').html();
    rating = parseFloat(rating) ? parseFloat(rating) : rating;
    console.log(rating);
    $.post('incrementController.php', {task:"ratingUp", postid:postid}, function(response){
      console.log(response);
      if (response == "ratingUp successful") {
        var newRating = rating + 1;
        button.parent().find('#rating-number').html(newRating);
        if (newRating != 0){
          button.attr("disabled", "disabled");
        }
        otherButton.removeAttr("disabled");
      };
    });
  });

  //AJAX for ratingDown
  $('#post-display #thumbs-down').on('click', function() {
    var button = $(this);
    var otherButton = $(this).parent().find('button[id="thumbs-up"]');
    var postid = $(this).parent().find('input[name="postid"]').val();
    var rating = $(this).parent().find('strong[id="rating-number"]').html();
    rating = parseFloat(rating) ? parseFloat(rating) : rating;
    $.post('incrementController.php', {task:"ratingDown", postid:postid}, function(response){
      if (response == "ratingDown successful") {
        var newRating = rating - 1;
        button.parent().find('#rating-number').html(newRating);
        if (newRating != 0){
          button.attr("disabled", "disabled");
        }
        console.log("we're here");
        otherButton.removeAttr("disabled");
      };
    });
  });

  //AJAX for flag
  $('#post-display #flag-up').on('click', function() {
    console.log("button pras");
    var button = $(this);
    var postid = $(this).parent().find('input[name="postid"]').val();
    var flags = $(this).parent().find('strong[name="flag-count"]').html();
    flags = parseFloat(flags) ? parseFloat(flags) : flags;
    $.post('incrementController.php', {task:"flagUp", postid:postid}, function(response){
      console.log(response);
      if (response == "flagUp successful") {
        var newFlags = flags + 1;
        button.parent().find('strong[name="flag-count"]').html(newFlags);
        button.attr("disabled", "disabled");
      };
    });
  });
});
