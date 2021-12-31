<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!---style sheet-->
    <link rel="stylesheet" href="registerstyle.css">

    <title>Sign up</title>
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
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffc107;">
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
                        <a class="nav-link" href="/miniproject/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="register.php" aria-current="page">
                            <p class="text-primary">Sign Up</p>
                        </a>
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
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
                    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
                    $user = mysqli_real_escape_string($conn, $_POST['username']);
                    $college = mysqli_real_escape_string($conn, $_POST['college']);
                    $pass = mysqli_real_escape_string($conn, $_POST['password']);
                    $password = password_hash($pass, PASSWORD_BCRYPT);
                    $course = mysqli_real_escape_string($conn, $_POST['course']);
                    $year = mysqli_real_escape_string($conn, $_POST['year']);
                    $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
                    $cpassword= password_hash($cpass, PASSWORD_BCRYPT);


                    $sql = "SELECT username FROM register WHERE username = '{$user}'";
                    $result = mysqli_query($conn, $sql) or die("Query Failed.");

                    if (mysqli_num_rows($result) > 0) {
                        echo "  <div class='alert alert-danger' role='alert'>
                                Username already exist!
                                </div>";
                    } else {

                        if ($pass == $cpass) {
                            $sql1 = "INSERT INTO `register` (`fname`, `lname`, `username`, `college`, `password`, `course`, `year`,`cpassword`) VALUES ('{$fname}','{$lname}','{$user}','{$college}','{$password}','{$course}','{$year}','{$cpassword}')";
                            if (mysqli_query($conn, $sql1)) {
                                // <--redirect to another page using header function-->
                                // header("Location: http://localhost/miniproject/login.php");
                                echo "  <div class='alert alert-success' role='alert'>
                                        Successfully registerd! You Can login now!
                                        </div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>
                                    Failed to register! Enter same password !!
                                 </div>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div class="container  mt-3 ml-3">
        <div class="row">
            <div class="col-12 text-center mt-3">
                <h1 class="display-6">Sign Up</h1>
            </div>
        </div>
        <div class="row justify-content-center m-4">
            <div class="col-md-6 border border-2 rounded-3 border-success p-4">
                <form action="/miniproject/register.php" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <label for="fname" class="form-label">First name</label>
                            <input type="text" aria-label="First name" class="form-control" placeholder="First Name" name="fname" id="fname" required>
                        </div>
                        <div class="col-6">
                            <label for="lname" class="form-label">Last name</label>
                            <input type="text" aria-label="First name" class="form-control" placeholder="Last Name" name="lname" id="lname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <label for="college" class="form-label">College/University</label>
                            <input type="text" aria-label="college" class="form-control" placeholder="College/University" name="college" id="college" required>
                        </div>
                        <div class="col-3">
                            <label for="year" class="form-label">Select Year</label>
                            <select class="form-select" aria-label="Default select example" id="year" name="year" required>
                                <option selected>-</option>
                                <option value="1">First</option>
                                <option value="2">Second</option>
                                <option value="3">Third/Higher</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="course" class="form-label">Course</label>
                            <input type="text" aria-label="Course" class="form-control" placeholder="Course" name="course" id="course" required>
                        </div>
                    </div>
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
                            <div id="passwordHelpBlock" class="form-text">
                                Your password must be 8-20 characters long, contain letters and numbers, and must not
                                contain spaces, special characters, or emoji.
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" id="cpassword" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Password" name="cpassword" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-primary mt-2 text-center">Submit</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>