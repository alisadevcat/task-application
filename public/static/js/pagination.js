
let arr1 = document.querySelectorAll('.page');
console.log(arr1);

for (var i = 0 ; i < arr.length; i++){
    arr[i].addEventListener("click", funcPage);
}
async function funcPage(){
    try {
        const response = await fetch('/page/show/`{$i}`', {
            method:GET
        });
        const answer = await response.json(); // .json();
        console.log("ответ сервера " + answer);
        responseHandler(answer);
    } catch (error) {
        console.log("ошибка", error);
   };
    
}
