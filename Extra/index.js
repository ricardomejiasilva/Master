
//////////////////////Chapter 4

// Question 1
let range = function(start, end){
  let arr = []
  for (let i = start; i <= end; i++){
    arr.push(i)
  }
  return arr
}
console.log(range(1, 10))



let sum = function(arr){
  let total = 0;
  arr.forEach((i) => {
    total += i
  })
  return total
}
console.log(sum(range(1, 10)))



let range2 = function (start, end, step) {
  let arr=[];
  if(step > 0){
    for(var i = start; i <= end; i++){
      arr.push(i);
    }
  }
  else if(step < 0) {
    for(var i = start; i >= end; i++){
      arr.push(i);
    }
  }
  else {
     for(var i = start; i <= end; i++){
      arr.push(i);
    }    
  }
  return arr;
}
console.log(range2(1, 10, 2));




//Question 2
let reverseArray = function(arr){
  let newArr = []
  for(let i = arr.length -1; i >= 0; i--){
    newArr.push(arr[i])
  }
  return newArr
}
console.log(reverseArray(["A", "B", "C"]));



//question 3
let arrayToList = function(arr){
  let list = {}
  for (let i=arr.length -1; i >= 0; i--) 
      list = {value: arr[i], rest:list}; 
  return list;
}
console.log(arrayToList([10, 20]));



//Question 4
let deepEqual = function (a, b){
  if(a === b) return true
  if (a == null || typeof a != object ||
    b == null || typeof b != object)
    return false;
}

let obj = {here: {is: "an"}, object: 2};
console.log(deepEqual(obj, obj));




/////////////////////////chapter 5 

//question 1

let arrays = [[1, 2, 3], [4, 5], [6]];

let flattener = function(arr){
  let flatten = arr.reduce((a, b) => a.concat(b))
  console.log(flatten)
}
flattener(arrays)



//question 2 

let loop = function(value, test, update, body){
  for (let i = value; test(i); update(i)) {
    body(i)
  }
}



//question 3
// ?????
let every = function (array, test) {
  array.forEach ((i) => {
    if (test(i) === false) {
      return false;
    }
  })
  return true;
}
console.log(every([2, 4, 16], n => n < 10));
console.log(every([1, 3, 5], n => n < 10));


let every2 = function(array, test) {
  return array.some(test);
}

console.log(every2([2, 4, 16], n => n < 10));
console.log(every2([1, 3, 5], n => n < 10));



//////////////////Chapter 6

class Vec {
  constructor (x, y) {
    this.x = x;
    this.y = y;
  }
  plus(v) {
    return new Vec();
  }
  minus(v) {
    return new Vec();
  }
  get length() {
    return Math.sqrt();
  }
}


////// Chapter 7

function compareRobots(robot1, memory1, robot2, memory2) {
  let tasks = 100;
  let movesRobot1 = 0
  let movesRobot2 = 0;
  for (let i = 0; i < tasks; i++) {
    let state = VillageState.random();
    movesRobot1 += runRobot(state, robot1, memory1);
    movesRobot2 += runRobot(state, robot2, memory2);
  }
}