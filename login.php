<?php

session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="registerstyle.css">

    <title>Login</title>
    <style>
        body {
            background-image: url("image1.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #ffc107;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <p class="text-primary">NoteShare</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Search Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">
                            <p class="text-primary">Login</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/miniproject/register.php" aria-current="page">Sign Up</a>
                    </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                include "config.php";
                if (isset($_POST['submit'])) {
                    $user = $_POST['username'];
                    $password = $_POST['password'];

                    $sql = "SELECT * FROM register WHERE username = '{$user}'";
                    $result = mysqli_query($conn, $sql) or die("Query Failed.");

                    if (mysqli_num_rows($result) > 0) {
                        $data = mysqli_fetch_assoc($result);
                        $db_pass = $data['password'];
                        $_SESSION['username']= $data['username'];
                        $answer = password_verify($password, $db_pass);

                        if ($answer) {
                            echo "Login sucessfull";
                            ?>
                            <script>
                                location.replace("welcome.php");
                            </script>
                            <?php
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>
                                The password that you've entered is incorrect!
                                </div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>
                            User not registered! Sign up first!
                            </div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div class="container  mt-3 ml-3">
        <div class="row">
            <div class="col-12 text-center mt-3">
                <h1 class="display-6">Login</h1>
            </div>
        </div>
        <div class="row justify-content-center m-4">
            <div class="col-lg-6 border border-2 rounded-3 border-success p-4">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="username" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username" placeholder="Username" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Password" name="password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center mt-3">
                            <button type="submit" class="btn btn-primary mt-2" name="submit">Login</button>
                        </div>
                    </div>


                </form>

            </div>
        </div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>