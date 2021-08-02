'use strict';

/////////////////////////////////////////////////
/////////////////////////////////////////////////
// BANKIST APP

// Data
const account1 = {
  owner: 'Jonas Schmedtmann',
  movements: [200, 450, -400, 3000, -650, -130, 70, 1300],
  interestRate: 1.2, // %
  pin: 1111,
};

const account2 = {
  owner: 'Jessica Davis',
  movements: [5000, 3400, -150, -790, -3210, -1000, 8500, -30],
  interestRate: 1.5,
  pin: 2222,
};

const account3 = {
  owner: 'Steven Thomas Williams',
  movements: [200, -200, 340, -300, -20, 50, 400, -460],
  interestRate: 0.7,
  pin: 3333,
};

const account4 = {
  owner: 'Sarah Smith',
  movements: [430, 1000, 700, 50, 90],
  interestRate: 1,
  pin: 4444,
};

const accounts = [account1, account2, account3, account4];

// Elements
const labelWelcome = document.querySelector('.welcome');
const labelDate = document.querySelector('.date');
const labelBalance = document.querySelector('.balance__value');
const labelSumIn = document.querySelector('.summary__value--in');
const labelSumOut = document.querySelector('.summary__value--out');
const labelSumInterest = document.querySelector('.summary__value--interest');
const labelTimer = document.querySelector('.timer');

const containerApp = document.querySelector('.app');
const containerMovements = document.querySelector('.movements');

const btnLogin = document.querySelector('.login__btn');
const btnTransfer = document.querySelector('.form__btn--transfer');
const btnLoan = document.querySelector('.form__btn--loan');
const btnClose = document.querySelector('.form__btn--close');
const btnSort = document.querySelector('.btn--sort');

const inputLoginUsername = document.querySelector('.login__input--user');
const inputLoginPin = document.querySelector('.login__input--pin');
const inputTransferTo = document.querySelector('.form__input--to');
const inputTransferAmount = document.querySelector('.form__input--amount');
const inputLoanAmount = document.querySelector('.form__input--loan-amount');
const inputCloseUsername = document.querySelector('.form__input--user');
const inputClosePin = document.querySelector('.form__input--pin');

const displayMovements = function (movements) {
  containerMovements.innerHTML = '';

  movements.forEach(function (mov, i) {
    const type = mov > 0 ? 'deposit' : 'withdrawal';

    const html = `
      <div class="movements__row">
        <div class="movements__type movements__type--${type}">${
      i + 1
    } ${type}</div>
        <div class="movements__value">${mov}$</div>
      </div>`;

    containerMovements.insertAdjacentHTML('afterbegin', html);
  });
};

const calcDisplayBalance = function (movements) {
  const balance = movements.reduce((acc, mov) => acc + mov, 0);
  labelBalance.textContent = `${balance} USD`;
};

displayMovements(account1.movements);

const calcDisplaySummary = function (movements) {
  const incomes = movements
    .filter(mov => mov > 0)
    .reduce((acc, mov) => acc + mov, 0);
    labelSumIn.textContent = `${income}$`
};
calcDisplaySummary(account1.movements);

const createUsernames = function (accs) {
  accs.forEach(function (acc) {
    acc.username = acc.owner
      .toLocaleLowerCase()
      .split(' ')
      .map(name => name[0])
      .join('');
  });
};

calcDisplayBalance(account1.movements);
createUsernames(accounts);

/////////////////////////////////////////////////
/////////////////////////////////////////////////
// LECTURES
const movements = [200, 450, -400, 3000, -650, -130, 70, 1300];

// const currencies = new Map([
//   ['USD', 'United States dollar'],
//   ['EUR', 'Euro'],
//   ['GBP', 'Pound sterling'],
// ]);

// const movements = [200, 450, -400, 3000, -650, -130, 70, 1300];

/////////////////////////////////////////////////
/*
let arr= ['a', 'b', 'c', 'd', 'e']

// SLICE
console.log(arr.slice(2, 4))
console.log(arr.slice(-1))
console.log(arr.slice(1, -1))
console.log(arr.slice())
console.log([...arr])

console.log('------------------SPLICE------------------');
// SPLICE
// console.log(arr.splice(2));
arr.splice(-1)
console.log(arr)
arr.splice(1, 2)
console.log(arr);;

console.log('------------------REVERSE------------------');
// REVERSE
arr = ['a', 'b', 'c', 'd', 'e']
const arr2 = ['j', 'i', 'h', 'g', 'f']
console.log(arr2.reverse());
console.log(arr2);

console.log('------------------CONCAT------------------');
// CONCAT
const letters = arr.concat(arr2)
console.log(letters);
console.log([...arr, ...arr2]);

console.log('------------------JOIN------------------');
// JOIN
console.log(letters.join(' - '));
*/
/*
const movements = [200, 450, -400, 3000, -650, -130, 70, 1300];

// for (const movement of movements) 
for (const [i, movement] of movements.entries()){
  if(movement > 0) {
    console.log(`Movement ${i + 1} You deposited ${movement}`)
  } else {
    console.log(`Movement ${i + 1} You withdrew ${Math.abs(movement)}`);
  }
}
console.log('-------------FOREACH--------------');
movements.forEach(function(mov, i, arr){
  if(mov > 0) {
    console.log(`Movement ${i + 1} You deposited ${mov}`)
  } else {
    console.log(`Movement ${i + 1} You withdrew ${Math.abs(mov)}`);
  }
})
*/
/*
// MAP
const currencies = new Map([
  ['USD', 'United States dollar'],
  ['EUR', 'Euro'],
  ['GBP', 'Pound sterling'],
]);

currencies.forEach(function(value, key, map){
  console.log(`${key}: ${value}`);
})

// Set
const currenciesUnique = new Set (['USD', 'GBP', 'USD', 'EUR', 'EUR'])
currenciesUnique.forEach(function(value, key, map){
  console.log(`${key}: ${value}`)
})
*/
/*
const dataJ = [3, 5, 2, 12, 7]
const dataK = [4, 1, 15, 8, 3]

// const dataJS = dataJ.splice(1, 2)
// console.log(dataJS);
// const joinData = dataJS.concat(dataK)
// console.log(joinData);

const checkDogs = function (dogsJulia, dogsKate) {
  const dogsJuliaCorr = dogsJulia.slice()
  dogsJuliaCorr.splice(0, 1)
  dogsJuliaCorr.splice(-2)
  const joinData = dogsJuliaCorr.concat(dogsKate)
  joinData.forEach(function(dog, i){
    const dogType = dog >= 3 ? `Dog number ${i + 1} is an adult, and is ${dog} years old` : `Dog number ${i + 1} is still a puppy 🐶`;
  console.log(dogType);
  })

}
checkDogs([3, 5, 2, 12, 7], [3, 5, 2, 12, 7])
*/

/*
const eurToUsd = 1.1;
const movementsUSD = movements.map(mov => mov * eurToUsd);

const movementsDescriptions = movements.map(
  (mov, i) =>
    `Movement ${i + 1}: You ${mov > 0 ? 'deposited' : 'withdrew'} ${Math.abs(
      mov
    )}`
);
*/
/*
const deposits = movements.filter(function(mov){
return mov > 0
})
console.log(movements);
console.log(deposits);

const depositsFor = []
for ( const mov of movements) if (mov > 0) depositsFor.push(mov)
console.log(depositsFor);

const withdrawals = movements.filter(mov => mov < 0
)
console.log(withdrawals);
*/

/*
///////////////////////////////////////////////////////////////////////////////
// Challenge 2
// Accumulator is like a snow ball
const balance = movements.reduce((acc, cur) => acc + cur, 0);
// console.log(balance);

let balance2 = 0;
for (const mov of movements) balance2 += mov;

// Maximum Value

const maxBalance = movements.reduce((acc, cur) => acc < cur ? acc = cur : acc, 0)
// console.log(maxBalance);

const calcAVGHunanAge = function(dogAge){
  
  const humanAge = dogAge.map(dog => dog <=2 ? dog * 2 : 16 + dog * 4)

  const adultDogs = humanAge.filter(dogs => dogs >= 18)
  // const ageAvg = adultDogs.reduce((a, b) => a + b, 0) / adultDogs.length
  const ageAvg = adultDogs.reduce((a, b, i, arr) => a + b / arr.length, 0)
  
  return ageAvg
}

calcAVGHunanAge([5, 2, 4, 1, 15, 6, 1, 4])

const avg1 =calcAVGHunanAge([5, 2, 4, 1, 15, 6, 1, 4])
const avg2 =calcAVGHunanAge([16, 6, 10, 5, 6, 1, 4])

console.log(avg1, avg2);
*/
/*
const eurToUsd = 1.1;
// const totalDepositsUSD1 = movements
//   .filter(mov => mov > 0)
//   .map(mov => mov * eurToUsd)
//   .reduce((acc, mov) => acc + mov, 0);
// console.log(totalDepositsUSD1);

// Pipeline
let totalDepositsUSD = movements
  .filter(mov => mov > 0)
  .map((mov, i, arr) => {
    console.log(arr);
    return mov * eurToUsd;
  })
  .reduce((acc, mov) => acc + mov, 0);

console.log(totalDepositsUSD);

*/
const a = 12;
console.log(a);

