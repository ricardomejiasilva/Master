'use strict';

//Coding challenge 2

(function () {
  const header = document.querySelector('h1');
  header.style.color = 'red';
  document.querySelector('body').addEventListener('click', function () {
    header.style.color = 'blue';
  });
})();










/*
/////////////////////////////////////////////////////////////////////////
//Closures continued 
let f;

const g = function () {
  const a = 23;
  f = function () {
    console.log(a * 2);
  };
};

const h = function() {
  const b = 777;
  f = function() {
    console.log(b * 2);
  }
}

g();
f();

// Re-assigning f function
h()
f()
console.dir(f);

// Example 2
const boardPassengers = function(n, wait){
  const perGroup = n / 3

  setTimeout(function(){
    console.log(`We are now boarding all ${n} passengers`);
    console.log(`There are 3 groups, each with ${perGroup} passengers`);
  }, wait * 1000)

  console.log(`Will start boarding in ${wait} seconds`);
}

const perGroup = 1000;
boardPassengers(180, 3)
*/

/*
////////////////////////////////////////////////////////////////
// CLOSURE
const secureBooking = function(){
  let passengerCount = 0;

  return function(){
    passengerCount++
    console.log(`${passengerCount} passengers`);
  }
}

const booker = secureBooking()
booker();
booker();
booker();

console.dir(booker)
*/
/*
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
// Immediately Invoked Function Expression

const runOnce = function () {
  console.log('this will never run again');
};
runOnce();

(function () {
  console.log('This will never run again');
  const private = 23
})();

{
  const isPrivate = 
}


(() => console.log('This will also never run again'))()
*/

/*
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
// Coding Challenge 1
const poll = {
  question: ' What is your favorite programing language?',
  options: ['0: JavaScript', '1: Python', '2: Rust', '3: C++'],
  answers: new Array(4).fill(0),
  registerNewAnswer: function () {
    const answer = Number(
      prompt(`${this.question}\n${this.options.join('\n')}`)
    );

    typeof answer === 'number' &&
      answer < this.answers.length &&
      this.answers[answer]++;

      this.displayResults()
      this.displayResults('string')
  },
  displayResults: function (type = 'array') {
    if (type === 'array') {
      console.log(this.answers);
    } else if (type === 'string') {
      console.log(`Poll results are ${this.answers.join(', ')}`);
    }
  },
};



document
  .querySelector('.poll')
  .addEventListener('click', poll.registerNewAnswer.bind(poll));

poll.displayResults.call({answers: [5, 2, 3]}, 'string')
poll.displayResults.call({answers: [1, 5, 3, 9, 6, 1]}, 'string')

  // BONUS TEST DATA 1: [5, 2, 3]
  // BONUS TEST DATA 2: [1, 5, 3, 9, 6, 1]

*/
/*
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
// The Call and Apply Methods
const lufthansa = {
  airline: 'Lufthansa',
  iataCode: 'LH',
  bookings: [],
  // book: function() {}
  book(flightNum, name) {
    console.log(
      `${name} booked a seat on ${this.airline} flight ${this.iataCode}${flightNum}`
    );
    this.bookings.push({ flight: `${this.iataCode}${flightNum}`, name });
  },
};

lufthansa.book(239, 'Jonas Schmedtmann');
lufthansa.book(635, 'John Smith');

const eurowings = {
  airline: 'Eurowings',
  iataCode: 'EW',
  bookings: [],
};

const book = lufthansa.book;

// Does NOT work
// book(23, 'Sarah Williams');

book.call(eurowings, 23, 'Sarah Williams');
// console.log(eurowings);

const swiss = {
  airline: 'Swiss',
  iataCode: 'LX',
  bookings: [],
};

book.call(swiss, 45, ' Daniel Carro');
console.log(swiss);

//Apply Method
const flightData = [583, 'George Booker'];
book.apply(swiss, flightData);
// console.log(swiss);

book.call(swiss, ...flightData);

//Bind Method
// book.call(eurowings, 23, 'Sarah Williams');

const bookEW = book.bind(eurowings);
const bookLH = book.bind(lufthansa);
const bookLX = book.bind(swiss);

bookEW(23, 'Steven William');

const bookEW23 = book.bind(eurowings, 23);
bookEW23('Ricardooo');
bookEW23('mikeeee');

// With Event Listeners
lufthansa.planes = 300;
lufthansa.buyPlane = function () {
  console.log(this);

  this.planes++;
  console.log(this.planes);
};

document
  .querySelector('.buy')
  .addEventListener('click', lufthansa.buyPlane.bind(lufthansa));


  //Partial Application 
const addTax = (rate, value) => value + value * rate 
console.log(addTax(.1, 200));

const addVat = addTax.bind(null, 0.23)

const addTaxRate = function(rate){
  return function (value){
    return rate + value * rate
  }
}

const addVat2 = addTaxRate(.23)
console.log(addVat2(100));
console.log(addVat2(23));

*/
