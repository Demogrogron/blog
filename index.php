<!DOCTYPE html>
<html>
    <head>
        <?php require_once('config.php') ?>
        
        <?php require_once('includes/header.php') ?>
	
        <!-- config.php should be here as the first include  -->

        <?php require_once( ROOT_PATH . '/includes/registration_login.php') ?>
        
        <?php require_once( ROOT_PATH . '/includes/functions.php') ?>
        
        <!-- Retrieve all posts from database  -->
        <?php $posts = getPublishedPosts(); ?>
        
                <title>LifeBlog | Home </title>
</head>
<body>
	<!-- container - wraps whole page -->
	<div class="container">
		<!-- menu -->
		<?php include('includes/menu.php') ?>
		<!-- //menu -->
        
        <!-- banner -->
        <?php include('includes/banner.php') ?>
        <!-- //banner -->
        
		<!-- Page content -->
		<div class="content">
			<h2 class="content-title">Recent Articles</h2>
			<hr>
            <!-- more content still to come here ... -->
<?php foreach ($posts as $post): ?>
	<div class="post" style="margin-left: 0px;">
		<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
        
        <?php if (isset($post['topic']['name'])): ?>
			<a 
				href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"
				class="btn category">
				<?php echo $post['topic']['name'] ?>
			</a>
		<?php endif ?>
        
		<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
			<div class="post_info">
				<h3><?php echo $post['title'] ?></h3>
				<div class="info">
					<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
					<span class="read_more">Read more...</span>
				</div>
			</div>
		</a>
	</div>
<?php endforeach ?>
			
		</div>
		<!-- // Page content -->

		<!-- footer -->
		<?php include('includes/footer.php') ?>
		<!-- // footer -->

	</div>
	<!-- // container -->
</body>
</html>