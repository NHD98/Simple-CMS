<?php
include_once('layouts/header.php');
session_start();
// var_dump($_SESSION);
?>
<script>
  function getPostList() {
    document.getElementById('postList').innerHTML = "";

    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // console.log(this.responseText);

        var list = JSON.parse(this.responseText);
        if (list != null) {
          for (var i = 0; i < list.length; i++) {
            var content = "";
            content += "<div class='col-md-6 product-men mb-5 productItem'>";
            content += "<div class='men-pro-item simpleCart_shelfItem'>";
            content += "<div class='men-thumb-item text-center'>";
            content += "<h2><a href='postDetail.php?id=" + list[i]['id'] + "' class='text-truncate'>" + list[i]['title'] + "</a></h2>";
            content += "</div>";
            content += "<div class='item-info-product text-center border-top mt-4'>";
            content += "<h4 class='pt-1'>";
            content += list[i]['category'];
            content += "</h4>";
            content += "<div class='info-product-price my-2'>";
            content += "</div>";
            content + "<div class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out'>";
            content += "</div>";
            content += "</div>";
            content += "</div>";
            content += "</div>";
            document.getElementById('postList').innerHTML += content;
          }
        }
      }
    };

    xhr.open("GET", "../controller/Post/post.php", true);
    xhr.send();
  }

  function getCategory(category) {
    console.log(category);
    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        console.log(this.responseText);
        var list = JSON.parse(this.responseText);
        document.getElementById('postList').innerHTML = "";
        for (var i = 0; i < list.length; i++) {
          var content = "";
          content += "<div class='col-md-6 product-men mb-5 productItem'>";
          content += "<div class='men-pro-item simpleCart_shelfItem'>";
          content += "<div class='men-thumb-item text-center'>";
          content += "<h2><a href='postDetail.php?id=" + list[i]['id'] + "' class='text-truncate'>" + list[i]['title'] + "</a></h2>";
          content += "</div>";
          content += "<div class='item-info-product text-center border-top mt-4'>";
          content += "<h4 class='pt-1'>";
          content += list[i]['category'];
          content += "</h4>";
          content += "<div class='info-product-price my-2'>";
          content += "</div>";
          content + "<div class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out'>";
          content += "</div>";
          content += "</div>";
          content += "</div>";
          content += "</div>";
          document.getElementById('postList').innerHTML += content;
        }
      }
    }
    xhr.open("GET", "../controller/Post/getCategory.php?cat=" + category, true);
    xhr.send();
  }

  window.onload = function() {
    getPostList();
  }
</script>

<body>

  <?php include_once('layouts/nav.php') ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-2 list-group">
        <button onclick="getCategory('*')" class="list-group-item">All</button>
        <button onclick="getCategory('Thể loại 1')" class="list-group-item">Thể loại 1</button>
        <button onclick="getCategory('Thể loại 2')" class="list-group-item">Thể loại 2</button>
        <button onclick="getCategory('Thể loại 3')" class="list-group-item">Thể loại 3</button>
        <button onclick="getCategory('Thể loại 4')" class="list-group-item">Thể loại 4</button>
        <button onclick="getCategory('Thể loại 5')" class="list-group-item">Thể loại 5</button>
        <button onclick="getCategory('Thể loại 6')" class="list-group-item">Thể loại 6</button>
      </div>
      <div class="col-lg">
        <div class="row" id="postList">
        </div>
      </div>
    </div>
  </div>
