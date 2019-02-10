<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ficheordrea Model
 *
 * @method \App\Model\Entity\Ficheordrea get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ficheordrea newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ficheordrea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ficheordrea|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ficheordrea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ficheordrea[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ficheordrea findOrCreate($search, callable $callback = null, $options = [])
 */
class FicheordreaTable extends Table
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

        $this->setTable('ficheordrea');
        $this->setDisplayField('n_order_a');
        $this->setPrimaryKey('n_order_a');
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
            ->allowEmpty('n_order_a', 'create');

        $validator
            ->date('date')
            ->allowEmpty('date');

        $validator
            ->allowEmpty('reference');

        $validator
            ->requirePresence('organisme', 'create')
            ->notEmpty('organisme');

        $validator
            ->requirePresence('objet', 'create')
            ->notEmpty('objet');

        $validator
            ->requirePresence('destination', 'create')
            ->notEmpty('destination');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('instruction', 'create')
            ->notEmpty('instruction');

        return $validator;
    }
}
