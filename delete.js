$(document).ready(function() {
	$('.delete_post').click(function(){
		id = $(this).val();
		console.log(id);

		Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
		    Swal.fire(
		      'Deleted!',
		      'Your file has been deleted.',
		      'success'
		    )
		    $.ajax({
		    	url: 'phpmyfunction/myfunction.php',
		    	type: 'post',
		    	data : {
		    		delete_post : 1,
		    		id : id,
		    	},success:function(response) {
		    		setTimeout(function(){
		    			location.reload();
		    		}, 1500);
		    	}
		    })
		  }
		})
	})
})