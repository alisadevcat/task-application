
let edit_form = document.forms.editForm;
let id = edit_form.dataset.id;
console.log(id);
console.log(edit_form);
let result = document.querySelector("#for_result");
console.log(result);

const TASK_SAVED ="Задача сохранена";
const TASK_UNSAVED ="Задача не сохранена";


edit_form.addEventListener('submit', async(event)=>{
// async позволяет использовать await


    event.preventDefault();
    try {
        const response = await fetch("/tasks/save/`{id}`", {//обработчик action
            method: 'POST', 
            body: new FormData(edit_form)
        });
        let answer = await response.text();
        console.log("ответ сервера " + answer);
        responseHandler(answer);
    }catch (error) {
        console.log("ошибка", error);
    }
});

function responseHandler(answer){
    if (answer === TASK_SAVED){
        result.innerHTML = TASK_SAVED;
        setTimeout("window.location.replace('/')" , 3000); 
    }if(answer === TASK_UNSAVED){
    result.innerHTML = TASK_UNSAVED ;
    }
    
    };
