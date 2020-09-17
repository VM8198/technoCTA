<select class="form-control" name="location_id">
	<option selected value=''>Location</option>
	<?php foreach ($course as $value) { ?>
	<option value="<?php echo $value['Course']['location_id']; ?>"><?php echo $value['Location']['location']; ?></option>
	<?php } ?>
</select>