'use strict';
/
const Person = function (firstName, birthYear) {
  // Instance properties
  this.firstName = firstName;
  this.birthYear = birthYear;
};

const rick = new Person('Rick', 1996);
// console.log(Person);
// console.log(rick);

// 1. new {} object is created
// 2. function is called, this = {}
// 3. {} linked to prototype
// 4. function automatically return {}

const matilda = new Person('Matilda', 2017);
const jack = new Person('Jack', 1975);

// // Prototypes
// console.log(Person.prototype);

Person.prototype.calcAge = function () {
  console.log(2021 - this.birthYear);
};

// rick.calcAge()
// matilda.calcAge()

// console.log(rick.__proto__);
// console.log(Person.prototype.isPrototypeOf(rick));

// Person.prototype.species = 'Homo Sapiens'
// console.log(rick.species, matilda.species);
// console.log(rick.hasOwnProperty('firstName'));
// console.log(rick.hasOwnProperty('species'));

// console.log(rick.__proto__.__proto__);
// console.log(Person.prototype.constructor);

// const arr = [3, 5, 6, 9, 1, 1, 3, 10, 11,  5, 8]
// console.log(arr.__proto__);

// Array.prototype.unique = function(){
//   return [...new Set(this)]
// }

// console.log(arr.unique());


const Car = function(make, curSpeed){
  this.make = make;
  this.curSpeed =curSpeed;
}

Car.prototype.accelerate = function (){
  this.curSpeed +=  10
  console.log(this.curSpeed);
}

Car.prototype.brake = function (){
  this.curSpeed -= 5
  console.log(this.curSpeed);
}

const car1 = new Car ('Honda', 45)
const car2 = new Car ('Toyota', 25)

console.log(car1);
console.log(car2);

car1.accelerate()
car1.brake()

car2.accelerate()


class Car {
  constructor(make, speed) {
    this.make = make;
    this.speed = speed;
  }

  accelerate() {
    this.speed += 10;
    console.log(`Accelerated to ${this.speed}`);
  }

  brake() {
    this.speed -= 5;
    console.log(`Slowed Down to ${this.speed}`);
  }

  get speedUS() {
    return this.speed / 1.6;
  }

  set speedUS(speed) {
    this.speed = speed * 1.6;
  }
}

const prius = new Car ('Prius', 120)
console.log(prius.speedUS)

prius.accelerate()
prius.accelerate()
prius.brake()

prius.speedUS = 50
console.log(prius);


// Class Expression
// const PersonCl = class{}

//CLass Declaration
class PersonCl {
  constructor(fullName, birthYear) {
    this.fullName = fullName;
    this.birthYear = birthYear;
  }

  // Methods will be added to .prototype property
  calcAge() {
    console.log(2037 - this.birthYear);
  }

  greet() {
    console.log(`Hey ${this.fullName}`);
  }

  get age() {
    return 2037 - this.birthYear;
  }

  // Set a property that already exists
  set fullName(name) {
    if (name.includes(' ')) this._fullName = name;
    else alert(`${name} is not a full name!`);
  }

  get fullName() {
    return this._fullName;
  }

  // Static method
  static hey() {
    console.log('Hey there 👋');
    console.log(this);
  }
}

const jessica = new PersonCl('jessica Davis', 1996);
// 1. classes are not hoisted
// 2. Classes are first-class citizens
// 3. Classes are executed in strict mode

const walter = new PersonCl('Walter White', 1995);

const account = {
  owner: 'jonas',
  movements: [200, 530, 120, 300],

  get latest() {
    return this.movements.slice(-1).pop();
  },

  set latest(mov) {
    this.movements.push(mov);
  },
};

const PersonProto = {
  calcAge() {
    console.log(2021 - this.birthYear);
  },

  init(firstName, birthYear) {
    this.firstName = firstName;
    this.birthYear = birthYear;
  },
};

const steven = Object.create(PersonProto);
steven.name = 'Steven';
steven.birthYear = 2002;

const sarah = Object.create(PersonProto);
sarah.init('Sarah', 1979);


const Person = function (firstName, birthYear) {
  this.firstName = firstName;
  this.birthYear = birthYear;
};


Person.prototype.calcAge = function () {
  console.log(2021 - this.birthYear);
};

const Student = function(firstName, birthYear, course){
  Person.call(this, firstName, birthYear)
  this.course = course
}

Student.prototype = Object.create(Person.prototype)

Student.prototype.introduce = function(){
  console.log(`My name is ${this.firstName} and I study ${this.course}`);
}

const mike = new Student('Mike', 2020, ' CS')
console.log(mike);
mike.introduce()
mike.calcAge()

console.log(mike.__proto__);

/////////////////////////////////////////////////////////////////////
const Car = function(make, speed){
  this.make = make;
  this.speed =speed;
}

Car.prototype.accelerate = function (){
  this.speed +=  10
  console.log(this.speed);
}

Car.prototype.brake = function (){
  this.speed -= 5
  console.log(this.speed);
}

const EV = function(make, speed, charge){
  Car.call(this, make, speed)
  this.charge = charge
}

// Link the Prototype
EV.prototype = Object.create(Car.prototype)

EV.prototype.chargeBattery = function (chargeTo){
  this.charge = chargeTo
}

EV.prototype.accelerate = function(){
  this.speed += 20;
  this.charge -= 20;
  console.log(`${this.make} is going at ${this.speed} km/h, with a charge of ${this.charge}`);
}

const tesla = new EV('tesla', 120, 23)
tesla.chargeBattery(90)
console.log(tesla);
tesla.brake()
tesla.accelerate()
*/
/*
class PersonCl {
  constructor(fullName, birthYear) {
    this.fullName = fullName;
    this.birthYear = birthYear;
  }

  // Methods will be added to .prototype property
  calcAge() {
    console.log(2037 - this.birthYear);
  }

  greet() {
    console.log(`Hey ${this.fullName}`);
  }

  get age() {
    return 2037 - this.birthYear;
  }

  // Set a property that already exists
  set fullName(name) {
    if (name.includes(' ')) this._fullName = name;
    else alert(`${name} is not a full name!`);
  }

  get fullName() {
    return this._fullName;
  }

  // Static method
  static hey() {
    console.log('Hey there 👋');
    console.log(this);
  }
}

class StudentCl extends PersonCl {
  constructor(fullName, birthYear, course) {
    // Always needs to happen first!!
    super(fullName, birthYear);
    this.course = course;
  }
  introduce() {
    console.log(`My name is ${this.fullName} and I study ${this.course}`);
  }

  calcAge() {
    console.log(
      `I'm ${
        2021 - this.birthYear
      } years old, but as a student I feel more like ${
        2021 - this.birthYear + 10
      }`
    );
  }
}

const martha = new StudentCl('Martha Jones', 2012, 'Computer Science');
martha.introduce();
martha.calcAge()
*/
/*
const PersonProto = {
  calcAge() {
    console.log(2021 - this.birthYear);
  },

  init(firstName, birthYear) {
    this.firstName = firstName;
    this.birthYear = birthYear;
  },
};

const steven = Object.create(PersonProto);

const StudentProto = Object.create(PersonProto)
StudentProto.init = function(firstName, birthYear, course){
  PersonProto.init.call(this, firstName, birthYear);
  this.course = course
}

StudentProto.introduce = function(){
  console.log(`My name is ${this.firstName} and I study ${this.course}`)
}

const jay = Object.create(StudentProto)
jay.init('Jay', 2010, 'CS')
jay.introduce()
jay.calcAge()


// Public fields
// Private fields
// Public Methods
// private methods

class Account {
  // Public fields
  local = navigator.language;

  // Private fields
  #movements = [];
  #pin;

  constructor(owner, currency, pin) {
    this.owner = owner;
    this.currency = currency;
    // Protected Property
    this.#pin = pin;
    // this.#movements = [];
    // this.local = navigator.language;

    console.log(`Thanks for opening an account ${owner}`);
  }

  // public interface API
  getMovements() {
    return this.#movements;
  }

  deposit(val) {
    this.#movements.push(val);
    return this;
  }
  withdraw(val) {
    this.deposit(-val);
    return this;
  }

  requestLoan(val) {
    // if (this.#approveLoan(val)) {
    if (this._approveLoan(val)) {
      this.deposit(val);
      console.log('Loan Appoved');
      return this;
    }
  }

  // Private Methods
  // #approveLoan(val) {
  _approveLoan(val) {
    return true;
  }
}

const acc1 = new Account('Jonas', 'EUR', 1111);
console.log(acc1);

// acc1._movements.push(250)
// acc1._movements.push(-140)
acc1.deposit(250);
acc1.withdraw(140);
console.log(acc1.getMovements());

// console.log(acc1.#pin);

// Chaining
acc1.deposit(300).deposit(500).withdraw(35).requestLoan(25000).withdraw(4000);
console.log(acc1.getMovements());

*/

class CarCl {
  constructor(make, speed) {
    this.make = make;
    this.speed = speed;
  }

  accelerate() {
    this.speed += 10;
    console.log(`${this.make} is going at ${this.speed} km/h`);
  }

  brake() {
    this.speed -= 5;
    console.log(`${this.make} is going at ${this.speed} km/h`);
    return this
  }
}

class EVCl extends CarCl {
  constructor(make, speed, charge) {
    super(make, speed);
    this.charge = charge;
  }

  chargeBattery(chargeTo) {
    this.charge = chargeTo;
    return this
  }

  accelerate() {
    this.speed += 20;
    this.charge--;
    console.log(
      `${this.make} is going at ${this.speed} km/h, with a charge of ${this.charge}`
    );
    return this
  }
}

const rivian = new EVCl ('Rivian', 120, 90)

rivian.accelerate().accelerate().brake()

console.log(rivian.speedUS())
