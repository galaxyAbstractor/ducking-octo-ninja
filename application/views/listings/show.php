        <div class="container" id="mainpage">
                <div class="row">
                        <div class="span12 pagination-centered">
                                <div class="row">
 
                                        <div class="span12" id="content">
                                                <div class="row">
                                                        <div class="span10" id="innercontent">
                                                             
                                                                        <?php
                                                                                foreach ($listings as $item):
                                                                        ?>
                                                                         
                                                                         <div class="message span10">
                                                                            <div class="row messageinfo">
                                                                                <?php echo $item->conversationSubject ?>
                                                                            </div>
                                                                            <div class="row">
                                                                            <br>
                                                                            <div class="span2">
                                                                            
                                                             						<div class="messagepic"><img src='<?php echo base_url().$item->avatar; ?>'></div>
                                                                                   
                                                                                    <div class="messagename">
                                                                                        <?php echo $item->username ?>
                                                                                    </div>
                                                                            </div>
                                                                            <div class="span8">
                                                                                <div class="messagecontent">
                                                                         <?php echo $item->text ?>
                                                                     </div>
                                                                        </div>
                                                                    </div>
                                                                     </div>
                                                                         <div align="left">
	                                                                         
	                                                                         <a href="<?php echo base_url()?>listings/book/<?php echo $item->aid?>" class="btn btn-primary">Book appointment</a>
	                                                                        <?php endforeach;?>
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