<?php
include "connection.php";
if(isset($_POST['submit']))
{
  $roll = $_POST['roll'];
  $name  = $_POST['name'];
  $session = $_POST['session'];
  $current_year = $_POST['current_year'];
  $semester = $_POST['semester'];

  $q = "INSERT INTO students(Roll,Name,Session,Current_Year,Semester) VALUES('$roll', '$name','$session','$current_year', '$semester')";

  $query = mysqli_query($conn, $q);
  if($query)
  {
    $data = 'Data inserted successfully';
  }
  else
  {
    $data = 'Sorry! Data not inserted';
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg bg-black">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="index.php">Jakaria CRUD app</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link text-white" href="#">Add New</a>
        </li>
      
      </ul>
    </div>
  </div>
</nav>

<div class="col-lg-6 m-auto">
 <form action="" method="post">
  <br><br>
  <div class="card">
    <div class="card-header bg-primary ">
<h1 class="text-white text-center">Create New Member</h1>
    </div><br>
    <?php if(isset($data)){echo $data;} ?>
    <label for="roll" style="padding: 5px;">Roll:</label>
    <input type="text" name="roll" class="form-control"><br>

    <label for="name" style="padding: 5px;">Name:</label>
    <input type="text" name="name" class="form-control"><br>

    <label for="session" style="padding: 5px;">Session:</label>
    <input type="text" name="session" class="form-control"><br>

    <label for="current_year" style="padding: 5px;">Current Year:</label>
    <input type="text" name="current_year" class="form-control"><br>

    <label for="semester" style="padding: 5px;">Semester:</label>
    <input type="text" name="semester" class="form-control"><br>

    <button type="submit" name="submit" class="btn btn-success">Submit</button><br>
    <a class="btn btn-warning" type="submit"  href="index.php" name="cancel">Cancel</a>
  </div>
 </form>

</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>