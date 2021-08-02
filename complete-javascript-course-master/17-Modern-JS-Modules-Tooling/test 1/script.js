// Importing Module
// import {
//   addToCart,
//   totalPrice as price,
//   tq,
// } from './shoppingCart.js';
// addToCart('bread', 5);
// console.log(price, tq);
// console.log(shippingCost)

// console.log('Importing Module');

// import * as ShoppingCart from './shoppingCart.js'
// ShoppingCart.addToCart('bread', 5)

// import add, {addToCart, totalPrice as price,tq,} from './shoppingCart.js'

import add, {cart} from './shoppingCart.js'
add('pizza', 2)
add('bread', 2)
add('pie', 2)

console.log(cart)
/*
const shoppingCart2 = (function(){
  const cart = [];
  const shippingCost = 10
  const totalPrice = 237;
  const totalQuantity =23;

  const addToCart = function(product, quantity){
    cart.push({product, quantity})
    console.log(`${quantity} ${product} added to cart`)
  }

  const orderStock = function(product, quantity){
    console.log(`${quantity} ${product} ordered from supplier`)
  }

  return {
    addToCart,
    cart,
    totalPrice,
    totalQuantity,
  }
})()

shoppingCart2.addToCart('apple', 4)
shoppingCart2.addToCart('pizza', 2)
console.log(shoppingCart2)
console.log(shoppingCart2.ode)
*/
/*
// NPM common js import/export
//Export
export.addToCart = function(product, quantity){
  cart.push({product, quantity})
  console.log(`${quantity} ${product} added to cart`)
}

// Import 
const { addToCart} = require('./shoppingCart.js')
*/

// import cloneDeep from './node_modules/lodash-es/cloneDeep.js'
import cloneDeep from 'lodash-es';


const state = {
  cart: [
    {product: 'bread', quantity: 5},
    {product: 'pizza', quantity: 5},
  ],
  user: {loggedIn: true},
}

const stateClone = Object.assign({}, state);
const stateDeepClone = cloneDeep(state)

state.user.loggedIn = false;
console.log(stateClone)


console.log(stateDeepClone)

console.log('live')

if(module.hot){
  module.hot.accept()
}

import 'core-js/stable'





