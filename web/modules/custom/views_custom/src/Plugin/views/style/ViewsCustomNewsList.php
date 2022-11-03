<?php

namespace Drupal\views_custom\Plugin\views\style;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "views_custom_news_list",
 *   title = @Translation("Custom news list"),
 *   theme = "views_custom_news_list",
 *   theme_file = "../views_custom.theme.inc",
 *   display_types = {"normal"}
 * )
 */
class ViewsCustomNewsList extends StylePluginBase {
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
    $options['list_image_field'] = ['default' => NULL];
    $options['list_title_field'] = ['default' => NULL];
    $options['list_taxonomy_field'] = ['default' => NULL];
    $options['list_date_field'] = ['default' => NULL];
    return $options;
  }

  /**
   * Render the given style.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    if (isset($form['grouping'])) {
      unset($form['grouping']);
      $form['list_image_field'] = [
        '#type' => 'select',
        '#title' => $this->t('list image field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['list_image_field'],
        '#description' => $this->t('Select the field that will be used for the list image.'),
      ];
      $form['list_title_field'] = [
        '#type' => 'select',
        '#title' => $this->t('list title field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['list_title_field'],
        '#description' => $this->t('Select the field that will be used for the list title.'),
      ];
      $form['list_taxonomy_field'] = [
        '#type' => 'select',
        '#title' => $this->t('list taxonomy field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['list_taxonomy_field'],
        '#description' => $this->t('Select the field that will be used for list taxonomy.'),
      ];
      $form['list_date_field'] = [
        '#type' => 'select',
        '#title' => $this->t('list date field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['list_date_field'],
        '#description' => $this->t('Select the field that will be used for list date field.'),
      ];
    }
  }

}
