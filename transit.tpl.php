<div class="route">
 <?php foreach ($route_types as $key => $value): ?>
    <p style="font-size: 14px;"><strong><?php print $value; ?></strong></p>
    <?php foreach ($route_attribute_array as $row): ?>
      <?php if ($row['type'] == $value): ?>
        <p style="background-color:#<?php print $row['bg_color']; ?>">
        <a style="color:#<?php print $row['text_color']; ?>" href="<?php print ('/bay-state/schedule/' . $row['route_id']); ?>"><?php print $row['long_name']; ?></a></p>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
</div>
