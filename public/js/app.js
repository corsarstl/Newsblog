$('.like').on('click', function (event) {
    event.preventDefault();
    var commentId = event.target.parentNode.parentNode.dataset['commentid'],
        isLike = event.target.previousElementSibling == null;
    console.log(isLike);
    console.log(commentId);
    console.log(token);
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, commentId: commentId, _token: token},
        success: function(data){
            console.log(data);
        }
    })
        .done(function () {
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.previousElementSibling.innerText = 'Like';
            }
        });
});