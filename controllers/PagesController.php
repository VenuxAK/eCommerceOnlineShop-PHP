<?php

class PagesController
{
    public static function home()
    {
        $categories = App::get("db")->selectAll("categories")->get();
        $products = App::get("db")->query("SELECT * FROM products ORDER BY id DESC")->get();
        
        view("home", [
            "products" => $products,
            "categories" => $categories
        ]);
    }
    public static function productDetail()
    {
        $id = $_GET["id"];
        $products = App::get("db")->selectAll("products")->get();
        $products_count = count($products) + 1;
        if(isset($id) && $id !== "" && is_numeric($id) && $id <= $products_count) {
            $product = App::get("db")->query("SELECT * FROM products WHERE id=$id")->getOne();
            view("product-detail", [
                "product" => $product
            ]);
        } else {
            redirect("/");
        }
    }
    public static function addToCart()
    {
        view("add-to-cart");
    }
    public static function productsCheckout()
    {
        view("checkout");
    }
    public static function categories()
    {
        view("categories");
    }

    public static function about()
    {
        view("about");
    }
    public static function contact()
    {
        view("contact");
    }
}
