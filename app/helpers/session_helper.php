<?php
session_start();

function isLoggedIn()
{
    if (isset($_SESSION['id_user'])) {
        return true;
    } else {
        return false;
    }
}
