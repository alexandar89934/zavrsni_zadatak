<?php
include_once('db.php');


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
    <?php include('header.php');


    if (isset($_GET['post_id'])) {


        $sql = "SELECT 
                    p.id, p.title, p.body, p.created_at
                    FROM posts as p 
                    WHERE p.id = {$_GET['post_id']}";

        $singlePost = fetch($sql, $connection);


        $sql_comments = "SELECT c.text, c.author
        FROM comments AS c 
        WHERE c.post_id = {$_GET['post_id']}";

        $comments = fetch($sql_comments, $connection, true);
    }

    ?>

    <main role="main" class="container">

        <div class="row">
            <article class="va-c-article">

                <header>
                    <h1><?php echo $singlePost['title'] ?></h1>
                    <div class="va-c-article__meta"><?php echo $singlePost['created_at'] ?>. by <?php echo $singlePost['author'] ?></div>
                </header>
                <div>
                    <p><?php echo $singlePost['body'] ?></p>
                </div>


                <div class="comments">
                    <h3>comments</h3>

                    <?php foreach ($comments as $comment) { ?>
                        <div class="single-comment">
                            <div>posted by: <strong>
                                    <?php echo $comment["author"] ?>
                                </strong></div>
                            <div><?php echo $comment["text"] ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </article>











            <?php include('sidebar.php') ?>

        </div><!-- /.row -->

    </main><!-- /.container -->

    <?php include('footer.php') ?>
</body>

</html>