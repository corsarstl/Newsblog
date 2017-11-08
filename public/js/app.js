$('.like').on('click', function (event) {
    event.preventDefault();
    var commentId = event.target.parentNode.parentNode.dataset['commentId'],
        isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, commentId: commentId, _token: token}
    })
        .done(function () {
            //change the page
        });
});