<?php 

require_once __DIR__ . "/hotels.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
<section class="w-50">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Parking</th>
      <th scope="col">Vote</th>
      <th scope="col">Distance to center</th>
    </tr>
  </thead>
  <tbody>
     <?php foreach($hotels as $hotel) { ?>
        <tr>
            <td scope="row"><?php echo $hotel["name"]?></td>
            <td scope="row"><?php echo $hotel["description"]?></td>
            <td scope="row"><?php if ($hotel["parking"] == true) {echo "available";} else {echo "not available";}?></td>
            <td scope="row"><?php echo $hotel["vote"]?> stars</td>
            <td scope="row"><?php echo $hotel["distance_to_center"]?> km</td>
        </tr>
      <?php } ?>  
  </tbody>
</table>
</section>
</body>
</html>