

<?php

$con = mysqli_connect('localhost', 'root', '', 'akms');

?>


<!DOCTYPE html>
<html>
<head>
        <title></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=josefin+Sans&display=Swap" rel="stylesheet">

</head>
<body>
<?php include('navbar.php');  ?>
<?php include('message1.php');  ?>

<section class="my-3">
    <div class="py-3">
        <h2 class="text-center"> Video Gallery</h2>
</div>
<div class="video">
 <?php

    $sql = "SELECT * from video";
    $res = mysqli_query($con, $sql);

    while($row = mysqli_fetch_assoc($res)){
       $data = $row['youtube_link'];
    
       $final = str_replace('watch?v=', 'embed/', $data);
        echo "
         
        <iframe
           src='$final'
           frameborder='0'
           allow='autoplay; encrypted-media'
           allowfullscreen>
           </iframe>

             ";
    }


?>



</div>

</section>

</body>

<?php include('includes/footer.php'); ?>