<?php

include 'config.php';

class pengguna {
    public function user() {
        echo $_SESSION['username'];
    }
}
?>