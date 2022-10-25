const word = document.querySelector('.word');

let str = 'A Passionate Front-End Developer';
let str2 = 'An Aspiring Full-Stack Developer';



function setText(home) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            word.innerHTML = home;
         
            resolve()
        }, 50)
    })
}

async function home(flag) {
    if (flag === 0) {
        for (let i = 1; i <= str.length; i++) {
            await setText(str.substring(0, i));
        }
        setTimeout(() => {
            home(1);
        }, 800)

    } else if (flag === 1) {
        for (let i = str.length; i > 0; i--) {
            await setText(str.substring(0, i))
        }
        home(-1);
    } else if (flag === -1) {
        for (let i = 0; i <= str2.length; i++) {
            await setText(str2.substring(0, i));
        }
        setTimeout(() => {
            home(-2);
        }, 800)

    } else if (flag === -2) {
        for (let i = str2.length; i > 0; i--) {
            await setText(str2.substring(0, i))
        }
        home(0)
    }
}
home(0)



