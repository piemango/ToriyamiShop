<?php
session_start();
include('server.php');

$select_file = "SELECT * FROM items";
$file_query = mysqli_query($conn, $select_file);

$select_fileIn = "SELECT * FROM recommend";
$fileIn_query = mysqli_query($conn, $select_fileIn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
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
                    <div class="contact" id="contact">
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
                    <div class="menu-text" id="allproduct"><i class="fi fi-bs-menu-burger"></i><p>All Product</p></div>
                    <div class="menu-text" id="home"><p>Home</p></div>
                    <div class="menu-text" id="interest"><p>Interested Product</p></div>
                    <div class="menu-text" id="shoping"><p>Shoping List</p></div>
                </div>
            </div>
        </section>
        <section class="advert">
            <div class="advertis">
                <div class="miniadd">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active" data-bs-interval="2500">
                            <img src="assets/ngong2.png" class="d-block  w-100" alt="">
                          </div>
                          <div class="carousel-item" data-bs-interval="2500">
                            <img src="assets/ngong3.png" class="d-block w-100" alt="">
                          </div>
                          <div class="carousel-item" data-bs-interval="2500">
                            <img src="assets/ngong4.png" class="d-block w-100" alt="">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                      </div>
                </div>
                
            </div>
        </section>
        <section class="shop">
            <section class="recommend-product" id="recommend-product">
                <div class="recom-text">
                    <p>RECOMMEND PRODUCT</p>
                </div>
                <div class="recom-item" scroll>
                    <?php
                    while($row=mysqli_fetch_assoc($fileIn_query)){
                        $file = $row['fileIn'];
                        $name = $row['nameIn'];
                    ?>
                    <div itemid="<?php echo $name?>" class="item">
                        <div class="item-img">
                            <img src="<?php echo $file ?>">
                        </div>
                        <div class="item-icon">
                            <div class="it-ic">
                                <i class="fi fi-rs-shopping-cart"></i>
                            </div>
                            <div class="it-ic">
                                <i class="fi fi-rr-heart"></i>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                
                </div>
            </section>
            <section class="all-product" id="all-product">
                <div class="recom-text">
                    <p>ALL PRODUCTS</p>
                </div>
                <div class="recom-item scroll">
                   <?php
                    while($row=mysqli_fetch_assoc($file_query)){
                        $file = $row['file'];
                        $name = $row['name'];
                    ?>
                    <div itemid="<?php echo $name?>" class="item">
                        <div class="item-img">
                            <img src="<?php echo $file?>">
                        </div>
                        <div class="item-icon">
                            <div class="it-ic">
                                <i class="fi fi-rs-shopping-cart"></i>
                            </div>
                            <div class="it-ic">
                                <i class="fi fi-rr-heart"></i>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
            </section>        
            <section class="head"></section>
        </section>
        <div id="notification-container" class="notification">
        </div>
    </section>

    <!---------------javascript------------->
    <script type="module" src="main.js"></script>
    
</body>
</html>