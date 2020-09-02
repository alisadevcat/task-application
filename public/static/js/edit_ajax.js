
let edit_form = document.forms.editForm;
let id = edit_form.dataset.id;
console.log(id);
let result = document.querySelector("#for_result");

const TASK_UNSAVED ="Задача не сохранена";
const TASK_SAVED ="Задача сохранена";

edit_form.addEventListener('submit', async(event)=>{
    event.preventDefault();
    try {
        const response = await fetch(`/tasks/save/${id}`, {//обработчик action
            method: 'POST', 
            body: new FormData(edit_form)
        });
        let answer = await response.text();
        console.log("ответ сервера " + answer);
        if (answer === true){
            result.innerHTML = TASK_UNSAVED;
        }else{
        result.innerHTML = TASK_SAVED;
        setTimeout("window.location.replace('/')" , 5000);
        }
    }catch (error) {
        console.log("ошибка", error);
    }
});

