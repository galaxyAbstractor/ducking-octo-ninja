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
                                                                       
                                                                        <h2><?php echo $item->username ?></h2>
                                                                         <?php echo $item->conversationSubject ?>
                                                                         <br>
                                                                         <a href="<?php echo base_url()?>listings/book/<?php echo $item->id?>" class="btn btn-primary">Book appointment</a>
                                                                        <?php endforeach;?>
                                                           
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