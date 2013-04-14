	<div class="container" id="mainpage">
		<div class="row">
			<div class="span12 pagination-centered">
				<div class="row">

					<div class="span12" id="content">
						<div class="row">
							<div class="span10" id="innercontent">
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