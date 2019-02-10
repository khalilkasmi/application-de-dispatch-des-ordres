<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ficheorders Entity
 *
 * @property string $numordersort
 * @property string $objet
 * @property string $destination
 * @property string $source
 * @property \Cake\I18n\FrozenDate $date
 * @property string $description
 * @property string $reference
 * @property string $from
 * @property int $id
 */
class Ficheorders extends Entity
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
        'id' => false
    ];
}
