let front = document.querySelector('.login-container');
let back = document.querySelector('.register-container');

let newUser = document.querySelector('.newUser');
newUser.addEventListener('click',function(){
    front.style.zIndex = "1"
    back.style.zIndex = "2"
    front.style.transform = "rotateY(180deg)"
    back.style.transform = "rotateY(0deg)"

})

let existingUser = document.querySelector('.existingUser');
existingUser.addEventListener('click',function(){
    back.style.zIndex = "1"
    front.style.zIndex = "2"
    back.style.transform = "rotateY(180deg)"
    front.style.transform = "rotateY(0deg)"
})