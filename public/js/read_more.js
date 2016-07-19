$(document).on('ready', function(){

$(function () {
    $(".review-comment").dotdotdot({
        after: 'a.more',
        callback: dotdotdotCallback,
        watch:'window',
    });

    $(".presentation").dotdotdot({
        after: 'a.more',
        callback: dotdotdotCallback,
        watch:'window',
    });

    function dotdotdotCallback(isTruncated, originalContent) {
        if (!isTruncated) {
            $("a", this).remove();
        }
    }
});


//Script to fill the content of the modal of "Read more" of the reviews 
$('#modalReview').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 					// Button that triggered the modal
	  var id = button.data('review') 						// Extract info from data-* attributes
	  // Update the modal's content.
	  var modal = $(this)
	  modal.find('.modal-title').text('Review of ' + commentReviews['data'][id].user_id)
	  modal.find('.modal-body').text(commentReviews['data'][id].comment)
	  modal.find('.review-date').text(commentReviews['data'][id].created_at)
})

});		