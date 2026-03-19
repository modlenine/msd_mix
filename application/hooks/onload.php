<?php
class Onload
{
    private $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
    }



    ////////////////////////////////////////////////////////////////
    /////////////// CHECK LOGIN HOOK ทำงานในระดับบนสุด
    ///////////////////////////////////////////////////////////////
    public function checklogin()
    {
        $controller = $this->ci->router->class;
        $method = $this->ci->router->method;
        $checkpage = $this->ci->uri->segment(1);

        $browserUser = $this->ci->agent->browser();
        if($browserUser == "Internet Explorer"){
            echo "<script>";
            echo "alert('โปรแกรมไม่ Support Internet Explorer กรุณาเข้าใช้งานโปรแกรมด้วย Browser อื่น เช่น Google chrome , Firefox , Safari')";
            echo "</script>";
            die();
        }else{
            
            // ถ้าไม่ใช่ login controller ให้ validate login
            if ($controller != "login") {
                
                // Check 1: มี CI session หรือไม่
                if ($this->ci->session->userdata("ecode") == "") {
                    $_SESSION['RedirectKe'] = $_SERVER['REQUEST_URI'];
                    header("refresh:0; url=" . base_url('login'));
                    exit();
                }
                
                // Check 2: Sync CI session กับ $_SESSION
                if (!isset($_SESSION['ecode']) || empty($_SESSION['ecode'])) {
                    // Clear CI session และ redirect
                    $this->ci->session->sess_destroy();
                    $_SESSION['RedirectKe'] = $_SERVER['REQUEST_URI'];
                    header("refresh:0; url=" . base_url('login'));
                    exit();
                }
                
                // Check 3: Validate กับฐานข้อมูล
                try {
                    $this->ci->load->model("login/login_model", "login");
                    $user = $this->ci->login->getuser();
                    if (empty($user)) {
                        // ข้อมูลผู้ใช้ไม่มีในฐานข้อมูล - Clear session และ redirect
                        $this->ci->session->sess_destroy();
                        session_destroy();
                        $_SESSION['RedirectKe'] = $_SERVER['REQUEST_URI'];
                        header("refresh:0; url=" . base_url('login'));
                        exit();
                    }
                } catch (Exception $e) {
                    // Database error - Clear session และ redirect
                    $this->ci->session->sess_destroy();
                    session_destroy();
                    $_SESSION['RedirectKe'] = $_SERVER['REQUEST_URI'];
                    header("refresh:0; url=" . base_url('login'));
                    exit();
                }
            }
        }

    

    }

    ////////////////////////////////////////////////////////////////
    /////////////// CHECK LOGIN HOOK ทำงานในระดับบนสุด
    ///////////////////////////////////////////////////////////////








}//End onload Class
