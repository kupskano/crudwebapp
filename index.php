<?php 
include 'phpmyfunction/dbconn.php';
include 'phpmyfunction/myfunction.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
</head>
<style>
	.scroll {
    max-height: 100px;
   
}
body {
  background-color: #87cefa;
}
.navbar {
	/*position: fixed;*/
	background-color: #87cefa;
	width: 100%;
	overflow: hidden;
}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: coral;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
.cardmain{
	border-radius: 50px;
}
</style>

<nav class="navbar navbar-expand-lg navbar ">
  <a class="navbar-brand" href="#" style="color: white;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>

<body>
	
<br>

	
	<center>
		<div class="card w-50 p-3 card h-50 p-3" >
					<?php
		      if(isset($_GET['success'])){

		        $cec = $_GET['success'];
		        if($cec == 'inserted'){
		          echo '<div class="alert alert-info" role="alert">
				  Inserted Successfully
				</div>';
		        }
		      }
		    ?>

		<?php
		      if(isset($_GET['success'])){

		        $cec = $_GET['success'];
		        if($cec == 'updated'){
		          echo '<div class="alert alert-info" role="alert">
				  Updated Successfully
				</div>';
		        }
		      }
		    ?>
		  <div class="card-body cardmain">
		  	<div class="card-title"><h1>Post Here</h1></div><br>
		    <form method="post" action="phpmyfunction/myfunction.php"  enctype='multipart/form-data' class="needs-validation" novalidate>
		    	 <label for="validationCustomAuthor" class="form-label"></label>
				    <div class="input-group has-validation">
				      <input type="text" class="form-control" name="author" id="validationCustomAuthor" aria-describedby="inputGroupPrepend" placeholder="Enter Author" required>
				      <div class="invalid-feedback">
				        Please input a author.
				      </div>
				    </div>
				    <br>

				    <label for="validationCustomTitle" class="form-label"></label>
				    <div class="input-group has-validation">
				      <input type="text" class="form-control" name="title" id="validationCustomTitle" aria-describedby="inputGroupPrepend" placeholder="Enter Title" required>
				      <div class="invalid-feedback">
				        Please input a title.
				      </div>
				    </div>
				    <br>
				    <label for="validationCustomTitle" class="form-label"></label>
				    <div class="input-group has-validation">
				      <input type="file" class="form-control" name="file" id="validationCustomImage" aria-describedby="inputGroupPrepend" required="">
				      <div class="invalid-feedback">
				        Please select image.
				      </div>
				    </div>
				    <br>
				<div class="form-group">
			    <label for="exampleFormControlTextarea1"></label>
			    <textarea class="form-control" name="description" placeholder="Write Here" id="validationCustomDescription" rows="3" required=""></textarea>
			    <div class="invalid-feedback">
				        Please input a title.
				      </div>
			  </div>
				<br>
				<button type="submit" class="btn btn-info" id="submit_post" name="submit_post" style="color: white; float: right;">Post <i class="fa fa-save"></i></button>
			</form>
		  </div>
		</div>
		<br>
		<div class="row">
			<?php
				$read = "SELECT * FROM feed WHERE status = 'active' ORDER BY id DESC";
				$result = $conn->query($read);
			?>
			<?php while($row = $result->fetch_object()):?>
			 <div class="col-md-12" >
				<div class="card w-50 p-3" >
			  		<div class="card-body">
					    <h1 class="card-title">Title: <?php echo $row->title;?></h1>
					    <h5 class="card-title">Author: <?php echo $row->author;?></h5>
					    <?php
					    	$image = $row->name;
							$image_src = "upload/".$image;
							echo'<img src="'.$image_src.'">';
					    ?>

					   

					    <p class="card-text"><?php echo $row->description;?></p>
					     <p class="card-text" style="float: right;"><?php echo date($row->date_created);?></p>
					    <br>
					    <br>

					   <a href="update.php?id=<?php echo $row->id;?>&title=<?php echo $row->title;?>&author=<?php echo $row->author;?>&description=<?php echo $row->description;?>"><button class="btn btn-success">Update Post <i class="fa fa-edit"></i></button></a>
			    		<button class="btn btn-danger delete_post" value="<?php echo $row->id;?>">Delete Post <i class="fa fa-trash"></i></button>
				  	</div>
			 	</div>
			</div>
		 <?php endwhile;?>
		</div>
		
		
</center>

<button onclick="topFunction()" id="myBtn" title="Go to top">Back To Top</button>



<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="swal.js"></script>
<script src="delete.js"></script>
<script src="validationinsert.js"></script>
 <script>
    window.setTimeout(function() {
    $(".alert").fadeTo(200, 0) 
}, 2000);
  </script>
  <script>
(function () {
  'use strict'

  var forms = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
  </script>
  <script>
var mybutton = document.getElementById("myBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</body>
</html>