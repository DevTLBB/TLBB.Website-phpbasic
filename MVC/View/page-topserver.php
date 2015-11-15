<?php //header("Content-Type: text/html; charset=utf-8"); ?>
<?php $Title = 'Bảng xếp hạng';
include('header.php');
$Limit = 10;
$TopType = 'level';
$TopList = $Controller->Model->QueryMySQL("SELECT charname,level,menpai FROM t_char ORDER BY {$TopType} DESC LIMIT {$Limit};", 1); ?>
<table width="100%" cellpadding="0" cellspacing="0" class="MyTable">
	<thead>
		<tr>
			<th align="center" valign="middle" scope="col">#</th>
			<th align="center" valign="middle" scope="col">Tên nhân vật</th>
			<th align="center" valign="middle" scope="col">Cấp độ</th>
			<th align="center" valign="middle" scope="col">Môn phái</th>
		</tr>
	</thead>
	<tbody>
		<?php for($i=0;$i < count($TopList);$i++) { ?>
			<tr class="EvenRow">
				<td align="center" valign="middle"><?php echo $i + 1; ?></td>
				<td align="center" valign="middle"><?php
					echo $Controller->CharsetPlayerName(($TopList[$i]['charname']));
				?></td>
				<td align="center" valign="middle"><?php echo $TopList[$i]['level']; ?></td>
				<td align="center" valign="middle"><?php echo $Controller->GetPlayerClassName($TopList[$i]['menpai']); ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php include('footer.php'); ?>