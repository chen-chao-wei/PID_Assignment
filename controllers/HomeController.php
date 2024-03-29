<?php
session_start();

class HomeController extends Controller
{
 

    function register()
    {
        $user = $this->model("Users");
    }
    function login()
    {
        $user = $this->model("Users");

        //註冊動作
        if (isset($_POST['account'], $_POST['password'], $_POST['personID'])) {
            $userName = $_POST['account'];
            $userPass = $_POST['password'];
            $userID = $_POST['personID'];
            $userPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            if ($user->register($userName, $userPass, $userID)) {
                echo '<script>alert("註冊成功 請重新登入")</script>';
                $this->view("Home/login", $user);
                exit();
            } else {
                $user->flag = false;
                echo '<script>alert("註冊失敗！！ 請重新註冊")</script>';
                $this->view("Home/login", $user);
                exit();
            }
        } //登入動作
        elseif (isset($_POST['account'], $_POST['password']) && isset($_POST['personID']) == false) {
            $userName = $_POST['account'];
            $userPass = $_POST['password'];
            $verify = $user->loginVerify($userName, $userPass);

            if ($verify == 1) {
                $sUserName = $_POST["account"];
                if (trim($sUserName) != "") {
                    $_SESSION["userName"] = $sUserName;
                    $_SESSION["userID"] = $user->getUserID($userName, $userPass);
                    $_SESSION["identity"] = $user->getIdentity($userName, $userPass);
                }
                $this->Redirect("mall", $user);
                exit();
            } else if ($verify == 2) {
                echo '<script>alert("請確認帳號密碼！")</script>';
                $user->flag = false;
                $this->view("Home/login", $user);
                exit();
            } else if ($verify < 0) {
                echo '<script>alert("帳號停權")</script>';
                $user->flag = false;
                $this->view("Home/login", $user);
                exit();
            } else {
                echo '<script>alert("帳號或密碼錯誤")</script>';
                $user->flag = false;
                $this->view("Home/login", $user);
                exit();
            }
        } else {

            $user->flag = true;
            $this->view("Home/login", $user);
            exit();
        }
    }
    function mall()
    {
        
        if (isset($_GET["logout"])&&isset($_SESSION['userID'])) {
            $message = $_SESSION["userName"] . "您已登出.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            unset($_SESSION['userName']);
            unset($_SESSION['userID']);
            unset($_SESSION['identity']);
            $this->view("Home/mall");
            exit();
        }
        if (isset($_GET["admin"])) {
            if (!isset($_SESSION["userID"]) || ($_SESSION["userID"] == "")) {
                $this->Redirect("login");
                exit();
            } else {
                if ($_SESSION['identity'] == "1" ) {
                    $this->Redirect("admin");
                    exit();
                } else {
                    $message = "會員您好,請先申請成為賣家";
                    echo "<script type='text/javascript'>alert('$message');</script>";                   
                    $this->view("Home/mall");
                    exit();
                }
            }
        }  
        if (isset($_GET["shopCart"])) {
            if (!isset($_SESSION["userID"]) || ($_SESSION["userID"] == "")) {
                $this->Redirect("login");
                exit();
            } else {
                $this->Redirect("shopCart");
                exit();
            }
        }
        
        $this->view("Home/mall");
    }
    function admin()
    {        
        if (!isset($_SESSION["userID"]) || ($_SESSION["userID"] == "")) {
            $this->Redirect("login");
            exit();
        } else {
            if ($_SESSION['identity'] == 1 ) {
                $this->view("Home/admin");
                exit();
            } else {
                $message = "會員您好,請先申請成為賣家";
                echo "<script type='text/javascript'>alert('$message');</script>";                   
                $this->Redirect("mall");
                exit();
            }
        }
        //echo $_SESSION['identity'].$_SESSION['userName'];
    }
    function shopCart()
    {        
        if (!isset($_SESSION["userID"]) || ($_SESSION["userID"] == "")) {
            $this->Redirect("login");
            exit();
        } else {
            $this->view("Home/shopCart");
        }  
        
    }
}
