<p>Today's schedule for Route ID: <?php print $route_id; ?> </p>

<?php foreach ($schedule_attributes_array as $key): ?>

  <?php if (is_numeric($key['stop_name'])): ?>
    Vehicle <?php print $key['vehicle_name']; ?> arrives at Stop <?php print $key['stop_name']; ?> at <?php print $key['arrival_time']; ?> <br>

  <?php else: ?>
    <?php print $key['vehicle_name']; ?> arrives at <?php print $key['stop_name']; ?> stop at <?php print $key['arrival_time']; ?> <br>

  <?php endif; ?>

<?php endforeach; ?>    
