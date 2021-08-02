'use strict';

const btn = document.querySelector('.btn-country');
const countriesContainer = document.querySelector('.countries');

const renderCountry = function (data, className = '') {
  const html = `
  <article class="country ${className}">
    <img class="country__img" src="${data.flag}" />
    <div class="country__data">
      <h3 class="country__name">${data.name}</h3>
      <h4 class="country__region">${data.region}</h4>
      <p class="country__row"><span>👫</span>${(
        +data.population / 1000000
      ).toFixed(1)} people</p>
      <p class="country__row"><span>🗣️</span>${data.languages[0].name}</p>
      <p class="country__row"><span>💰</span>${data.currencies[0].name}</p>
    </div>
  </article>
  `;
  countriesContainer.insertAdjacentHTML('beforeend', html);
  countriesContainer.style.opacity = 1;
};

const renderError = function (msg) {
  countriesContainer.insertAdjacentText('beforeend', msg);
  countriesContainer.style.opacity = 1;
};

///////////////////////////////////////

const getJSON = function (url, errorMsg = 'Something went wrong') {
  return fetch(url).then(response => {
    if (!response.ok) throw new Error(`${errorMsg} ${response.status})`);

    return response.json();
  });
};

const getCountryData = function (country) {
  // country 1
  getJSON(
    `https://restcountries.eu/rest/v2/name/${country}`,
    'Country not found'
  )
    .then(data => {
      renderCountry(data[0]);
      const neighbor = data[0].borders[0];

      if (!neighbor) throw new Error('No neighbor found!');

      // Country 2
      return getJSON(
        `https://restcountries.eu/rest/v2/alpha/${neighbor}`,
        'Country not found'
      );
    })
    .then(data => renderCountry(data, 'neighbor'))
    .catch(err => {
      console.log(`${err}🧯🧯🧯`);
      renderError(`Something went wrong ${err.message}. Try again`);
    })
    .finally(() => {
      countriesContainer.style.opacity = 1;
    });
};

btn.addEventListener('click', function () {});

// getCountryData('australia');

/*
////////////////////////////////////////////////////////////////
// coding challenge
const whereAmI = function (lat, lng) {
  fetch(`https://geocode.xyz/${lat},${lng}?geoit=json`)
    .then(res => {
      console.log(res);
      if (!res.ok) throw new Error (`Something went wrong ${res.status}`)
      return res.json()
    })
    .then(data =>{
      console.log(data);
      console.log(`You are in ${data.city}, ${data.country}`)
      getCountryData(data.country)
    })
    .catch(err => {
      console.log(`${err}`);
    })
}

whereAmI(52.508, 13.381);
whereAmI(19.037, 72.873);
whereAmI(-33.933, 18.474);
*/

/*
// const callAPI = function () {
//   // AJAX call country 1 
//   const request = new XMLHttpRequest()
//   request.open('GET', `https://restcountries.eu/rest/v2/name/${country}`)
//   request.send()
// }

const getCountryAndNeighbor = function(country){
  // AJAX call country 1 
  const request = new XMLHttpRequest()
  request.open('GET', `https://restcountries.eu/rest/v2/name/${country}`)
  request.send()

  request.addEventListener('load', function(){
    const [data] = JSON.parse(this.responseText)
    console.log(data);

    // Render Country 1
    renderCountry(data)

    // Get neighbor country 2
    const [neighbor] = data.borders;

    if(!neighbor) return;

    // AJAX call country 1 
    const request2 = new XMLHttpRequest()
    request2.open('GET', `https://restcountries.eu/rest/v2/alpha/${neighbor}`)
    request2.send()

    request2.addEventListener('load', function () {
     const data2 = JSON.parse(this.responseText);
     renderCountry(data2, 'neighbor')
    })

  })  
}

getCountryAndNeighbor('usa')

*/

// const request = new XMLHttpRequest();
// request.open('GET', `https://restcountries.eu/rest/v2/name/${country}`);
// request.send();

// const request = fetch('https://restcountries.eu/rest/v2/name/usa');
// console.log(request);
////////////
// const getCountryData = function (country) {
//   fetch(`https://restcountries.eu/rest/v2/name/${country}`)
//     .then(function (response) {
//       console.log(response);
//       return response.json();
//     })
//     .then(function (data) {
//       console.log(data);
//       renderCountry(data[0])
//     });
// };

// const getCountryData = function (country) {
//   // country 1
//   fetch(`https://restcountries.eu/rest/v2/name/${country}`)
//     .then(response => {
//       console.log(response);

//       if (!response.ok) throw new Error(`Country not found ${response.status}`);

//       return response.json();
//     })
//     .then(data => {
//       renderCountry(data[0]);
//       const neighbor = 'sddssf';
//       // data[0].borders[0]

//       if (!neighbor) return;

//       // Country 2
//       return fetch(`https://restcountries.eu/rest/v2/alpha/${neighbor}`);
//     })
//     .then(response => {
//       if (!response.ok) throw new Error(`Country not found ${response.status}`);

//       return response.json()
//     })
//     .then(data => renderCountry(data, 'neighbor'))
//     .catch(err => {
//       console.log(`${err}🧯🧯🧯`);
//       renderError(`Something went wrong ${err.message}. Try again`);
//     })
//     .finally(() => {
//       countriesContainer.style.opacity = 1;
//     });
// };

// console.log('Test start');
// setTimeout(() => console.log('0 sec time'), 0);
// Promise.resolve('Resolved promise 1').then(res =>
//   console.log(res));

//   Promise.resolve('Resolved promise 2').then(res => {
//     for (let i = 0; i < 1000000000; i++) {}
//     console.log(res);
//   });
// console.log('Test end');

////////////////////////////////////////////
// const lotteryPromise = new Promise (function(resolve, reject){

//   console.log('Lottery draw is happening');
//   setTimeout(function(){
//     if(Math.random() >= 0.5){
//       resolve('You win!')
//     } else {
//       reject(new Error('You lost'))
//     }
//   }, 2000)
// })

// lotteryPromise.then(res => console.log(res)).catch(err => console.error(err))

////////////////////////////////////////////////////////////////////
// Promisifying settimeout
// const wait = function(seconds) {
//    return new Promise(function(resolve){
//      setTimeout(resolve, seconds * 1000)
//    })
// }
// //
// wait(4).then(()=> {
//   console.log("I waited 2 seconds");
//   return wait(1)
// })
// .then(() => console.log("I waited 1 sec"))
// //
// Promise.resolve('abc').then(x => console.log(x))
// Promise.reject(new Error('problem')).then(x => console.error(x))

//////////////////////////////////////////////////////////////////////
// const getPosition = function () {
//   return new Promise(function (resolve, reject) {
//     // navigator.geolocation.getCurrentPosition(
//     //   position => resolve(position),
//     //   err => reject(err)
//     // );
//     navigator.geolocation.getCurrentPosition(resolve, reject);
//   });
// };

// const whereAmI = function () {
//   getPosition()
//     .then(pos => {
//       const { latitude: lat, longitude: lng } = pos.coords;

//       return fetch(`https://geocode.xyz/${lat},${lng}?geoit=json`);
//     })
//     .then(res => {
//       if (!res.ok) throw new Error(`Problem with geocoding ${res.status}`);
//       return res.json();
//     })
//     .then(data => {
//       console.log(data);
//       console.log(`You are in ${data.city}, ${data.country}`);

//       return fetch(`https://restcountries.eu/rest/v2/name/${data.country}`);
//     })
//     .then(res => {
//       if (!res.ok) throw new Error(`Country not found (${res.status})`);

//       return res.json();
//     })
//     .then(data => renderCountry(data[0]))
//     .catch(err => console.error(`${err.message} 💥`));
// };

// btn.addEventListener('click', whereAmI);

////////////////////////////////////////
// Coding Challenge 2
/*
const wait = function(seconds) {
  return new Promise(function(resolve){
    setTimeout(resolve, seconds * 1000)
  })
}
const images = document.querySelector('.images');

const createImg = function (imgPath) {
  return new Promise(function (resolve, reject) {
    const img = document.createElement('img');
    img.src = `img/img-${imgPath}.jpg`
    
    img.addEventListener('load', function(){
      images.append(img)
      resolve(img)
    })
    img.addEventListener('error', function(){
      reject(new Error('Image not found'))
    })
  })
};
let currentImg;
createImg(2).then(img => {
  currentImg = img
  console.log('Img 2 loaded')
  return wait(2)
}).then(() => {
  currentImg.style.display = 'none'
  return createImg(1)
}).then (img => {
  currentImg = img
  console.log('Img 1 loaded')
  return wait(2)
}).then(() => {
  currentImg.style.display = 'none'
})
.catch(err => console.error(err))


// const img = document.createElement('img');
// img.src = 'img/img-1.jpg';
// images.appendChild(img);
*/
/*
const getPosition = function () {
  return new Promise(function (resolve, reject) {
    navigator.geolocation.getCurrentPosition(resolve, reject);
  });
};

const whereAmI = async function (country) {
  try {
    // Geolocation
    const pos = await getPosition();
    const { latitude: lat, longitude: lng } = pos.coords;

    // Reverse Geocoding
    const resGeo = await fetch(`https://geocode.xyz/${lat},${lng}?geoit=json`);
    if (!resGeo.ok) throw new Error('problem getting location data');

    const dataGeo = await resGeo.json();

    // country data
    const res = await fetch(
      `https://restcountries.eu/rest/v2/name/${dataGeo.country}`
    );
    if (!resGeo.ok) throw new Error('problem getting country data');
    const data = await res.json();
    renderCountry(data[0]);
    return `You are in ${dataGeo.city}, ${dataGeo.country}`;
  } catch (err) {
    console.error(err);
    renderError(`****${err.message}`);

    // Reject promise returned from async
    throw err;
  }
};

console.log('1: will get location');
// const city = whereAmI();
// console.log(city);
// whereAmI()
//   .then(city => console.log(`2: ${city}`))
//   .catch(err => console.error(`2: ${err.message}`))
//   .finally(() => console.log('3: finished getting location'));

(async function(){
  try{
    const city = await whereAmI()
    console.log(`2: ${city}`)
  } catch(err){
    console.error(`2: ${err.message}`)
  }
  console.log('3: finished getting location')
})()
*/
/*
const get3Countries = async function(c1, c2, c3){
  try{
    // const [data1] = await getJSON(`https://restcountries.eu/rest/v2/name/${c1}`)
    // const [data2] = await getJSON(`https://restcountries.eu/rest/v2/name/${c2}`)
    // const [data3] = await getJSON(`https://restcountries.eu/rest/v2/name/${c3}`)

   const data = await Promise.all([
     getJSON(`https://restcountries.eu/rest/v2/name/${c1}`), 
     getJSON(`https://restcountries.eu/rest/v2/name/${c2}`), 
     getJSON(`https://restcountries.eu/rest/v2/name/${c3}`)
    ])

    console.log(data.map(d => d[0].capital));
  }catch(err){
    console.error(err)
  }
}
get3Countries('usa', 'portugal', 'dominican')
*/

// Promise.race
(async function () {
  const res = await Promise.race([
    getJSON(`https://restcountries.eu/rest/v2/name/italy`),
    getJSON(`https://restcountries.eu/rest/v2/name/usa`),
    getJSON(`https://restcountries.eu/rest/v2/name/mexico`),
  ]);
  console.log(res[0]);
})();

const timeout = function (sec) {
  return new Promise(function (_, reject) {
    setTimeout(function () {
      reject(new Error('request took too long'));
    }, sec * 1000);
  });
};

Promise.race([
  getJSON(`https://restcountries.eu/rest/v2/name/mexico`),
  timeout(30),
])
  .then(res => console.log(res[0]))
  .catch(err => console.log(err));

// Promise.allSettled
Promise.allSettled([
  Promise.resolve('Success'),
  Promise.reject('Error'),
  Promise.resolve('Another success'),
])
  .then(res => console.log(res))
  .catch(err => console.log(err));

//Promise.any
Promise.any([
  Promise.resolve('Success'),
  Promise.reject('Error'),
  Promise.resolve('Another success'),
])
  .then(res => console.log(res))
  .catch(err => console.log(err));