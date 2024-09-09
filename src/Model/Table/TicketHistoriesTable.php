<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TicketHistories Model
 *
 * @property \App\Model\Table\TicketsTable&\Cake\ORM\Association\BelongsTo $Tickets
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 *
 * @method \App\Model\Entity\TicketHistory newEmptyEntity()
 * @method \App\Model\Entity\TicketHistory newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\TicketHistory> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TicketHistory get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\TicketHistory findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\TicketHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\TicketHistory> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TicketHistory|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\TicketHistory saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\TicketHistory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TicketHistory>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TicketHistory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TicketHistory> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TicketHistory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TicketHistory>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TicketHistory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TicketHistory> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TicketHistoriesTable extends Table
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

        $this->setTable('ticket_histories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Tickets', [
            'foreignKey' => 'ticket_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('status_id')
            ->notEmptyString('status_id');

        $validator
            ->uuid('changed_by')
            ->requirePresence('changed_by', 'create')
            ->notEmptyString('changed_by');

        $validator
            ->dateTime('changed_at')
            ->allowEmptyDateTime('changed_at');

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
        $rules->add($rules->existsIn(['ticket_id'], 'Tickets'), ['errorField' => 'ticket_id']);
        $rules->add($rules->existsIn(['status_id'], 'Statuses'), ['errorField' => 'status_id']);

        return $rules;
    }
}
