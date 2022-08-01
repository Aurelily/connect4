<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="View/CSS/style.css">
    <script src="http://localhost:8888/connect4/js/script.js"></script>
</head>
<body>

    <header>
        <nav class="navbar">
            <a href="index.php">Puissance 4</a>
            <?php if (isset($_SESSION['connected']) && !isset($_SESSION['inGame'])): ?>
                <form method="POST">
                    <button type="submit" name="submit_game" >Créer une partie
                    </button>
                </form>
                <form method="POST">
                    <button type="submit" name="deconnexion" >Disconnect
                    </button>
                </form>
            <?php elseif (isset($_SESSION['connected']) && isset($_SESSION['inGame'])) : ?> 
                <form method="POST">
                    <button type="submit" name="deconnexion" >Disconnect
                    </button>
                </form> 
            <?php else : ?>  
                <a href="./register.php">S'enregistrer</a>
                <a href="./login.php">Se connecter</a>   
            <?php endif ?>
        </nav>
    </header>
   
    <main>

    <?php require_once('View/error.php')?>
    
    <?= /* Récupération du contenu gamescreen.php */
    $content
    ?>

    </main>
    

    <footer>Puissance 4 By Lily </footer>
    
</body>
</html>