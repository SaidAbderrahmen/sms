<?php


namespace App\Core\Csrf;

use App\Core\Session\Session;

class Csrf {

	protected static $tokenKey = 'csrf-token';

	protected static $tokenLength = 42;

	protected static $token = null;


	public static function token()
	{
		if (static::$token !== null) {
			return static::$token;
		}

		if (!$token = Session::get(static::$token)) {
			$token = str_random(static::$tokenLength);
			Session::set(static::$tokenKey, $token);
		}
		
		static::$token = $token;
		return static::$token;
	}

	public static function validate($token = null)
	{
		if ($token === null) {
			$token = request(static::$tokenKey);
		}

		$token = trim(str_replace("\0", '', $token));
		if ($token !== Session::get(static::$tokenKey)) {
			return false;
		}

		return true;
	}

	

}