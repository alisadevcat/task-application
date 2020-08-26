let task_form = document.forms.taskForm;
console.log(task_form);

const TASK_OK ="Задача добавлена";
const TASK_FAIL="Данные не внесены";

task_form.addEventListener('submit', async(event)=>{
    // async позволяет использовать await
        event.preventDefault();
        try {
            const response = await fetch("/tasks/add", {//обработчик action
                method: 'POST', 
                body: new FormData(task_form)
            });
            const answer = await response.text(); 
            console.log(answer);
            responseHandler(answer);
        } catch (error) {
            console.log("ошибка", error);
        }
    });

function responseHandler(answer){
let result = document.getElementById("for_result");

    if (answer == TASK_OK){
        result.innerHTML = TASK_OK;
    }else{
    result.innerHTML = TASK_FAIL};
    
    };