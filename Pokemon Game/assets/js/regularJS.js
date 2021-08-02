// States
var gameState = {
  UserPokemon: '',
  rivalPokemon: '',
  pokemonDB =[
    {
      name: 'charmander',
      type: 'water',
      hp: 39,
      attack: 52,
      defence: 43,
      level: 1,
      img: 'http://www.smogon.com/dex/media/sprites/xy/charmander.gif'
    },
    {
      name: 'bulbasaur',
      type: 'grass',
      hp: 45,
      attack: 49,
      defence: 49,
      level: 1,
      img: 'http://www.smogon.com/dex/media/sprites/xy/bulbasaur.gif'
    },
    {
      name: 'squirtle',
      type: 'water',
      hp: 44,
      attack: 48,
      defence: 65,
      level: 1,
      img: 'http://www.smogon.com/dex/media/sprites/xy/squirtle.gif'
    },
  ],

  elements: {
    pokemonsEl: document.querySelector('.select-screen').querySelectorAll('.character'),
    battleScreenEl: document.getElementById('battle-screen'),
    attackBtnEl: document.getElementById('battle-screen').querySelectorAll('.attack')
  },

  init: function () {
    // Initial loop
    var i = 0
    while (i < gameState.elements.pokemonsEl.length) {
      // Select screen character functions
      gameState.elements.pokemonsEl[i].onclick = function () {
        // current selected pokemon name
        var pokemonName = this.dataset.pokemon
        // IMG elements
        var player1Img = document.querySelector('.player1').getElementsByTagName('img')
        console.log(gameState)
        var player2Img = document.querySelector('.player2').getElementsByTagName('img')
        console.log(gameState)

        // save current pokemon
        gameState.userPokemon = pokemonName

        // CPU pics pokemon
        gameState.cpuPick()
        // change screen to battle screen
        gameState.elements.battleScreenEl.classList.toggle('active')

        // select data from current user pokemon
        gameState.currentPokemon = gameState.pokemonDB.filter(function (pokemon) {
          return pokemon.name == gameState.userPokemon
        })
        player1Img[0].src = gameState.currentPokemon[0].img

        // select data from current CPU pokemon
        gameState.currentRivalPokemon = gameState.pokemonDB.filter(function (pokemon) {
          return pokemon.name == gameState.rivalPokemon
        })
        player2Img[0].src = gameState.currentRivalPokemon[0].img

        // current user and CPU pokemon init health
        gameState.currentPokemon[0].health = gameState.calculateInitialHealth(gameState.currentPokemon)
        gameState.currentPokemon[0].health.originalHealth = gameState.calculateInitialHealth(gameState.currentPokemon)
        gameState.currentRivalPokemon[0].health = gameState.calculateInitialHealth(gameState.currentRivalPokemon)
        gameState.currentRivalPokemon[0].originalHealth = gameState.calculateInitialHealth(gameState.currentRivalPokemon)
      }
      i++
    }

    var a = 0
    while (a < gameState.elements.attackBtnEl.length) {
      attackBtnEl[a].onclick = function () {
        var attackName = this.dataset.attack
        gameState.currentUserAttack = attackName
        console.log(currentUserAttack)
        gameState.play(attackName, gameState.cpuAttack())
      }
      a++
    }
  },

  cpuAttack: function () {
    var attacks = ['rock', 'paper', 'scissors']
    return attacks[gameState.randomNumber(0, 3)]
  },

  calculateInitialHealth: function (user) {
    return ((0.20 * Math.sqrt(user[0].level)) * user[0].defense) * user[0].hp
  },

  attackMove: function (attack, level, stack, critical, enemy, attacker) {
    console.log('enemy.health before: ' + enemy.health)
    var attackAmount = ((attack * level) * (stack + critical))
    enemy.health = enemy.health - attackAmount

    var userHP = document.querySelector('.player1').querySelector('.stats').querySelector('.health').querySelector('.health-bar').querySelector('.inside')
    var cpuHP = document.querySelector('.player2').querySelector('.stats').querySelector('.health').querySelector('.health-bar').querySelector('.inside')

    if(enemy.owner == 'user'){
      var minusPercent = ((enemy.health * 100) / enemy.originalHealth)
      userHP.style.width = ((minusPercent < 0) ? 0 : minusPercent) + '%'
    } else {
      var minusPercent = ((enemy.health * 100) / enemy.originalHealth)
      cpuHP.style.width = ((minusPercent < 0) ? 0 : minusPercent) + '%'
    }
    gameState.checkWinner(enemy, attacker)
    console.log(enemy.health)
  },

  checkWinner: function (enemy, attacker) {
    if (enemy.health <= 0)
      console.log("Winner!" + attacker.name)
  },

  randomNumber: function (min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
  },

  cpuPick: function () {
    do {
      gameState.rivalPokemon = gameState.elements.pokemonsEl[gameState.randomNumber(0, 3)].dataset.pokemon
    }
    while (gameState.userPokemon == gameState.rivalPokemon)
  },

  play: function (userAttack, cpuAttack) {
    var currentPokemon = gameState.currentPokemon[0]
    var currentRivalPokemon = gameState.currentRivalPokemon[0]
    currentPokemon.Owner = 'user'
    currentRivalPokemon.owner = 'cpu'
    switch (userAttack) {
      case 'rock':
        if (cpuAttack == 'paper') {
          if (currentPokemon.health > 1 && currentRivalPokemon.health >= 1) {
            // user
            gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, .5, currentRivalPokemon, currentPokemon)
            if (currentRivalPokemon.health >= 1) {
              // cpu
              gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, 2, currentPokemon, currentRivalPokemon)
              console.log('paper killed rock')
            }
          }
        }
        if (cpuAttack == 'scissors') {
          if (currentPokemon.health > 1 && currentRivalPokemon.health >= 1) {
            // user
            gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, 2, currentRivalPokemon, currentPokemon)
            if (currentRivalPokemon.health >= 1) {
              // cpu
              gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, .5, currentPokemon, currentRivalPokemon)
              console.log('rock killed paper')
            }
          }
        }
        if (cpuAttack == 'rock') {
          if (currentPokemon.health > 1 && currentRivalPokemon.health >= 1) {
            // user
            gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, 1, currentRivalPokemon, currentPokemon)
            if (currentRivalPokemon.health >= 1) {
              // cpu
              gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, 1, currentPokemon, currentRivalPokemon)
            }
          }
        }
        break;

      case 'paper':
        if (cpuAttack == 'paper') {
          if (currentPokemon.health > 1 && currentRivalPokemon.health >= 1) {
            // user
            gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, 1, currentRivalPokemon, currentPokemon)
            if (currentRivalPokemon.health >= 1) {
              if (currentPokemon.health > 1 && currentRivalPokemon.health >= 1) {
                // cpu
                gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, 1, currentPokemon, currentRivalPokemon)
                console.log('paper killed rock')
              }
            }
          }
        }
        if (cpuAttack == 'scissors') {
          if (currentPokemon.health > 1 && currentRivalPokemon.health >= 1) {
            // user
            gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, .5, currentRivalPokemon, currentPokemon)
            if (currentRivalPokemon.health >= 1) {
              // cpu
              gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, 2, currentPokemon, currentRivalPokemon)
              console.log('rock killed paper')
            }
          }
        }
        if (cpuAttack == 'rock') {
          if (currentPokemon.health > 1 && currentRivalPokemon.health >= 1) {
            // user
            gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, 2, currentRivalPokemon, currentPokemon)
            if (currentRivalPokemon.health >= 1) {
              // cpu
              gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, .5, currentPokemon, currentRivalPokemon)
            }
          }
        }
        break;

      case 'scissors':
        if (cpuAttack == 'paper') {
          if (currentPokemon.health > 1 && currentRivalPokemon.health >= 1) {
            // user
            gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, 2, currentRivalPokemon, currentPokemon)
            if (currentRivalPokemon.health >= 1) {
              // cpu
              gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, .5, currentPokemon, currentRivalPokemon)
              console.log('paper killed rock')
            }
          }
        }
        if (cpuAttack == 'scissors') {
          // user
          gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, 1, currentRivalPokemon, currentPokemon)
          if (currentRivalPokemon.health >= 1) {
            if (currentPokemon.health > 1 && currentRivalPokemon.health >= 1) {
              // cpu
              gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, .1, currentPokemon, currentRivalPokemon)
              console.log('rock killed paper')
            }
          }
        }
        if (cpuAttack == 'rock') {
          if (currentPokemon.health > 1 && currentRivalPokemon.health >= 1) {
            // user
            gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, .5, currentRivalPokemon, currentPokemon)
            if (currentRivalPokemon.health >= 1) {
              // cpu
              gameState.attackMove(currentPokemon.attack, currentPokemon.level, .8, 2, currentPokemon, currentRivalPokemon)
            }
          }
        }
        break;
    }
  }
}
gameState.init()





