<?php

namespace Drupal\views_custom\Plugin\views\style;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "views_custom_banner",
 *   title = @Translation("Custom banner"),
 *   theme = "views_custom_banner",
 *   theme_file = "../views_custom.theme.inc",
 *   display_types = {"normal"}
 * )
 */
class ViewsCustomBanner extends StylePluginBase {
  /**
   * Does the style plugin for itself support to add fields to it's output.
   *
   * @var bool
   */
  protected $usesFields = TRUE;

  /**
   * Does the style plugin allows to use style plugins.
   *
   * @var bool
   */
  protected $usesRowPlugin = TRUE;

  /**
   * Definition.
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['banner_image_field'] = ['default' => NULL];
    $options['banner_title_field'] = ['default' => NULL];
    $options['banner_taxonomy_field'] = ['default' => NULL];
    $options['banner_content_field'] = ['default' => NULL];
    $options['banner_date_field'] = ['default' => NULL];
    return $options;
  }

  /**
   * Render the given style.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    if (isset($form['grouping'])) {
      unset($form['grouping']);
      $form['banner_image_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Card image field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['banner_image_field'],
        '#description' => $this->t('Select the field that will be used for the banner image.'),
      ];
      $form['banner_title_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Banner title field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['banner_title_field'],
        '#description' => $this->t('Select the field that will be used for the banner title.'),
      ];
      $form['banner_taxonomy_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Banner taxonomy field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['banner_taxonomy_field'],
        '#description' => $this->t('Select the field that will be used for banner taxonomy.'),
      ];
      $form['banner_content_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Banner content'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['banner_content_field'],
        '#description' => $this->t('Select the field that will be used as banner content.'),
      ];
      $form['banner_date_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Banner date field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['banner_date_field'],
        '#description' => $this->t('Select the field that will be used for banner date field.'),
      ];
    }
  }

}
