<?php
session_start();
include('server.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $files = basename($_FILES['files']['name']);

    //folder qustion
    $fol_file = "items/". $files;
    $file_path = $_FILES["files"]['tmp_name'];
    move_uploaded_file($file_path, $fol_file);

        if($error==0){
            $insert_file = "INSERT into items(name, file, describs) 
            VALUES('$name', '$fol_file', '$desc')";
            $query_quest = mysqli_query($conn,  $insert_file);
            header('location: addmin.php');
        }
}

$select_file = "SELECT * FROM items";
$file_query = mysqli_query($conn, $select_file);

if(isset($_POST['submitIn'])){
    $name = $_POST['nameIn'];
    $files = basename($_FILES['fileIn']['name']);

    //folder qustion
    $fol_file = "items/". $files;
    $file_path = $_FILES["fileIn"]['tmp_name'];
    move_uploaded_file($file_path, $fol_file);

        if($error==0){
            $insert_file = "INSERT into recommend(nameIn, fileIn) 
            VALUES('$name', '$fol_file')";
            $query_quest = mysqli_query($conn,  $insert_file);
            header('location: addmin.php');
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addmin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <title>(addmin) Toriyami Shop</title>
</head>
<body>
    <section class="container-fluid ">
        <div class="d-grid justify-content-center position-relative">
                <div class="addmin">
                    <div class="base-1">
                        <div class="add-items" id="add-items">
                            <p>Add Items</p>
                        </div>
                    </div>
                    <div class="base-2">
                        <div class="items">
                            <div class="head">
                                <p class="fs-3"><b>All item</b></p>
                            </div>
                            <div class="item" scroll>
                                <?php
                                while($row=mysqli_fetch_assoc($file_query)){
                                    $name = $row['name'];
                                    $file = $row['file'];
                                ?>
                                <div class="item-img">
                                    <div class="img-items">
                                        <img src="<?php echo $file ?>">
                                    </div>
                                    <div class="name-items">
                                        <p><?php echo $name ?></p>
                                    </div>
                                    <div class="icon" name="delete">
                                        <i class="fi fi-br-cross"></i>
                                    </div>
                                    <div class="icon">
                                        <i class="fi fi-rr-pencil"></i>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <section class="form" id="form">
        <div class="base-2">
            <form method="POST" enctype="multipart/form-data">
                <div class="it">
                    <label>File Item</label>
                    <input type="text" name="name">
                </div>
                <div class="it">
                    <label>File Item</label>
                    <span></span>
                    <input type="file" name="files" >
                </div>
                <div class="it">
                    <label>File Describe</label>
                    <input type="text" name="desc">
                </div>
                <input type="submit" value="confirm" name="submit">
            </form>
        </div>
    </section>

    <section class="form" id="form">
        <div class="base-2">
            <form method="POST" enctype="multipart/form-data">
                <div class="it">
                    <label>File Item</label>
                    <input type="text" name="nameIn">
                </div>
                <div class="it">
                    <label>File Item</label>
                    <span></span>
                    <input type="file" name="fileIn" >
                </div>
                <input type="submit" value="confirm" name="submitIn">
            </form>
        </div>
    </section>

    <script>
        const add = document.getElementById('add-items')

        add.addEventListener("click", ()=>{
            window.open('addmin.php#form');
        })
    </script>
    
</body>
</html>