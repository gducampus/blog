<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';

use App\Controllers\ArticleController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriSegments = explode('/', trim($uri, '/'));

$articleController = new ArticleController();

switch ($uriSegments[0]) {
    case '':
    case 'index.php':
        $articleController->index();
        break;
    case 'articles':
        if (isset($uriSegments[1])) {
            switch ($uriSegments[1]) {
                case 'create':
                    $articleController->create();
                    break;
                case 'edit':
                    if (isset($uriSegments[2])) {
                        $articleController->edit($uriSegments[2]);
                    }
                    break;
                case 'delete':
                    if (isset($uriSegments[2])) {
                        $articleController->delete($uriSegments[2]);
                    }
                    break;
                case 'show':
                    if (isset($uriSegments[2])) {
                        $articleController->show($uriSegments[2]);
                    }
                    break;
                default:
                    header("HTTP/1.0 404 Not Found");
                    echo '404 Not Found';
                    break;
            }
        }
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
        break;
}
?>
