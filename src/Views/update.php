<div class="container edit-container">
  <div class="edit_form">
  <h4>Изменить задачу</h4>
  </div>
   <?foreach ($tasks as $task):?>
  <form name="editForm" data-id="<?echo $task['id']?>" method="POST" class="flex-column">
        <input type="text" name="name"value="<?echo $task['name']?>">
        <input type="email" name="email" value="<?echo $task['email'] ?>">
        <input type="textarea" name ="textarea" value="<?echo $task['textarea'] ?>">
        <select required size="3" multiple name="status[]">
          <option disabled class="status_choice">Выберите статус</option>
          <option value="Выполнена">Выполнена</option>
          <option value="Не выполнена">Не выполнена</option>
      </select>
      <input type ="submit" value="Сохранить задачу">
      <span id="for_result" class="block"></span>
    <?endforeach;?>
  </form>
</div>
<script src="../../static/js/edit_ajax.js"></script>
