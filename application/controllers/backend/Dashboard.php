<?php
/**
 * Dashboard Controller
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backend {

    public function __construct(){
        parent::__construct();
    }
    public function index(){
	    $data['title']="Dashboard";
        $data['container']="admin/home";
	    $this->themes->load($data,TRUE);
	}

}