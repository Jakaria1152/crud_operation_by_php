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
    <a class="navbar-brand text-white" href="index.php">Student CRUD app</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a type="button" class="nav-link text-white btn btn-primary" href="create.php" style="background-color: blue; color: white;">Add New</a>
        </li>
      
      </ul>
    </div>
  </div>
</nav>

<table class="table container mt-3 p-2 text-center">
  <thead>
    <tr>
      <th >SL_ID</th>
      <th >Roll</th>
      <th>Name</th>
      <th>Session</th>
      <th>Current Year</th>
      <th>Semester</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "connection.php";
    $sql = "select *from students";
    $result = $conn->query($sql);
    if(!$result)
    {
      die('Invalid Query');
    }
    while($row = $result->fetch_assoc())
    { 
      echo"
    <tr>
      <th >  $row[SL_ID] </th>
      <td > $row[Roll]</td>
      <td > $row[Name]</td>
      <td > $row[Session]</td>
      <td> $row[Current_Year] </td>
      <td> $row[Semester] </td>
  
      <td>
   <a class='btn btn-success' href='edit.php?id=$row[SL_ID]'>Edit</a>
   <a class='btn btn-warning' href='delete.php?id=$row[SL_ID]&&name=$row[Name]'>Delete</a>
      </td>
    </tr>
    ";
    }
  ?>
  </tbody>
</table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>