<?php
session_start();

if(!isset($_SESSION['username'])){
    header('location:index.php');
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Hello, world!</title>
  <style>
    body {
      background-image: url("image1.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    .search {
      margin-top: 250px;
    }
  </style>
  <link rel="stylesheet" href="registerstyle.css">
</head>

<body>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>


  <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #ffc107;">
    <div class="container-fluid">
      <a class="navbar-brand text-primary" href="#">NoteShare</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-primary" aria-current="page" href="welcome.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Search Notes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contribute</a>
          </li>
        </ul>
        <div class="dropdown me-5 dropstart">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
            data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['username'] ?>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Dashboard</a></li>
            <li><a class="dropdown-item" href="#">Upload</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div class="search">
    <div class="container align-item-center">
      <div class="row justify-content-center">
        <div class="col-md-8 col-sm-4 p-0">
          <div class="input-group input-group-lg">
            <input type="text" class="form-control" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-lg" placeholder="Search for Subjects or Topics">
            <div class="col-md-2 col-sm-1 px-0">
              <button type="button" class="btn btn-outline-success btn-lg">SEARCH</button>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
  
</body>

</html>