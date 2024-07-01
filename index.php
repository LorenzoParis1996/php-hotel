<?php 

require_once __DIR__ . "/hotels.php";


$filterHotel = $hotels;


if(isset($_GET["parking"])) {
    $parking = $_GET["parking"];

    if ($parking == true) {
        $parkingAvailable =[];
        foreach($filterHotel as $hotel) {
          if ($hotel["parking"] === true) {
             $parkingAvailable[] = $hotel;
          }
        }

        $filterHotel = $parkingAvailable;
    } 
}

if(isset($_GET["vote"])) {
    $vote = $_GET["vote"];

    if ($vote >= 1 && $vote <= 5) {
        $rating = [];

        foreach($filterHotel as $hotel) {
            if ($hotel["vote"] >= $vote) {
                $rating[] = $hotel;
            }
        }

        $filterHotel = $rating;
    }

    
}




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

<div class="container">
<section>
    <form action="./index.php" method="GET" class="p-3">
        <div>
        <input type="checkbox" name="parking" id="parking" value="true">Hotels with parking
        <input type="number" name="vote" id="vote" min="1" max="5">Rating
        <button type="submit">Filter</button>
        <button type="submit">Reset filter</button>
        </div>
        
    </form>
</section>

<section>
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
     <?php foreach($filterHotel as  $hotel) { ?>
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
</div>
</body>
</html>