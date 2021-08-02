'use strict';

const home = document.getElementById('home');
const skills = document.getElementById('skills');
const portfolio = document.getElementById('portfolio');
const btnHome = document.querySelector('.home-btn');
const btnSkills = document.querySelector('.skills-btn');
const btnProjects = document.querySelector('.projects-btn');

const allSections = document.querySelectorAll('.section');

const revealSection = function (entries, observer) {
  const [entry] = entries;

  if (!entry.isIntersecting) return;

  entry.target.classList.remove('section--hidden');
  observer.unobserve(entry.target);
};

const sectionObserver = new IntersectionObserver(revealSection, {
  root: null,
  threshold: 0.15,
});

allSections.forEach(function (section) {
  sectionObserver.observe(section);
  section.classList.add('section--hidden');
});
