  <div class="table-responsive" id="coursename" name="coursename">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Course</th>
                <th>Duration</th>
                <th>Location</th>
                <th>No. of Delegates<br>per Session</th>
                <th>Price Per Delegates<br>excl VAT</th>
                <th>Expiry<br>Competence </th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Book Now</th>
              </tr>
            </thead>
            <tbody>
            	<?php $i=1; foreach($course as $value) {  ?>
              <tr>
                <td><?php echo $value['Course']['course_name']; ?></td>
                <td><?php echo $value['Course']['duration']; ?></td>
                <td><?php echo $value['Location']['location']; ?></td>
                <td><?php echo $value['Course']['delegates_no']; ?></td>
                <td><span>&#163;</span><?php echo $value['Course']['delegate_price']; ?></td>
                <td><?php echo $value['Course']['expiry']; ?></td>
				        <td><?php echo $value['Course']['start_date']; ?></td>
                <td><?php echo $value['Course']['end_date']; ?></td>               
                <td><button class="btn btn-success">Book Now</button></td>
              </tr>
              <?php $i++;} ?>    
            </tbody>
          </table>
          </div>