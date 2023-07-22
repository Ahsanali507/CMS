<?php

// function to insert input data into categories(database) when user click on add category
function insert_categories(){

    global $connection;

    if(isset($_POST['submit'])){
        $the_cat_title=$_POST['cat_title'];
        if($the_cat_title=="" || empty($the_cat_title)){
            echo "<small style='color:red;'>This field should not be empty</small>";
        }
        else{
            $insert_query="INSERT INTO categories(cat_title) VALUE('{$the_cat_title}')";
            $create_category_query=mysqli_query($connection,$insert_query);
            if(!$create_category_query){
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
     }




}



// function to find or fetch all data from database (after insert categories in database) and display it into table

function findAllCategories(){

    global $connection;

    $query="SELECT * FROM categories";
         $select_all_categories=mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($select_all_categories)){
             $cat_id=$row['cat_id'];
             $cat_title=$row['cat_title'];
             echo "<tr>";
             echo "<td>{$cat_id}</td>";
             echo "<td>{$cat_title}</td>";
             echo "<td><a href='categories.php?delete={$cat_id}' class='btn btn-danger'>Delete</a></td>";
             echo "<td><a href='categories.php?update={$cat_id}' class='btn btn-success'>Edit</a></td>";
             echo "</tr>";
            }




}



// function to delete categories

function deleteCategory(){

    global $connection;

    if(isset($_GET['delete'])){
        $the_cat_id=$_GET['delete'];
        $query="DELETE FROM categories WHERE cat_id={$the_cat_id}";
        $delete_query=mysqli_query($connection,$query);
        header('location:categories.php');
     }



}




?>