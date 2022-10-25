const homeArea = document.querySelector('.homeTitle')
const aboutArea = document.querySelector('.tool');
const projectArea = document.querySelector('.projectOne')
const projectAreaTwo = document.querySelector('.projectThree');
const contactArea = document.querySelector('.contact');
const homeOption = document.querySelector('.homeOption');
const aboutOption = document.querySelector('.aboutOption');
const projectOption = document.querySelector('.projectOption');
const contactOption = document.querySelector('.contactOption');


// top menu color change
const observerThree = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.intersectionRatio > 0) {
            homeOption.classList.remove('color');
            aboutOption.classList.add('color');
            projectOption.classList.remove('color');
            return;
        }

        aboutOption.classList.remove('color');

    })
});
observerThree.observe(aboutArea);

const observerFour = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.intersectionRatio > 0) {
            projectOption.classList.add('color');
            aboutOption.classList.remove('color');
            return;
        }
    })
});
observerFour.observe(projectArea);

const observerFive = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.intersectionRatio > 0) {
            projectOption.classList.add('color');
            return;
        }
        projectOption.classList.remove('color');
    })
});
observerFour.observe(projectAreaTwo);

const observeSix = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.intersectionRatio > 0) {
            homeOption.classList.add('color');
            return;
        }
        homeOption.classList.remove('color')
    })
})
observeSix.observe(homeArea);

const observeSeven = new IntersectionObserver((entries)=>{
    entries.forEach(entry=>{
        if(entry.intersectionRatio>0){
            contactOption.classList.add('color');
            projectOption.classList.remove('color');
            return;
        }
        contactOption.classList.remove('color')
    })
})
observeSeven.observe(contactArea)










