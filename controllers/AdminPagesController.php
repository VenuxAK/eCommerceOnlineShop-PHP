<?php

class AdminPagesController
{
    public static function sessionExit()
    {
        if(!isset($_SESSION["is_admin_logged_in"]))
        {
            redirect("/admin/login");
        }
    }
    public static function adminView()
    {
        redirect("/admin/dashboard");
    }
    public static function dashboardView()
    {
        self::sessionExit();
        view("admin/dashboard");
    }
    public static function adminProfile()
    {
        self::sessionExit();
        view("admin/profile");
    }
    public static function usersAdminView()
    {
        self::sessionExit();

        $admins = App::get("db")->selectAll("admins")->get();

        view("admin/users.admin",[
            "admins" => $admins
        ]);
    }
    public static function usersCustomerView()
    {
        self::sessionExit();

        $customers = App::get("db")->query("
            SELECT * FROM customers ORDER BY id DESC
        ")->get();

        view("admin/users.customer", [
            "customers" => $customers
        ]);
    }
    public static function editCustomer()
    {
        self::sessionExit();
        $id = request("id");
        if($id !== "" && is_numeric($id))
        {
            $user = App::get("db")->query("SELECT * FROM customers WHERE id=$id")->get();
            if($user) 
            {
                view("admin/edit-customer",[
                    "user" => $user[0]
                ]);
            } else {
                redirect("/admin/users-customer");
            }
        } else {
            redirect("/admin/users-customer");
        }
    }
    public static function deleteCustomer()
    {
        if(Request::METHOD() === "POST")
        {
            $id = request("id");
            App::get("db")->delete($id, "customers");
            unset($_SESSION["username"]);
            unset($_SESSION["email"]);
            unset($_SESSION["is_logged_in"]);
            redirect("/admin/users-customer");
        }
    }
    public static function productsView()
    {
        self::sessionExit();
        $products = App::get("db")->query("SELECT * FROM products ORDER BY id DESC")->get();
        
        if(Request::METHOD() === "POST")
        {
            $id = request("id");
            App::get("db")->delete($id, "products");
            redirect("/admin/products");
        }
        
        view("admin/products", [
            "products" => $products,
        ]);
    }
    public static function addProduct()
    {
        self::sessionExit();
        
        $error = null;
        $nameErr = null;  $descErr = null;
        $cateErr = null;  $priceErr = null;
        $imageErr = null; $quantityErr = null;
        $categories = App::get("db")->selectAll("categories")->get();
        if(Request::METHOD() === "POST")
        {
            $name = escape(request("name"));
            $description = escape(request("description"));
            $category_id = escape(request("category"));
            $price = escape(request("price"));
            $quantity = escape(request("quantity"));
            $image = $_FILES["image"]["name"];
            $created_at = date("Y-m-d");

            if( empty($name) || empty($description) || empty($category_id) || 
                empty($price) || empty($quantity) || empty($image) )
            {
                if(empty($name))
                {
                    $nameErr = "*Product name can't be empty!";
                }
                if(empty($description))
                {
                    $descErr = "*Product description can't be empty!";
                }
                if(empty($category_id))
                {
                    $cateErr = "*Product category can't be empty!";
                }
                if(empty($price))
                {
                    $priceErr = "*Product price can't be empty!";
                }
                if(empty($quantity))
                {
                    $quantityErr = "*Product in stocks can't be empty!";
                }
                if(empty($image))
                {
                    $imageErr = "*Product image can't be empty!";
                }
                if(!empty($price) && !is_numeric($price)) {
                    $priceErr = "*Price should be integer value only!";
                }
                if(!empty($quantity) && !is_numeric($quantity)) {
                    $quantityErr = "*Price should be integer value only!";
                }
            } elseif((!empty($price) && !is_numeric($price)) || (!empty($quantity) && !is_numeric($quantity))) {
                if(!empty($price) && !is_numeric($price)) {
                    $priceErr = "*Price should be integer value only!";
                }
                if(!empty($quantity) && !is_numeric($quantity)) {
                    $quantityErr = "*Price should be integer value only!";
                }
            } else {
                $fileName = $_FILES["image"]["name"];
                $tmpFile = $_FILES["image"]["tmp_name"];
                $fileSize = $_FILES["image"]["size"];
                $fileType = $_FILES["image"]["type"];
                $fileExp = explode(".", $fileName);
                $fileExt = end($fileExp);
                $newFile = md5(time() . $fileName) . "." . $fileExt;
                $uploadDir = upload("images", $newFile);
                $distPath = $uploadDir;

                if(checkMIMEtype($tmpFile)) 
                {
                    if(is_uploaded_file($tmpFile)) 
                    {
                        if(move_uploaded_file($tmpFile, $distPath)) 
                        {
                            $data = [
                                "name" => $name,
                                "category_id" => $category_id,
                                "description" => $description,
                                "price" => $price,
                                "quantity" => $quantity,
                                "images" => $newFile,
                                "created_at" => $created_at
                            ];
                            $response = App::get("db")->insert($data, "products");
                            if(!$response)
                            {
                                redirect("/admin/products");
                            }
                            
                        } else {
                            $error = "Something went wrong while uploading!";
                        }
                    }
                } else {
                    $imageErr = "**File type not allowed!";
                }
                
            }
            
        }


        view("admin/add-product", [
            "categories" => $categories,
            "error" => $error,
            "nameErr" => $nameErr,
            "descErr" => $descErr,
            "cateErr" => $cateErr,
            "priceErr" => $priceErr,
            "imageErr" => $imageErr,
            "quantityErr" => $quantityErr
        ]);
    }
    public static function editProduct()
    {
        self::sessionExit();
        view("admin/edit-product");
    }

    public static function categoriesView()
    {
        self::sessionExit();
        $categories = App::get("db")->query("SELECT * FROM categories ORDER BY id DESC")->get();
        if(Request::METHOD() === "POST")
        {
            $id = request("id");
            App::get("db")->delete($id, "categories");
            redirect("/admin/categories");
        }
        view("admin/categories", [
            "categories" => $categories
        ]);
    }
    public static function addCategory()
    {
        $nameErr = null;
        $descErr = null;
        if(Request::METHOD() === "POST")
        {
            $name = escape(request("name"));
            $description = escape(request("description"));
            if(empty($name) || empty($description))
            {
                if(empty($name))
                {
                    $nameErr = "Category name can't be empty!";
                }
                if(empty($description))
                {
                    $descErr = "Category description can't be empty!";
                }
            } else {
                $info = [
                    "name" => $name,
                    "description" => $description,
                    "created_at" => date('Y-m-d')
                ];
                App::get("db")->insert($info, "categories");
                redirect("/admin/categories");
            }
        }
        view("admin/add-category", [
            "nameErr" => $nameErr,
            "descErr" => $descErr
        ]);
    }
    
    public static function ordersView()
    {
        self::sessionExit();
        view("admin/orders");
    }
    public static function tablesView()
    {
        self::sessionExit();
        view("admin/tables");
    }
}
