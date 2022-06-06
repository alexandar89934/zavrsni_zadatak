<?php
include_once('db.php');
$sql = "SELECT p.id, p.title, p.body, p.author_id, p.created_at, a.first_name, a.last_name
from posts as p 
inner join author as a on p.author_id = a.id
order by p.created_at";



$posts = fetch($sql, $connection, true);

?>


<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>


<body>
    <?php include('header.php') ?>

    <main role="main" class="container">

        <div class="row">
            <div class="col-sm-8 blog-main">


                <?php foreach ($posts as $post) {
                ?>

                    <div class="blog-post">
                        <a href="single-post.php?post_id=<?php echo ($post['id']) ?>">
                            <h2 class="blog-post-title"><?php echo ($post['title']) ?></h2>
                        </a>
                        <p class="blog-post-meta"><?php echo ($post['created_at']) ?> by <a href="#"><?php echo ($post['first_name'] . $post['last_name'])  ?></a></p>

                        <p><?php echo ($post['body']) ?></p>

                    </div><!-- /.blog-post -->

                <?php  } ?>


                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
                </nav>

            </div><!-- /.blog-main -->

            <?php include('sidebar.php') ?>

        </div><!-- /.row -->

    </main><!-- /.container -->

    <?php include('footer.php') ?>
</body>

</html>