<?php

/**
 * @file
 * Theme setting callbacks for the da vinci theme.
 */

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param object $form
 *   The form.
 * @param object $form_state
 *   The form state.
 */
function da_vinci_form_system_theme_settings_alter(&$form, &$form_state) {
  $form['da_vinci_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Da Vinci Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );

  $form['da_vinci_settings']['grid'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show Grid Debug Settings'),
    '#default_value' => theme_get_setting('grid', 'da_vinci'),
    '#description'   => t("Check this option to show Grid Debug Button in page. Uncheck to hide. This will only be displayed if admin is logged."),
  );
  $form['da_vinci_settings']['border-region'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show Region Debug Settings'),
    '#default_value' => theme_get_setting('border-region', 'da_vinci'),
    '#description'   => t("Check this option to show Region Debug Border in page. Uncheck to hide. This will only be displayed if admin is logged."),
  );

}
