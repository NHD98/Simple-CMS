<?php
session_start();
include_once('layouts/header.php');
include_once('layouts/nav.php');
// var_dump($_SESSION);
if (isset($_SESSION['username']) == false) {
  header("Location: login.php");
}
?>
<script src="../assets/vendors/ckeditor/ckeditor.js"></script>
<!-- <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script> -->

<body>
  <div class="container">
    <label>Category: </label>
    <select id="category" class="form-control">
      <option value="Thể loại 1">Thể loại 1</option>
      <option value="Thể loại 2">Thể loại 2</option>
      <option value="Thể loại 3">Thể loại 3</option>
      <option value="Thể loại 4">Thể loại 4</option>
      <option value="Thể loại 5">Thể loại 5</option>
      <option value="Thể loại 6">Thể loại 6</option>
    </select>
    <label>Title: </label>
    <input type="text" id="title" class="form-control"><br>
    <textarea name='content' id='content' class="form-control ckeditor">
  </textarea>
    <button class="btn btn-info" onclick="createPost()">Create</button>
  </div>
</body>

</html>
<script>
  var editor = CKEDITOR.replace('content', {
    height: 300,
    filebrowserUploadUrl: '../controller/upload/upload.php'
  });
</script>

<script>
  function createPost() {
    var e = document.getElementById('category');
    var category = e.options[e.selectedIndex].value;
    // console.log(category);
    var content = CKEDITOR.instances.content.getData();
    var title = $('#title').val();
    if (!content || !title || !category) {
      alert("Invalid post");
    } else {
      $.post('../controller/Post/post.php', {
          title: $('#title').val(),
          category: $('#category').val(),
          content: content
        },
        function(data) {
          alert("Created new post");
          console.log(data);
          window.location = "index.php";
        }
      ).fail(function() {
        alert("Could not create post");
      })
    }
  }
</script>
