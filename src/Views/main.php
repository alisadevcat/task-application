
<div class="container" id="fon">
<h2>Список задач</h2>
<div class="sort">
<h3>Сортировка по</h3><strong>Имени</strong>
<a href="/sort/name/nameAsc" data-id ="nameAsc"class ="button">А до Я</a>
<span>/</span>
<a href ="/sort/name/nameDesc"data-id="nameDesc"class ="button">От Я до А</a>
<strong>Email </strong>
<a href="/sort/email/emailAsc" data-id="emailAsc"class ="button">А до Я/</a>
<span>/</span>
<a href="/sort/email/emailDesc" data-id="emailDesc"class ="button">От Я до А</a>
<strong>Статус</strong>
<a href="/sort/status/done" data-id="statusAsc" class ="button">ВЫПОЛНЕНА</a>
<span>/</span>
<a href="/sort/status/undone" data-id="statusAsc" class ="button">НЕ ВЫПОЛНЕНА</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Email</th>
      <th scope="col">Задача</th>
      <th scope="col">Статус</th>
      <? if($_SESSION['admin'] === true)
    echo "<th>Изменить</th>";
    echo "<th>Сохранить</th>";
    ?>
    </tr>
  </thead>
  <tbody><? foreach ($alltasks as $task):?>
    <tr>
    
      <th scope="row"><?echo $task['id']?></th>
      <td><?echo $task['name']?></td>
      <td><?echo $task['email']?></td>
      <td><?echo $task['textarea']?></td>
      <td class="task__item__status"><?echo $task['status']?></td>
      <? if($_SESSION['admin'] === true)
    echo "<td><a href='/tasks/edit'>Изменить задачу</a></td>";
    echo "<td><a href='/tasks/save'>Cохранить задачу</a></td>";
    ?>
    </tr>
   <?endforeach?>
  </tbody>
</table>

<!-- if($_SESSION['user_role'] =="admin"){
        echo "<a href='/tasks/edit/$task['name']> Изменить задачу </a>";
        echo "<a href='/tasks/save'> Сохранить задачу </a>";
    } -->

<?
for($i = 1; $i<=$number; $i++){
    echo "<a href='/page/show/$i' class='page'> $i </a>";
}
?>

<div class="create_form">
<form name="taskForm" action="/tasks/add" method="POST">
<table>
    <tr>
        <td>
<input type="text" name="name" placeholder ="Вашe имя">
<input type="email" name="email" placeholder ="Ваш email">
<input type="textarea"name ="textarea" placeholder ="Текст задачи">
<select size="3" multiple name="hero[]">
    <option disabled class="status">Выберите статус</option>
    <option value="DONE">DONE</option>
    <option value="UNDONE">UNDONE</option>
    </td>
    </tr>
</table>

</form>
<input type ="submit" value="Создать задачу">
<span id="for_result"></span>
</div>

</div>
<!-- <script src="/static/js/sorting.js"></script> -->
<!-- <script src="/static/js/pagination.js"></script> -->
<script src="/static/js/task_ajax.js"></script>
