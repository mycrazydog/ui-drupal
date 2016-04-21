<?php

/*********************************
 * @file
 * template.php
*********************************/

/**
 * Implements hook_preprocess_page()
 *
 */
 function uncc_bootstrap_preprocess_page(&$variables) {
	$variables['nav_style'] = theme_get_setting('nav_style');
	$variables['subbrand_text'] = theme_get_setting('subbrand_text');
	$variables['subbrand_link'] = theme_get_setting('subbrand_link');
 }

/**
 * Implements hook_preprocess_html()
 *
 */
function uncc_bootstrap_preprocess_html(&$variables) {
	$nav_style = theme_get_setting('nav_style');
	$variables['classes_array'][] = "nav-" . $nav_style;
	
	//Add JS and CSS files to theme
	//drupal_add_js('http://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js', array('type' => 'file', 'scope' => 'footer'));
	//drupal_add_js('http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js', array('type' => 'file', 'scope' => 'footer'));
	//drupal_add_js('http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.velocity.min.js', array('type' => 'file', 'scope' => 'footer'));
	//drupal_add_js('https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js', array('type' => 'file', 'scope' => 'footer'));
	
	
	
	drupal_add_js(drupal_get_path('theme', 'uncc_bootstrap') . '/js/jquery.custom.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_css('//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css', array('type' => 'external'));
	drupal_add_css('//fonts.googleapis.com/css?family=Montserrat:400,700', array('type' => 'external'));
	drupal_add_css('//fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic', array('type' => 'external'));
	
	drupal_add_css('//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css', array('type' => 'external'));
	
}

/**
 * Implements hook_preprocess_image_style()
 * Adds responsive class to all images
 */
function uncc_bootstrap_preprocess_image_style(&$vars) {
	
/*
	if ($vars['node']->type == 'story') {
	//$vars['attributes']['class'][] = 'img-responsive'; // http://getbootstrap.com/css/#overview-responsive-images
	}
*/
}

/*********************************
 OVERRIDE
 * @file
 * menu-tree.func.php
*********************************/

/**
 * Bootstrap theme wrapper function for the primary menu links.
 */
function uncc_bootstrap_menu_tree__primary(&$variables) {
	return '<ul class="menu nav nav-justified">' . $variables['tree'] . '</ul>';
}

/**
 * Custom Code
 * function to handle page templates and contributors
*
function unc_charlotte_preprocess_node(&$variables) {

	$node = $variables['node'];
	$allowed_content_types = array("story", "display");
	//watchdog('notice', $variables['node']->type);

	If(in_array($variables['node']->type , $allowed_content_types)) {
		$domain = domain_get_domain();
		$variables['theme_hook_suggestions'][] = 'node__' . $domain['domain_id'] . '__' . $variables['node']->type;
    }else{
    	//watchdog('notice', $variables['node']->type);
    	$variables['theme_hook_suggestions'][] = 'node__' . $variables['node']->type;
    }

}
*/



/**
 * Must add this because bootstrap does not show third level menu items
 * Overrides theme_menu_link().
 */
function uncc_bootstrap_menu_link__menu_block(&$variables) {
  return theme_menu_link($variables);
}


/**
 * Must add this to not have dropdown menus for top nav
 * Overrides theme_menu_link().
 */
function uncc_bootstrap_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    elseif ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] == 1)) {
      // Add our own wrapper.
      //unset($element['#below']['#theme_wrappers']);
      //$sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
      // Generate as standard dropdown.
      //$element['#title'] .= ' <span class="caret"></span>';
      //$element['#attributes']['class'][] = 'dropdown';
      //$element['#localized_options']['html'] = TRUE;

      // Set dropdown trigger element to # to prevent inadvertant page loading
      // when a submenu link is clicked.
      //$element['#localized_options']['attributes']['data-target'] = '#';
      //$element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
      //$element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    }
  }
  // On primary navigation menu, class 'active' is not set on active menu item.
  // @see https://drupal.org/node/1896674
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}
