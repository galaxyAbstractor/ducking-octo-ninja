<body>
	<div class="container">
		<div class="row">
			<div class="span12 pagination-centered" id="header">
				<div class="row">
					<img src="img/logo.png">
				</div>
			</div>
		</div>
	</div>

	<div class="container" id="mainpage">
		<div class="row">
			<div class="span12 pagination-centered">
				<div class="row">

					<div class="span12" id="content">
						<div class="row">
							<div class="span10" id="innercontent">
								<?php 
								echo form_open(base_url().'user/register');
								echo form_label('username', 'username');
								echo form_input(array('name' => 'username', 'required' => 'required')); 
								echo form_label('Password', 'password');
								echo form_password(array('name' => 'password', 'required' => 'required'));
								echo form_label('Email', 'email');
								echo form_input(array('name' => 'email', 'required' => 'required'));
								echo form_label('City', 'city');
								echo form_input(array('name' => 'city', 'required' => 'required'));
								echo form_label('Birthday', 'birthdate');
								echo form_input(array('name' => 'birthdate', 'required' => 'required'));
								echo "<br>";
								echo form_submit(array('name' => 'submit', 'value' => 'Register', "class" => "btn btn-primary")); 
								echo form_close(); 


								?>
							</div>
							<div class="span2" id="userinfo">
								<?php echo $userinfo ?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</body>
</html>