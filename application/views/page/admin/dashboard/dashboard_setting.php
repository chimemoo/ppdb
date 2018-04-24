<main class="app-content">
  	<div class="row">
    	<div class="col-md-12">
      		<div class="tile">
        	<h3 class="tile-title">Setting</h3>
        	<form action="">
        		<div class="form-group">
        			<label for="username">Username :</label>
        			<input type="text" id="username" class="form-control" value="<?php echo $profile[0]['admin_name'] ?>">
        		</div>
        		<div class="form-group">
        			<label for="email">Email :</label>
        			<input type="email" id="email" class="form-control" value="<?php echo $profile[0]['admin_email'] ?>">
        		</div>
        		<div class="form-group">
        			<label for="password">Password :</label>
        			<input type="password" id="password" class="form-control" value="<?php echo $profile[0]['admin_password'] ?>">
        		</div>
        		<div class="form-group">
        			<input type="submit" id="username" class="btn btn-primary" value="Update">
        		</div>
        	</form>
    	</div>
	</div>
</div>