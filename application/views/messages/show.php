        <div class="container" id="mainpage">
                <div class="row">
                        <div class="span12 pagination-centered">
                                <div class="row">
 
                                        <div class="span12" id="content">
                                                <div class="row">
                                                        <div class="span10" id="innercontent">
                                                             
                                                                        <?php
                                                                                echo "<h2>".$message[0]->conversationSubject."</h2>";
                                                                                foreach ($message as $item):
                                                                        ?>
                                                                       
                                                                        <div class="message span10">
                                                                            <div class="row messageinfo">
                                                                                <?php echo $item->date ?>
                                                                            </div>
                                                                            <div class="row">
                                                                            <div class="span2">
                                                                                <div class="messagepic">
                                                                                    
                                                                                    </div>
                                                                                    <div class="messagename">
                                                                                        <?php echo $item->author ?>
                                                                                    </div>
                                                                            </div>
                                                                            <div class="span8">
                                                                                <div class="messagecontent">
                                                                         <?php echo $item->content ?>
                                                                     </div>
                                                                        </div>
                                                                    </div>

                                                                     </div>
                                                                         <br>
                                                                        <?php endforeach;?>
                                                                         <a href="<?php echo base_url()?>messages/reply/<?php echo $message[count($message)-1]->mid?>" class="btn btn-primary">Reply</a>
                                                           
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