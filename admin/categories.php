<?php include 'includes/admin_header.php';  ?>
<link rel="stylesheet" href="admin_style.css">
    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/admin_navigation.php';  ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>


                    </div>
                        <div class="col-xs-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" class="form-control" id="input-color" name="cat_title" >


                                    <!-- insert function which insert data of input into categories after click on button -->
                                    <?php
                                     insert_categories();
                                    ?>

                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary" id="btn-submit">
                                </div>
                            </form>
                        </div>


                        <div class="col-xs-6">
                            <!-- update the categories -->
                            <?php
                             if(isset($_GET['update'])){
                                $cat_id=$_GET['update'];
                                include 'includes/update_categories.php';
                             }
                            ?>
                           

                           <!-- <script>
                                let btn_update=document.getElementById('btn-update');
                                btn_update.addEventListener('click',function(){
                                    let update_form=document.getElementById('update-form');
                                    update_form.style.display='none';
                                })
                            </script> -->

                        </div>



                        <div class="col-xs-12">
                            <table class="table table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>Category Id</th>
                                        <th>Category Title</th>
                                        <th colspan="2">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>

                                
                                    <!-- function to find all categories fetch all from categories and display in table -->
                                    <?php
                                     findAllCategories();
                                    ?>




                                    <!-- delete query function  -->
                                    <?php
                                     deleteCategory();
                                    ?>

                                </tbody>
                            </table>
                        </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include 'includes/admin_footer.php';  ?>



        
             <!-- <script>
                let btn_submit=document.getElementById('btn-submit');
                btn_submit.addEventListener('click',function(){
                let input_color=document.getElementById('input-color');
                if(input_color.value=="" || empty(input_color)){
                input_color.style.color='red';
                }
                else{
                    alert("no advantage");
                }
                })
             </script> -->
            