<?php

namespace Drupal\urgent_news\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements a settings form for Urgent news configuration.
 */
class SettingsForm extends ConfigFormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'urgent_news_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['urgent_news.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['urgent_news'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Extend'),
      '#collapsible' => FALSE,
    ];

    $form['urgent_news']['active_state'] = [
      '#title' => $this->t('Active'),
      '#type' => 'checkbox',
      '#default_value' =>  \Drupal::state()->get('urgent_news_active_state', ''),
      '#description' => $this->t('Check this box to activate urgent news banner populated with the information in the fields below.'),
    ];

    $form['urgent_news']['title'] = [
      '#title' => $this->t('Title:'),
      '#type' => 'textfield',
      '#default_value' =>  \Drupal::state()->get('urgent_news_title', ''),
      '#description' => $this->t('Enter a title for the urgent news.'),
      '#required' => TRUE,
    ];

    $form['urgent_news']['body'] = [
      '#title' => $this->t('Body:'),
      '#type' => 'text_format',
      '#default_value' =>  \Drupal::state()->get('urgent_news_body', ''),
      '#description' => $this->t('Enter a descirption for the urgent news.'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::state()->setMultiple([
      'urgent_news_active_state' => $form_state->getValue('active_state'),
      'urgent_news_title' => $form_state->getValue('title'),
      'urgent_news_body' => $form_state->getValue('body')['value'],
    ]);

    parent::submitForm($form, $form_state);
  }
}
