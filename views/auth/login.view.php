

<div class="container">
	<div class="row">
		<div class="col-6 align-self-center">
			<div class="jumbotron mt-4">
	     		<form method="post" action="<?= BASEURL ?>user/login">
					<div class="form-group">
						<label>Email address</label>
						<input type="email" class="form-control" name="email" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
		    </div>
		</div>
	</div>
</div>



