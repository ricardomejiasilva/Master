let toggleNavStatus = false;

let toggleNav = function() {
  let getSidebar = document.querySelector(".nav-sidebar")
  let getSidebarUl = document.querySelector(".nav-sidebar ul")
  let getSidebarTitle = document.querySelector(".nav-sidebar span")
  let getSidebarLinks = document.querySelectorAll(".nav-sidebar a")

  if (toggleNavStatus === false) {
    getSidebarUl.style.visibility = "visible"
    getSidebar.style.width = "300px"
    getSidebarTitle.style.opacity = "0.5"

    let arrayLength = getSidebarLinks.length
    for (let i = 0; i < arrayLength; i++) {
      getSidebarLinks[i].style.opacity = "1"
    }

    toggleNavStatus = true
  }

  else if (toggleNavStatus === true) {
    getSidebar.style.width = "50px"
    getSidebarTitle.style.opacity = "0"

    let arrayLength = getSidebarLinks.length
    for (let i = 0; i < arrayLength; i++) {
      getSidebarLinks[i].style.opacity = "0"
    }
    
    getSidebarUl.style.visibility = "hidden"

    toggleNavStatus = false
  }
}



function Person(name, eyeColor, age) {
  this.name = name
  this.eyeColor = eyeColor
  this.age = age
  this.updateAge = function () {
    return ++this.age
  }
}

let person01 = new Person("Daniel", "Blue", 27)
let person02 = new Person("Jane", "Brown", 43)
 