<?php

namespace Drupal\my_entity\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the My config entity entity.
 *
 * @ConfigEntityType(
 *   id = "my_config_entity",
 *   label = @Translation("My config entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\my_entity\MyConfigEntityListBuilder",
 *     "form" = {
 *       "add" = "Drupal\my_entity\Form\MyConfigEntityForm",
 *       "edit" = "Drupal\my_entity\Form\MyConfigEntityForm",
 *       "delete" = "Drupal\my_entity\Form\MyConfigEntityDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\my_entity\MyConfigEntityHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "my_config_entity",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/my_config_entity/{my_config_entity}",
 *     "add-form" = "/admin/structure/my_config_entity/add",
 *     "edit-form" = "/admin/structure/my_config_entity/{my_config_entity}/edit",
 *     "delete-form" = "/admin/structure/my_config_entity/{my_config_entity}/delete",
 *     "collection" = "/admin/structure/my_config_entity"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "time",
 *   }
 * )
 */
class MyConfigEntity extends ConfigEntityBase implements MyConfigEntityInterface {

  /**
   * The My config entity ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The My config entity label.
   *
   * @var string
   */
  protected $label;

}
