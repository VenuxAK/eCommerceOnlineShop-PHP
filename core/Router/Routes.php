<?php

// Route::get("uri", [Controller::class, "method"]);

// Clients Side
Route::get("", [PagesController::class, "home"]);
Route::get("about", [PagesController::class, "about"]);
Route::get("contact", [PagesController::class, "contact"]);

Route::get("products/product-detail", [PagesController::class, "productDetail"]);
Route::get("products/checkout", [PagesController::class, "productsCheckout"]);
Route::get("cart", [PagesController::class, "addToCart"]);
Route::get("categories", [PagesController::class, "categories"]);

// Clients Side Authentication
Route::get("login", [AuthController::class, "login"]);
Route::get("register", [AuthController::class, "register"]);
Route::post("login", [AuthController::class, "login"]);
Route::post("register", [AuthController::class, "register"]);
Route::get("logout", [AuthController::class, "logout"]);

// ---------------------------------------------------------------------------------------------------//
// ---------------------------------------------------------------------------------------------------//
// ---------------------------------------------------------------------------------------------------//
// ----------------------------------------- Admin Panel  --------------------------------------------//
// ---------------------------------------------------------------------------------------------------//
// ---------------------------------------------------------------------------------------------------//

// Admin Panel Authentication
Route::get("admin/login", [AuthController::class, "adminLogin"]);
Route::post("admin/login", [AuthController::class, "adminLogin"]);
Route::get("admin/logout", [AuthController::class, "adminLogout"]);

// ---------------------------------------------------------------------------------------------------//

// Admin Panel
Route::get("admin", [AdminPagesController::class, "adminView"]);                            // Done
Route::get("admin/dashboard", [AdminPagesController::class, "dashboardView"]);              // Done
Route::get("admin/profile", [AdminPagesController::class, "adminProfile"]);                 // Ongoing

// ---------------------------------------------------------------------------------------------------//
// ---------------------------------------- Manage Users ---------------------------------------------//

Route::get("admin/users-admin", [AdminPagesController::class, "usersAdminView"]);           // Done
Route::get("admin/users-customer", [AdminPagesController::class, "usersCustomerView"]);     // Done
// Manage user from admin panel
Route::get("admin/users-customer/edit", [AdminPagesController::class, "editCustomer"]);
Route::post("admin/users-customer", [AdminPagesController::class, "deleteCustomer"]);

// ---------------------------------------------------------------------------------------------------//
// ---------------------------------------- Manage Store ---------------------------------------------//
// ---------------------------------------------------------------------------------------------------//

// ---------------------------------------- Products -------------------------------------------------//
Route::get("admin/products", [AdminPagesController::class, "productsView"]);                // Ongoing
Route::post("admin/products", [AdminPagesController::class, "productsView"]);                // Ongoing
Route::get("admin/products/add", [AdminPagesController::class, "addProduct"]);             // Ongoing
Route::post("admin/products/add", [AdminPagesController::class, "addProduct"]);             // Ongoing
Route::get("admin/products/edit", [AdminPagesController::class, "editProduct"]);            // Ongoing

// ---------------------------------------- Categories -----------------------------------------------//
Route::get("admin/categories", [AdminPagesController::class, "categoriesView"]);            // Ongoing
Route::post("admin/categories", [AdminPagesController::class, "categoriesView"]);
Route::get("admin/categories/add", [AdminPagesController::class, "addCategory"]);
Route::post("admin/categories/add", [AdminPagesController::class, "addCategory"]);
Route::get("admin/categories/edit", [AdminPagesController::class, "editCategory"]);

// ---------------------------------------- Orders ---------------------------------------------------//
Route::get("admin/orders", [AdminPagesController::class, "ordersView"]);                    // Ongoing

// ---------------------------------------- Tables ---------------------------------------------------//
Route::get("admin/tables", [AdminPagesController::class, "tablesView"]);                    // Ongoing


