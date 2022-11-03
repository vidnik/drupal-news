<?php

namespace Drupal\views_custom\Plugin\views\style;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "views_custom_news_list_reversed",
 *   title = @Translation("Custom news list reversed"),
 *   theme = "views_custom_news_list_reversed",
 *   theme_file = "../views_custom.theme.inc",
 *   display_types = {"normal"}
 * )
 */
class ViewsCustomNewsListReversed extends StylePluginBase {
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
    $options['rlist_image_field'] = ['default' => NULL];
    $options['rlist_title_field'] = ['default' => NULL];
    $options['rlist_content_field'] = ['default' => NULL];
    $options['rlist_taxonomy_field'] = ['default' => NULL];
    $options['rlist_date_field'] = ['default' => NULL];
    return $options;
  }

  /**
   * Render the given style.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    if (isset($form['grouping'])) {
      unset($form['grouping']);
      $form['rlist_image_field'] = [
        '#type' => 'select',
        '#title' => $this->t('list image field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['rlist_image_field'],
        '#description' => $this->t('Select the field that will be used for the list image.'),
      ];
      $form['rlist_title_field'] = [
        '#type' => 'select',
        '#title' => $this->t('list title field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['rlist_title_field'],
        '#description' => $this->t('Select the field that will be used for the list title.'),
      ];
      $form['rlist_content_field'] = [
        '#type' => 'select',
        '#title' => $this->t('list content'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['rlist_content_field'],
        '#description' => $this->t('Select the field that will be used as list content.'),
      ];
      $form['rlist_taxonomy_field'] = [
        '#type' => 'select',
        '#title' => $this->t('list taxonomy field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['rlist_taxonomy_field'],
        '#description' => $this->t('Select the field that will be used for list taxonomy.'),
      ];
      $form['rlist_date_field'] = [
        '#type' => 'select',
        '#title' => $this->t('list date field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['rlist_date_field'],
        '#description' => $this->t('Select the field that will be used for list date field.'),
      ];
    }
  }

}
