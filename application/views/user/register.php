        <div class="container" id="mainpage">
                <div class="row">
                        <div class="span12 pagination-centered">
                                <div class="row">
 
                                        <div class="span12" id="content">
                                                <div class="row">
                                                        <div class="span10" id="innercontent">
                                                                <strong>Register</strong><br>
                                                                <?php
                                                                echo form_open(base_url().'user/register');
                                                                echo form_label('Username', 'username');
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