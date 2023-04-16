<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
	if (!$GLOBALS['loggedIn']) {
		require_once('../error/notfound.php');
		exit;
	}
	if ($GLOBALS['userTable']['rank'] == 0) {
		require_once('../error/notfound.php');
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo config::getName();?> | Reports</title>
		<?php html::buildHead();?>
		<style>
		.interactableRow:hover {
			cursor: pointer;
			background-color: #fdfdfd;
		}
		
		.interactableRow:active {
			background-color: #f0f0f0!important;
		}
		</style>
	</head>
	<body>
		<?php html::getNavigation();?>
		<div class="container">
			<h4>Ban Appeals</h4>
			<?php
				$stmt = $dbcon->prepare("SELECT `id` FROM `appeals` WHERE `accepted`=0 AND `denied`=0;");
				$stmt->execute();
				if($stmt->rowCount() > 0):
			?>
				<table class="table table-striped table-bordered" style="margin:0;background:white">
					<tr>
						<th>User</th>
						<th>Explanation</th>
					</tr>
					<tr class="interactableRow" data-href="/admin/appeals/1">
						<td>test</td>
						<td>test</td>
					</tr>
				</table>
			<script>
				$('.interactableRow').click(
					function()
					{
						window.location = $(this).data('href');
					}
				);
			</script>
			<?php else:?>
			<p><i>*Tumbleweed floats by*</i><br/>There's nothing to see here.</p>
			<?php endif;?>
		</div>
		<?php html::buildFooter();?>
	</body>
</html>