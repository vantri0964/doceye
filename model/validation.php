<?php
    include_once('m_user.php');;
    class Validation{
        function checkUserName($userName){
        //check name
        if (empty($userName)){
            return "Vui lòng nhập tài khoản!";
        }else{
            $mUser = new M_User();
            $had = $mUser->queryUserName($userName);
            if($had == 1){
                return "Tài khoản đã tồn tại!";
            }
        }
        return null;
    }
    function checkName($name){
        if (empty($name)){
            return "Vui lòng nhập họ tên!";
        }
        return null;
    }
    function checkEmail($email){

        if (empty($email)){
            return "Vui lòng nhập email!";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "Email không hợp lệ!";
        }
        $m_user = new M_User();
        if($m_user->queryEmail($email)){
            return "Email đã tồn tại!";
        }
        return null;
    }
    function checkPassword($password){
        if (empty($password)){
            return "Vui lòng nhập mật khẩu!";
        }
        return null;
    }
    function checkConfirmPassword($password, $confirmPassword){
        if (empty($confirmPassword)){
            return "Vui lòng nhập lại mật khẩu!";
        }elseif((strcmp($password, $confirmPassword)) != 0){
            return "Nhập lại mật khẩu không chính xác!";
        }
        return null;
    }
    function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
    }
}?>