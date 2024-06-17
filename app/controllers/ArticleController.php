<?php
namespace App\Controllers;

use App\Models\Article;
use PDO;

class ArticleController {
    private $articleModel;

    public function __construct() {
        global $pdo; // Assurez-vous que $pdo est globalement accessible
        $this->articleModel = new Article($pdo);
    }

    public function index() {
        $articles = $this->articleModel->getAll();
        require_once '../app/views/articles/index.php';
    }

    public function show($id) {
        $article = $this->articleModel->getById($id);
        require_once '../app/views/articles/show.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $this->uploadImage();
            $this->articleModel->create($title, $content, $image);
            header('Location: /');
        } else {
            require_once '../app/views/articles/create.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $this->uploadImage();
            $this->articleModel->update($id, $title, $content, $image);
            header('Location: /');
        } else {
            $article = $this->articleModel->getById($id);
            require_once '../app/views/articles/edit.php';
        }
    }

    public function delete($id) {
        $this->articleModel->delete($id);
        header('Location: /');
    }

    private function uploadImage() {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../public/uploads/';
            $fileName = basename($_FILES['image']['name']);
            $uploadFile = $uploadDir . $fileName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                return $fileName;
            }
        }
        return null;
    }
}
?>
