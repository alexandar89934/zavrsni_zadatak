<?php
include_once('db.php');
if (isset($_POST['submit'])) {

    $body = $_POST['body'];
    $title = $_POST['title'];
    if (empty($body) || empty($title)) {
        echo ("Nisu svi podaci popunjeni");
    } else {
        $currentDate = date("Y-m-d h:i");
        $sql = "INSERT INTO posts (
                title, body, author_id, created_at)
                VALUES ('$title', '$body', 1,'$currentDate')";
        $statement = $connection->prepare($sql);
        $statement->execute();
        header("Location: ./posts.php");
        echo ("Upisi u bazu");
    }
}


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
            <div class="form-wrapper">
                <h1 class="c-p-title"> Create new post </h1>
                <form action="create-post.php" method="POST" id="postsForma">
                    <ul class="flex-outer">
                        <li>
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" placeholder="Enter title">
                        </li>
                        <li>
                            <label for="body">Body</label>
                            <textarea name="body" placeholder="Enter body" rows="10" id="bodyPosts"></textarea><br>
                        </li>
                        <li>
                            <button type="submit" name="submit">Submit</button>
                        </li>
                    </ul>
                </form>
            </div>

            <?php include('sidebar.php') ?>

        </div><!-- /.row -->

    </main><!-- /.container -->

    <?php include('footer.php') ?>
</body>

</html>