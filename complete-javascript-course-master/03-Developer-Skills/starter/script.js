// Remember, we're gonna use strict mode in all scripts now!
'use strict';
// Calc Temp Amplitude = difference between highest and lowest temp
// - how to compute max and min
// - what is sensor error/ how to ignore it
// TASKS
// - find min and max
// - subtract min and max and return it

const temperatures = [3, -2, -6, -1, 'error', 9, 13, 17, 15, 14, 9, 5];

const calcTempAmplitude = function (t1, t2) {
  const temps = t1.concat(t2);
  console.log(temps);

  let max = temps[0];
  let min = temps[0];

  for (let i = 0; i < temps.length; i++) {
    const curTemp = temps[i];
    if (typeof curTemp !== 'number') continue;

    if (curTemp > max) max = curTemp;
    if (curTemp < min) min = curTemp;
  }
  console.log(max, min);
  return max - min;
};

const amplitude = calcTempAmplitude(temperatures, [9, 6, 3, -2]);
console.log(amplitude);


cl