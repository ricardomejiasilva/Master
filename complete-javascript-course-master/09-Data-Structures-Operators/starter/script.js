'use strict';

// ENHANCED OBJECT LITERALS
const weekdays = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
const openingHours = {
  [weekdays[3]]: {
    open: 12,
    close: 22,
  },
  [weekdays[4]]: {
    open: 11,
    close: 23,
  },
  [weekdays[5]]: {
    open: 0, // Open 24 hours
    close: 24,
  },
};

const restaurant = {
  name: 'Classico Italiano',
  location: 'Via Angelo Tavanti 23, Firenze, Italy',
  categories: ['Italian', 'Pizzeria', 'Vegetarian', 'Organic'],
  starterMenu: ['Focaccia', 'Bruschetta', 'Garlic Bread', 'Caprese Salad'],
  mainMenu: ['Pizza', 'Pasta', 'Risotto'],
  //ES6 Enhanced Object Literal
  openingHours,

  order(starterIndex, mainIndex) {
    return [this.starterMenu[starterIndex], this.mainMenu[mainIndex]];
  },

  orderDelivery({ starterIndex = 1, mainIndex = 0, time = '22:00', address }) {
    console.log(
      `order received! ${this.starterMenu[starterIndex]} and ${this.mainMenu[mainIndex]} will be delivered to ${address} at ${time}`
    );
  },

  orderPasta(ing1, ing2, ing3) {
    console.log(`Here is your pasta with ${ing1}, ${ing2} and ${ing3}`);
  },

  orderPizza(mainIngredient, ...otherIngredients) {
    console.log(mainIngredient);
    console.log(otherIngredients);
  },
};

/*
////////////////////////////////////////////////////////////////////////
// Coding Challenge 4
document.body.append(document.createElement('textarea'));
document.body.append(document.createElement('button'));

document.querySelector('button').addEventListener('click', function () {
  const text = document.querySelector('textarea').value;
  const rows = text.split('\n');
  console.log(rows);
  for (const [i, row] of rows.entries()) {
    const [first, second] = row.toLowerCase().trim().split('_');
    const output = `${first}${second.replace(
      second[0],
      second[0].toUpperCase()
    )}`;
    console.log(`${output.padEnd(20)}${'👍'.repeat(i + 1)}`);
  }
});

// underscore_case
//  first_name
// Some_Variable
//   calculate_AGE
// delayed_departure

/*
/////////////////////////////////////////////////////////////////
// STRINGS PART 3

//Split and join
console.log('a+very+nice+string'.split('+'));
console.log('Ricardo Mejia'.split(' '));
const [firstName, lastName] = 'Ricardo Mejia'.split(' ')

const newName = ['Mr.', firstName, lastName.toUpperCase()].join(' ')
console.log(newName)

const capitalizeName = function(name){
  const names = name.split(' ')
  const nameUpper = []
  for(const n of names){
    // nameUpper.push(n[0].toUpperCase() + n.slice(1))
    nameUpper.push(n.replace(n[0], n[0].toUpperCase()))
  }
  console.log(nameUpper.join(' '));
}

capitalizeName('jessica ann smith davis')
capitalizeName('ricardo mejia')

// Padding 
const message = 'GO to gate 23!'
console.log(message.padStart(25, '+').padEnd(35, '+'));
console.log('Rick'.padStart(25, '+').padEnd(35, '+'));

const maskCreditCard = function(number) {
  const str = number + ''
  const last =str.slice(-4)
  console.log(str);
  return last.padStart(18, '*')

}

console.log(maskCreditCard(5421658741269325))
console.log(maskCreditCard(54893541265487921456))

//Repeat 
const message2 = 'Bad weather all flights late'
console.log(message2.repeat(5));

const planesInLine = function(n){
  console.log(`There are ${n} planes in line ${'🚁'.repeat(n)}`);
}

planesInLine(5)
planesInLine(3)
planesInLine(12)
*/

/*
////////////////////////////////////////////////////////////////
// STRINGS PART 2
const airLine = 'Tap Air Portugal'
console.log(airLine.toLowerCase());
console.log(airLine.toUpperCase()); 

// Fix cap in name
const fixName = function (name){
  const passenger = name
  const passengerLower = passenger.toLowerCase()
  const passengerCorrect = passengerLower[0].toUpperCase() + passengerLower.slice(1)
  console.log(passengerCorrect);
}

fixName('rIcArDo')

// Comparing Email

const email = 'hello@jonas.io'
const loginEmail = '  Hello@jonas.Io \n'

//long way to fix
// const lowerEmail = loginEmail.toLowerCase()
// const trimmedEmail = lowerEmail.trim()
// console.log(trimmedEmail);

//short way
const normalizedEmail = loginEmail.toLowerCase().trim()
console.log(normalizedEmail);
console.log(email === normalizedEmail);

// replacing
const priceGb = '288,97£'
const priceUS = priceGb.replace('£', '$').replace(',', '.')
console.log(priceUS);

const announcement = 'All passengers come to boarding door 23. Boarding door 23!'
console.log(announcement.replace('door', 'gate'));
// console.log(announcement.replaceAll('door', 'gate'));

console.log(announcement.replace(/door/g, 'gate'));

// Booleans
const plane = 'Airbus A320neo'
console.log(plane.includes('A320'))
console.log(plane.includes('Boeing'))
console.log(plane.startsWith('Airb'))

if(plane.startsWith('Airbus') && plane.endsWith('neo')){
  console.log('Part of new Airbus Fam');
}

// Practice Exercise
const checkBaggage = function(items){
  const baggage = items.toLowerCase();
  if(baggage.includes('knife') || baggage.includes('gun')){
    console.log('Not Allowed');
  } else console.log('Allowed');
}
checkBaggage('I have a laptop, some Food and a pocket Knife')
checkBaggage('Socks and camera')
checkBaggage('Got some snacks and a gun for protection')
*/

/*
////////////////////////////////////////////////////////////////////
//STRINGS part 1
const airLine = 'Tap Air Portugal'
const plane = 'A320'
console.log(plane[0]);
console.log(plane[1]);
console.log(plane[2]);
console.log('B737'[0]);

console.log(airLine.length);
console.log('B737'.length);

console.log(airLine.indexOf('r'));
console.log(airLine.lastIndexOf('r'));
console.log(airLine.indexOf('Portugal'));
console.log(airLine.slice(4));
console.log(airLine.slice(4, 7));

console.log(airLine.slice(0, airLine.indexOf(' ')));
console.log(airLine.slice(airLine.lastIndexOf(' ') + 1));

console.log(airLine.slice(-2));
console.log(airLine.slice(1, -1));

const checkMiddleSeat = function(seat){
  // B and E are middle seats
  const s = seat.slice(-1)
  if(s === 'B' || s === 'E')
  console.log('You got the shit seat 🤣');
  else console.log('You\'re a lucky goose 😛');
}

checkMiddleSeat('11B')
checkMiddleSeat('23C')
checkMiddleSeat('3E')

console.log(new String('Jonas'));
console.log(typeof new String('Jonas'));

*/

/*
// Maps
const question = new Map([
  ['question', 'what is best language?'],
  [1, 'C'],
  [2, 'Java'],
  [3, 'JavaScript'],
  ['correct', 3],
  [true, 'Correct'],
  [false, 'try again']
]);
console.log(question);

// Convert object to map
console.log(Object.entries(openingHours));
const hoursMap = new Map(Object.entries(openingHours))
console.log(hoursMap);

// Quiz App
console.log(question.get('question'));
for(const [key, value] of question){
  if(typeof key === 'number') console.log(`Answer ${key}: ${value}`);
}
// const answer = Number(prompt('Your Answer'))
const answer = 3 
console.log(answer);

console.log(question.get(question.get('correct') === answer))

//Convert Map to array

console.log([...question]);
console.log(question.entries());
console.log(question.keys());
console.log(question.values());


/*
//////////////////////////////////////////////////////////////
// MAPS FUNDEMENTALS
const rest = new Map();
rest.set('name', 'Italiano');
rest.set(1, 'Firenze');
console.log(rest.set(2, 'Lisbon'));

rest
  .set('categories', ['Italian', 'Pizzeria', 'Vegetarian', 'Organic'])
  .set('open', 11)
  .set('close', 23)
  .set(true, 'We are open')
  .set(false, 'Closed');

console.log(rest.get('name'));
console.log(rest.get(true));
console.log(rest.get(1));

const time = 8
console.log(rest.get(time > rest.get('open') && time < rest.get('close')))

console.log(rest.has('categories'));
rest.delete(2)
// rest.clear()

const arr = [1, 2]
rest.set([1, 2], 'Test')
rest.set(document.querySelector('h1'), "heading")
rest.set(arr, 'test')
console.log(rest);

console.log(rest.get(arr))


/*
/////////////////////////////////////////////////////////
// SETS
const orderSet = new Set ([
 'pasta',
 'pizza',
 'pizza',
 'risotto',
 'pasta',
 'pizza',
])
console.log(orderSet);

console.log(new Set ('jonas') );

console.log(orderSet.size);
console.log(orderSet.has('pizza'));
console.log(orderSet.has('bread'));
orderSet.add('garlic bread')
orderSet.add('garlic bread')
orderSet.delete('risotto')
// orderSet.clear()
console.log(orderSet);

for (const order of orderSet) console.log(order);

const staff = ['waiter', 'chef', 'waiter', 'manager', 'chef', 'waiter']

const staffSet = [...new Set(staff)]
console.log(staffSet);

console.log(new Set(['waiter', 'chef', 'waiter', 'manager', 'chef', 'waiter']).size);

console.log(new Set('belleseabury').size);










/*
/////////////////////////////////////////////////////////////
// Property Names
const properties = Object.keys(openingHours)
// console.log(properties);
// console.log(`we are open on ${properties.length}`);

let openStr = `We are open om ${properties.length} days: `
for (const day of properties){
  openStr += `${day}, `
}
// console.log(openStr);

// Property Values
const values = Object.values(openingHours)
// console.log(values);
console.log(openingHours);
// Entire object
const entries = Object.entries(openingHours)
console.log(entries);

for(const [key, {open, close}] of entries){
  console.log(`on ${key} we open at ${open} and close at ${close}`);
}
*/

/*
/////////////////////////////////////////////////////////////
// Optional Chaining
if (restaurant.openingHours.mon)
console.log(restaurant.openingHours.mon.open);

console.log(restaurant.openingHours.mon?.open);

//Example
const days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun']

for (const i of days){
  console.log(i);
  const open = restaurant.openingHours[i]?.open ?? 'Closed'
  console.log(`on ${i}, we open at ${open}`);
}

// Methods 
console.log(restaurant.order?.(0, 1) || 'Method does not exist');
console.log(restaurant.orderRissoto?.(0, 1) || 'Method does not exist');

// Arrays
const users = [{
  name: 'Jonas', email: '225@gmail.com',
}];
// const users = []
console.log(users[0]?.name ?? 'User array empty');
//otherwise we'd have to write 
if(users.length > 0) console.log(users[0].name); else console.log('empty');
*/

/*
/////////////////////////////////////////////////////////////
// FOR OF LOOP
const menu = [...restaurant.starterMenu, ...restaurant.mainMenu]

for (const item of menu) console.log(item);

for (const [i, el] of menu.entries()){
  console.log(`${i + 1}: ${el}`);
}
*/

/*
/////////////////////////////////////////////////////////////
restaurant.numGuest = 0
const guest = restaurant.numGuest || 10;
console.log(guest);

// Nullish: null and undefined
const guestCorrect = restaurant.numGuest ?? 10
console.log(guestCorrect);
*/

/*
/////////////////////////////////////////////////////////////
console.log('----OR-----');
// use any data type, return any data type, short-circuiting
console.log(3 || 'jonas');
console.log('' || 'jonas');
console.log(true || 0);
console.log(undefined || null);

console.log(undefined || 0 || '' || 'hello' || 23 || null);

// restaurant.numGuest = 23;
// const guest1 = restaurant.numGuest ? restaurant.numGuest : 10;
// console.log(guest1);

// const guest2 = restaurant.numGuest || 10;
// console.log(guest2);

console.log('----AND-----');
console.log(0 && 'Jonas');
console.log(7 && 'jonas');
console.log('hello' && 23 && null && 'j');

// if (restaurant.orderPizza) {
//   restaurant.orderPizza('mush', 'spi');
// }
// restaurant.orderPizza && restaurant.orderPizza('mush', 'spi')

/*
/////////////////////////////////////////////////////////////
// rest parameters
//Destructuring 

// SPREAD, because on right side of =
const arr = [1, 2, ...[3, 4]]
console.log(arr);

// REST, because on LEFT side of =
const [a, b, ...others] = [1, 2, 3, 4, 5]
console.log(a, b, others);

const [pizza, , risotto, ...otherFood] = [...restaurant.mainMenu, ...restaurant.starterMenu]
console.log(pizza, risotto, otherFood);

//Objects
const { sat, ...weekdays} = restaurant.openingHours
console.log(sat, weekdays);

// 2 functions 

const add = function (...numbers) {
  let sum = 0;
  for (let i = 0; i < numbers.length; i++)
  sum += numbers[i];
  console.log(sum);
}
add(2, 3)
add(5, 3, 7, 2)
add(8, 2, 5, 3, 2, 1, 4)

const x = [23, 5, 7]
add(...x)

restaurant.orderPizza('mush', 'onion', 'olives', 'spinach')


// restaurant.orderDelivery({
//   time: '22:30',
//   address: 'Via Del Sole, 21',
//   mainIndex: 2,
//   starterIndex: 2,
// });
// restaurant.orderDelivery({
//   address: 'Via Del Sole, 21',
//   starterIndex: 1,
// });

// const ingredients = [
//   prompt('let\'s make pasta! Ingredient 1?'), 
//   prompt('Ingredient 2?'), 
//   prompt('Ingredient 3?')
// ];
// restaurant.orderPasta(...ingredients)

// Object
// const newRestaurant = {foundedIn: 1998, ...restaurant, founder: 'Guiseppe'}
// console.log(newRestaurant);

// const restaurantCopy = {...restaurant}
// restaurantCopy = 'ristorante'


/*
/////////////////////////////////////////////////////////////
const arr = [7, 8, 9]

const newArr = [1, 2, ...arr]
// console.log(newArr);
// console.log(...newArr);

const newMenu = [...restaurant.mainMenu, 'Gnocci']
// console.log(newMenu);

// Copy Array
const mainMenuCopy = [...restaurant.mainMenu]

// Join 2 arrays 
const menu = [...restaurant.mainMenu, ...restaurant.starterMenu]
// console.log(menu);

// Iterables: arrays, strings, maps, sets. NOT Objects
const str = 'Jonas'
const letters = [...str, ' ', 's.']
// console.log(letters);
// console.log(...str);

/*
/////////////////////////////////////////////////////////////
const { name, openingHours, categories } = restaurant;
console.log(name, openingHours, categories);

const {
  name: restaurantName,
  openingHours: hours,
  categories: tags,
} = restaurant;
console.log(restaurantName, hours, tags);

//Default Values
const { menu = [], starterMenu: starters = [] } = restaurant;
console.log(menu, starters);

// Mutating variables
let a = 111;
let b = 999;
const obj = { a: 23, b: 7, c: 14 };
({ a, b } = obj);
console.log(a, b);

// Nested Objects
const {fri: {open: o, close: c}} = openingHours
console.log(o, c)
*/

/*
/////////////////////////////////////////////////////////////
const arr = [2, 3, 4];
const a = arr[0];
const b = arr[1];
const c = arr[2];

const [x, y, z] = arr;
console.log(x, y, z);
console.log(arr);

let [main, , secondary] = restaurant.categories;
console.log(main, secondary);

switching Variables (GO BACK AND CHECK!!!!!)
const temp = main;
main = secondary;
secondary = temp;
console.log(main, secondary);

[main, secondary] = [secondary, main];
console.log(main, secondary);

// Receive 2 return values from a function
const [starter, mainCourse] = restaurant.order(2, 0)
console.log(starter, mainCourse);

// Nested destructuring 
const nested = [2, 4, [5, 6]]
// const [i, , j] = nested
const [i, , [j, k]] = nested
console.log(i, j, k);

// Default Values
const [p = 1, q = 1, r = 1] = [8, 9]
console.log(p, q, r);
*/
/*
/////////////////////////////////////////////////////////////
const game = {
  team1: 'Bayern Munich',
  team2: 'Borrussia Dortmund',
  players: [
    [
      'Neuer',
      'Pavard',
      'Martinez',
      'Alaba',
      'Davies',
      'Kimmich',
      'Goretzka',
      'Coman',
      'Muller',
      'Gnarby',
      'Lewandowski',
    ],
    [
      'Burki',
      'Schulz',
      'Hummels',
      'Akanji',
      'Hakimi',
      'Weigl',
      'Witsel',
      'Hazard',
      'Brandt',
      'Sancho',
      'Gotze',
    ],
  ],
  score: '4:0',
  scored: ['Lewandowski', 'Gnarby', 'Lewandowski', 'Hummels'],
  date: 'Nov 9th, 2037',
  odds: {
    team1: 1.33,
    x: 3.25,
    team2: 6.5,
  },
};


/*
/////////////////////////////////////////////////////////////
// Challenge #2
// 1.
for (const [i, name] of game.scored.entries()) {
  console.log(`Goal ${parseInt(i) + 1}: ${name}`);
}
// 2.
const odds = Object.values(game.odds);
let average = 0;
for (const odd of odds) average += odd;
average /= odds.length;
console.log(average);
// 3.
for (const [team, odd] of Object.entries(game.odds)){
  const teamStr = team === 'x' ? 'draw' : `victory ${game[team]}`;
  console.log(`Odd of ... ${teamStr} ${odd}`);
}

// Odd of victory Bayern Munich: 1.33
//       Odd of draw: 3.25
//       Odd of victory Borrussia Dortmund: 6.5

*/
/*
/////////////////////////////////////////////////////////////
// Challenge # 1
const [players1, players2] = game.players
// console.log(players1, players2);
const [gk, ...fieldPlayer] = players1
// console.log(gk, fieldPlayer);
const allPlayers = [...players1, ...players2]
// console.log(allPlayers);
const playersFinal = [...players1, 'Thiago', 'Coutinho', 'Perisic']
// console.log(playersFinal);
const {team1, x: draw, team2} = game.odds;
// console.log(team1, draw, team2);

const printGoals = function (...players) {
 console.log(players.length);
}

printGoals('davies', 'Muller', 'Lew', 'Kim')
printGoals(game.scored)

team1 < team2 && console.log('team 1 baby!');
team1 > team2 && console.log('team 2 baby!');
*/

/*
//////////////////////////////////////////////////////////////////
// Coding Challenge 3 
const gameEvents = new Map([
  [17, '⚽️ GOAL'],
  [36, '🔁 Substitution'],
  [47, '⚽️ GOAL'],
  [61, '🔁 Substitution'],
  [64, '🔶 Yellow card'],
  [69, '🔴 Red card'],
  [70, '🔁 Substitution'],
  [72, '🔁 Substitution'],
  [76, '⚽️ GOAL'],
  [80, '⚽️ GOAL'],
  [92, '🔶 Yellow card'],
]);

const events = [new Set (gameEvents.values())]
console.log(events);

gameEvents.delete(64)
console.log(gameEvents);

console.log(`An event happened , on average, every ${92 / gameEvents.size} minutes`);

for (const [min, event] of gameEvents){
  const half = min <= 45 ? 'First' : 'Second'
  console.log(`[${half} HALF] ${min}: ${event}`);
}
*/
