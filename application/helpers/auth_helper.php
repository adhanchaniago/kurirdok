<?php
defined('BASEPATH') OR die('No direct script access allowed!');

function is_login()
{
    $CI =& get_instance();
    if (!$CI->session->userdata('logged_in')) {
        redirect('auth');
    }
}

function is_level($level)
{
    $CI =& get_instance();
    if ($CI->session->level == $level) {
        return true;
    }

    return false;
}

function redirect_if_level_not($level)
{
    $CI =& get_instance();
    if (!is_level($level)) {
        redirect('dashboard');
    }
}
