<div class="tab-pane fade delivery-settings-wrapper" id="nav-pickup" role="tabpanel" aria-labelledby="nav-pickup-tab">
	<?php 
		$preorder_class = 'preorder-disable';

		if( class_exists('RestroPress_Store_Timing') ) :
			$store_timings = get_option('rpress_store_timing');

			//Check store timing is enabled or not
			if( isset($store_timings['enable']) 
				&& isset($store_timings['pre_order']) ) :

				$preorder_class = 'preorder-enable';
		?>

		<div class="delivery-time-text"><?php echo __('Select order date', 'restropress'); ?></div>
		<input type="text" name="" class="rpress_get_delivery_dates">
		<?php
			endif;
		endif;
	?>

	<!-- Pickup Time Starts Here -->
	<div class="rpress-pickup-time-wrap rpress-time-wrap  <?php echo $preorder_class; ?>">
		<div class="pickup-time-text"><?php echo __('Select a pickup time', 'restropress'); ?></div>
		<!-- <input type="text" class="<?php echo $preorder_class; ?> rpress-pickup rpress-allowed-pickup-hrs rpress-hrs rp-form-control" id="rpress-pickup-hours" name="rpress_allowed_hours"> -->
		<select class="<?php echo $preorder_class; ?> rpress-pickup rpress-allowed-pickup-hrs rpress-hrs rp-form-control" id="rpress-pickup-hours" name="rpress_allowed_hours">
			<?php
				$open_time = rpress_get_option('open_time');
				$close_time = rpress_get_option('close_time');
				$range=range(strtotime($open_time),strtotime($close_time),30*60);
				$first = true;
				foreach($range as $time){
					if ($first == true) {
						echo "<option selected value='".date("h:ia",$time)."'>".date("h:ia",$time)."</option>";
						$first = false;
					}else{
						echo "<option value='".date("h:ia",$time)."'>".date("h:ia",$time)."</option>";
					}
				}
			?>
		</select>
	</div>
	<!-- Pickup Time Ends Here -->
	 
</div>