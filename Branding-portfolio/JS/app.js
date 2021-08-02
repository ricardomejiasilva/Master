var menuBtn = document.getElementsByClassName('menu-btn')

var mobileMenu = document.getElementsByClassName('mobile-menu')

var clickBtn = function() {
  mobileMenu[0].classList.toggle('active')
}
menuBtn[0].addEventListener('click', clickBtn)
console.log(menuBtn[0])
