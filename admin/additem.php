<?php session_start(); ?>

<?php include_once('includes/php/header.php');?>
   
   
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
                        <option value=1>Appetizers</option>
                        <option value="2">Soup</option>
                        <option value="3">Salad</option>
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
