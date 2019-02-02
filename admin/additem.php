<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--    <link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300i,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">


    <title>Admin | Wild Thai Restaurant &amp; Bar </title>
</head>



<body>
    <div class="header">
        <a href="#" id="menu-action">
            <i class="fa fa-bars"></i>
            <span>Close</span>
        </a>
        <a class="logo" href="index.html">
            Admin
        </a>
    </div>
    <div class="sidebar">
        <ul>
            <li><a href="#"><i class="fa fa-plus-square"></i><span>Add Menu Item</span></a></li>
            <li><a href="#"><i class="fa fa-edit"></i><span>Edit Menu Item</span></a></li>
            <li><a href="#"><i class="fa fa-file-export"></i><span>Manage data</span></a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="main">
        <div class="container">
            <?php
                if(isset($_SESSION["isError"])){
                if( $_SESSION["isError"] == true){
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' id='alert'>
                            <div><strong>Error: </strong> {$_SESSION["errorMessage"]}</div>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                           </div>";
                    } else{
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert' id='alert'>
                            <div><strong>Success: </strong> Menu Item Created</div>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                           </div>";
                
                          }
                    session_destroy();
                }
            ?>

            <form class="add-form my-5" action="includes/php/uploadHandler.php" method="post" enctype="multipart/form-data" id="">

                <div class="form-group">
                    <label>Menu Item Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Item Category:</label>
                    <select class="form-control" name="category">
                        <option value="appetizer">Appetizers</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>


                <label>Item Image:</label>
                <div class="file-upload">
                    <div class="image-upload-wrap">
                        <input class="file-upload-input" type="file" name="fileToUpload" onchange="readURL(this);" accept="image/*" required />
                        <div class="drag-text">
                            <h3>Drag and drop or click to select a file</h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <img class="file-upload-image" src="#" alt="your image" />
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                        </div>
                    </div>
                </div>
                <div class="card-header-text my-3 ">Price: <span class="float-right"><input type="text" name="price" id="currencyTextBox" class="form-control" required></span><span class="text-muted float-right mr-3 f1-5">$</span></div>

                <div class="form-group">
                    <label for="txtArea">Enter Description:</label>
                    <textarea class="form-control" name="description" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-info float-right">Submit</button>
            </form>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../assets/js/admin.js"></script>
    <script src="../assets/js/plugins.js"></script>

    <script>


    </script>

</body>

</html>
