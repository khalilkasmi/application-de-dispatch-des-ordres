<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ficheordres Model
 *
 * @method \App\Model\Entity\Ficheordre get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ficheordre newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ficheordre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ficheordre|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ficheordre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ficheordre[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ficheordre findOrCreate($search, callable $callback = null, $options = [])
 */
class FicheordresTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('ficheordres');
        $this->setDisplayField('nordres');
        $this->setPrimaryKey('nordres');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('nordres', 'create');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->requirePresence('desciption', 'create')
            ->notEmpty('desciption');

        $validator
            ->requirePresence('destination', 'create')
            ->notEmpty('destination');

        $validator
            ->requirePresence('source', 'create')
            ->notEmpty('source');

        $validator
            ->requirePresence('objet', 'create')
            ->notEmpty('objet');

        $validator
            ->requirePresence('reference', 'create')
            ->notEmpty('reference');

        return $validator;
    }
}
