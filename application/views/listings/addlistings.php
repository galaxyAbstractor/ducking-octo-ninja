        <div class="container" id="mainpage">
                <div class="row">
                        <div class="span12 pagination-centered">
                                <div class="row">
                                       
                                        <div class="span12" id="content">
                                                <div class="row">
                                                        <div class="span10" id="innercontent">
                                                                <strong>Add listings</strong><br>
                                                                <?php
                                                                echo form_open(base_url().'listings/doAdd');
                                                                echo form_label('Subject', 'subject');
                                                                echo form_input(array('name' => 'subject', 'required' => 'required'));
                                                                echo form_label('Message', 'message');
                                                                echo form_textarea(array('name' => 'message', 'required' => 'required',  'class' => 'ckeditor', 'id' => 'ckeditor'));
                                                                echo "<br>";
                                                                echo form_submit(array('name' => 'submit', 'value' => 'Send', "class" => "btn btn-primary"));
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