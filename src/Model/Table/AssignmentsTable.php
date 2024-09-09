<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Assignments Model
 *
 * @property \App\Model\Table\TicketsTable&\Cake\ORM\Association\BelongsTo $Tickets
 *
 * @method \App\Model\Entity\Assignment newEmptyEntity()
 * @method \App\Model\Entity\Assignment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Assignment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Assignment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Assignment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Assignment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Assignment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Assignment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Assignment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Assignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Assignment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Assignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Assignment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Assignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Assignment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Assignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Assignment> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AssignmentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('assignments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Tickets', [
            'foreignKey' => 'ticket_id',
            'joinType' => 'INNER',
        ]);
        
        $this->belongsTo('AssignedUsers', [
            'className' => 'Users',
            'foreignKey' => 'assigned_to',
            'joinType' => 'INNER',
        ]);

        // Remove this if it exists
        // $this->belongsTo('AssignedBy', [
        //     'className' => 'Users',
        //     'foreignKey' => 'assigned_by',
        //     'joinType' => 'LEFT',
        // ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('ticket_id')
            ->notEmptyString('ticket_id');

        $validator
            ->uuid('assigned_by')
            ->allowEmptyString('assigned_by');

        $validator
            ->uuid('assigned_to')
            ->notEmptyString('assigned_to');

        $validator
            ->dateTime('assigned_at')
            ->notEmptyDateTime('assigned_at');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('ticket_id', 'Tickets'), ['errorField' => 'ticket_id']);
        $rules->add($rules->existsIn('assigned_to', 'AssignedUsers'), ['errorField' => 'assigned_to']);

        // Remove this if it exists
        // $rules->add($rules->existsIn('assigned_by', 'Users'), ['errorField' => 'assigned_by']);

        return $rules;
    }
}
