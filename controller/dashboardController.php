<?php

require_once __DIR__ . '/../model/dashboardModel.php';

class dashboardController {

    public function index() {
        session_start();

        if (!isset($_SESSION['login'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $model = new dashboardModel();
        $posts = $model->getPosts();

        include __DIR__ . '/../view/dashboard_view.php';
    }
}
