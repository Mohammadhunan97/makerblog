<?php
include './db/db.php';
include 'editmodal.php';

date_default_timezone_set('America/New_York');
$postdata = pg_query_params($db, "SELECT * FROM posts WHERE user_id = $1", array($_SESSION['id']));

while($post = pg_fetch_array($postdata)){
$id = $post['id'];
echo "<div class='container'>
        <div class='row'>
            <div class='col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
                <div class='post-preview'>
               
                      <button type='button' onclick='getEditData({$id})'  class='btn edit-post' data-toggle='modal' data-target='#editModal'>Edit</button>


                    <a href='../posts/delete.php?id={$post['id']}' class='btn delete-post'>Delete</a>
                        <h2 class='post-title'>
                            {$post["title"]}
                        </h2>
                        <h3 class='post-subtitle'>
                           {$post["content"]}
                        </h3>
                        <img src='{$post["image"]}' alt='this image is not currently available'/>
                 
                    <p class='post-meta'>Posted on "
                    . date("F j, Y, g:i a",strtotime($post["timestamp"])) 
                    . "</p> 
                </div>
            </div>
        </div>
    </div>
    <hr class='post-hr'/>

      <div class='modal fade' id='editModal' role='dialog'>
        <div class='modal-dialog modal-lg'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal'>&times;</button>

              
                      <h4 class='modal-title'> Title: <input onchange='editTitle(this)' class='form-control edit-title-write' placeholder='Write a post title' /></h4>
                    </div>
                    <div class='modal-body'>
                      <p><textarea onchange='editContent(this)' class='form-control edit-content' rows='5' id='comment' placeholder='spice up your post with some content'></textarea>
                      <br/>
                       <strong>Image:</strong>
                      <button type='button' class='myimg edit-yourown-image'>Use your own image</button> <button type='button' class='myimg search-for-img'>Search for gifs</button>
                       <br/><br/>
                      <input onchange='editImageInput(this)'  class='form-control edit-image-url' placeholder='insert your image url here' />

                      <input type='text' onchange='editGifCall(this)' class='form-control edit-image-search' placeholder='search for a gif' />
                      <div class='edit-img-holder'>
                      </div>
                      </p>
                    </div>
                    <br/>
                    <div class='modal-footer'>
                    <br/>
                    <br/>
                    <button onclick='editImgSubmit({$id})' class='btn edit-img-submit' data-dismiss='modal'>Submit</button>
          
              <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    ";
     

}
?>
<script>

// if(!edit){
//     $('.edit-image-now').click(function(){
//         $.ajax({
//             url: '../posts/create.php',
//             type: "post",
//             data: imageData
//         });
//     })
// }
function editThis(id){
    // edit = true;
    // $.get('../posts/show.php?id='+id,function(data){
    //     let posts = JSON.parse(data);
    //     console.log(posts);
    //     $('.title-write').val(posts['title']);
    //     $('#comment').val(posts['content']);
    //     $('.your-image-url').val(posts['image']);
    // })  
    // $('.edit-image-now').click(function(){
    //     $.get('../posts/delete.php?id='+id,function(data){
    //         console.log(data);
    //          request = $.ajax({
    //                   url: '../posts/update.php',
    //                   type: "post",
    //                   data: imageData
    //               });
    //       });

    // })
}


</script>