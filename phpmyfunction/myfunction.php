<?php

$conn = mysqli_connect('localhost', 'root', '', 'blog');


if(isset($_POST['submit_post'])) {
	$author = $_POST['author'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$name = $_FILES['file']['name'];
  $target_dir = "../upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
     $query = "insert into feed(author, title, description, name) values('".$author."','".$title."', '".$description."', '".$name."')";
     mysqli_query($conn,$query);
  
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

     header("Location: ../index.php?success=inserted");

  }
}


if(isset($_POST['delete_post'])) {
	$id = $_POST['id'];

	$delete = "UPDATE feed SET status = 'inactive' WHERE id = '$id'";
	$result = $conn->query($delete);
}


if(isset($_POST['update_post'])) {
	$feed_id = $_POST['feed_id'];
	$author = $_POST['author'];
	$title = $_POST['title'];
	$description = $_POST['description'];

	$update = "UPDATE feed SET author = '$author', title = '$title', description = '$description' WHERE id = '$feed_id'";
	$result = $conn->query($update);
	header("Location: ../index.php?success=updated");
}