        <div class="container" id="mainpage">
                <div class="row">
                        <div class="span12 pagination-centered">
                                <div class="row">
 
                                        <div class="span12" id="content">
                                                <div class="row">
                                                        <div class="span10" id="innercontent">
                                                                <strong>Settings</strong><br>
                                                                <?php
                                                                echo form_open(base_url().'usersettings/setuserdata');
                                                                echo form_label('Username', 'username');
                                                                echo form_input(array('name' => 'username','value' => $settings['username'], 'required' => 'required'));
                                                               	echo form_label('Email', 'email');
                                                                echo form_input(array('name' => 'email','value' => $settings['email'], 'required' => 'required'));
                                                              	echo form_label('City', 'city');
                                                                echo form_input(array('name' => 'city','value' => $settings['city'], 'required' => 'required'));
                                                              	echo form_label('Country', 'country');
                                                                echo form_input(array('name' => 'city','value' => $settings['country'], 'required' => 'required'));
                                                                echo form_label('Birthday', 'birthdate');
                                                                echo form_input(array('name' => 'birthdate','value' => $settings['birthdate'], 'required' => 'required'));
                                                                echo "<br>";
                                                                echo form_submit(array('name' => 'submit', 'value' => 'Submit', "class" => "btn btn-primary"));
                                                                echo form_close();
                                                                
                                                                echo form_open_multipart('usersettings/upload');
                                                                echo form_label('Avatar', 'avatar');
 																echo form_input(array('name' => 'userfile', 'type' => 'file'));
 																echo "<br>";
 																echo "<br>";
 																echo form_submit(array('name' => 'submitimg', 'value' => 'Submit', "class" => "btn btn-primary"));
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