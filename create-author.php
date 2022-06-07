<?php
include_once('db.php');
if (isset($_POST['submit'])) {

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $gender = $_POST['gender'];


    if (empty($firstName) || empty($lastName) || empty($gender)) {
        $loginErrorMessage =  "Nisu svi podaci popunjeni";
    } else {

        $sql = "INSERT INTO author (
                first_name, last_name, gender)
                VALUES ('$firstName', '$lastName','$gender')";
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
                <h1 class="c-p-title"> Create new author </h1>
                <form action="create-author.php" method="POST" id="postsForma">
                    <ul class="flex-outer">
                        <li>
                            <label for="first_name">First name:</label>
                            <input type="text" id="first_name" name="first_name" placeholder="Enter first name" required>
                        </li>
                        <li>
                            <label for="first_name">Last name:</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Enter last name" required>
                        </li>
                        <li>
                            <label for="gender">Gender:</label><br>
                            <label for=gender> Male</label>
                            <input type="radio" id="gender" name="gender" value="male"><br>
                            <label for=gender> Female</label>
                            <input type="radio" id="gender" name="gender" value="female"><br>

                        </li>
                        <li>
                            <button type="submit" name="submit">Submit</button>
                        </li>
                    </ul>
                </form>
                <p class="error-message">
                    <?php
                    if (isset($loginErrorMessage)) {
                        echo $loginErrorMessage;
                    }
                    ?>
                </p>
            </div>

            <?php include('sidebar.php') ?>

        </div><!-- /.row -->

    </main><!-- /.container -->

    <?php include('footer.php') ?>
</body>

</html>