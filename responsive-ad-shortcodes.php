<?php
/*
Plugin Name: Responsive Ad Shortcodes
Description: Responsive Ad Shortcodes is a WordPress plugin that was built to scratch an itch. For some time now we have been trying to get AdSense and DoubleClick to play nice with responsive websites. Not easy as the responsive ad offerings from Google fall very short and offer little control. This plugin aims to address that allowing users to control ad display on 3 types of screen (small, medium & large) and blend ads from AdSense and DoubleClick into single units. Because of the focus on control and flexibility this plugin uses VERY verbose shortcodes. It is not designed for newbies. If you want a simple AdSdene short code manage, take a look at <a href="https://wordpress.org/plugins/wordpress-plugin-for-simple-google-adsense-insertion/" target="_blank">WP Simple AdSense Insertion</a>.
Version: 1.0
Plugin URI: https://wordpress.org/plugins/responsive-ad-shortcodes/
Author: <a href="http://www.hypedtext.com/" target="_blank">hypedtext</a>
Author URI: 
Description: 
License: GPLv2 or later
*/

/*
	Styles
*/

function ras_enqueue () {
	wp_enqueue_style ( 'ras-styles', plugins_url( '/responsive-ad-shortcodes/styles.css' ) );
}
add_action( 'wp_enqueue_scripts', 'ras_enqueue' );

/*
	Shortcode
*/

function ras_show ( $atts ) {

	extract( shortcode_atts( array( 'aligns' => 'center|center|center', 'slots' => '9630648961|9630648961|9630648961', 'formats' => 'auto|auto|auto', 'sizes' => '728x90x1|336x280x1|250x250x1', 'adtext' => '0|0|0' ), $atts ) );

	$aligns = explode( '|', esc_attr($aligns) );
	$slots = explode( '|', esc_attr($slots) );
	$formats = explode( '|', esc_attr($formats) );
	$sizes = explode( '|', esc_attr($sizes) );
	$adtext = explode( '|', esc_attr($adtext) );
	$large = explode( 'x', $sizes[0] );
	$medium = explode( 'x', $sizes[1] );
	$small = explode( 'x', $sizes[2] );

	$account = get_option( 'ras_adsense_pub_id' ); 

	$id = rand();

	$output = "
	<div id='as-$id'>

		<script>
		adUnit = document.getElementById('as-$id');
		adWidth = adUnit.offsetWidth;

		if ( adWidth >= $large[0] ) {

			document.getElementById('as-$id').className = document.getElementById('as-$id').className + 'as-$slots[0] as-$aligns[0] as-$large[0]-$large[1] ' + adWidth;

			if ( $large[2] == 1 ) {
				document.write(\"<!-- LARGE $large[0] x $large[1] -->\");
				if ( $adtext[0] == 1 ) {
					document.write(\"<div class='as-text'>Advertisement</div>\");
				}
				var slotisdfp = \"$slots[0]\".indexOf(\"div-gpt-ad\");
				if ( slotisdfp == -1 ) {
					document.write(\"<scr\"+\"ipt async src='//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></scr\"+\"ipt>\");
					document.write(\"<ins class='adsbygoogle' style='display: block; width: $large[0]px; height: $large[1]px;' data-ad-client='$account' data-ad-slot='$slots[0]' data-ad-formats='$formats[0]'></ins>\");
					document.write(\"<scr\"+\"ipt>(adsbygoogle = window.adsbygoogle || []).push({});</scr\"+\"ipt>\");
				} else {
					document.write(\"<div id='$slots[0]' style='display: block; width: $large[0]px; height: $large[1]px;'>\");
					document.write(\"<scr\"+\"ipt type='text/javascript'>\");
					document.write(\"googletag.cmd.push(function(){googletag.display('$slots[0]');});\");
					document.write(\"</scr\"+\"ipt>\");
					document.write(\"</div>\");
				}
			} else {
				document.getElementById('as-$id').className = document.getElementById('as-$id').className + ' as-hide';
			}

		} else if ( adWidth >= $medium[0] ) {

			document.getElementById('as-$id').className = document.getElementById('as-$id').className + 'as-$slots[1] as-$aligns[1] as-$medium[0]-$medium[1] ' + adWidth;

			if ( $medium[2] == 1 ) {
				document.write(\"<!-- MEDIUM $medium[0] x $medium[1] -->\");
				if ( $adtext[1] == 1 ) {
					document.write(\"<div class='as-text'>Advertisement</div>\");
				}
				var slotisdfp = \"$slots[1]\".indexOf(\"div-gpt-ad\");
				if ( slotisdfp == -1 ) {
					document.write(\"<scr\"+\"ipt async src='//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></scr\"+\"ipt>\");
					document.write(\"<ins class='adsbygoogle' style='display: block; width: $medium[0]px; height: $medium[1]px;' data-ad-client='$account' data-ad-slot='$slots[1]' data-ad-format='$formats[1]'></ins>\");
					document.write(\"<scr\"+\"ipt>(adsbygoogle = window.adsbygoogle || []).push({});</scr\"+\"ipt>\");
				} else {
					document.write(\"<div id='$slots[1]' style='display: block; width: $medium[0]px; height: $medium[1]px;'>\");
					document.write(\"<scr\"+\"ipt type='text/javascript'>\");
					document.write(\"googletag.cmd.push(function(){googletag.display('$slots[1]');});\");
					document.write(\"</scr\"+\"ipt>\");
					document.write(\"</div>\");
				}
			} else {
				document.getElementById('as-$id').className = document.getElementById('as-$id').className + ' as-hide';
			}

		} else if ( adWidth >= $small[0] ) {

			document.getElementById('as-$id').className = document.getElementById('as-$id').className + 'as-$slots[2] as-$aligns[2] as-$small[0]-$small[1] ' + adWidth;

			if ( $small[2] == 1 ) {
				document.write(\"<!-- SMALL $small[0] x $small[1] -->\");
				if ( $adtext[2] == 1 ) {
					document.write(\"<div class='as-text'>Advertisement</div>\");
				}
				var slotisdfp = \"$slots[2]\".indexOf(\"div-gpt-ad\");
				if ( slotisdfp == -1 ) {
					document.write(\"<scr\"+\"ipt async src='//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></scr\"+\"ipt>\");
					document.write(\"<ins class='adsbygoogle' style='display: block; width: $small[0]px; height: $small[1]px;' data-ad-client='$account' data-ad-slot='$slots[2]' data-ad-format='$formats[2]'></ins>\");
					document.write(\"<scr\"+\"ipt>(adsbygoogle = window.adsbygoogle || []).push({});</scr\"+\"ipt>\");
				} else {
					document.write(\"<div id='$slots[2]' style='display: block; width: $small[0]px; height: $small[1]px;'>\");
					document.write(\"<scr\"+\"ipt type='text/javascript'>\");
					document.write(\"googletag.cmd.push(function(){googletag.display('$slots[2]');});\");
					document.write(\"</scr\"+\"ipt>\");
					document.write(\"</div>\");
				}
			} else {
				document.getElementById('as-$id').className = document.getElementById('as-$id').className + ' as-hide';
			}

		} else {

			document.write(\"<!-- DEFAULT 125 x 125 -->\");
			document.write(\"<scr\"+\"ipt async src='//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></scr\"+\"ipt>\");
			document.write(\"<ins class='adsbygoogle' style='display: block; width: 125px; height: 125px;' data-ad-client='$account' data-ad-slot='9630648961' data-ad-format='auto'></ins>\");
			document.getElementById('as-$id').className = document.getElementById('as-$id').className + 'as-center as-125-125 ' + adWidth;
			document.write(\"<scr\"+\"ipt>(adsbygoogle = window.adsbygoogle || []).push({});</scr\"+\"ipt>\");

		}
		</script>

	</div>
	";

	$output = str_replace( array( "\r\n", "\r", "\n" ), "", $output );
	$output = html_entity_decode( $output, ENT_COMPAT );

	return $output;

}
add_shortcode( 'ras', 'ras_show' );

/*
	DoubleClick
*/

function ras_insert_doubleclick_header_js () {
	$output = get_option( 'ras_doubleclick_header_js' );
	echo $output;
}
add_action( 'wp_head', 'ras_insert_doubleclick_header_js' );

/*
	Settings
*/

function ras_add_option_page() {
	if ( function_exists( 'add_options_page' ) ) {
		add_options_page( 'Responsive Ad Shortcodes', 'Responsive Ad Shortcodes', 'manage_options', __FILE__, 'ras_options_page' );
	}
}

function ras_options_page() {

	if ( isset( $_POST['ras_update'] ) ) {
		echo '<div id="message" class="updated fade"><p><strong>';

		$ras_option_01 = htmlentities( stripslashes( $_POST['ras_adsense_pub_id'] ) , ENT_COMPAT );
		update_option( 'ras_adsense_pub_id', $ras_option_01 );
				
		$ras_option_02 = htmlentities( stripslashes( $_POST['ras_adsense_backup_slot'] ) , ENT_COMPAT );
		update_option( 'ras_adsense_backup_slot', $ras_option_02 );

		$ras_option_03 = stripslashes( $_POST['ras_doubleclick_header_js'] );
		update_option( 'ras_doubleclick_header_js', $ras_option_03 );
				
		echo 'Options Updated!';
		echo '</strong></p></div>';
	}

?>

	<div class="wrap">
		<h2>Responsive Ad Shortcodes</h2>
		<hr>

		<p><a href="https://wordpress.org/plugins/responsive-ad-shortcodes/" target="_blank">Responsive Ad Shortcodes</a> is a WordPress plugin that was built to scratch an itch. For some time, we've been trying to get AdSense and DoubleClick to play nice with responsive websites. Not easy, as the responsive ad offerings from Google fall very short and offer little control. This plugin aims to address this, allowing users to control ad display on 3 types of screen (small, medium & large). And blend ads from AdSense and DoubleClick into single units.</p>

		<p>Because of the focus on control and flexibility this plugin uses VERY verbose shortcodes. It is not designed for newbies. If you want a simple AdSdene short code manage, take a look at <a href="https://wordpress.org/plugins/wordpress-plugin-for-simple-google-adsense-insertion/" target="_blank">WP Simple AdSense Insertion</a>.</p>

		<h3>Core Concept</h3>

		<p>This plugin assumes you are working with a responsive site model along the lines of <a href="http://www.getbootstrap.com">Bootstrap</a>, which is what most people seem to use these days. This means that the defining metric which decides which ad to use is width. This plugin calculates the width of the parent element and decides which of your ads (small, medium &amp; large) to place. It's important that you order the sizes appropriately starting with largest width.</p>

		<div class="wp-caption">
			<img style="max-width: 100%; height: auto;" src="<?php echo plugins_url( '/responsive-ad-shortcodes/responsive-web-design.gif' ) ?>" />
			<p><a href="http://alistapart.com/article/responsive-web-design/">Responsive Web Design</a> by Ethan Marcotte</p>
		</div>

	
		<h3>Example Shortcode</h3>

		<p><blockquote><code>[ras aligns="center|center|center" slots="5940543366|5940543366|5940543366" formats="horizontal|horizontal|horizontal" sizes="970x90x1|728x90x1|320x50x1" adtext="1|1|1"]</code></blockquote></p>

		<h3>Arguments</h3>
	
		<blockquote>
			<dl>
				<dt><strong>aligns</strong></dt>
				<dd>Values can be <code>left</code>, <code>right</code> or <code>center</code>. There should be 3 values seperated by <code>|</code>. The first value is the alignment for the large ad placement, the second for the medium and third for the small ad placement.</dd>
				<dt><strong>slots</strong></dt>
				<dd>Values should refer to an AdSense or DoubleClick ad slot IDs. There should be 3 values seperated by <code>|</code>. The first value is the slot ID for the large ad placement, the second for the medium and third for the small ad placement.</dd>
				<dt><strong>formats</strong></dt>
				<dd>Values can be <code>horizontal</code>, <code>vertical</code> or <code>rectangle</code>. There should be 3 values seperated a <code>|</code>. The first value is the ad format for the large ad placement, the second for the medium and third for the small ad placement.</dd>
				<dt><strong>sizes</strong></dt>
				<dd>Values need to be structured strings of 3 sets of numbers seperated by <code>x</code>. The first number is the width, the second the height and the third is a boolean to turn ad display on or off. There should be 3 values seperated by <code>|</code>. The first value is the ad format for the large ad placement, the second for the medium and third for the small ad placement.</dd>
				<dt><strong>adtext</strong></dt>
				<dd>Values can be <code>1</code> or <code>0</code>. There should be 3 values seperated by <code>|</code>. The first value turns of the advertisment label for the large ad placement, the second for the medium and third for the small ad placement.</dd>
			</dl>
		</blockquote>

		<h2>Settings</h2>
		<hr>
		<br>

	    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
			<input type="hidden" name="ras_update" id="ras_update" value="true" />
			<fieldset class="options">
				<table class="wp-list-table widefat">
					<tr>
						<td class="plugin-title" width="20%"><strong>AdSense Publisher ID</strong>
							<span><a href="https://www.google.com/adsense/app#accountInformation" target="_blank">Find your ID here</a></span>
						</td>
						<td width="80%">
							<input type="text" name="ras_adsense_pub_id" size="22" value="<?php echo get_option( 'ras_adsense_pub_id' ); ?>">
							<p><small>Don't forget to add <code>ca-</code> to the ID so it's reads <code>ca-pub-XXXXXXXXXXXXXXXX</code></small></p>
						</td>
					</tr>
					<tr class="alternate">
						<td class="plugin-title" width="20%"><strong>AdSense Backup Ad Slot</strong>
							<span><a href="https://www.google.com/adsense/app#myads-viewall-adunits/" target="_blank">Find your ad slot ID here</a></span>
						</td>
						<td width="80%">
							<input type="text" name="ras_adsense_backup_slot" size="22" value="<?php echo get_option( 'ras_adsense_backup_slot' ); ?>">
							<p><small>Just in case things go wrong, this will ensure an ad is displayed.</small></p>
						</td>
					</tr>
					<tr>
						<td class="plugin-title" width="20%">
							<strong>DoubleClick Header JS</strong>
							<span>This is optional and only needed if you intend to use DoubleClick ads. This also needs to be carefully edited so as not deystroy any existing DoubleClick placements.</span>
						</td>
						<td align="left" width="80%"><textarea class="wp-editor-area" style="width: 100%;" name="ras_doubleclick_header_js" rows="20"><?php echo get_option( 'ras_doubleclick_header_js' ); ?></textarea></td>
					</tr>
				</table>
			</fieldset>
			<div class="submit">
				<input type="submit" class="button-primary" name="ras_update" value="Update options" />
			</div>
	    </form>
	</div>
<?php
}

add_action( 'admin_menu', 'ras_add_option_page' );

