<?php
session_start();
include('server.php');

$select_file = "SELECT * FROM items";
$file_query = mysqli_query($conn, $select_file);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <title>Toriyami Shop</title>
</head>

<body>
    <section class="container-fulid">
        <section class="head">
            <div class="tab">
                <div class="serch">
                    <div class="logo">
                        <div class="logo-img">
                            <img src="assets/ngong6.png">
                        </div>
                    </div>
                    <div class="name">
                        <div class="name-img">
                            <img src="assets/ngong5.png">
                        </div>
                    </div>
                    <div class="serching">
                        <div class="typing">
                            <input type="text" class="type">
                        </div>
                        <div class="find">
                            <div class="find-img">
                                <i class="fi fi-br-search"></i>
                            </div>
                        </div>
                    </div>
                    <div id="contact" class="contact">
                        <div class="contact-img">
                            <div class="text-shop">
                                <p><b>CONTACT</b></p><span></span>
                            </div>
                            <div class="icon-shop">
                                <i class="fi fi-rs-shop"></i>
                            </div>
                        </div>
                    </div>
                    <div class="user">
                        <div class="user-name">
                            <p>User</p>
                            <span></span>
                        </div>
                        <div class="icon-user">
                            <div class="icon-user-img">
                                <i class="fi fi-sr-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu">
                    <div class="menu-text" id="allproduct"><i class="fi fi-bs-menu-burger"></i>
                        <p>All Product</p>
                    </div>
                    <div class="menu-text" id="home">
                        <p>Home</p>
                    </div>
                    <div class="menu-text" id="interest">
                        <p>Interested Product</p>
                    </div>
                    <div class="menu-text" id="shoping">
                        <p>Shoping List</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="shop">
            <section class="interest-product" id="interest-product">
                <div class="recom-text">
                    <p>INTERESTED PRODUCTS</p>
                </div>
                <div class="recom-item scroll">
                </div>
            </section>
            <section class="shoping-list" id="shoping-list">
                <div class="recom-text">
                    <p>SHOPING LIST</p>
                </div>
                <div class="recom-item scroll">
                    <!-- <div class="item">
                        <div class="item-img">
                            <img src="">
                        </div>
                        <div class="item-icon">
                            <div class="it-ic">
                                <i class="fi fi-br-cross"></i>
                            </div>
                            <div class="it-ic">
                                <i class="fi fi-br-check"></i>
                            </div>
                        </div>
                    </div> -->


                </div>
            </section>
        </section>
        <div id="notification-container" class="notification">
        </div>

    </section>

    <!---------------javascript------------->
    <script type="module" src="main2.js"></script>
</body>

</html>