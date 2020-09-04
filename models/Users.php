<?php 
    class User{
        
    }
    // class UserInfo{
    //     public $account
    //     personID
    //     password
    // }
    class Users extends DB{
        public $name;
        private $id = null;
        public function getId(){
            return $this->id;
        }
        
        public $flag;
        //檢查註冊資料
        function register($acct,$pass,$ID){            
            $sqlCheckAcct = <<<block
            Select count(account) from users WHERE account='$acct';
            block;
            $sqlCheckID = <<<block
            Select count(personID) from users WHERE personID='$ID';
            block;
            $checkAcct  = $this->select($sqlCheckAcct);
            $checkID    = $this->select($sqlCheckID);
            
            if($checkAcct[0]['count(account)']+$checkID[0]['count(personID)']==0){
                $sql = <<<block
                insert into users (account,password,personID) 
                values('$acct','$pass','$ID');
                block;
                return $this->insert($sql);
            }
            else{
                echo '<script>alert("帳號或身分證重複")</script>'; 
                return false;
            }
            
        }
        function get(){
            return $this->select("SELECT * FROM `user`");
          }
        //驗證帳密
        function loginVerify($userName,$userPass){
            $hash = $this->select("SELECT userID,password,identity ,ban FROM `users` WHERE account = '$userName'");            
            if(count($hash)){
                if($hash[0]['ban']=="N"){
                    if(isset($hash[0]['password'])){
                        return (password_verify($userPass, $hash[0]['password']))?1:0;
                    }                
                }
                else{
                    return -1;
                }
            }else{
                return 2;
            }
        }
        function getUserID($userName,$userPass){
            $userInfo = $this->select("SELECT userID,password,identity ,ban FROM `users` WHERE account = '$userName'");            
            if(isset($userInfo[0]['password'])){
                return (password_verify($userPass, $userInfo[0]['password']))?$userInfo[0]['userID']:false;
            } 
        }
        function getIdentity($userName,$userPass){
            $userInfo = $this->select("SELECT userID,password,identity ,ban FROM `users` WHERE account = '$userName'");            
            if(isset($userInfo[0]['password'])){
                return (password_verify($userPass, $userInfo[0]['password']))?$userInfo[0]['identity']:false;
            } 
        }
    }
?>