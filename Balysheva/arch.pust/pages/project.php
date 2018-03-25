<?php
    require "../includes/config.php";
?>
<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $config['title']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>

    <div>
        <?php 
        include "../includes/navbar.php";
        ?>
    </div>
<?php 
    $project = mysqli_query($connection, "SELECT * FROM `projects` WHERE `id_pr` = ". (int) $_GET['id']);
    
    if(mysqli_num_rows($project) <= 0){
        ?>
        <h1>Проект не найден</h1>
        <?php
    } else {
        $pr = mysqli_fetch_assoc($project)
        ?>
        <div class="container-fluid p-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0">
                </li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1">
                </li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2">
                </li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../static/slider/<?php echo $pr['img1'];?>" alt="" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../static/slider/<?php echo $pr['img2'];?>" alt="" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../static/slider/<?php echo $pr['img3'];?>" alt="" class="d-block w-100">
                </div>
            </div>
            <a href="#carouselExampleIndicators" class="carousel-control-prev" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previus</span>
        </a>
            <a href="#carouselExampleIndicators" class="carousel-control-next" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
    <div>
        <h4><?php echo $pr['name'];?></h4>
        <h5><?php echo $pr['descr'];?></h5>
    </div>
        <?php
    }
    
    ?>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>








</html>
