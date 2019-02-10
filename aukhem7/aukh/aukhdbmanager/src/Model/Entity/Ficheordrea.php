<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ficheordrea Entity
 *
 * @property string $n_order_a
 * @property \Cake\I18n\FrozenDate $date
 * @property string $reference
 * @property string $organisme
 * @property string $objet
 * @property string $destination
 * @property string $description
 * @property string $instruction
 */
class Ficheordrea extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'n_order_a' => false
    ];
}
