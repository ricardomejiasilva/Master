// CHAPTER 2 - 1

// for (let i = "#"; i.length < 8; i = i += "#"){
//   console.log(i)
// }

// i = "#"
// while(i.length < 8){
//   console.log(i)
//   i = i + "#"
// }


// -----------------------------------------------------------------------
// CHAPTER 2 - 2

// for (let i = 1; i<= 100; i++) {
//   let output = ""
//     if(i % 3 == 0)
//     output += "fizz"
//     if (i % 5 == 0) 
//     output += "buzz"
  
//   console.log(output || i)
// }

// for (let line = ""; line.length <= 8; line = line += number) {
//   if (line.length == 7) {
//     line += "\n"
//   } else {
//     line
//   }

//   for (let number = ""; number.length <= 8; number++) {   
//     if (number % 2 == 0) {
//       number += "#"
//     } else{
//       number += " "
//     }
//   }
//   console.log(line)
// }


// -----------------------------------------------------------------------
// CHAPTER 2 - 3

// var size = 15
// var board = ""
// for (var y = 0; y < size; y++) {
//   for (var x = 0; x < size; x++) {
//     if ((x+y) % 2 == 0){
//       board += " "
//     } else{
//       board += "#"
//     }
//   }
//   board += "\n"
// }
// console.log(board)


// -----------------------------------------------------------------------
// SECTION 2 - CHALLENGE 1

// var jMass = 68
// var jHeight = 1.7

// var mMass = 78
// var mHeight = 1.9

// var jBMI = jMass / (jHeight * jHeight)
// var mBMI = mMass / (mHeight * mHeight)

// var mHigher = mBMI > jBMI
// console.log("is Marks BMI higher than James: " + mHigher)


// -----------------------------------------------------------------------
// SECTION 2 - CHALLENGE 2

// var mikeAvg = ((89 + 120 + 103) / 3)
// var johnAvg = ((116 + 94 + 123) / 3)
// var maryAvg = ((97 + 134 + 105) / 3)

// if (mikeAvg > johnAvg && mikeAvg > maryAvg){
//   console.log('Mike\'s Team wins!')
// } else if (maryAvg > mikeAvg && maryAvg > johnAvg) {
//   console.log('Mary\'s Team wins!')
// } else if (johnAvg > mikeAvg && johnAvg > maryAvg) {
//   console.log('John\'s Team wins!')
// } else if (mikeAvg == johnAvg && mikeAvg == maryAvg) {
//   console.log("it's a three-way tie!")
// } else if (mikeAvg == johnAvg ) {
//     console.log("it's a two-way tie between Mike & John!")
// } else if (maryAvg == johnAvg ) {
//   console.log("it's a two-way tie between Mary & John!")
// } else if (maryAvg == mikeAvg ) {
//   console.log("it's a two-way tie between Mary & Mike!")
// }
//   else {
//     console.log('no one wins')
// } 
// -----------------------------------------------------------------------


// function calcAge (birthYear) {
//   return 2018 - birthYear
// }

// var ageJohn = calcAge(1990)
// var ageMike = calcAge(1948)
// var ageJane = calcAge(1969)
// console.log(ageJohn, ageMike, ageJane)

// function yearsUntilRetirement(year, firstName) {
//   var age = calcAge(year)
//   var retirement = 65 - age
//   if (retirement > 0){
//   console.log(firstName +" retires in " + retirement + " years.")
//   } else {
//     console.log(firstName + " already retired")
//   }
// }

// yearsUntilRetirement(1990, "john")
// yearsUntilRetirement(1948, "Mike")
// yearsUntilRetirement(1969, "Jane")

// // -----------------------------------------------------------------------


// //Function Declaration
// function wDYD(job, firstName) {
// }

// //Function expression
// var wDYD = function(job, firstName) {
//   switch(job) {
//     case "teacher":
//       return firstName + ' teaches kids how to code'
//     case "driver" :
//       return firstName + ' drives a cab'
//     case "designer":
//       return firstName + 'designs websites'
//     default:
//       return firstName + ' does something else'
//   }
// }

// console.log(wDYD('pet', "john"))

// var names = ["John", "Mark", "Jane"]
// var years = [1996, 1969, 1948]

// console.log(names.length)

// var john = ['john', 'Smith', 1990, "teacher", false]

// john.push('blue')
// john.unshift("Mr.")
// console.log(john)

// john.shift()
// john.pop()
// console.log(john)

// console.log(john.indexOf(1990))

// var isDesigner = john.indexOf('designer') === -1 ? 'John is NOT a designer' : 'John IS a designer'
// console,length(isDesigner)

// // -----------------------------------------------------------------------


// Section 2 Challenge 3


// function tipCalculator(bill) {
//   var percentage;
//   if (bill < 50) {
//       percentage = .2;
//   } else if (bill >= 50 && bill < 200) {
//       percentage = .15;
//   } else {
//       percentage = .1;
//   }
//   return percentage * bill;
// }

// var bills = [124, 48, 268];
// var tips = [tipCalculator(bills[0]),
//           tipCalculator(bills[1]),
//           tipCalculator(bills[2])];

// var finalValues = [bills[0] + tips[0],
//                  bills[1] + tips[1],
//                  bills[2] + tips[2]];

// console.log(tips, finalValues);

// -------------------------

// var resTip1 = calcTip(124)
// var resTip2 = calcTip(48)
// var resTip3 = calcTip(268)

// var johnTips = [resTip1, resTip2, resTip3]



// function billTotalSum(bill, restip) {
//   return bill + restip
// }

// var total1 = billTotalSum(124, resTip1)
// var total2 = billTotalSum(124, resTip1)
// var total3 = billTotalSum(124, resTip1)

// var johnTotal = [total1, total2, total3]

// console.log(johnTotal)



// -----------------------------------------------------------------------

// Section 2 Objects and Properties

// //Object literal
// var john = {
//     firstName: 'john',
//     lastName: 'Smith',
//     birthYear: 1990,
//     family: ['Jane', 'Mark', 'Bob', "Emily"],
//     job: 'teacher',
//     isMarried: false
// }

// console.log(john.isMarried)
// console.log(john['lastName'])
// var x = 'birthYear'
// console.log(john[x])

// john.job = 'designer'
// john['isMarried'] = true
// console.log(john)

// //New Object syntax
// var jane = new Object()
// jane.firstName = 'Jane'
// jane.birthYear = 1969
// jane['lastName'] = 'Smith'
// console.log(jane)

// -----------------------------------------------------------------------

// Section 2 Objects and Methods

// var john = {
//       firstName: 'john',
//       lastName: 'Smith',
//       birthYear: 1992,
//       family: ['Jane', 'Mark', 'Bob', "Emily"],
//       job: 'teacher',
//       isMarried: false,
//       calcAge: function() {
//         this.age = 2018 - this.birthYear
//       }
//   }

  
//   john.calcAge()
//   console.log(john)

// -----------------------------------------------------------------------

  // Section 2 Challenge 4

// var john2 = {
//   fullName: 'John Mikeson',
//   mass: 68,
//   height: 1.7,
//   bmiCalc: function() {
//     this.bmi = this.mass / (this.height * this.height) 
//     return this.bmi
//   }
// }

// var mike2 = {
//   fullName: 'Mike Johnson',
//   mass: 75,
//   height: 1.9,
//   bmiCalc: function() {
//     this.bmi = this.mass / (this.height * this.height) 
//     return this.bmi
//   }
// }

// john2.bmiCalc()
// mike2.bmiCalc()

// console.log(john2, mike2)

// var mHigher = function() {
//   if (john2.bmi > mike2.bmi){
//     console.log(john2.fullName + ' has a higher BMI')
//   } else if (john2.bmi < mike2.bmi) {
//     console.log(mike2.fullName + ' has a higher BMI')
//   } else console.log("They have the same BMI")
// }

// console.log(mHigher())

// -----------------------------------------------------------------------

  // Section 2 loops and iteration


  //For loop
  // for (var i = 0; i < 10; i++){
  //   console.log(i)
  // }


  // var john = ['john', 'Smith', 1990, "teacher", false]

  // for (var i = 0; i < john.length; i++){
  //   console.log(john[i])
  // }

  // //While loop
  // while( i < john.length) {
  //   console.log(john[i])
  //   i++
  // }


  //continue and break statements 
  // var john = ['john', 'Smith', 1990, "teacher", false, 'blue']

  // for (var i = 0; i < john.length; i++) {
  //   if ( typeof john[i] !== 'string') continue
  //   console.log(john[i])
  // }

  // for (var i = 0; i < john.length; i++) {
  //   if ( typeof john[i] !== 'string') break
  //   console.log(john[i])
  // }

  //backwards loop
  // for (var i = john.length - 1; i > 0; i--) {
  //   console.log(john[i])
  // }

//   // -------------------------------------------------------------------------


//   // Section 2 Challenge 5

// var john = {
//   fullName: "John Cena",
//   bills: [124, 48, 268, 180, 42],
//   calcTip: function () {
//     this.tips = []
//     this.finalValues = []
//     for (var i = 0; i < this.bills.length; i++){
//       var percentage;
//       var bill = this.bills[i]

//       if (bill < 50) {
//           percentage = .2;
//       } else if (bill >= 50 && bill < 200) {
//           percentage = .15;
//       } else {
//           percentage = .1;
//       }
//       this.tips[i] = bill * percentage
//       this.finalValues[i] = bill + bill * percentage
//     }
//   }
// }

// john.calcTip()
// console.log(john)

// var mark = {
//   fullName: "Mike Cena",
//   bills: [77, 375, 110, 45],
//   calcTip: function () {
//     this.tips = []
//     this.finalValues = []
//     for (var i = 0; i < this.bills.length; i++){
//       var percentage;
//       var bill = this.bills[i]

//       if (bill < 100) {
//           percentage = .2;
//       } else if (bill >= 100 && bill < 300) {
//           percentage = .10;
//       } else {
//           percentage = .25;
//       }
//       this.tips[i] = bill * percentage
//       this.finalValues[i] = bill + bill * percentage
//     }
//   }
// }

// function calcAvg(tips) {
//   var sum = 0
//   for (var i = 0; i < tips.length; i++){
//     sum += tips[i] 
//   }
//   return sum / tips.length
// }

// john.calcTip()
// mark.calcTip()

// john.tipAvg = calcAvg(john.tips)
// mark.tipAvg = calcAvg(mark.tips)

// console.log(mark)

//   // -------------------------------------------------------------------------


//   // Section 3 Lecture 3

///////////////////////////////////////
// Lecture: Hoisting

// functions
// calcAge(1990)

// function calcAge(year) {
//   console.log(2016 - year)
// }

// var ret = function (year) {
//   console.log(65- (2016 - year))
// }

// Variables
console.log(age)
var age = 23

function foo () {
  var age = 65
  console.log(age)
}

foo()
console.log(age)
















///////////////////////////////////////
// Lecture: Scoping


// First scoping example

/*
var a = 'Hello!';
first();

function first() {
    var b = 'Hi!';
    second();

    function second() {
        var c = 'Hey!';
        console.log(a + b + c);
    }
}
*/



// Example to show the differece between execution stack and scope chain

/*
var a = 'Hello!';
first();

function first() {
    var b = 'Hi!';
    second();

    function second() {
        var c = 'Hey!';
        third()
    }
}

function third() {
    var d = 'John';
    console.log(a + b + c + d);
}
*/



///////////////////////////////////////
// Lecture: The this keyword






