<div class="edit_form">
    <h2>Изменение задачи</h2>

<form name="editForm" data-id ="<?echo $task['id']?>" method="POST" class="flex-column">
      
      <?foreach ($tasks as $task):?>
    <input type="text" name="name" placeholder ="Вашe имя" value="<?echo $task['name']?>">
     <input type="email" name="email" placeholder ="Ваш email"  value="<?echo $task['email'] ?>">
      <input type="textarea"name ="textarea" placeholder ="Текст задачи" value="<?echo $task['textarea'] ?>">
      <select required size="3" multiple name="status[]">
    <option disabled class="status_choice">Выберите статус</option>
    <option value="Выполнена">Выполнена</option>
    <option value="Не выполнена">Не выполнена</option>
</select>
      <?endforeach;?>
<input type ="submit" value="Сохранить задачу">
<span id="for_result"></span>
</form>
</div>

<script src="/static/js/edit_ajax.js"></script>