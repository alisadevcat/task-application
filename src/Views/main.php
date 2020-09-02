
<div class="container" id="fon">

<h2>Список задач</h2>

<div class="sort">
  <h5>Сортировка по</h5>
  <strong>Имени</strong>
  <a href="/sort/name/nameAsc" data-id ="nameAsc"class ="button">А до Я</a>
  <span>/</span>
  <a href ="/sort/name/nameDesc"data-id="nameDesc"class ="button">От Я до А</a>
  <strong>Email</strong>
  <a href="/sort/email/emailAsc" data-id="emailAsc"class ="button">А до Я</a>
  <span>/</span>
  <a href="/sort/email/emailDesc" data-id="emailDesc"class ="button">От Я до А</a>
  <strong>Статусу</strong>
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
    echo "<th>Изменить</th>";?>
    <? if($_SESSION['admin'] === true)
    echo"<th>Статус изменений</th>";
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
    echo "<td><a href=\"/tasks/edit/{$task['id']}\">Изменить задачу</a></td>";
    ?>
    <?if (($_SESSION['admin'] === true) && ($_SESSION['edit'] === true) && ($_SESSION['id_edit'] === $task['id']))
    echo "<td>Отредактирована администратором</td>";?>
    </tr>
   <?endforeach?>
  </tbody>
</table>

<div class="page">
<?
for($i = 1; $i<=$number; $i++){
    echo "<a href='/page/show/$i' class='page'> $i </a>";
}
?>
</div>

<div class="create_form">
<h3>Добавить задачу</h3>
<form name="taskForm" method="POST"class="flex-column">
<input type="text" name="name" placeholder ="Вашe имя">
<input type="email" name="email" placeholder ="Ваш email">
<input type="textarea" name ="textarea" placeholder ="Текст задачи">
<select size="3" multiple name="status[]">
    <option disabled class="status_choice">Выберите статус</option>
    <option value="Выполнена">Выполнена</option>
    <option value="Не выполнена">Не выполнена</option>
</select>

<input type ="submit" value="Сохранить задачу">
<span id="for_result"></span>
</form>
</div>


</div>
<script src="../../static/js/task_ajax.js"></script>

