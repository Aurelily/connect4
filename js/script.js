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
  let arrayVictoryDiag = [
    [14, 23, 32, 41],
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
    [13, 24, 35, 46],
  ];
  let winner = "";

  //FONCTION QUI DECLANCHE LA MODAL DE FIN DE PARTIE
  //----------------------------------------------
  function modalEnd(winner) {
    var modal = document.getElementById("myModal");
    var modalContent = document.querySelector(".modal-content");
    modal.style.display = "block";
    var modalSpanWinner = document.getElementById("winner");
    modalSpanWinner.textContent = winner;
  }

  //FONCTION QUI TESTE LES VICTOIRES DIAGONALES (Sans tableau en dur)
  //------------------------------------------------------------------
  function testVictoryDiag(array, xCoord, yCoord, player) {
    let limit = array.length;
    //Pour chaque élément nombre (x) du tableau arrayP1 ou P2... auquel correspond un chiffre y et un chiffre x
    array.map((x) => {
      //Je parcours tous le tableau pour voir si il y a un autre chiffre y + 1
      for (let i = 0; i < limit; i++) {}
    });
  }

  //FONCTION QUI TESTE LES VICTOIRES HORIZONTALES ET VERTICALES
  //-------------------------------------------------------------
  function testVictoryHandV(array, player) {
    let limit = array.length;

    //Pour chaque élément nombre (x) du tableau arrayP1 ou P2...
    array.map((x) => {
      for (let i = 0; i < limit; i++) {
        //TEST VICTOIRE HORIZONTALE
        //-----------------------
        //Je parcours tous le tableau pour voir si il y a un second nombre qui serait égal à ce nombre + 10
        if (x == array[i] - 10) {
          //Si oui, je parcours de nouveau tous le tableau pour voir si il y a un second nombre qui serait égal à ce nombre + 20
          for (let j = 0; j < limit; j++) {
            if (x == array[j] - 20) {
              //Si oui, je parcours de nouveau tous le tableau pour voir si il y a un second nombre qui serait égal à ce nombre + 30
              for (let k = 0; k < limit; k++) {
                if (x == array[k] - 30) {
                  //Si oui, c'est la victoire
                  console.log("You Win " + player);
                  winner = player;
                  modalEnd(winner);
                }
              }
            }
          }
          //TEST VICTOIRE VERTICALE
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
                  modalEnd(winner);
                }
              }
            }
          }
        }
      }
    });
  }

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
            spanMovesP1.innerText = movesP1;

            //Je push Les coordonnées xy dans le tableau du P1, je les transforme en nombres entiers et les tri par ordre décroissants
            arrayP1.push(parseInt(yCoord + xCoord));
            arrayP1.sort();

            //Je teste la victoire horizontale
            testVictoryHandV(arrayP1, "Player 1");

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
            spanMovesP2.innerText = movesP2;

            //Je push Les coordonnées xy dans le tableau du P2 et je les transforme en nombres entiers
            arrayP2.push(parseInt(yCoord + xCoord));
            arrayP2.sort();

            //Je teste la victoire horizontale
            testVictoryHandV(arrayP2, "Player 2");

            //Je switch sur le player 1
            player = 1;
          }

          break;
        }
      }
    });
  });
});
