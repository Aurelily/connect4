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
  let winner = false;

  function testVictoryH(array, player) {
    arrayVictory = [];
    for (let i = 0; i < array.length; i++) {
      if (array[i] == array[i + 1] - 10) {
        arrayVictory.push(array[i]);
        console.log("arrayVictory : " + arrayVictory);
        if (arrayVictory.length == 3) {
          console.log(player + "you win!");
          winner = true;
        }
      }
    }
  }

  columns.forEach((column) => {
    column.addEventListener("click", (event) => {
      /*  console.log(column.id); */
      const squares = column.querySelectorAll(".gameCol div");
      const squaresLength = squares.length;

      // Je parcours le tableau de div depuis la fin jusqu'à ce que je tombe sur un vide
      for (let i = squaresLength - 1; i >= 0; i--) {
        //Si le div rencontré est vide
        if (squares[i].innerHTML == "") {
          //Je crée un élément Jeton
          let jeton = document.createElement("p");
          squares[i].appendChild(jeton);

          //Si Player 1
          if (player == 1) {
            //Je crée un Jeton1
            jeton.removeAttribute("class");
            jeton.setAttribute("class", "jeton1");

            //J'incrémente les moves du P1 et j'affiche le résultat
            movesP1++;
            spanMovesP1.innerText = movesP1;

            //Je push Les coordonnées xy dans le tableau du P1
            arrayP1.push(column.id + squares[i].id.substring(2));
            arrayP1.sort();

            //Je teste la victoire horizontale
            testVictoryH(arrayP1, "Player 1 : ");

            if (winner == true) {
              break;
            }

            //Je switch sur le player 2
            player = 2;
            console.log(arrayP1);

            //Si Player 2
          } else if (player == 2) {
            //Je crée un Jeton2
            jeton.removeAttribute("class");
            jeton.setAttribute("class", "jeton2");

            //J'incrémente les moves du P2 et j'affiche le résultat
            movesP2++;
            spanMovesP2.innerText = movesP2;

            player = 1;
            /* console.log(player); */
          }

          /* console.log(squares[i].id.substring(2)); */
          break;
        }
      }
    });
  });
});
