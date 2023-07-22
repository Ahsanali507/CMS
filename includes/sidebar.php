<div class="col-md-4">   
    <!-- style="position:fixed; top:70px; right:70px; padding: 0px-100px;" ==>For fixed sidebar --> 

                <!-- Blog Search Well -->
                <div class="well">
                    <h4 style="color:#4682B4;">Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-success" name="submit" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">

                <?php
                 $query="SELECT * FROM categories";
                 $select_all_categories_sidebar=mysqli_query($connection,$query);
                ?>
                    <h4 style="color:#4682B4;">Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                            <?php
                              while($row=mysqli_fetch_assoc($select_all_categories_sidebar)){
                                $cat_title=$row['cat_title'];
                                echo "<li><a href='#'>{$cat_title}</li>";
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
             <?php include 'widgets.php'; ?>

            </div>

        </div>
        <!-- /.row -->

        <hr>
