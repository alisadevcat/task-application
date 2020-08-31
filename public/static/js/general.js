let auth = document.querySelector('.auth');
console.log(auth);

let reg = document.querySelector('.reg_a');

reg.addEventListener('click', showFuncReg);
auth.addEventListener('click', showFunc);
let window_form = document.querySelector('.form_window');
let window_reg = document.querySelector('.form_window_reg');


function showFunc(event){
    event.preventDefault();
    window_form.classList.remove('none');
    window_form.classList.add('shown');
}
function showFuncReg(event){
    event.preventDefault();
    
    window_reg.classList.remove('none');
    window_reg.classList.add('shown');
}


let close_modal = document.querySelector('.close_modal');
close_modal.addEventListener('click', disappearFunc);

function disappearFunc(){
    event.preventDefault();
    window_form.classList.remove('shown');
    window_form.classList.add('none');
}

let close_modal_reg = document.querySelector('.close_modal_reg');
close_modal_reg.addEventListener('click', disappearReg);

function disappearReg(){
    event.preventDefault();
    window_reg.classList.remove('none');
    window_reg.classList.add('shown');
    window.location.href="http://test-task5.zzz.com.ua/";
}
