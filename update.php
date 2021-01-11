<?php
$id = $_GET['id'];
$title = $_GET['title'];
$author = $_GET['author'];
$description = $_GET['description'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CRUD Exam</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
<br>
<body>
	
	<center>
	<div class="card w-50 p-3 card h-50 p-3" >
	
		  <div class="card-body">
		  	<div class="card-title"><h1>Post Here</h1></div><br>
		    <form method="post" action="phpmyfunction/myfunction.php" class="needs-validation" novalidate>
		    	<input type="hidden" name="feed_id" value="<?php echo $id;?>">
		    	 <label for="validationCustomAuthor" class="form-label">Enter Author</label>
				    <div class="input-group has-validation">
				      <input type="text" class="form-control" name="author" value="<?php echo $author;?>" id="validationCustomAuthor" aria-describedby="inputGroupPrepend" readonly>
				      <div class="invalid-feedback">
				        Please input a author.
				      </div>
				    </div>
				    <br>

				    <label for="validationCustomTitle" class="form-label">Enter Title</label>
				    <div class="input-group has-validation">
				      <input type="text" class="form-control" name="title" value="<?php echo $title;?>" id="validationCustomTitle" aria-describedby="inputGroupPrepend" required>
				      <div class="invalid-feedback">
				        Please input a title.
				      </div>
				    </div>
				    <br>
				<div class="form-group">
			    <label for="exampleFormControlTextarea1">Write Here</label>
			    <textarea class="form-control" name="description"  id="validationCustomDescription" rows="3" required=""><?php echo $description;?></textarea>
			    <div class="invalid-feedback">
				        Please input a title.
				      </div>
			  </div>
				<br>
				<button type="submit"  class="btn btn-info" id="update_post" name="update_post" style="color: white;">Update Post <i class="fa fa-save"></i></button>
				<button type="button" onclick="goBack()"  class="btn btn-danger"  >Cancel <i class="fa fa-sign-out"></i></button>
			</form>
		  </div>
		</div>
		
</center>


<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="swal.js"></script>
<script src="delete.js"></script>
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
function goBack() {
  window.history.back();
}
</script>
</body>
</html>
