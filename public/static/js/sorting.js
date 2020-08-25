
let arr = document.querySelectorAll('span');
console.log(arr);

for (var i = 0 ; i < arr.length; i++){
    arr[i].addEventListener("click", funcSort);
}

async function funcSort(event){
let clickElem = event.target;
let id = clickElem.dataset.id;
console.log(id);


let url = `/tasks/sort/${id}`;

let response = await fetch(url);

let data = await response.json(); // читаем ответ в формате JSON
return data;
}
// $(document).ready(function(){
//     $(".sort span").click(function(){
//     let id = $(this).attr('id');
//     $(#fon).css({'display':'block'});
//    $.ajax({
//        url:'/sort',
//        data:'sort'+id,
//        type:'get',
//        success:function(html){
//         alert(html);
//        }
//    })

//     });
//     });
// });