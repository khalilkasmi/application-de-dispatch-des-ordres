<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ficheorderss Model
 *
 * @method \App\Model\Entity\Ficheorders get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ficheorders newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ficheorders[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ficheorders|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ficheorders patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ficheorders[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ficheorders findOrCreate($search, callable $callback = null, $options = [])
 */
class FicheorderssTable extends Table
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

        $this->setTable('ficheorderss');
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
            ->requirePresence('numordersort', 'create')
            ->notEmpty('numordersort');

        $validator
            ->requirePresence('objet', 'create')
            ->notEmpty('objet');

        $validator
            ->requirePresence('destination', 'create')
            ->notEmpty('destination');

        $validator
            ->requirePresence('source', 'create')
            ->notEmpty('source');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('reference', 'create')
            ->notEmpty('reference');

        $validator
            ->requirePresence('from', 'create')
            ->notEmpty('from');

        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }
}
