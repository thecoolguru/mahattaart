<div class="container mt-5">
	<div class="row">	
		<div class="col-md-12">
			<div class="card">
				<h5 class="card-header bg-primary text-white">Mahatta Art SMS Area</h5>
				<div class="card-body">
					<?php if (validation_errors()): ?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Error!</strong> <?php echo validation_errors(); ?>
						</div>
					<?php endif ?>
					<?php if ($this->session->userdata('update_status')): ?>
						<?php echo $this->session->userdata('update_status'); ?>
					<?php endif ?>
					<form action="" method="POST">
						<div class="form-group">
							<label for="sendTo">Send to: </label>
							<input type="number" name="sendTo" id="sendTo" class="form-control" placeholder=" 918939745741, 9568745784" required="required" value="<?php echo set_value("sendTo"); ?>">
						</div>
						<div class="form-group">
							<label for="message">Message: </label>
							<textarea name="message" id="message" class="form-control" rows="3" required="required" placeholder="Enter your message"><?php echo set_value("message"); ?></textarea>
						</div>
						<div class="form-group">
							<button class="btn btn-secondary" type="reset">Reset</button>
							<button class="btn btn-primary" type="submit">Send Message</button>
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
   </div> 
