$(document).ready(function() {
  
  //AJAX for ratingUp
  $('#thumbs-up').on('click', function() {
    console.log("button pressed");
    var button = $(this);
    var postid = $(this).parent().closest('#panel-info').find('.panel-heading').find('input').val();
    var rating = $(this).parent().find('input').val();
    rating = parseFloat(rating) ? parseFloat(rating) : rating
    console.log("rating:");
    console.log(rating);
    $.post('incrementController.php', {task:"ratingUp", postid:postid}, function(response){
      if (response == "ratingUp successful") {
        var newRating = rating + 1;
        button.parent().find('#rating-number').html(newRating);
        console.log("echo recieved");
      };
    });
  });
});