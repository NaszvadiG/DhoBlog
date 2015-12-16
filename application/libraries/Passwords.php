<?php
/**
 * Passwords Library
 *
 * @author Dhosoft Community
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Passwords {

    public function hash_password($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public function verify_password($password, $hash) {
		return password_verify($password, $hash);
	}
}