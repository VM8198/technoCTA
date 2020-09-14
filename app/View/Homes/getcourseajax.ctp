<select class="form-control" name="course_name" id="coursename" onchange="getlocationid()">
	<option value='' selected>Course</option>
	<?php foreach ($course as $value) { ?>
	<option value="<?php echo $value['Course']['course_name']; ?>"><?php echo $value['Course']['course_name']; ?></option>
	<?php } ?>
</select>