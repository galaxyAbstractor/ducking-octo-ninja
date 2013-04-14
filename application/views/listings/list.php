        <div class="container" id="mainpage">
                <div class="row">
                        <div class="span12 pagination-centered">
                                <div class="row">
 
                                        <div class="span12" id="content">
                                                <div class="row">
                                                        <div class="span10" id="innercontent">
                                                                <table  class="table table-striped">
                                                                <h2>All available listings</h2>
                                                                <thead>
                                                                        <tr>
                                                                                <th>User</th>
                                                                                <th>Subject</th>
                                                                                
                                                                        </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <?php
                                                                                foreach ($listings as $item):
                                                                        ?>

                                                                        <tr onClick="changePage('<?php echo base_url()?>listings/show/<?php echo $item->aid?>')">
                                                                                <td><?php echo $item->username ?></td>
                                                                                <td><?php echo $item->conversationSubject ?></td>
                                                                        </tr>
                                                                        <?php endforeach;?>
                                                                </tbody>
                                                        </table>
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