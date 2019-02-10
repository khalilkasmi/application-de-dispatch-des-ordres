<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ficheorderas Model
 *
 * @method \App\Model\Entity\Ficheordera get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ficheordera newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ficheordera[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ficheordera|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ficheordera patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ficheordera[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ficheordera findOrCreate($search, callable $callback = null, $options = [])
 */
class FicheorderasTable extends Table
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

        $this->setTable('ficheorderas');
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
            ->requirePresence('numorder', 'create')
            ->notEmpty('numorder');

        $validator
            ->requirePresence('objet', 'create')
            ->notEmpty('objet');

        $validator
            ->requirePresence('reference', 'create')
            ->notEmpty('reference')
            ->add('reference', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('source', 'create')
            ->notEmpty('source');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['reference']));

        return $rules;
    }
}
