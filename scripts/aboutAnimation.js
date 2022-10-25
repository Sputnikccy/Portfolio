//get element
const aboutImg = document.querySelector('.aboutImg');
const aboutText = document.querySelector('.aboutText');

//animation on left part on #about
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.intersectionRatio > 0) {
            entry.target.classList.add('leftAnimation');
            return;
        }
        aboutImg.classList.remove('leftAnimation');

    })
});
observer.observe(aboutImg);

//animation on right part on #about
const observerTwo = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.intersectionRatio > 0) {
            entry.target.classList.add('rightAnimation');
            return;
        }
        aboutText.classList.remove('rightAnimation')
    })
});
observerTwo.observe(aboutText);

