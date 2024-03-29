<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chefdep Model
 *
 * @method \App\Model\Entity\Chefdep get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chefdep newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Chefdep[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chefdep|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chefdep patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chefdep[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chefdep findOrCreate($search, callable $callback = null, $options = [])
 */
class ChefdepTable extends Table
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

        $this->setTable('chefdep');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('departement', 'create')
            ->notEmpty('departement')
            ->add('departement', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('employee', 'create')
            ->notEmpty('employee')
            ->add('employee', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['employee']));
        $rules->add($rules->isUnique(['departement']));

        return $rules;
    }
}
