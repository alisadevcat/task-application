
<?

namespace BeeJee\Web\Controllers;
use BeeJee\Web\Base\Controller;
use BeeJee\Web\Models\MainService;

class TasksController extends Controller{
public $mainservice;

public function __construct(){
$this->mainservice = new Mainservice();
}

public function SortAction($id){
    // должен отработать по запосу
    // 'получить страницу с книгой по id' /books/book/1
    $template = 'template.php';
    $content = 'main.php';
    // $book = $this->books_model->getBookById($id);

    // $data = [
    //     'page_title' => $book['title'],
    //     'book' => $book,
    //     'js' => 'books.js'
    // ];
    $result =$this->mainservice->showId($id);
    return json_encode($result, JSON_UNESCAPED_UNICODE);
}
}?>