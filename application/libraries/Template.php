<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Template
{
    private $content;

    private function set_content($content)
    {
        $this->content['content'] = $content;
    }

    public function load($template, $view, $data = [], $return = FALSE)
    {
        $CI =& get_instance();
        $this->set_content($CI->load->view($view, $data, true));
        return $CI->load->view($template, $this->content, $return);
    }
}

