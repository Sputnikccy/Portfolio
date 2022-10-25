const contactWord = document.querySelector('.contactWord')
let str3= 'Thanks For Stopping By! ';
let str4 = "I'd Love To Hear From You!";



function setText(contact) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            contactWord.innerHTML = contact;
         
            resolve()
        }, 50)
    })
}

async function contatc(flag) {
    if (flag === 0) {
        for (let i = 1; i <= str3.length; i++) {
            await setText(str3.substring(0, i));
        }
        setTimeout(() => {
            contatc(1);
        }, 800)

    } else if (flag === 1) {
        for (let i = str3.length; i > 0; i--) {
            await setText(str3.substring(0, i))
        }
        contatc(-1);
    } else if (flag === -1) {
        for (let i = 0; i <= str4.length; i++) {
            await setText(str4.substring(0, i));
        }
        setTimeout(() => {
            contatc(-2);
        }, 800)

    } else if (flag === -2) {
        for (let i = str4.length; i > 0; i--) {
            await setText(str4.substring(0, i))
        }
        contatc(0)
    }
}
contatc(0)



