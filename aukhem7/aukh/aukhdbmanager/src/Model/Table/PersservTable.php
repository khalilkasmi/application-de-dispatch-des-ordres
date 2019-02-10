<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Persserv Model
 *
 * @method \App\Model\Entity\Persserv get($primaryKey, $options = [])
 * @method \App\Model\Entity\Persserv newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Persserv[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Persserv|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Persserv patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Persserv[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Persserv findOrCreate($search, callable $callback = null, $options = [])
 */
class PersservTable extends Table
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

        $this->setTable('persserv');
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
            ->requirePresence('service', 'create')
            ->notEmpty('service');

        $validator
            ->requirePresence('employe', 'create')
            ->notEmpty('employe');

        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }
}
