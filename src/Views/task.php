
<div class="container" id="fon">
<h2>Список задач</h2>
<div class="sort">
<h3>Сортировка по</h3>
<strong>Имени</strong><span id ="nameAsc"class ="button"><a href=`/tasks/sort/${id}`'></a>А до Я</span><span id="nameDesc"class ="button">От Я до А</span>
<strong>Email </strong><span id="emailAsc"class ="button">А до Я</span><span id="emailDesc"class ="button">От Я до А</span>
<strong>Статус</strong><span id="statusAsc"class ="button">А до Я</span><span id="statusDesc"class ="button">От Я до А</span>
</div>
<? foreach ($alltasks as $task):?>
<div class="tasks flex-row">
<p><?echo $task['id']?></p>
    <p><?echo $task['name']?></p>
    <p><?echo $task['email']?></p>
    <p><?echo $task['textarea']?></p>
    <p><?echo $task['status']?></p>
</div>
<?endforeach;?>

<?
for($i = 1; $i<=$number; $i++){
    echo "<a href=\page\'$i'\>$i</a>";
}
?>

</div>
<script src="/static/js/sorting.js"></script>