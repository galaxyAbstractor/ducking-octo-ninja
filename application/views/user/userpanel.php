<div id="profilepic">
<img src='<?php 
			$pic = $this->session->userdata('avatar');
			echo base_url().$pic;
			
			?>'>
</div>
<div id="profilename">
	<?php echo $username ?>
</div>
<br>
<br>
<a href="<?php echo base_url() ?>listings/addlisting" class="btn btn-primary">Add listing</a>
<br>

<a href="<?php echo base_url() ?>usersettings" class="btn btn-primary">Settings</a>

<a href="<?php echo base_url() ?>listings/my" class="btn btn-primary">My listings</a>
<br>
<?php if($unread){ ?>
<a href="<?php echo base_url() ?>messages" class="btn btn-warning">Messages</a>
<?php } else { ?>
	<a href="<?php echo base_url() ?>messages" class="btn btn-primary">Messages</a>
<?php } ?>
<br><br>
<a href="<?php echo base_url() ?>user/logout" class="btn btn-primary">Log out</a>


