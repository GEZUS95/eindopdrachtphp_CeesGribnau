<?php

class sessionHelper
{
    public function message() {
        if (isset($_SESSION['message'])) {
            echo "<H5>".$_SESSION['message']."</H5>";
            unset($_SESSION['message']);
        }
    }
    public function redirect(string $message, string $location){
        $_SESSION['message'] = $message;
        echo "<script>setTimeout(\"location.href = '$location';\",100);</script>";
        exit(0);
    }
    public function redirect2(string $message, string $location, int $duration){
        $_SESSION['message'] = $message;
        echo "<script>setTimeout(\"location.href = '$location';\",$duration);</script>";
        exit(0);
    }
}