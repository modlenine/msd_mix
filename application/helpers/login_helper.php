<?php
class login_fn{
    private $ci;
    function __construct()
    {
        $this->ci =&get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }

    function logci()
    {
        return $this->ci;
    }
}


function lfn()
{
    $obj = new login_fn();
    return $obj->logci();
}


function getUser()
{
    // ตรวจสอบว่ามี session login หรือไม่
    if (!isset($_SESSION['ecode']) || empty($_SESSION['ecode'])) {
        // return object เปล่าเพื่อป้องกัน error
        return (object) array(
            'ecode' => '',
            'Fname' => '',
            'Lname' => '',
            'file_img' => ''
        );
    }
    
    lfn()->load->model("login/login_model" , "login");
    $user = lfn()->login->getuser();
    
    // ตรวจสอบว่า query พบข้อมูลหรือไม่
    if (empty($user)) {
        return (object) array(
            'ecode' => '',
            'Fname' => '',
            'Lname' => '',
            'file_img' => ''
        );
    }
    
    return $user;
}
function callLogin()
{
    lfn()->load->model("login/login_model" , "login");
    return lfn()->login->callLogin();
}
function getUserImage()
{
    $url = "https://intranet.saleecolour.com/intsys/usermanagement/uploads/";
    $user = getUser();

    if(empty($user->file_img) || $user->file_img == null){
        $imageUser = "default.jpg";
    }else{
        $imageUser = $user->file_img;
    }

    return $url.$imageUser;
}



?>