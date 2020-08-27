const USER_EXISTS ="Пользователь уже существует";
const INSERT_FAIL="Данные не внесены";
const REG_SUCCESS="Регистрация успешна";
const NAME_ERROR="Такое имя уже есть";
const AUTH_PWD_ERROR='Неверный пароль';
const AUTH_SUCCESS ='Авторизация успешна';

let auth_form = document.forms.authForm;
let auth_password = auth_form.elements.password;
let auth_email= auth_form.elements.email;

console.log(auth_form);

auth_form.addEventListener('submit', async(event)=>{
// async позволяет использовать await
    event.preventDefault();
    try {
        const response = await fetch("/authorisation", {//обработчик action
            method: 'POST', 
            body: new FormData(auth_form)
        });
        let answer = await response.text();
        console.log("ответ сервера " + answer);
        responseHandler(answer);
    }catch (error) {
        console.log("ошибка", error);
    }
});

auth_result=document.querySelector(".auth_result");
auth_email=document.querySelector(".auth_email");
auth_password=document.querySelector(".auth_password");

function responseHandler(answer){
    if(answer === AUTH_SUCCESS){
      auth_result.innerHTML = AUTH_SUCCESS;
      window.location.replace('/');
    }
    if(answer === NAME_ERROR){
        auth_email.innerHTML= NAME_ERROR;
    }
    if(answer === AUTH_PWD_ERROR){
        auth_password.innerHTML = AUTH_PWD_ERROR;
    }
    } 

let reg_form = document.forms['regForm'];
let reg_result = document.querySelector(".reg_result");
let reg_login = document.querySelector(".reg_name");
let reg_password = document.querySelector(".reg_password");

reg_form.addEventListener('submit', async(event)=>{
// async позволяет использовать await
    event.preventDefault();
    try {
        const response = await fetch("/registration/", {//обработчик action
            method: 'POST', 
            body: new FormData(reg_form)
        });
        let answer = await response.text();
        console.log("ответ сервера " + answer);
        regResponseHandler(answer);
    } catch (error) {
        console.log("ошибка", error);
    }
});



function regResponseHandler(answer){
if(answer === USER_EXISTS){
span_email.innerHTML= USER_EXISTS;
}if (answer === INSERT_FAIL){
reg_result.innerHTML= INSERT_FAIL;
}if(answer === REG_SUCCESS){
reg_result.innerHTML= REG_SUCCESS;
window.location.replace('/');
}                   
} 
