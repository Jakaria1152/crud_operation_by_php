<?php
include "connection.php";
  $ID = "";
  $NAME = "";
  $EMAIL = "";
  $PHONE = "";

  $ERROR = "";
  $SUCCESS = "";
  
  if($_SERVER["REQUEST_METHOD"]=='GET')
  {
    if(!isset($_GET['id']))
    {
      header("location:/crud_operation/index.php");
      exit;
    }
    else
    {
      $SL_ID = $_GET['id'];
      $sql = "SELECT * FROM students WHERE SL_ID = $SL_ID ";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    }
    if(!$row)
    {
      header("location:/crud_operation/index.php");
      exit;
    }
    $ROLL = $row['Roll'];
    $NAME = $row['Name'];
  $SESSION = $row['Session'];
  $CURRENT_YEAR = $row['Current_Year'];
  $SEMESTER = $row['Semester'];

  }
  else
  {
    $SL_ID = $_POST['SL_ID'];
    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $session = $_POST['session'];
    $current_year = $_POST['current_year'];
    $semester = $_POST['semester'];

    $s = "UPDATE students SET Roll='$roll', Name ='$name', Session='$session', Current_Year='$current_year', Semester='$semester'  WHERE SL_ID = $SL_ID ";
    $result = $conn->query($s);
    if(!$result)
    {
      $data = "Data update failed";
    }
    else
    {
      $data = "Data updated Successfully";
      header("location:/crud_operation/index.php");
      exit;
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
          <a class="nav-link text-white" href="#">Add New</a>
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
<h1 class="text-white text-center">Update Member</h1>
    </div><br>
    <?php if(isset($data)){echo $data;} ?>
    <input type="hidden" name="SL_ID" value=" <?php echo $SL_ID; ?> " class="form-control"> <br>

    <label for="roll">Roll:</label>
    <input type="text" name="roll" value="<?php echo $ROLL; ?>" class="form-control"><br>

    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $NAME; ?>" class="form-control"><br>

    <label for="session">Session:</label>
    <input type="text" name="session" value="<?php echo $SESSION; ?>" class="form-control"><br>

    <label for="current_year">Current Year:</label>
    <input type="text" name="current_year" value="<?php echo $CURRENT_YEAR; ?>" class="form-control"><br>

    <label for="semester">Semester:</label>
    <input type="text" name="semester" value="<?php echo $SEMESTER; ?>" class="form-control"><br>

    <button type="submit" name="submit" class="btn btn-success">Update</button><br>
    <a class="btn btn-info" type="submit"  href="index.php" name="cancel">Cancel</a>
  </div>
 </form>

</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>