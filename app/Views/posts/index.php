<?php require APPROOT . '/Views/include/header.php';?>
  <?php flash('post_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Posts</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Post
      </a>
    </div>
  </div>
  <?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body bg-light mb-3">
      <h4 class="card-title"><?php echo $post->title; ?></h4>
      <div class="bg-light p-2 mb-3">
        Written by <?php echo $post->name; ?> on <?php echo date("h:i a . d M y ", strtotime($post->postCreated)); ?>
      </div>
      <p class="card-text"><?php echo $post->body; ?></p>

     <span>
        <div class="row">
          <div class="col-6">
              <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark btn-block">View Post</a>
          </div>
            <div class="col-6 " id="div_heart">
            
                <input type="checkbox"  <?php echo ($_SESSION['userHasLikedPost_id'.$post->postId] == true) ? 'checked' : ''; ?>   data-post_id="<?php echo $post->postId ?>" data-user_id="<?php echo $_SESSION['user_id'] ?>" class="pull-right" onclick="heart_post(this)" name="heart" id="heart_icon<?php echo $post->postId ?>">
                 <small> <span id="like_count<?php echo $post->postId ?>" class="likes_count pull-right"><!-- like count displays here --> <?php echo $_COOKIE["post_".$post->postId]; ?></span> </small>
                <label class="pull-right" for="heart_icon<?php echo $post->postId ?>" ></label>
                <!-- <span class="likes_count pull-right">1</span> -->
              <!-- <i title="Heart" id="heart_icon" style="font-size: 2rem;" class="la la-heart-o pull-right"></i> -->
            </div>
        </div>
     </span>
        <!-- <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">More</a> -->

    </div>
  <?php endforeach; ?>
  <?php require APPROOT . '/Views/include/footer.php';?>
