<?php

/**
 * @file
 * Custom theme settings for UNC Charlotte.
 */

/**
 * Form alter to add settings to existing theme settings form.
 */
function uncc_bootstrap_form_system_theme_settings_alter(&$form, &$form_state) {
  // Collapse theme settings that should not be changed.
  $form['logo']['#collapsible'] = $form['theme_settings']['#collapsible'] = $form['favicon']['#collapsible'] = TRUE;
  $form['logo']['#collapsed'] = $form['theme_settings']['#collapsed'] = $form['favicon']['#collapsed'] = TRUE;

  $form['uncc_theme_options'] = array(
    '#type' => 'fieldset',
    '#title' => t('UNC Charlotte Theme Options'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    '#weight' => -11,
  );
  $form['uncc_theme_options']['subbrand_text'] = array(
    '#type' => 'textfield',
    '#title' => t('College / Division Sub-brand Name'),
    '#description' => t("The name of this website's parent organization or a tagline."),
    '#default_value' => theme_get_setting('subbrand_text'),
  );
  $form['uncc_theme_options']['subbrand_link'] = array(
    '#type' => 'textfield',
    '#title' => t('College / Division Sub-brand Link'),
    '#description' => t("Enter the URL of the parent organization's website or leave blank for a tagline."),
    '#default_value' => theme_get_setting('subbrand_link'),
  );
  $form['uncc_theme_options']['utility_link_3_text'] = array(
    '#type' => 'textfield',
    '#title' => t('Optional 3rd Utility Link Text'),
    '#description' => t("Optional 3rd utility link text. If this site utilizes academic advising, then enter 'Academic Advising'."),
    '#default_value' => theme_get_setting('utility_link_3_text'),
  );
  $form['uncc_theme_options']['utility_link_3_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Optional 3rd Utility Link'),
    '#description' => t("Optional 3rd utility link's URL. If this site utilizes academic advising, enter the advising site's URL here."),
    '#default_value' => theme_get_setting('utility_link_3_link'),
  );
  $form['uncc_theme_options']['utility_link_4_text'] = array(
    '#type' => 'textfield',
    '#title' => t('Optional 4th Utility Link Text'),
    '#description' => t("Optional 4th utility link text. If this site utilizes a search box, then this link won't be shown."),
    '#default_value' => theme_get_setting('utility_link_4_text'),
  );
  $form['uncc_theme_options']['utility_link_4_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Optional 4th Utility Link'),
    '#description' => t("Optional 4th utility link's URL. If this site utilizes a search box, then this link won't be shown."),
    '#default_value' => theme_get_setting('utility_link_4_link'),
  );
  $form['uncc_theme_options']['nav_style'] = array(
    '#type' => 'select',
    '#title' => t('Navigation Style'),
    '#description' => t("Specify the style for the primary navigation."),
    '#options' => array('tabs' => t('Tabbed'), 'blocks' => t('Blocks')),
    '#default_value' => theme_get_setting('nav_style') ? theme_get_setting('nav_style') : 'tabs',
  );
}

