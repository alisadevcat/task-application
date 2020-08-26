let auth = document.querySelector('.auth');
console.log(auth);

let reg = document.querySelector('.reg_a');

reg.addEventListener('click', showFuncReg);
auth.addEventListener('click', showFunc);

function showFunc(event){
    event.preventDefault();
    let window_form = document.querySelector('.form_window');
    window_form.classList.remove('none');
    window_form.classList.add('shown');
}
function showFuncReg(event){
    event.preventDefault();
    let window_reg = document.querySelector('.form_window_reg');
    window_reg.classList.remove('none');
    window_reg.classList.add('shown');
}


let close_modal = document.querySelector('.close_modal');
close_modal.addEventListener('click', disappearFunc);

function disappearFunc(){
    event.preventDefault();
    let window_form = document.querySelector('.form_window');
    window_form.classList.remove('shown');
    window_form.classList.add('none');
    window_reg.classList.remove('none');
    window_reg.classList.add('shown');
    window.location.href="/";
}