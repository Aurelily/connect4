<?php $title="game" ?>
<?php session_start(); ?>
<?php require_once('Model/User.php');?>
<?php require_once('Controller/userController.php');?>
<?php require_once('Model/Game.php');?>
<?php require_once('Controller/gameController.php');?>



<?php ob_start(); /*  Début stockage mémoire tampon */ ?> 

<?php $login = $_SESSION['login'];  var_dump($_SESSION); ?> 


<!-- Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
    <h1>Vous avez gagné <span id="winner"></span></h1>
    <p>Joueur 1 rouge : <?= $login ?> / Nb de moves : <span id="movesP1"></span></p>
    <p>Joueur 2 jaune / Nb de moves : <span id="movesP2"></span></p>
    <form method="POST">
        <button type="submit" name="submit_save_game" >Nouvelle partie</button>
    </form>
    </div>    

</div>


<div class="game-container">
    <div class="gameCol" id="1">
        <div id="1_1"></div>
        <div id="1_2"></div>
        <div id="1_3"></div>
        <div id="1_4"></div>
        <div id="1_5"></div>
        <div id="1_6"></div>
    </div>
    <div class="gameCol" id="2">
        <div id="2_1"></div>
        <div id="2_2"></div>
        <div id="2_3"></div>
        <div id="2_4"></div>
        <div id="2_5"></div>
        <div id="2_6"></div>
    </div>
    <div class="gameCol" id="3">
        <div id="3_1"></div>
        <div id="3_2"></div>
        <div id="3_3"></div>
        <div id="3_4"></div>
        <div id="3_5"></div>
        <div id="3_6"></div>
    </div>
    <div class="gameCol" id="4">
        <div id="4_1"></div>
        <div id="4_2"></div>
        <div id="4_3"></div>
        <div id="4_4"></div>
        <div id="4_5"></div>
        <div id="4_6"></div>
    </div>
    <div class="gameCol" id="5">
        <div id="5_1"></div>
        <div id="5_2"></div>
        <div id="5_3"></div>
        <div id="5_4"></div>
        <div id="5_5"></div>
        <div id="5_6"></div>
    </div>
    <div class="gameCol" id="6">
        <div id="6_1"></div>
        <div id="6_2"></div>
        <div id="6_3"></div>
        <div id="6_4"></div>
        <div id="6_5"></div>
        <div id="6_6"></div>
    </div>
    <div class="gameCol" id="7">
        <div id="7_1"></div>
        <div id="7_2"></div>
        <div id="7_3"></div>
        <div id="7_4"></div>
        <div id="7_5"></div>
        <div id="7_6"></div>
    </div>
</div>

<?php $content = ob_get_clean(); /* Stockage en mémoire tampon dans la variable $content du contenu html entre les deux balises */ ?>

<?php require_once ('View/layout.php')?>