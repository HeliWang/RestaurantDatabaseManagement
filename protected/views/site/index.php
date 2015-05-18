<table border="1" cellpadding="7">
<tr>
<td>Ordertime</td>
<td>ResID</td>
<td>TotalPrice</td>
</tr>
<?php foreach ($results as $result){ ?>
<tr>
<td><?php echo $result->startday ; ?></td>
<td><?php echo $result->dayrestaurant ; ?></td>
<td><?php echo $result->daytotal ; ?></td>
</tr>
<?php } ?>
</table>