const hamburger = document.querySelector('.hamburger');
const topMenu = document.querySelector('.topMenuContainer');
const show = document.querySelector('show');
const mobileTopMenu = document.querySelector('.mobileTopMenu');
const mobileTopMenuContainer = document.querySelector('.mobileTopMenuContainer')




hamburger.addEventListener('click', (e) => {
    if (e.target.tagName === 'I') {
        e.target.classList.toggle('fa-bars');
        e.target.classList.toggle('fa-xmark');
    }

}
)

hamburger.addEventListener('click', () => {
    mobileTopMenu.classList.toggle('show');
    if (mobileTopMenu.classList.contains('show')){
        mobileTopMenuContainer.innerHTML=topMenu.innerHTML;
    } else{
        mobileTopMenuContainer.innerHTML=null;
    }


})