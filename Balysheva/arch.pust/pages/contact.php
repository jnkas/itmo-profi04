<?php
    require "../includes/config.php";
?>
    <!DOCTYPE html>
    <html lang="eng">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            <?php echo $config['title']; ?>
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/bgswitch.css">

    </head>

    <body>
        <div>
            <?php 
        include "../includes/navbar.php";
        ?>
        </div>
        <div class="contact">
            <?php echo $config['contacts']['name']; ?> <br>
            <?php echo $config['contacts']['street']; ?> <br>
            <?php echo $config['contacts']['city']; ?> <br>
            <?php echo $config['contacts']['country']; ?>
            <hr>
            <?php echo $config['contacts']['phone']; ?> <br>
            <?php echo $config['contacts']['mail']; ?>
            <hr>
            <a href="<?php echo $config[contacts]['fb_url']; ?>"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
            <a href="<?php echo $config[contacts]['insta_url']; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="<?php echo $config[contacts]['vk_url']; ?>"><i class="fa fa-vk" aria-hidden="true"></i></a>
        </div>
    </body>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    </html>
