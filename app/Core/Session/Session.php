<?php



namespace App\Core\Session;

class Session {

	public static  function start()
	{

		if (!headers_sent() && !session_id()) {
            session_start();
            return true;
		}
        return false;
	}


	public static  function destroy()
	{
		// session_destroy();
		session_unset();
		setcookie(session_name(), null, 0, "/");
	}


    public static  function set($key, $value)
    {           
        return $_SESSION[$key] = $value;
    }

    public static  function has($key)
    {
        if(isset($_SESSION[$key])) {
            dd('true');
        }

        dd('forbiden, you are not allowed to access this page');
    }


    public static  function get($key)
    {
        if(!isset($_SESSION[$key])) {
            return false;
        }
        
        return $_SESSION[$key];         
    }

}