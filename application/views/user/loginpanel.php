<strong>Login</strong>
<?php 
echo form_open(base_url().'user/login');
echo form_label('Username', 'username');
echo form_input(array('name' => 'username', 'required' => 'required')); 
echo form_label('Password', 'password');
echo form_password(array('name' => 'password', 'required' => 'required'));
echo "<br>";
echo form_submit(array('name' => 'submit', 'value' => 'Login', "class" => "btn btn-primary")); 
echo form_close(); 


?>
<a href="<?php echo base_url() ?>user/register" id="registerbutton" class="btn btn-primary">Register</a>