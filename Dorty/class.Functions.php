<?php
    function uploadFile($file, $where){
		$target_dir = $where . "/";
		$target_file = $target_dir . basename($file["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		if (file_exists($target_file))
		    return false;

		if ($file["size"] > 500000)
			return false;
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
			return false;

		if (move_uploaded_file($file["tmp_name"], $target_file))
			return true;
		else
			return false;
	}

    function hashing($string){
        return sha1("kd78b" . $string . "HgT5");
    }

    function login($login, $pass){
        $db = new MySQLDB();
        $query = "SELECT * FROM users WHERE UserName='$login' AND Password='$pass'";
        if($db->num_rows($query) > 0){
            $_SESSION['login'] = $login;
            $_SESSION['pass'] = $pass;
            header('location: index.php');
        }
        else{
            return false;
        }
    }

    function is_login(){
        $db = new MySQLDB();
        list($name) = $db->get_row("SELECT UserName FROM users WHERE UserName='$_SESSION[login]' AND Password='$_SESSION[pass]'");
        
        if($name === $_SESSION['login']){
            return true;
        }
        else{
            return false;
        }
    }

    function logout(){
        $_SESSION['login'] = "";
        $_SESSION['pass'] = "";
        header('location: index.php');
    }
?>