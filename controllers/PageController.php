<?php
    class PageController {
        public function changePage() {
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['page'] = intval($_POST['page']);
        }
    }
?>