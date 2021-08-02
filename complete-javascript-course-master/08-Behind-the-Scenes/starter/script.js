'use strict';

// function calcAge(birthYear) {
//   const age = 2021 - birthYear;
//   function printAge() {
//     const output = `${firstName}, You are ${age}, born in ${birthYear}`;
//     console.log(output);

//     if (birthYear >= 1981 && birthYear <= 1996) {
//       const str = `oh, and you're a millenial, ${firstName}`;
//       console.log(str);

//       function add(a, b) {
//         return a + b;
//       }

//     }
//   }
//   printAge();
//   return age;
// }

// const firstName = 'Jonas';
// calcAge(1991);

// console.log(me);
// console.log(job);
// console.log(year);

// var me = 'Jonas'
// let job = 'Teacher'
// const year = 1991

// console.log(addDec(2, 3));

// function addDec(a, b){
//   return a + b
// }

// const addExpr = function(a, b){
//   return a + b
// }

// const addArrow = (a, b) => a + b

// if(!numProducts) deleteShoppingCart()

// var numProducts = 10

// function deleteShoppingCart () {
//   console.log('All products deleted!');
// }

// console.log(this);

// const calcAge = function(birthYear) {
//   console.log(2037 - birthYear);
//   console.log(this);
// }
// calcAge(1991)

// const calcAgeArrow = birthYear => {
//   console.log(2037 - birthYear);
//   console.log(this);
// }
// calcAge(1980)

// const jonas = {
//   year: 1991,
//   calcAge: function() {
//     console.log(2037 - this.year)
//   }
// }
// jonas.calcAge()

// const matilda = {
//   year: 2017,
// }

// matilda.calcAge = jonas.calcAge
// matilda.calcAge()

// cont f = jonas.calcAge

// var firstName = 'Matilda';

// const jonas = {
//   firstName: 'Jonas',
//   year: 1991,
//   calcAge: function () {
//     console.log(2037 - this.year);

//     // Solution 1
//     // const self = this
//     // const isMillenial = function() {
//     //   console.log(self.year >= 1981 && self.year <= 1996);
//     //   // console.log(this.year >= 1981 && this.year <= 1996);
//     // }
    
//     //solution 2
//     const isMillenial = () => {
//       console.log(self.year >= 1981 && self.year <= 1996);
//       // console.log(this.year >= 1981 && this.year <= 1996);
//     }
//     isMillenial()
//   },

//   greet: () => {
//     console.log(this);
//     console.log(`hey ${this.firstName}`);
//   },
// };
// jonas.greet();
// jonas.calcAge()

// //arguments keyword

// const addExpr = function(a, b){
//   console.log(arguments);
//   return a + b
// }

// addExpr(2, 5)
// addExpr(2, 5, 8, 12)

// var addArrow = (a, b) => a + b

// let age = 30
// let oldAge = age
// age = 31
// console.log(age);
// console.log(oldAge);

// const me = {
//   name: 'Jonas',
//   age: 30,
// }

// const friend = me 
// friend.age =27
// console.log('Friend', friend);
// console.log('Me', me);

//Primitive Types
let lastName = 'Williams'
let oldLastName = lastName
lastName ='Davis'
console.log(lastName, '-', oldLastName);

// Reference Types
const jessica = {
  firstName: 'Jessica',
  lastName: 'Williams',
  age: 27,
}
const marriedJessica = jessica
marriedJessica.lastName = 'Davis'
// console.log('Before Marriage', jessica);
// console.log('After Marriage', marriedJessica);
// marriedJessica = {}

//Copying Objects
const jessica2 = {
  firstName: 'Jessica',
  lastName: 'Williams',
  age: 27,
  family: ['alice', 'bob']
}

const jessicaCopy = Object.assign({}, jessica2)
jessicaCopy.lastName = 'Davis'

jessicaCopy.family.push('Mary')
jessicaCopy.family.push('John')
console.log('Before Marriage', jessica2);
console.log('After Marriage', jessicaCopy);