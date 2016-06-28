

<select>
<?php
$x = 0;
while ($x < 10) { ?>
<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
<?php
$x++;
}
?>
</select>