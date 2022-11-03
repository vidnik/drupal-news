<?php

namespace Drupal\views_custom;

use Drupal\Component\Utility\Html;
use Drupal\views\ViewExecutable;

/**
 * The primary class for the Views Custom module.
 **
 * @ingroup utility
 */
class ViewsCustom{
  /**
   * Returns the theme hook definition information.
   */
  public static function getThemeHooks() {
    $hooks['views_custom_banner'] = [
      'preprocess functions' => [
        'template_preprocess_views_custom_banner',
        'template_preprocess_views_view_banner',
      ],
    ];
    $hooks['views_custom_news_list'] = [
      'preprocess functions' => [
        'template_preprocess_views_custom_news_list',
        'template_preprocess_views_custom_news_list',
      ],
    ];
    $hooks['views_custom_news_list_reversed'] = [
      'preprocess functions' => [
        'template_preprocess_views_custom_news_list_reversed',
        'template_preprocess_views_custom_news_list_reversed',
      ],
    ];
    return $hooks;
  }

  /**
   * Get unique element id.
   *
   * @param ViewExecutable $view
   *   A ViewExecutable object.
   *
   * @return string
   *   A unique id for an HTML element.
   */
  public static function getUniqueId(ViewExecutable $view): string
  {
    $id = $view->storage->id() . '-' . $view->current_display;
    return Html::getUniqueId('views-custom-' . $id);
  }

}
