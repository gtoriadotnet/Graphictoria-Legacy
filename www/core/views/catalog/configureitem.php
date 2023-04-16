<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo config::getName();?> | Configure Item</title>
		<?php html::buildHead();?>
	</head>
	<body>
		<?php
			if (isset($_GET['id'])) {
				$itemId = $_GET['id'];
				if (is_array($itemId) or strlen($itemId) == 0) {
					html::getNavigation();
					echo '<div class="container">';
					echo 'Incorrect itemId</div>';
					html::buildFooter();
					exit;
				}
			}else{
				html::getNavigation();
				echo '<div class="container">';
				echo 'No ID specified</div>';
				html::buildFooter();
				exit;
			}
			$stmt = $dbcon->prepare("SELECT * FROM catalog WHERE id=:id");
			$stmt->bindParam(':id', $itemId, PDO::PARAM_INT);
			$stmt->execute();
			if ($stmt->rowCount() == 0) {
				html::getNavigation();
				echo '<div class="container">';
				echo 'Item not found</div>';
				html::buildFooter();
				exit;
			}
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$itemId = $result['id'];
			if ($result['deleted'] == 1 or $result['declined'] == 1 or $result['approved'] == 0) {
				html::getNavigation();
				echo '<div class="container">';
				echo 'Item not found</div>';
				html::buildFooter();
				exit;
			}
			
			if ($GLOBALS['loggedIn'] == false) {
				header("Location: /catalog");
				exit;
			}
			
			if($result['creator_uid'] != $GLOBALS['userTable']['id'] && $GLOBALS['userTable']['rank'] != 1)
			{
				/*html::getNavigation();
				echo '<div class="container">';
				echo 'You can\'t modify this item.</div>';
				html::buildFooter();*/
				header("Location: /catalog");
				exit;
			}
					
			html::getNavigation();
		?>
		<div class="container">
			<!-- Horizontal ad spot -->
			<ins class="adsbygoogle"
				 style="display:block"
				 data-ad-client="ca-pub-3667210370239911"
				 data-ad-slot="4289582614"
				 data-ad-format="auto"
				 data-full-width-responsive="true"></ins>
			<script>
				 (adsbygoogle = window.adsbygoogle || []).push({});
			</script>
			<div class="col-xs-12 col-sm-4 col-md-8 col-sm-offset-2 col-md-offset-2" style="margin-top:24px">
				<div class="well profileCard">
					<h4><?= context::secureString($result['name']) ?> | Configure Item</h4>
					<p style="color:red">- not finished -</p>
					<p style="color:red">- not finished -</p>
					<p style="color:red">- not finished -</p>
					<p style="color:red">- not finished -</p>
					
					<label>Item Name</label>
					<input id="itemNameValue" class="form-control" type="text" placeholder="Item Name" value="<?= context::secureString($result['name']) ?>" />
					<label>Item Description</label>
					<textarea class="form-control" id="itemDescriptionValue" rows="5" placeholder="Describe your item"><?= context::secureString($result['description']) ?></textarea>
					<label>Item Price</label>
					<div id="itempriceContainer" style="display:flex">
						<input class="form-control" id="itemPriceValue" type="number" placeholder="Item Price" value="<?= $result['price'] ?>"/>
						<?=
							($GLOBALS['userTable']['rank'] > 0) ?
							'<select name="itemCurrencyType" id="itemCurrencyTypeValue" class="form-control" style="max-width: 120px;">
								<option value="0"' . ($result['currencyType'] == 0 ? 'selected' : null) . '>Coins</option>
								<option value="1"' . ($result['currencyType'] == 1 ? 'selected' : null) . '>Posties</option>
							</select>'
							:
							null
						?>
					</div>
					<?=
						($GLOBALS['userTable']['rank'] > 0) ?
						'<input type="checkbox" name="isBuyable" id="isBuyable" '. ($result['buyable'] == 1 ? 'checked' : null) .' />
						<label for="isBuyable">Buyable</label><br />'
						:
						null
					?>
					<br />
					<button id="updateItem" class="btn btn-primary fullWidth">Update</button>
				</div>
			</div>
		</div>
		<?php html::buildFooter();?>
	</body>
</html>