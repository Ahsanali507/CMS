<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#4682B4; border:none; outline:none;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="color: black;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='black'">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">


                <?php
        $query="SELECT * FROM categories";
        $select_all_categories_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_all_categories_query)){
            $cat_title=$row['cat_title'];
            echo "<li><a href='#'>{$cat_title}</li>";
        }
                ?>



                    <li>
                        <a href="admin" style="padding:0 12px; position:absolute; bottom:-5px;">Admin</a>
                    </li>
                    <li style="padding-left:40px;">
                        <a href="./user form/logout.php" class="logout" style="float:right; font-weight:bolder;">Logout</a>
                    </li>
                    <!-- <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>