/*
PSEUDO CODE : Ma reflexion
-----------------------------
- Je cible chaque div colonne
- Au clic sur chaque colonne, je récupère l'id de chacune des colonnes
- Au clic sur la colonne : je parcours tous les div de la colonne à partir de la fin (tableau : squares)
- Si un des éléments (squares[i]) est vide, je crée dedans un élément <p></p> "jeton" et j'arrête l'execution de la boucle (break)
- Au clic je récupère aussi l'id de l'élément div que je rempli

- Je crée une variable "player" qui contiendra un entier 1 ou 2 en fonction du joueur dont c'est le tour
- Si "player" == 1 "c'est la class "jeton1" qui sera attribuée à l'élément jeton, si "player" == 1  c'est "jeton2"
- ATTENTION : une class doit être supprimée pour être recréer ou remplacée par une autre (removeAttribute)

- Je fais aussi deux variable : "movesP1" et "movesP2" qui vont compter les moves de chaque joueur
- Je les incrémente à chaque coup de chaque joueur
- Je cible les 2 éléments <span></span> de ma page qui doivent afficher les deux nombres de moves et j'insère le résultat de chaque variable

TESTER LA VICTOIRE : 4 jetons de la même couleurs alignés horizontalement / verticalement / diagonale
------------------------------------------------------------------------------------------------------

- Je pense faire 2 tableaux : 1 pour le P1 et un autre pour le P2
- A chaque coup je vais remplir ces tableaux avec les coordonnées (x, y) des cases
- Pour avoir ces coordonnées j'ai de disponible :
  * L'id (y) de chaque colonne 
  * L'id (x) de chaque div qui est représentée comme ceci : y_x (je récupère seulement le x avec substring(2) 2 étant l'index ds la string)
- idée 1 : arrayP1x = [les x du P1] ...
    *Chacun des tableaux seraient trié par ordre croissant pour tester si les nombres se suivent si besoin (avec sort() à chaque click)
- idée 2 : arrayP1 = [paire de chiffres corrdonnées : ex. : 26 pour x=2 et y=6]. (trié également)
    * Il faudrait donc pour les victoires diagonales les mettre à la main dans un tableau.




CONDITIONS DE VICTOIRE POUR UN PLAYER: 
---------------------------------------
- verticale : 
    * 4 nombres xy consécutifs : n / n+1 / n+1+1 / n+1+1+1
             
- horizontale :
    * 4 nombres xy consécutifs : n / n+10 / n+10+10 / n+10+10+10
    
- diagonale :
    [[14, 23, 32, 41],
    [15, 24, 33, 42],
    [24, 33, 42, 51],
    [16, 25, 34, 43],
    [25, 34, 43, 52],
    [34, 43, 52, 61],
    [26, 35, 44, 53],
    [35, 44, 53, 62],
    [44, 53, 62, 71],
    [36, 45, 54, 63],
    [45, 54, 63, 72],
    [46, 55, 64, 73],
    [41, 52, 63, 74],
    [31, 42, 53, 64],
    [42, 53, 64, 75],
    [21, 32, 43, 54],
    [32, 43, 54, 65],
    [43, 54, 65, 76],
    [11, 22, 33, 44],
    [22, 33, 44, 55],
    [33, 44, 55, 66],
    [12, 23, 34, 45],
    [23, 34, 45, 56],
    [13, 24, 35, 46]]

*/

document.addEventListener("DOMContentLoaded", (event) => {
  console.log("loaded");

  const columns = document.querySelectorAll(".gameCol");
  const spanMovesP1 = document.getElementById("movesP1");
  const spanMovesP2 = document.getElementById("movesP2");

  let player = 1;
  let movesP1 = 0;
  let movesP2 = 0;
  let arrayP1 = [];
  let arrayP2 = [];

  columns.forEach((column) => {
    column.addEventListener("click", (event) => {
      console.log(column.id);
      const squares = column.querySelectorAll(".gameCol div");
      const squaresLength = squares.length;

      for (let i = squaresLength - 1; i >= 0; i--) {
        if (squares[i].innerHTML == "") {
          let jeton = document.createElement("p");
          squares[i].appendChild(jeton);
          if (player == 1) {
            jeton.removeAttribute("class");
            jeton.setAttribute("class", "jeton1");
            movesP1++;
            spanMovesP1.innerText = movesP1;
            arrayP1.push(column.id + squares[i].id.substring(2));
            arrayP1.sort();
            player = 2;
            console.log(arrayP1);
          } else if (player == 2) {
            jeton.removeAttribute("class");
            jeton.setAttribute("class", "jeton2");
            movesP2++;
            spanMovesP2.innerText = movesP2;
            player = 1;
            /* console.log(player); */
          }

          console.log(squares[i].id.substring(2));
          break;
        }
      }
    });
  });
});
