<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    
    <link rel="stylesheet" type="text/css" href="View/CSS/style.css">
    <link rel="stylesheet" type="text/css" href="View/CSS/medias.css">
    <link rel="stylesheet" type="text/css" href="View/CSS/specials.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Pinstripe&display=swap" rel="stylesheet">


    <script src="http://localhost:8888/connect4/js/script.js"></script>
    

</head>
<body>

    <header class="glassEffect">
        <nav class="navbar">
            
            <?php if (isset($_SESSION['connected'])): ?>
                <a href="stats.php">Classement</a>
                <form id="formDisconnect" action="" method="POST">
                    <button type="submit" name="deconnexion" >Se déconnecter
                    </button>
                </form>
      
            <?php else : ?>  
                <!-- <a href="index.php">Connect4</a> -->
                <a href="./register.php">S'enregistrer</a>
                <a href="./login.php">Se connecter</a>   
            <?php endif ?>
        </nav>
    </header>
   
    <main>
<!-- Les deux personnages -->
    <div id="spirit1">
      <img src="./Media/spirit1.png">
    </div>
    <div id="spirit2">
    <img src="./Media/spirit2.png">
    </div>
    
    <?= /* Récupération du contenu gamescreen.php */
    $content
    ?>

    </main>
    

    <footer>CONNECT4 - By Aurelily </footer>
    
</body>
</html>