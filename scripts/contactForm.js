//form info validation
const userName = document.getElementById('name');
const userEmail = document.getElementById('emailAddress');
const userMsg = document.getElementById('message');
const userSubmit = document.getElementById('userSubmit');
const re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
const nameRe = /^[a-zA-Z0-9]+$/;
const formElement = document.querySelector("form");

formElement.addEventListener('submit', (e) => {
    e.preventDefault();

    if (!userName.value.match(nameRe)) {
        alert('🌍 May I have your name,please?')
    }
   
    if (!userEmail.value.match(re)) {
        alert('📧 Please enter valid eamil address, thanks!')
    };

    
    if (userEmail.value.match(re) && userName.value.match(nameRe)) {
        alert("I'll contact you soon ❤️!");
        userName.value = '';
        userEmail.value = '';
        userMsg.value = '';
    }

})