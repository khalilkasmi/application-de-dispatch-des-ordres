<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ficheordre Entity
 *
 * @property string $nordres
 * @property \Cake\I18n\FrozenDate $date
 * @property string $desciption
 * @property string $destination
 * @property string $source
 * @property string $objet
 * @property string $reference
 */
class Ficheordre extends Entity
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
        'nordres' => false
    ];
}
