$(document).ready(function() {
  
  //AJAX for ratingUp
  $('.panel-footer .glyphicon glyphicon-thumbs-up').on('click', function() {
        var postid = $(this).closest('.panel panel-info').find('.panel-heading').find('input').val();
        $.post('incrementController.php', {task:"ratingUp", postid:postid}, function(response){
            if (response == "ratingUp successful") {
                //grab current rating and increment it
            });
        });

  });
});