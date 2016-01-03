<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends Frontend {
    public function __construct(){
        parent::__construct();

    }
    public function error_404(){
        $this->output->set_status_header('404');
        $this->data['title']="Page not found";

        $this->data['container']="error/404";
		$this->themes->load($this->data);
    }
}