<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test DFP Ads</title>
</head>

<body class="page page-id-532 page-template page-template-page-ads-php">

<script type='text/javascript'>
var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];
(function() {
var gads = document.createElement('script');
gads.async = true;
gads.type = 'text/javascript';
var useSSL = 'https:' == document.location.protocol;
gads.src = (useSSL ? 'https:' : 'http:') + 
'//www.googletagservices.com/tag/js/gpt.js';
var node = document.getElementsByTagName('script')[0];
node.parentNode.insertBefore(gads, node);
})();
</script>

<h1>Test DFP Ads</h1>

<div style="position:fixed;top:0;right:10px;background-color:rgba(0,0,0,0.05);padding:2px 10px;">Viewport inner width = <span id="width"></span>, height = <span id="height"></span></div>

<style>
.entry-content{padding:2em 0;}
.wide-ad {margin:0 auto; text-align:center;overflow:hidden;}
/*.side-ad {margin:0 auto; display:none;}*/
@media (min-width: 480px) {
.side-ad {display:block;}
}
@media (min-width: 768px) {
.side-ad {display:block;}
}
</style>

<script type='text/javascript'>
	googletag.cmd.push(function() {

	var mapping = googletag.sizeMapping().
			addSize([320, 200], [320, 50]).
			addSize([480, 200], [468, 60]).
			addSize([768, 200], [728, 90]).
			addSize([1000, 200], [970,90]).
			build();

	window.slot1= googletag.defineSlot('/1084798/Test_Multi_Width', [320,50], 'div-gpt-ad-1393979881710-0').
	defineSizeMapping(mapping).
	addService(googletag.pubads());

	var mapping3 = googletag.sizeMapping().
			addSize([320, 200], [320, 50]).
			addSize([480, 200], [468, 60]).
			addSize([768, 200], [728, 90]).
			addSize([1000, 200], [970,90]).
			build();

	window.slot3= googletag.defineSlot('/23160721/DST_Top_Banner', [728, 90], 'div-gpt-ad-1409334031383-0').
	defineSizeMapping(mapping3).
	addService(googletag.pubads());

	googletag.pubads().enableSingleRequest();
	googletag.enableServices();

	var mapping2 = googletag.sizeMapping().
			addSize([300, 200], [100, 100]).
			addSize([470, 200], [300, 250]).
			addSize([1000, 200], [336,280]).
			build();

	window.slot2= googletag.defineSlot('/1084798/Test_Multi_Sidebar', [300,250], 'div-gpt-ad-1393979881710-3').
	defineSizeMapping(mapping2).
	addService(googletag.pubads()).
	setCollapseEmptyDiv(true);

	googletag.pubads().enableSingleRequest();
	googletag.enableServices();
	});
</script>

<script>
  var _now = Date.now || function() { return new Date().getTime(); };
  var _debounce = function(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

document.getElementById('width').innerHTML = window.innerWidth || document.documentElement.clientWidth;
document.getElementById('height').innerHTML = window.innerHeight || document.documentElement.clientHeight;

window.addEventListener("resize", _debounce(function() {
    console.log ("Doing refresh");
    document.getElementById("width").innerHTML = window.innerWidth || document.documentElement.clientWidth;
	document.getElementById('height').innerHTML = window.innerHeight || document.documentElement.clientHeight;
    googletag.pubads().refresh([window.slot1,window.slot2,window.slot3]);
}, 200)
);
</script>

<div style="background-color:#dedede;">
	<p>This ad unit will display different wide ads based on viewport size. On resize of the viewport it will refresh.</p>
	<div id='div-gpt-ad-1393979881710-0' class="wide-ad">
		<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1393979881710-0'); });
		</script>
	</div>
</div>

<div style="background-color:#dedede;">
	<p>This ad unit will display different wide ads based on viewport size. On resize of the viewport it will refresh.</p>
	<div id='div-gpt-ad-1409334031383-0' class="wide-ad">
		<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1409334031383-0'); });
		</script>
	</div>
</div>

<div style="max-width:400px; margin:50px auto 0 auto; padding:6px; padding-bottom:40px; background-color:#dedede;">
	<p>This ad unit will show either 300x250 or 336x280 depending on size. On small viewport (< 470px) the ad will disappear.</p>
	<div id='div-gpt-ad-1393979881710-3' class="side-ad">
		<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1393979881710-3'); });
		</script>
	</div>
	<p>The adslot has <code>setCollapseEmptyDiv(true)</code> applied to it, and has a mapping for which we have not line items set for it.</p>
</div>

</body>

</html>
