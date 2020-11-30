<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <a class="navbar-brand" href="<?php echo URLROOT?> "><?php echo SITENAME ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT?>/Pages/about">About</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <?php if($_SESSION) :?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT?>/users/Logout">Logout</a>
        </li>
          
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT?>/posts">Posts</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT?>/Dashboard">Dashboard</a>
            </li>
      <?php else :?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT?>/users/Login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT?>/users/register">Register</a>
        </li>
      <?php endif;?>
    </ul>
  </div>
</nav>