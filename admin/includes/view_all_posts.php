<table class="table table-bordered table-hover table-responsive">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
         $query="SELECT * FROM posts";
         $select_posts=mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($select_posts)){
            $post_id=$row['post_id'];
            $post_author=$row['post_author'];
            $post_title=$row['post_title'];
            $post_category=$row['post_category_id'];
            $post_status=$row['post_status'];
            $post_image=$row['post_image'];
            $post_tags=$row['post_tags'];
            $post_comments=$row['post_comment_count'];
            $post_date=$row['post_date'];

            echo "<tr>";
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_title}</td>";
            echo "<td>{$post_category}</td>";
            echo "<td>{$post_status}</td>";
            echo "<td><img width='100' src='../images/$post_image'></td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comments}</td>";
            echo "<td>{$post_date}</td>";
            echo "</tr>";
            }
           ?>

     </tbody>
</table>