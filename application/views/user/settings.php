        <div class="container" id="mainpage">
                <div class="row">
                        <div class="span12 pagination-centered">
                                <div class="row">
 
                                        <div class="span12" id="content">
                                                <div class="row">
                                                        <div class="span10" id="innercontent">
                                                                <h3>Settings</h3><br>
                                                                <div align="left">
	                                                                
	                                                                <?php echo form_open(base_url().'usersettings/update'); ?>
	                                                                <?php echo form_label('Username', 'username'); ?>
	                                                                <?php echo form_input(array('name' => 'username','value' => $settings['username'], 'required' => 'required')); ?>
	                                                               	<?php echo form_label('Email', 'email'); ?>
	                                                                <?php echo form_input(array('name' => 'email','value' => $settings['email'], 'required' => 'required')); ?>
	                                                              	<?php echo form_label('City', 'city'); ?>
	                                                                <?php echo form_input(array('name' => 'city','value' => $settings['city'], 'required' => 'required')); ?>
	                                                              	<?php echo form_label('Country', 'country'); ?>
	                                                                <?php echo form_input(array('name' => 'city','value' => $settings['country'], 'required' => 'required')); ?>
	                                                                <?php echo form_label('Birthday', 'birthdate'); ?>
	                                                                <?php echo form_input(array('name' => 'birthdate','value' => $settings['birthdate'], 'required' => 'required')); ?>
	                                                                <br>
	                                                                <?php echo form_submit(array('name' => 'submit', 'value' => 'Submit', "class" => "btn btn-primary")); ?>
	                                                                <?php echo form_close(); ?>
	                                                                
	                                                                <?php echo form_open_multipart('usersettings/upload'); ?>
	                                                                <?php echo form_label('Avatar', 'avatar'); ?>
	 																<?php echo form_input(array('name' => 'userfile', 'type' => 'file')); ?>
	 																<br>
	 																<br>
	 																<?php echo form_submit(array('name' => 'submitimg', 'value' => 'Submit', "class" => "btn btn-primary")); ?>
	 																<?php echo form_close(); ?>
	 																
	                                                                
                                                                </div>
                                                        </div>
                                                        <div class="span2" id="userinfo">
                                                                <?php 
                                                                        $this->load->model('message_model');
                                                                        $hasunread = $this->message_model->hasUnread($this->session->userdata('uid'));
                                                                        $this->load->view("user/userpanel",array("username" => $this->session->userdata('username'), "unread" => $hasunread));
                                                                ?>
                                                        </div>
                                                </div>
                                        </div>
 
                                </div>
                        </div>
                </div>
        </div>
 
</body>
</html>