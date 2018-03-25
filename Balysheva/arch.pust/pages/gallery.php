<?php
    require "../includes/config.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Gallery</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $config['title']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js"></script>
    <script src="../js/imageloaded.js"></script>
    <script src="../js/common.js"></script>
</head>

<body>
    <div> 
        <?php 
        include "../includes/navbar.php";
        ?>
    </div>

    <div id="gallery">
       
       <?php
        
        $cards = mysqli_query($connection, "SELECT * FROM `cards`");
        
        ?>
       <?php
        while($card = mysqli_fetch_assoc($cards)){
            
           ?>
           
           <div class="item-masonry sizer4">
            <img src="../static/img/<?php echo $card['img'];?>" alt="">
            <div class="cover-item-gallery">
                <a href="../pages/project.php?id=<?php echo $card['id_card']; ?>">
	        		<i class="fa fa-eye fa-2x"></i>
	        	</a>
            </div>
        </div>
          
           <?php 
        }
        ?>
        
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
