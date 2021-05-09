    <!-- ========================= Start PHP MyAdmin Area ========================= -->

    <?php 

        include('config.php');
    
        //Process the value from Form and save it in database

        //When submit button is clicked:

        if (isset($_POST['submit'])) {

            /* Get all data from Form to update */
            $id = $_POST['id'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $edition = $_POST['edition'];
            $ISBN = $_POST['ISBN'];
            $language = $_POST['language'];
            $student_name = $_POST['student_name'];
            $student_email = $_POST['student_email'];
            $student_phone = $_POST['student_phone'];
            $status = $_POST['status'];

            /* SQL Query */
            $sql = "UPDATE tbl_recycle SET
                title = '$title',
                author = '$author',
                edition = '$edition',
                ISBN = '$ISBN',
                language = '$language',
                student_name = '$student_name',
                student_email = '$student_email',
                student_phone = '$student_phone',
                status = '$status'
                WHERE id='$id' ";

            /* Execute query and save new data into database */
            $res = mysqli_query($conn, $sql);

            if($res == TRUE) {
                $_SESSION['update'] = "Recycle Updated Succesfully";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-recycles.php'); //Redirect to Manage Recycles
            }
            else {
                $_SESSION['update'] = "Failed to Update Recycle";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-recycles.php');
            }

        }

    ?>

    <!-- ========================= End PHP MyAdmin Area ========================= -->

    <?php 

    include('partials-front-admin/header.php');

    ?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-update-recycle">
            <div class="bg-image-accounts"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="recycles-title text-center">Book recycles</h3>
                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    

        <!-- ========================= End Banner Area ========================= -->

            <div class="main-content">
                <div class="wrapper">
                    <div class="update-recycle-title">
                        <h1 class="title">Update Recycle Information</h1>
                    </div>

                    <?php 

                    include('config.php');

                        /* Check whether id is set or not */
                        if(isset($_GET['id'])) {

                            $id = $_GET['id'];  //Get the id

                            /* Get all details based on id */                   
                            $sql2 = "SELECT * FROM tbl_recycle WHERE id=$id"; //Create SQL query to retrieve the details

                            $res2 = mysqli_query($conn, $sql2); //Execute the query

                            $count2 = mysqli_num_rows($res2); //Check whether data is available or not

                            /* Check whether reservation data has been retrieved or not */
                            if($count2 == 1) {

                                $row2 = mysqli_fetch_assoc($res2);   //Retrieve the details
                                
                                $title = $row2['title'];
                                $author = $row2['author'];
                                $edition = $row2['edition'];
                                $ISBN = $row2['ISBN'];
                                $language = $row2['language'];
                                $student_name = $row2['student_name'];
                                $student_email = $row2['student_email'];
                                $student_phone = $row2['student_phone'];
                                $status = $row2['status'];
                            
                            }
                            
                            else {
                                
                                header("location: ".SITEURL.'manage-recycles.php'); //Redirect to Manage Recycles
                            
                            }

                        }

                        else {

                            header("location: ".SITEURL.'manage-recycles.php'); //Redirect to Manage Recycles

                        }

                    ?>
                    
                    <form action="" method="POST">
                        <table>
                            <tr>
                                <td><input type="text" class="form-control" name="title" value ="<?php echo $title; ?>"><br></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="author" value ="<?php echo $author; ?>"><br></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="edition" value ="<?php echo $edition; ?>"><br></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="ISBN" value ="<?php echo $ISBN; ?>"><br></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="language" value ="<?php echo $language; ?>"><br></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="student_name" value ="<?php echo $student_name; ?>"><br></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="student_email" value ="<?php echo $student_email; ?>"><br></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="student_phone" value ="<?php echo $student_phone; ?>"><br></td>
                            </tr>
                            <tr>
                                <td>Status:
                                    <select name="status">
                                        <option <?php if($status=="Waiting") {echo "selected";} ?> value="Waiting">Waiting</option>
                                        <option <?php if($status=="Active") {echo "selected";} ?> value="Active">Active</option>
                                    </select>
                                <br><br></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" class="form-control-submit" name="submit" value="update recycle information"><br>
                                </td>
                            </tr>
                        </table>
                    </form>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>   

    </main>
    
    <!-- ========================= End Main Area ========================= -->

    <?php 

    include('partials-front-admin/footer.php');

    ?>