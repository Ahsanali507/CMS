<form action="" method="post" id="update-form">
                                <div class="form-group">
                                    <label for="cat_title">Edit Category</label>
                                    <?php
                                     if(isset($_GET['update'])){
                                        $cat_id=$_GET['update'];
                                        $query="SELECT * FROM categories WHERE cat_id='{$cat_id}'";
                                        $update_query=mysqli_query($connection,$query);
                                        while($row=mysqli_fetch_assoc($update_query)){
                                            $cat_id=$row['cat_id'];
                                            $cat_title=$row['cat_title'];
                                            ?>
                                        <input type="text" class="form-control" name="cat_title" value="<?php if(isset($cat_title)){echo $cat_title;} ?>" >
                                        <?php
                                        }
                                     }
                                    ?>

                                    <?php
                                     if(isset($_POST['btn-update'])){
                                        $the_cat_title=$_POST['cat_title'];
                                        $the_query="UPDATE categories SET cat_title='{$the_cat_title}' WHERE cat_id={$cat_id}";
                                        $the_update_query=mysqli_query($connection,$the_query);
                                        if(!$the_update_query){
                                            die("UPDATES QUERY FAILED" . mysqli_error($connection));
                                        }
                                     }
                                    ?>
                
                                    <!-- <?php
                                    //  if(isset($_POST['submit'])){
                                    //     $cat_title=$_POST['cat_title'];
                                    //     if($cat_title=="" || empty($cat_title)){
                                    //         echo "<small style='color:red;'>This field should not be empty</small>";
                                    //     }
                                    //     else{
                                    //         $insert_query="INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
                                    //         $create_category_query=mysqli_query($connection,$insert_query);
                                    //         if(!$create_category_query){
                                    //             die("QUERY FAILED" . mysqli_error($connection));
                                    //         }
                                    //     }
                                    //  }
                                    ?> -->

                                    
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="btn-update" value="Update Category" class="btn btn-primary" id="btn-update">
                                </div>
                            </form>
