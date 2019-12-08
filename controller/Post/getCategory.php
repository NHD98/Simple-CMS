<?php
include_once('../../models/posts.php');
$key = $_REQUEST['cat'];
$result = Post::getAllPost();
// echo $key;
if (strcmp($key, "*") == 0) {
  echo json_encode($result);
} else {
  $list = array();
  for ($i = 0; $i < count($result); $i++) {
    // echo $value->category;
    if (strcmp($result[$i]->category, $key) == 0)
      array_push($list, new Post($result[$i]->id, $result[$i]->title, $result[$i]->content, $result[$i]->category));
  }
  echo json_encode($list);
}
