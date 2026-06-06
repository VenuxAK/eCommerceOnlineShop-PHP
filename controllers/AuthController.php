<?php

class AuthController
{
    public static function sessionExit()
    {
        if(isset($_SESSION["is_logged_in"]))
        {
            redirect("/");
        }
    }
    // Clients Side Authentication
    public static function login()
    {
        self::sessionExit();
        $errorMsg = null;
        $emailErr = null;
        $passwordErr = null;

        if(Request::METHOD() === "POST")
        {
            $email = escape(request("email"));
            $password = escape(request("password"));
            if(empty($email) || empty($password))
            {
                if(empty($email))
                {
                    $emailErr = "Email Address can't be empty!";
                }
                if(!empty($email) && !validateEmail($email))
                {
                    $emailErr = "Invalid Email Format!";
                }
                if(empty($password))
                {
                    $passwordErr = "Password can't be empty!";
                }
            } else {
                if(!validateEmail($email))
                {
                    $emailErr = "Invalid Email Format!";
                } else {
                    $user = App::get("db")->query("
                        SELECT * FROM customers WHERE email='$email'
                    ")->getOne();
                    if(!$user) 
                    {
                        $errorMsg = "Wrong Credentials!";
                    } else {
                        if(!password_verify($password, $user->password))
                        {
                            $errorMsg = "Wrong Credentials!";
                        } else {
                            $_SESSION["username"] = $user->name;
                            $_SESSION["email"] = $user->email;
                            $_SESSION["is_logged_in"] = time();
                            redirect("/");
                        }
                    }
                }
            }

        }

        view("login", [
            "errorMsg" => $errorMsg,
            "emailErr" => $emailErr,
            "passwordErr" => $passwordErr
        ]);
    }
    public static function register()
    {
        self::sessionExit();
        $errorMsg = null;
        $nameErr = null;
        $emailErr = null;
        $passwordErr = null;
        if(Request::METHOD() === "POST")
        {
            $name = escape(request("name"));
            $email = escape(request("email"));
            $password = escape(request("password"));

            if(empty($name) || empty($email) || empty($password))
            {
                if(empty($name))
                {
                    $nameErr = "User Name can't be empty!";
                }
                if(empty($email))
                {
                    $emailErr = "Email can't be empty!";
                }
                if(empty($password))
                {
                    $passwordErr = "Password can't be empty!";
                }
            } else {
                if(!validateEmail($email))
                {
                    $emailErr = "Invalid Email Format!";
                    if(strlen($password) < 6)
                    {
                        $passwordErr = "Weak password! Password must be at least 6 characters";
                    }
                } else {
                    if(strlen($password) < 6)
                    {
                        $passwordErr = "Weak password! Password must be at least 6 characters";
                    } else {
                        $hash_password = password_hash($password, PASSWORD_DEFAULT);
                        $userInfo = [
                            "name" => $name,
                            "email" => $email,
                            "password" => $hash_password
                        ];
                        $user = App::get("db")->insert($userInfo, "customers");
                        if(!$user)
                        {
                            $_SESSION["username"] = $name;
                            $_SESSION["emai"] = $email;
                            $_SESSION["is_logged_in"] = time();
                            redirect("/");
                        }
                    }
                }
            }
        }
        view("register", [
            "errorMsg" => $errorMsg,
            "nameErr" => $nameErr,
            "emailErr" => $emailErr,
            "passwordErr" => $passwordErr
        ]);
    }
    public static function logout()
    {   
        if(isset($_SESSION["is_logged_in"]))
        {
            session_start();
            unset($_SESSION["username"]);
            unset($_SESSION["email"]);
            unset($_SESSION["is_logged_in"]);
            redirect("/");
        }else{
            echo "<h1> <center> 404 Page Not Found! </center> </h1>";
            die();
        }
    }

    // Admin Panel Authentication
    public static function adminLogin()
    {
        if(isset($_SESSION["is_admin_logged_in"]))
        {
            redirect("/admin/dashboard");
        }
        $errorMsg = null;
        $emailErr = null;
        $passwordErr = null;
        if(Request::METHOD() === "POST")
        {
            $email = escape(request("email"));
            $password = escape(request("password"));

            if(empty($email) || empty($password))
            {
                if(empty($email))
                {
                    $emailErr = "Email address is required!";
                }
                if(empty($password))
                {
                    $passwordErr = "Password is required!";
                }
            } else {
                if(!validateEmail($email))
                {
                    $emailErr = "Invalid email format!";
                } else {
                    $user = App::get("db")->query("
                        SELECT * FROM admins WHERE email='$email' AND role=1
                    ")->getOne();
                    if($user)
                    {
                        if(password_verify($password,$user->password))
                        {
                            $_SESSION["admin_username"] = $user->name;
                            $_SESSION["admin_email"] = $user->email;
                            $_SESSION["is_admin_logged_in"] = time();
                            redirect("/admin/dashboard");
                        } else {
                            $errorMsg = "Wrong Credentials!";
                        }
                    } else {
                        $errorMsg = "Wrong Credentials!";
                    }
                }
            }
            
        }
        view("admin/login", [
            "errorMsg" => $errorMsg,
            "emailErr" => $emailErr,
            "passwordErr" => $passwordErr
        ]);
    }
    public static function adminLogout()
    {
        session_start();
        unset($_SESSION["name"]);
        unset($_SESSION["email"]);
        unset($_SESSION["is_admin_logged_in"]);
        redirect("/admin/login");
    }
}
