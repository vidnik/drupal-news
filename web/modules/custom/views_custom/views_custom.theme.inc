<?php

/**
 * @file
 * Preprocessors and helper functions to make theming easier.
 */

use Drupal\views_custom\ViewsCustom;

/**
 * Prepares variables for views banner template.
 *
 * Default template: views-custom-banner.html.twig.
 *
 * @param array $vars
 *   An associative array containing:
 *   - view: A ViewExecutable object.
 *   - rows: The raw row data.
 */
function template_preprocess_views_custom_banner(array &$vars) {
  $view = $vars['view'];
  $vars['id'] = ViewsCustom::getUniqueId($view);

  // Banner rows.
  $image = $view->style_plugin->options['banner_image_field'];
  $title = $view->style_plugin->options['banner_title_field'];
  $taxonomy = $view->style_plugin->options['banner_taxonomy_field'];
  $content = $view->style_plugin->options['banner_content_field'];
  $date = $view->style_plugin->options['banner_date_field'];
  foreach ($vars['rows'] as $id => $row) {
    $vars['rows'][$id] = [];
    $vars['rows'][$id]['image'] = $view->style_plugin->getField($id, $image);
    $vars['rows'][$id]['title'] = $view->style_plugin->getField($id, $title);
    $vars['rows'][$id]['taxonomy'] = $view->style_plugin->getField($id, $taxonomy);
    $vars['rows'][$id]['content'] = $view->style_plugin->getField($id, $content);
    $vars['rows'][$id]['date'] = $view->style_plugin->getField($id, $date);
  }
}

/**
 * Prepares variables for views news list template.
 *
 * Default template: views-custom-news-list.html.twig.
 *
 * @param array $vars
 *   An associative array containing:
 *   - view: A ViewExecutable object.
 *   - rows: The raw row data.
 */
function template_preprocess_views_custom_news_list(array &$vars) {
  $view = $vars['view'];
  $vars['id'] = ViewsCustom::getUniqueId($view);

  // Banner rows.
  $image = $view->style_plugin->options['list_image_field'] ?? '';
  $title = $view->style_plugin->options['list_title_field'] ?? '';
  $taxonomy = $view->style_plugin->options['list_taxonomy_field'] ?? '';
  $date = $view->style_plugin->options['list_date_field'] ?? '';
  foreach ($vars['rows'] as $id => $row) {
    $vars['rows'][$id] = [];
    $vars['rows'][$id]['image'] = $view->style_plugin->getField($id, $image);
    $vars['rows'][$id]['title'] = $view->style_plugin->getField($id, $title);
    $vars['rows'][$id]['taxonomy'] = $view->style_plugin->getField($id, $taxonomy);
    $vars['rows'][$id]['date'] = $view->style_plugin->getField($id, $date);
  }
}

/**
 * Prepares variables for views news reversed list template.
 *
 * Default template: views-custom-news-list-reversed.html.twig.
 *
 * @param array $vars
 *   An associative array containing:
 *   - view: A ViewExecutable object.
 *   - rows: The raw row data.
 */
function template_preprocess_views_custom_news_list_reversed(array &$vars) {
  $view = $vars['view'];
  $vars['id'] = ViewsCustom::getUniqueId($view);

  // Banner rows.
  $image = $view->style_plugin->options['rlist_image_field'];
  $title = $view->style_plugin->options['rlist_title_field'];
  $taxonomy = $view->style_plugin->options['rlist_taxonomy_field'];
  $content = $view->style_plugin->options['rlist_content_field'];
  $date = $view->style_plugin->options['rlist_date_field'];
  foreach ($vars['rows'] as $id => $row) {
    $vars['rows'][$id] = [];
    $vars['rows'][$id]['image'] = $view->style_plugin->getField($id, $image);
    $vars['rows'][$id]['title'] = $view->style_plugin->getField($id, $title);
    $vars['rows'][$id]['taxonomy'] = $view->style_plugin->getField($id, $taxonomy);
    $vars['rows'][$id]['content'] = $view->style_plugin->getField($id, $content);
    $vars['rows'][$id]['date'] = $view->style_plugin->getField($id, $date);
  }
}
