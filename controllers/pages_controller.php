<?php
  class PagesController {
    public function home() {
      require_once('views/pages/home.php');
    }

    public function error404() {
      require_once('views/pages/error404.php');
    }

  }
?>