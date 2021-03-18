<?php

namespace Drupal\my_entity\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class MyConfigEntityForm.
 */
class MyConfigEntityForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $my_config_entity = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $my_config_entity->label(),
      '#description' => $this->t("Label for the My config entity."),
      '#required' => TRUE,
    ];

    $form['time'] = [
      '#type' => 'number',
      '#title' => $this->t('Time'),
      '#maxlength' => 255,
      '#default_value' => $my_config_entity->label(),
      '#description' => $this->t("This stores time."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $my_config_entity->id(),
      '#machine_name' => [
        'exists' => '\Drupal\my_entity\Entity\MyConfigEntity::load',
      ],
      '#disabled' => !$my_config_entity->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $my_config_entity = $this->entity;
    $status = $my_config_entity->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label My config entity.', [
          '%label' => $my_config_entity->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label My config entity.', [
          '%label' => $my_config_entity->label(),
        ]));
    }
    $form_state->setRedirectUrl($my_config_entity->toUrl('collection'));
  }

}
