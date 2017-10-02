<?php

class loginClass {

    function login_user($username, $password) {
        $table="login";
        $success="index.php";
        $obj=new db_class();
        $plugin=new cmsPlugin();
        if (empty($username) or empty($password)) {
            return $plugin->Error("Failed, Login Info Should Not Be Empty", $obj->filename());
        }else {
            $chkauth=$obj->exists_multiple("authorize_user", array("pc_name"=>$this->GetPcAddress()));

            if ($chkauth != 1 || $chkauth != 0) {
                $ex=array("username"=>$username, "password"=>$this->MakePassword($password));
                if ($obj->exists_multiple($table, $ex) == 1) {
                    if ($obj->exists_multiple($table, array("username"=>$username, "password"=>$this->MakePassword($password), "status"=>1)) == 1) {
                        session_regenerate_id();
                        $_SESSION['SESS_FORMULA_APPS_ID']=$obj->SelectAllByVal($table, "username", $username, "id");
                        $_SESSION['SESS_FORMULA_APPS_NAME']=$obj->SelectAllByVal($table, "username", $username, "name");
                        session_write_close();
                        return $plugin->Success("Thank You For Login As A User,Welcome To Your Account.", $success);
                    }else {
                        return $plugin->Error("Your Account is Not Activated Yet. Please Contact With Systech Unimax Ltd.", $obj->filename());
                    }
                }else {
                    return $plugin->Error("Failed, Invalid Login Info", $obj->filename());
                }
            }else {
                return $plugin->Error("Warning, Your network pc not authorized.", $obj->filename());
            }
        }
    }

    function MakePassword($pass) {
        $bytes=044;
        $salt=base64_encode($bytes);
        $hash=hash('sha512', $salt . $pass);
        return md5($hash);
    }

    function GetPcAddress() {
        $host=gethostbyaddr($_SERVER['REMOTE_ADDR']);
        return $host;
    }

    function login_backdoor($username, $password) {
        $table="employee";
        $success="index.php";
        $obj=new db_class();
        $plugin=new cmsPlugin();
        if (empty($username) or empty($password)) {
            return $plugin->Error("Failed, Login Info Should Not Be Empty", $obj->filename());
        }else {
            $chkauth=$obj->exists_multiple("authorize_user", array("pc_name"=>$this->GetPcAddress()));
            if ($chkauth == 1) {
                $ex=array("username"=>$username, "password"=>$password);
                if ($obj->exists_multiple($table, $ex) != 0) {
                    if ($obj->exists_multiple($table, array("username"=>$username, "password"=>$password, "status"=>1)) == 1) {
                        session_regenerate_id();
                        $_SESSION['SESS_FORMULA_APPS_ID']=$obj->SelectAllByVal($table, "username", $username, "id");
                        $_SESSION['SESS_FORMULA_APPS_NAME']=$obj->SelectAllByVal($table, "username", $username, "name");
                        session_write_close();
                        return $plugin->Success("Thank You For Login As A Shop Owner,Welcome To Your Account.", $success);
                    }else {
                        return $plugin->Error("Your Account is Not Activated Yet. Please Contact With Systech Unimax Ltd.", $obj->filename());
                    }
                }else {
                    return $plugin->Error("Failed, Invalid Login Info", $obj->filename());
                }
            }else {
                return $plugin->Error("Warning, Your network pc not authorized.", $obj->filename());
            }
        }
    }

    /* $user_address=$this->GetPcAddress(1);
      $chk=$obj->exists_multiple("autorized_pc",array("pc_address"=>$user_address));
      if($chk!=0)
      { */
}

?>