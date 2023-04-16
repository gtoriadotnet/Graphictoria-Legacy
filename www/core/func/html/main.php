<?php
	// This file will contain everything HTML related.
	class html {
		public static function buildHead() {
			include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/html/views/head.php';
		}
		
		public static function getNavigation() {
			include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/html/views/navigation.php';
		}
		
		public static function buildFooter() {
			include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/html/views/footer.php';
		}
		
		public static function buildAds() {
			$rand = rand(0, 1);
			if ($rand == 0) {
				echo '<div style="margin:10px 0px 0px;text-align: center;">
				<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<ins class="adsbygoogle"
					style="display:block"
					 data-ad-client="ca-pub-3667210370239911"
					 data-ad-slot="1354542529"
					 data-ad-format="auto"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>';
			}elseif ($rand == 1) {
				echo '<div style="margin:10px 0px 0px;text-align: center;">
					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<ins class="adsbygoogle"
						 style="display:block"
						 data-ad-client="ca-pub-3667210370239911"
						 data-ad-slot="3385615979"
						 data-ad-format="auto"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>';
			}
		}
		
		public static function buildMatched() {
			echo '<div style="margin:10px 0px 0px;text-align: center;"><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<ins class="adsbygoogle"
						 style="display:block;max-height:100px"
						 data-ad-format="auto"
						 data-ad-client="ca-pub-3667210370239911"
						 data-ad-slot="8098886605"></ins>
					<script>
						 (adsbygoogle = window.adsbygoogle || []).push({});
					</script></div>';
		}
	}
?>
