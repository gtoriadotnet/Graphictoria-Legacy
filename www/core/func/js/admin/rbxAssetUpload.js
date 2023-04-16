// XlXi wuz here

const downloadBase = '<p>After downloading an asset, you will be prompted with controls to change the name, price, etc... <b>This may not work with newer assets</b>.</p>\n<input id="assetId" type="number" class="form-control" placeholder="Asset id (1818)"></input>\n<button id="downloadButton" class="btn btn-primary fullWidth">Run</button>';

$(document).ready(
	function()
	{
		$('#downloaderPanel').html(downloadBase);
		
		$('#downloadButton').click(
			function()
			{
				if ($('#downloadButton').is(':disabled') == false)
				{
					$('#downloadButton').prop('disabled', true);
					$('#assetId').prop('disabled', true);
					$('#Status').html('<div class="alert alert-warning">Attempting download, please wait...</div>');
					
					var assetId = $('#assetId').val();
					$.get('/core/func/api/admin/get/RBXAssetInformation.php', {
						assetId: assetId
					})
					.done(function(response) {
						if(response != 'success')
						{
							$('#downloadButton').prop('disabled', false);
							$('#assetId').prop('disabled', false);
						}
						
						if (response == 'error') {
							$('#aStatus').html('<div class="alert alert-danger">It\'s a number, how could you possibly mess that up?!</div>');
						}else if (response == 'missing-info') {
							$('#aStatus').html('<div class="alert alert-danger">Please enter an asset ID to use this tool.</div>');
						}else if (response == 'invalid-type') {
							$('#aStatus').html('<div class="alert alert-danger">Please enter a valid asset ID. The asset must be of type 8, 41, 42, 43, 44, 45, 46, or 47.</div>');
						}else{
							$('#aStatus').html('');
							var responseJSON = JSON.parse(response);
							
							$('#downloaderPanel').html('<p><b>Note</b> : Abuse of this system WILL result in a revoke of all rights, and a demotion if you are staff</p><div class="well profileCard"><div class="center"><h3>This is the asset you\'re uploading</h3><p>Please configure the asset below this card.</p><a class="btn btn-danger" style="margin-bottom:15px" href="/admin/downloadasset">Wrong asset?</a></div><hr/><div class="row"><div class="col-md-6"><img src="' + responseJSON.Image + '" width="250"></div><div class="col-md-6"><h4>' + responseJSON.Name + '</h4><p style="color:green;font-weight:bold">R$ ' + (responseJSON.Price && responseJSON.Price || 0) + '</p><p>' + responseJSON.Description + '</p></div></div></div><div class="well profileCard"><h4>Configure Asset</h4><label>Asset name</label><input type="text" class="form-control" id="assetName" placeholder="Name" value="' + responseJSON.Name + '"><label>Asset description</label><textarea class="form-control" rows="7" id="assetDescription" placeholder="Description">' + responseJSON.Description + '</textarea><label>Data file</label><input type="text" class="form-control" id="assetDataFile" placeholder="Datafile (such as Dominus)"><label>Currency type</label><select name="cType" id="assetCurrencyType" class="form-control"><option value="0">Coins</option><option value="1">Posties</option></select><label>Item price</label><input type="number" class="form-control" id="assetPrice" placeholder="Price" min="0" value="' + (responseJSON.Price && responseJSON.Price || 0) + '"><label><input type="checkbox" id="assetOnSale"' + (responseJSON.Price != undefined && responseJSON.OnSale && ' checked' || '') + '> Buyable</label><br><br><button id="uploadAssetButton" class="btn btn-primary fullWidth">Upload Asset</button></div>');
							
							$('#uploadAssetButton').click(
								function()
								{
									if($('#uploadAssetButton').is(':disabled') == false)
									{
										$('#assetName').prop('disabled', true);
										$('#assetDescription').prop('disabled', true);
										$('#assetDataFile').prop('disabled', true);
										$('#assetCurrencyType').prop('disabled', true);
										$('#assetPrice').prop('disabled', true);
										$('#assetOnSale').prop('disabled', true);
										$('#uploadAssetButton').prop('disabled', true);
										
										var Name = $('#assetName').val();
										var Description = $('#assetDescription').val();
										var DataFile = $('#assetDataFile').val();
										var CurrencyType = $('#assetCurrencyType').val();
										var Price = $('#assetPrice').val();
										var IsOnSale = $('#assetOnSale').prop('checked');
										
										var csrf_token = $('meta[name="csrf-token"]').attr('content');
										
										$.post('/core/func/api/admin/post/UploadRBXAsset.php', {
											csrf: csrf_token,
											assetId: assetId,
											name: Name,
											description: Description,
											dataFile: DataFile,
											currencyType: CurrencyType,
											price: Price,
											isOnSale: IsOnSale
										}).done(function(response) {
											
											if (response == 'success') {
												$('#downloaderPanel').html('');
												
												var countTime = 400;
												
												var timer = setInterval(
													function()
													{
														if(countTime <= 0)
														{
															clearInterval(timer);
															$('#aStatus').html('<div class="alert alert-success">Redirecting...</div>');
															window.location = '/admin';
															
															return;
														}
														
														$('#aStatus').html('<div class="alert alert-success">Successfully uploaded the asset. Redirecting in ' + Math.floor(countTime/100) + ' seconds...</div>');
														countTime -= 10;
													},
													100
												);
												
												return;
											}
											
											$('#assetName').prop('disabled', false);
											$('#assetDescription').prop('disabled', false);
											$('#assetDataFile').prop('disabled', false);
											$('#assetCurrencyType').prop('disabled', false);
											$('#assetPrice').prop('disabled', false);
											$('#assetOnSale').prop('disabled', false);
											$('#uploadAssetButton').prop('disabled', false);
											
											if (response == 'error') {
												$('#aStatus').html('<div class="alert alert-danger">An error occurred while attempting to upload the asset. Please try again.</div>');
											}else if (response == 'missing-info') {
												$('#aStatus').html('<div class="alert alert-danger">Make sure you fill in all of the fields.</div>');
											}else if (response == 'invalid-datafile') {
												$('#aStatus').html('<div class="alert alert-danger">Please ensure that your datafile is alphanumeric.</div>');
											}else if (response == 'no-xml') {
												$('#aStatus').html('<div class="alert alert-danger">Unable to load asset XML.</div>');
											}else if (response == 'invalid-length') {
												$('#aStatus').html('<div class="alert alert-danger">Asset names must be over 3 characters.</div>');
											}else if (response == 'invalid-price') {
												$('#aStatus').html('<div class="alert alert-danger">Please enter a valid price.</div>');
											}else if (response == 'already-exists') {
												$('#aStatus').html('<div class="alert alert-danger">This data file already exists. Try again with a different data file.</div>');
											}
										}).fail(function() {
											$('#aStatus').html('<div class="alert alert-danger">A network error occurred while attempting to upload the asset.</div>');
											
											$('#assetName').prop('disabled', false);
											$('#assetDescription').prop('disabled', false);
											$('#assetDataFile').prop('disabled', false);
											$('#assetCurrencyType').prop('disabled', false);
											$('#assetPrice').prop('disabled', false);
											$('#assetOnSale').prop('disabled', false);
											$('#uploadAssetButton').prop('disabled', false);
										});
									}
								}
							);
						}
					})
					.fail(function() {
						$('#aStatus').html('<div class="alert alert-danger">Could not download this asset because a network error occurred.</div>');
						$('#downloadButton').prop('disabled', false);
						$('#assetId').prop('disabled', false);
					});
				}
			}
		);
	}
);