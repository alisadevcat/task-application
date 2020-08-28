<div class="create_form">

<form name="taskForm" action="/tasks/form" method="POST">
      <?foreach ($tasks as $task):?>
    <input type="text" name="name" placeholder ="Вашe имя" value="<?echo $task['name']?>">
     <input type="email" name="email" placeholder ="Ваш email"  value="<?echo $task['email'] ?>">
      <input type="textarea"name ="textarea" placeholder ="Текст задачи" value="<?echo $task['textarea'] ?>">
   <select size="3" multiple name="hero[]">
  <? echo "<option value={$task['status']}> {$task['status']} </option>"?>;

</select>;
     
    <?endforeach?>
</form>
<input type ="submit" value="Сохранить задачу">
<span id="for_result"></span>
</div>

<script src="static/js/task_ajax.js"></script>