function heart_post(element) {
    let postid = parseInt(element.dataset.post_id);
    let userid = parseInt(element.dataset.user_id);

    if (element.checked) {
        console.log("checked");

        //adding like

        $.ajax({
            url: 'Likes/addlikes/' + postid,
            type: 'post',
            data: {
                'user_id': userid,
                'post_id': postid
            },
            success: function(response) {
                getLikes(postid);
            }
        });


    } else {

        // removing like from same user when unchecked
        $.ajax({
            url: 'Likes/delete',
            type: 'post',
            data: {
                'user_id': userid,
                'post_id': postid
            },
            success: function(response) {
                getLikes(postid);
            }
        });

        console.log("unchecked");
    }
}


function getLikes(post_id) {
    $.ajax({
        url: 'Likes/getLikesById/' + post_id,
        type: "GET",
        success: function(res) {
            $('#like_count' + post_id).html(res);
            document.cookie = "post_" + post_id + "=" + res;
        }
    });
}

$(document).ready(function() {


    $.ajax({
        url: 'Posts/getPostFromAjax',
        type: "GET",
        dataType: 'JSON',
        success: function(res) {

            //fix all likes from database to its posts
            res.forEach(post => {
                getLikes(post.postId);
                // console.log(post.postId);
            });
            let hdhd = getLikes(5);
            console.log(hdhd);
        }
    });
});