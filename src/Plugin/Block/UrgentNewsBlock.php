<?php

namespace Drupal\urgent_news\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Urgent news block.
 *
 * @Block(
 *   id = "urgent_news",
 *   admin_label = @Translation("Urgent news"),
 *   category = @Translation("urgent news"),
 * )
 */
class UrgentNewsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'urgent_news_banner',
    ];
  }

}
