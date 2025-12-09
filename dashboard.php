<?php 
session_start();

if (isset($_SESSION["id"]) == false) {
      // If user is not logged in

          header("Location: index.html");
          die();
              
}

include 'connect.php';

$id = $_SESSION["id"];

$sql = "SELECT * FROM `users` WHERE id = '$id'";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM `courses`";

$result = mysqli_query($conn, $sql);

$courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        .card img {
            object-fit: cover;
            width:100%;
            height: 15rem;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    </ul>
  </div>
</nav>

<?php

if ($user["admin"]) {
?>
<small>Hello, admin</small>
<?php } else { ?>
<small>Hello, user</small>
<?php } ?>
 <div class="container">
<h1>Courses</h1>



<div class="row gap-3">
    

<?php 

foreach ($courses as $course) { ?>
  
  <div class="card p-2" style="width: 18rem;">
  <img class="card-img-top" src="<?= $course['image'] ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?= $course["course_title"] ?></h5>
    <p class="card-text"><?= $course['course_desc'] ?></p>
    <button data-course="<?= $course['id'] ?>" class="btn btn-primary enroll">Enroll</button>
  </div>
</div>
  
 <?php } ?>

</div>
 </div>

 <script src="protected.js"></script>
</body>
</html>