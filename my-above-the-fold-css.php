<?php

/**
 *
 * @link              http://eboxnet.com
 * @since             1.0.0
 * @package           My_Above_The_Fold_Css
 *
 * @wordpress-plugin
 * Plugin Name:       My Above The Fold CSS
 * Plugin URI:        http://my-above-the-fold.eboxnet.com
 * Description:       You can easily find your above the fold css (to use it in Autoptimize or any other plugin) to increase your Pagespeeed score up to 100/100.
 * Version:           1.3
 * Author:            Vagelis P.
 * Author URI:        http://eboxnet.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       my-above-the-fold-css
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-my-above-the-fold-css-activator.php
 */
function activate_my_above_the_fold_css() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-my-above-the-fold-css-activator.php';
	My_Above_The_Fold_Css_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-my-above-the-fold-css-deactivator.php
 */
function deactivate_my_above_the_fold_css() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-my-above-the-fold-css-deactivator.php';
	My_Above_The_Fold_Css_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_my_above_the_fold_css' );
register_deactivation_hook( __FILE__, 'deactivate_my_above_the_fold_css' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-my-above-the-fold-css.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_my_above_the_fold_css() {

	$plugin = new My_Above_The_Fold_Css();
	$plugin->run();
	if (esc_attr(get_option('myabovethefold_display')) == "Yes") {
    	if (esc_attr(get_option('myabovethefold_responsive')) == "Yes") {
		add_action( 'wp_footer', 'showmyresponsivecss', 100 );
		} else {
			add_action( 'wp_footer', 'showmycss', 100 );
		}
		}
	}

function mabtf_admin_page()
{
?>
<div class="wrap">
<h2>My Above The Fold Settings Page</h2>
<form method="post" action="options.php">
    <?php
	settings_fields('mabtf-group'); ?>
    <?php
	do_settings_sections('mabtf-group'); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Enable Above The Fold CSS Display ? </th>
		  <td>
			<select name="myabovethefold_display">
			<?php
			$numbertodisplay = array("Yes","No");
			$cse = esc_attr(get_option('myabovethefold_display'));
			foreach($numbertodisplay as $numtodi)
				{ ?>
              <option value="<?php echo $numtodi; ?>"
			      <?php if ($numtodi == $cse) echo "selected"; ?>
				  <?php echo ">"; echo $numtodi; ?>
			  </option>
			<?php
	} ?>
			</select>
		</td>
		</tr>
		 <tr valign="top">
		 <th scope="row">Display in all pages ? </th>
		  <td>
			<select name="myabovethefold_displaytoall">
			<?php
			$numbertodisplay = array("Yes","No");
			$cse = esc_attr(get_option('myabovethefold_displaytoall'));
			foreach($numbertodisplay as $numtodi)
				{ ?>
              <option value="<?php echo $numtodi; ?>"
			      <?php if ($numtodi == $cse) echo "selected"; ?>
				  <?php echo ">"; echo $numtodi; ?>
			  </option>
			<?php
	} ?>
			</select>
		</td>
        </tr>
		 <tr valign="top">
		 <th scope="row">Generate Responsive CSS ? </th>
		  <td>
			<select name="myabovethefold_responsive">
			<?php
			$numbertodisplay = array("Yes","No");
			$cse = esc_attr(get_option('myabovethefold_responsive'));
			foreach($numbertodisplay as $numtodi)
				{ ?>
              <option value="<?php echo $numtodi; ?>"
			      <?php if ($numtodi == $cse) echo "selected"; ?>
				  <?php echo ">"; echo $numtodi; ?>
			  </option>
			<?php
	} ?>
			</select>
		</td>
        </tr>
    </table> 
			<p>You will be able to see the above the fold css bellow your homepage's footer.</p>
			<p>Make sure you change your above the fold CSS code in case you switch theme, add/remove a plugin etc.</p>  
      <?php
	submit_button(); ?>
</form>
  <h2>If you like My Above The Fold CSS please <a href="https://wordpress.org/plugins/my-above-the-fold-css/" target="_blank">click here</a> to rate it.</h2>
	<p>Follow me on twitter to stay informed about incoming plugins,</p>
	<a href="https://twitter.com/eboxnet" class="twitter-follow-button" data-show-count="false">Follow @eboxnet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
  <p>Please concider a donation,</p>
  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="M5AB5VWKWDTZ4">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>
	<br>
</div>
<?php
}

function showmycss() {
	if (esc_attr(get_option('myabovethefold_displaytoall')) == "No") {
	if (is_front_page()) {
			echo '<div class="mabtf"><p>Your above the fold CSS (copy the text bellow) :</p><div id="my-above-the-fold-code"></div></div>
		<script>(function() { 
		var CSSCriticalPath = function(w, d, opts) {
			var opt = opts || {};
			var css = {};
			var pushCSS = function(r) {
			if(!!css[r.selectorText] === false) css[r.selectorText] = {};
			var styles = r.style.cssText.split(/;(?![A-Za-z0-9])/);
			for(var i = 0; i < styles.length; i++) {
				if(!!styles[i] === false) continue;
				var pair = styles[i].split(": ");
				pair[0] = pair[0].trim(); 
				pair[1] = pair[1].trim();
				css[r.selectorText][pair[0]] = pair[1];
			}
			};
			
			var parseTree = function() { 
			// Get a list of all the elements in the view.
			var height = w.innerHeight;
			var walker = d.createTreeWalker(d, NodeFilter.SHOW_ELEMENT, function(node) { return NodeFilter.FILTER_ACCEPT; }, true);
		
			while(walker.nextNode()) {
				var node = walker.currentNode;
				var rect = node.getBoundingClientRect();
				if(rect.top < height || opt.scanFullPage) {
				var rules = w.getMatchedCSSRules(node);
				if(!!rules) {
					for(var r = 0; r < rules.length; r++) {
					pushCSS(rules[r]); 
					}
				}
				} 
			}
			};
		
			this.generateCSS = function() {
			var finalCSS = "";
			for(var k in css) {
				finalCSS += k + " { ";
				for(var j in css[k]) {
				finalCSS += j + ": " + css[k][j] + "; ";
				}
				finalCSS += "}\n";
			}
			
			return finalCSS;
			};
			
			parseTree();
		};


		var cp = new CSSCriticalPath(window, document);
		var css = cp.generateCSS();
		
		console.log("my-above-the-fold-css");
		jQuery( "#my-above-the-fold-code" ).html( css );
		})();</script>';
	}
	} 
	else echo '<div class="mabtf"><p>Your above the fold CSS (copy the text bellow) :</p><div id="my-above-the-fold-code"></div></div>
		<script>(function() { 
		var CSSCriticalPath = function(w, d, opts) {
			var opt = opts || {};
			var css = {};
			var pushCSS = function(r) {
			if(!!css[r.selectorText] === false) css[r.selectorText] = {};
			var styles = r.style.cssText.split(/;(?![A-Za-z0-9])/);
			for(var i = 0; i < styles.length; i++) {
				if(!!styles[i] === false) continue;
				var pair = styles[i].split(": ");
				pair[0] = pair[0].trim(); 
				pair[1] = pair[1].trim();
				css[r.selectorText][pair[0]] = pair[1];
			}
			};
			
			var parseTree = function() { 
			// Get a list of all the elements in the view.
			var height = w.innerHeight;
			var walker = d.createTreeWalker(d, NodeFilter.SHOW_ELEMENT, function(node) { return NodeFilter.FILTER_ACCEPT; }, true);
		
			while(walker.nextNode()) {
				var node = walker.currentNode;
				var rect = node.getBoundingClientRect();
				if(rect.top < height || opt.scanFullPage) {
				var rules = w.getMatchedCSSRules(node);
				if(!!rules) {
					for(var r = 0; r < rules.length; r++) {
					pushCSS(rules[r]); 
					}
				}
				} 
			}
			};
		
			this.generateCSS = function() {
			var finalCSS = "";
			for(var k in css) {
				finalCSS += k + " { ";
				for(var j in css[k]) {
				finalCSS += j + ": " + css[k][j] + "; ";
				}
				finalCSS += "}\n";
			}
			
			return finalCSS;
			};
			
			parseTree();
		};


		var cp = new CSSCriticalPath(window, document);
		var css = cp.generateCSS();
		
		console.log("my-above-the-fold-css");
		jQuery( "#my-above-the-fold-code" ).html( css );
		})();</script>';
}

function showmyresponsivecss() {
	if (esc_attr(get_option('myabovethefold_displaytoall')) == "No") {
	if (is_front_page()) {
			echo '<div class="mabtf"><p>Your above the fold CSS (copy the text bellow) :</p><div id="my-above-the-fold-code"></div></div>
		<script>(function() {
	function findCriticalCSS(w, d) {
		// Pseudo classes formatting
		var formatPseudo = /([^\s,\:\(])\:\:?(?!not)[a-zA-Z\-]{1,}(?:\(.*?\))?/g;
		// Height in px we want critical styles for
		var targetHeight = 900;
		var criticalNodes = [];

		// Step through the document tree and identify nodes that are within our targetHeight
		var walker = d.createTreeWalker(d, NodeFilter.SHOW_ELEMENT, function(node) { return NodeFilter.FILTER_ACCEPT; }, true);

		while(walker.nextNode()) {
			var node = walker.currentNode;
			var rect = node.getBoundingClientRect();
			if (rect.top < targetHeight) {
				criticalNodes.push(node);
			}
		}
		

		// Find stylesheets that have been loaded
		var stylesheets = document.styleSheets;
		

		var outputCss = Array.prototype.map.call(stylesheets,function(sheet) {
			var rules = sheet.rules || sheet.cssRules;
			// If style rules are present
			if (rules) {
				return {
					sheet: sheet,
					// Convert rules into an array
					rules: Array.prototype.map.call(rules, function(rule) {
						try {
							// If the rule contains a media query
							if (rule instanceof CSSMediaRule) {
								var nestedRules = rule.rules || rule.cssRules;
								var css = Array.prototype.filter.call(nestedRules, function(rule) {
									return criticalNodes.filter(function(e){ return e.matches(rule.selectorText.replace(formatPseudo, "$1"))}).length > 0;
								}).map(function(rule) { return rule.cssText }).reduce(function(ruleCss, init) {return init + "\n" + ruleCss;}, "");
								return css ? ("@media " + rule.media.mediaText + " { " + css + "}") : null;

							} else if (rule instanceof CSSStyleRule) { // If rule does not contain a media query
								return criticalNodes.filter(function(e) { return e.matches(rule.selectorText.replace(formatPseudo, "$1")) }).length > 0 ? rule.cssText : null;
							} else {  // If identified via CSSRule like @font and @keyframes
								return rule.cssText;
							}
						} catch(e) {
							
						}
					}).filter(function(e) { return e; })
				}
			} else {
				return null;
			}
		}).filter(function(cssEntry) { return cssEntry && cssEntry.rules.length > 0 })
		.map(function(cssEntry) { return cssEntry.rules.join(""); })
		.reduce(function(css, out) {return out + css}, "")

		console.log("my-above-the-fold-css");
		jQuery( "#my-above-the-fold-code" ).html( outputCss.replace(/\n/g,"") );
	}

	findCriticalCSS(window, document);
})()</script>';
	}
	} 
	else echo '<div class="mabtf"><p>Your above the fold CSS (copy the text bellow) :</p><div id="my-above-the-fold-code"></div></div>
		<script>(function() {
	function findCriticalCSS(w, d) {
		// Pseudo classes formatting
		var formatPseudo = /([^\s,\:\(])\:\:?(?!not)[a-zA-Z\-]{1,}(?:\(.*?\))?/g;
		// Height in px we want critical styles for
		var targetHeight = 900;
		var criticalNodes = [];

		// Step through the document tree and identify nodes that are within our targetHeight
		var walker = d.createTreeWalker(d, NodeFilter.SHOW_ELEMENT, function(node) { return NodeFilter.FILTER_ACCEPT; }, true);

		while(walker.nextNode()) {
			var node = walker.currentNode;
			var rect = node.getBoundingClientRect();
			if (rect.top < targetHeight) {
				criticalNodes.push(node);
			}
		}
		

		// Find stylesheets that have been loaded
		var stylesheets = document.styleSheets;
		

		var outputCss = Array.prototype.map.call(stylesheets,function(sheet) {
			var rules = sheet.rules || sheet.cssRules;
			// If style rules are present
			if (rules) {
				return {
					sheet: sheet,
					// Convert rules into an array
					rules: Array.prototype.map.call(rules, function(rule) {
						try {
							// If the rule contains a media query
							if (rule instanceof CSSMediaRule) {
								var nestedRules = rule.rules || rule.cssRules;
								var css = Array.prototype.filter.call(nestedRules, function(rule) {
									return criticalNodes.filter(function(e){ return e.matches(rule.selectorText.replace(formatPseudo, "$1"))}).length > 0;
								}).map(function(rule) { return rule.cssText }).reduce(function(ruleCss, init) {return init + "\n" + ruleCss;}, "");
								return css ? ("@media " + rule.media.mediaText + " { " + css + "}") : null;

							} else if (rule instanceof CSSStyleRule) { // If rule does not contain a media query
								return criticalNodes.filter(function(e) { return e.matches(rule.selectorText.replace(formatPseudo, "$1")) }).length > 0 ? rule.cssText : null;
							} else {  // If identified via CSSRule like @font and @keyframes
								return rule.cssText;
							}
						} catch(e) {
						
						}
					}).filter(function(e) { return e; })
				}
			} else {
				return null;
			}
		}).filter(function(cssEntry) { return cssEntry && cssEntry.rules.length > 0 })
		.map(function(cssEntry) { return cssEntry.rules.join(""); })
		.reduce(function(css, out) {return out + css}, "")

		console.log("my-above-the-fold-css");
		jQuery( "#my-above-the-fold-code" ).html( outputCss.replace(/\n/g,"") );
	}

	findCriticalCSS(window, document);
})()</script>';
}
run_my_above_the_fold_css();
