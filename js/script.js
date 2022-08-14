document.addEventListener("DOMContentLoaded", (event) => {
  console.log("loaded");

  const columns = document.querySelectorAll(".gameCol");
  const inputMovesP1 = document.getElementById("movesP1");
  const inputMovesP2 = document.getElementById("movesP2");

  let player = 1;
  let movesP1 = 0;
  let movesP2 = 0;
  let arrayP1 = [];
  let arrayP2 = [];
  let winner = "";

  //FONCTION QUI DECLENCHE LA MODAL DE FIN DE PARTIE
  //----------------------------------------------
  function modalEnd(winner, creator) {
    // Je cible la modal
    var modal = document.getElementById("myModal");
    // La modal s'affiche au lancement de la fonction
    modal.style.display = "block";
    // Je cible le span qui contient le gagnant et je l'affiche dedans
    var modalInputWinner = document.getElementById("winner");
    var modalInputCreatorWin = document.getElementById("creatorWin");
    modalInputWinner.value = winner;
    //Si le gagnant est le joueur 1 createur de la partie
    if (creator == "Joueur 1") {
      console.log("GAGNE CREATOR");
      modalInputCreatorWin.value = "WIN";
    } else {
      modalInputCreatorWin.value = "LOOSE";
      console.log("PERDU CREATOR");
    }
  }

  //FONCTION QUI TESTE LES VICTOIRES DIAGONALES
  //---------------------------------------------
  function testVictoryDiag(array, player) {
    let limit = array.length;
    //Pour chaque élément nombre (n) du tableau arrayP1 ou P2... auquel correspond une dizaine d et une unité u
    array.map((n) => {
      //Je récupère la dizaine et l'unité du nombre n
      let diz = Math.floor(n / 10);
      let unit = n - Math.floor(n / 10) * 10;
      //Je parcours tous le tableau pour voir si il y a une autre dizaine qui se suit : diz + 1 et unit + ou - 1
      for (let i = 0; i < limit; i++) {
        //Je récupère les dizaines et unité de chaque autre nombre
        let diz2 = Math.floor(array[i] / 10);
        let unit2 = array[i] - Math.floor(array[i] / 10) * 10;
        if (
          (diz2 == diz - 1 && unit2 == unit + 1) ||
          (diz2 == diz - 1 && unit2 == unit - 1)
        ) {
          //Si oui je cherche la troisième
          for (let j = 0; j < limit; j++) {
            let diz3 = Math.floor(array[j] / 10);
            let unit3 = array[j] - Math.floor(array[j] / 10) * 10;
            if (
              (diz3 == diz - 2 && unit3 == unit + 2) ||
              (diz3 == diz - 2 && unit3 == unit - 2)
            ) {
              //Si oui je cherche la quatrieme
              for (let k = 0; k < limit; k++) {
                let diz4 = Math.floor(array[k] / 10);
                let unit4 = array[k] - Math.floor(array[k] / 10) * 10;
                if (
                  (diz4 == diz - 3 && unit4 == unit + 3) ||
                  (diz4 == diz - 3 && unit4 == unit - 3)
                ) {
                  //Si oui c'est la victoire
                  console.log("You Win " + player);
                  winner = player;
                  modalEnd(winner, player);
                }
              }
            }
          }
        }
      }
    });
  }

  //FONCTION QUI TESTE LES VICTOIRES HORIZONTALES ET VERTICALES
  //-------------------------------------------------------------
  function testVictoryHandV(array, player) {
    let limit = array.length;

    //Pour chaque élément nombre (x) du tableau arrayP1 ou P2...
    array.map((x) => {
      for (let i = 0; i < limit; i++) {
        //TEST HORIZONTALE
        //-----------------------
        //Je parcours tous le tableau pour voir si il y a un second nombre qui serait égal à ce nombre + 10
        if (x == array[i] - 10) {
          //Si oui, je parcours de nouveau tous le tableau pour voir si il y a un troisième nombre qui serait égal à ce nombre + 20
          for (let j = 0; j < limit; j++) {
            if (x == array[j] - 20) {
              //Si oui, je parcours de nouveau tous le tableau pour voir si il y a un quatrième nombre qui serait égal à ce nombre + 30
              for (let k = 0; k < limit; k++) {
                if (x == array[k] - 30) {
                  //Si oui, c'est la victoire
                  console.log("You Win " + player);
                  winner = player;
                  modalEnd(winner, player);
                }
              }
            }
          }
          //OU ALORS TEST VERTICALE
          //-----------------------
          //Ou bien si il y a un second nombre qui serait égal à ce nombre + 1
        } else if (x == array[i] - 1) {
          //Je parcours tous le tableau pour voir si il y a un second nombre qui serait égal à ce nombre + 2
          for (let l = 0; l < limit; l++) {
            if (x == array[l] - 2) {
              //Si oui je parcours tous le tableau pour voir si il y a un second nombre qui serait égal à ce nombre + 3
              for (let m = 0; m < limit; m++) {
                if (x == array[m] - 3) {
                  //Si oui, c'est la victoire
                  console.log("You Win " + player);
                  winner = player;
                  modalEnd(winner, player);
                }
              }
            }
          }
        }
      }
    });
  }

  //-------------------------------------------------------------
  //CODE PRINCIPAL
  //-------------------------------------------------------------
  columns.forEach((column) => {
    column.addEventListener("click", (event) => {
      const squares = column.querySelectorAll(".gameCol div");
      const squaresLength = squares.length;

      // Je parcours le tableau de div depuis la fin jusqu'à ce que je tombe sur un vide
      for (let i = squaresLength - 1; i >= 0; i--) {
        //Si le div rencontré est vide
        if (squares[i].innerHTML == "") {
          //Je crée un élément Jeton
          let jeton = document.createElement("p");
          squares[i].appendChild(jeton);

          //Je récupère les coordonnées de la case (attention ce sont des strings)
          let yCoord = column.id;
          let xCoord = squares[i].id.substring(2);

          //Si Player 1
          if (player == 1) {
            //Je crée un Jeton1
            jeton.removeAttribute("class");
            jeton.setAttribute("class", "jeton1");

            //J'incrémente les moves du P1 et j'affiche le résultat
            movesP1++;
            inputMovesP1.value = movesP1;

            //Je push Les coordonnées xy dans le tableau du P1, je les transforme en nombres entiers et les tri par ordre décroissants
            arrayP1.push(parseInt(yCoord + xCoord));
            arrayP1.sort();

            //Je teste la victoire verticale ou horizontale
            testVictoryHandV(arrayP1, "Joueur 1");
            //Je teste la victoire diagonale
            testVictoryDiag(arrayP1, "Joueur 1");

            //Je switch sur le player 2
            player = 2;
            console.log("arrayP1 : " + arrayP1);

            //Si Player 2
          } else if (player == 2) {
            //Je crée un Jeton2
            jeton.removeAttribute("class");
            jeton.setAttribute("class", "jeton2");

            //J'incrémente les moves du P2 et j'affiche le résultat
            movesP2++;
            inputMovesP2.value = movesP2;

            //Je push Les coordonnées xy dans le tableau du P2 et je les transforme en nombres entiers
            arrayP2.push(parseInt(yCoord + xCoord));
            arrayP2.sort();

            //Je teste la victoire verticale ou horizontale
            testVictoryHandV(arrayP2, "Joueur 2");
            //Je teste la victoire diagonale
            testVictoryDiag(arrayP2, "Joueur 2");

            //Je switch sur le player 1
            player = 1;
          }

          break;
        }
      }
    });
  });
});
