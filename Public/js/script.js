// $('#heart_icon').on('click', function() {
//     console.log("HAH");
//     if ($('#div_heart input:checked')) {
//         console.log("checked");
//     } else {
//         console.log("unchecked");
//     }
//     // alert("judkj");
// });

function heart_post(element) {
    if (element.checked) {
        console.log("checked");

        let postid = $(this).data('post_id');
        let userid = $(this).data('user_id');

        //adding like

        $.ajax({
            url: '<?php echo URLROOT; ?>/Likes/addlikes/<?php echo $post->postId; ?>',
            type: 'post',
            data: {
                'liked': 1,
                'postid': postid
            },
            success: function(response) {
                $post.parent().find('span.likes_count').text(response + " likes");
                $post.addClass('hide');
                $post.siblings().removeClass('hide');
            }
        });


    } else {
        console.log("unchecked");
    }
}