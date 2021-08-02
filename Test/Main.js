/*
GAME RULES:

- The game has 2 players, playing in rounds
- In each turn, a player rolls a dice as many times as he whishes. Each result get added to his ROUND score
- BUT, if the player rolls a 1, all his ROUND score gets lost. After that, it's the next player's turn
- The player can choose to 'Hold', which means that his ROUND score gets added to his GLBAL score. After that, it's the next player's turn
- The first player to reach 100 points on GLOBAL score wins the game

*/

var scores, roundScore, activePlayer, gamePlaying, winScore

init()

document.querySelector('.btn-score').addEventListener('click', function() {
  winScore = document.querySelector(".input-box").value 
  parseInt(winScore)
})




document.querySelector('.btn-roll').addEventListener('click', function() {
  if(gamePlaying) {
      //Random Number
    var dice = Math.floor(Math.random() * 6) + 1
    var dice2 = Math.floor(Math.random() * 6) + 1
    console.log(dice2)

    //Display Results
    var diceDom = document.querySelector('.dice')
    var diceDom2 = document.querySelector('.dice-2')

    diceDom.style.display = 'block'
    diceDom.src = 'dice-' + dice + ".png"

    diceDom2.style.display = 'block'
    diceDom2.src = 'dice-' + dice2 + ".png"

    // Update score IF the rolled number was NOT a 1
    if (dice !== 1 && dice2 !== 1){
      //Add Score
      roundScore += (dice + dice2)
      
      document.querySelector("#current-" + activePlayer).textContent = roundScore
    } else {
      //Next Player
      nextPlayer()
    }

    
      var prevDice = null
        if (dice == 6 && prevDice == 6){
          scores[activePlayer] = 0
        } 
        prevDice = dice
      
  }
}) 


document.querySelector('.btn-hold').addEventListener('click', function() {
  if (gamePlaying){
      // Add current score to global Score
    scores[activePlayer] += roundScore

    // Update the UI
    document.querySelector('#score-' + activePlayer).textContent = scores[activePlayer]


    //check if player won the game 
    if (scores[activePlayer] >= winScore) {
      document.querySelector('#name-' + activePlayer).textContent = "WINNER!"
      document.querySelector('.dice').style.display = 'none'
      document.querySelector('.dice-2').style.display = 'none'
      document.querySelector('.player-' + activePlayer + '-panel').classList.add('winner');
      document.querySelector('.player-' + activePlayer + '-panel').classList.remove('active')
      gamePlaying = false
    } else {
      nextPlayer()
      //Next player
    }
  }
})

function nextPlayer() {
   //Next Player
   activePlayer === 0 ? activePlayer = 1 : activePlayer = 0
   roundScore = 0

   document.getElementById('current-0').textContent = '0'
   document.getElementById('current-1').textContent = '0'

   document.querySelector('.player-0-panel').classList.toggle('active')
   document.querySelector('.player-1-panel').classList.toggle('active')

   document.querySelector('.dice').style.display = 'none' 
   document.querySelector('.dice-2').style.display = 'none' 
}

document.querySelector('.btn-new').addEventListener('click', init);

function init() {
  scores = [0, 0]
  activePlayer = 0
  roundScore = 0
  gamePlaying = true

  document.querySelector('.dice').style.display = 'none'
  document.querySelector('.dice-2').style.display = 'none'

  document.getElementById('score-0').textContent = '0'
  document.getElementById('score-1').textContent = '0'
  document.getElementById('current-0').textContent = '0'
  document.getElementById('current-1').textContent = '0'
  document.querySelector('#name-0').textContent = "Player 1"
  document.querySelector('#name-1').textContent = "Player 2"
  document.querySelector('.player-0-panel').classList.remove('winner');
  document.querySelector('.player-1-panel').classList.remove('winner');
  document.querySelector('.player-0-panel').classList.remove('active');
  document.querySelector('.player-1-panel').classList.remove('active');
  document.querySelector('.player-0-panel').classList.add('active');
  
}




// document.querySelector("#current-" + activePlayer).innerHTML ='<em>' + dice + '</em>'
// var x = document.querySelector('#score-0').textContent















// Steel 41' spray built in 1983 in the US Mariana islands. Restoration 50% complete, bottom job done, grinded down to steel, then 3 coats of primer and 2 coats of bottom paint.  engine is a perkins 4-108 needs starter but its not frozen. have spare fuel filters, oil, etc. Also comes with a 25hp mercury outboard on a bracket.    interior needs finishing, and hemp canvas mainsail needs a patch.  boat is on a mooring ball in gulfport, florida.  SERIOUS BUYERS ONLY


// 44ft (38ft hull and 6ft bowsprit) wooden gaff cutter built in 1982 by a famous boat builder in Mississippi. Modeled after joshua slocum's Spray which he sailed around the world solo in 1893. The construction is juniper planks on cypress frames. This boat is built VERY stout, frames are solid wood, over 6 inches thick and free of any rot. the hull is very thick, 1.5 inches and there is no rot on the planks, under the water line and above. she is a solid boat. Some areas topside were replanked and all woodwork on the hull is complete, except for a few small spots on the top of the transom. the bottom job is 90% complete, and could use another coat of bottom paint. she's already been coated once. The boat was launched last week to allow the planks to swell, and then hauled back out so the caulking can be tightened. The engine is a 21hp sabb diesel that starts and runs well. has adjustable pitch propeller, internally cooled so no raw water intake. interior and decks need refinishing, but there is no rot on the inside. deck is fiberglass so no rot to worry about there. reason for selling is I got a bigger boat and no time for this one. has all sails and running rigging. bimini and dodger text me with offers 