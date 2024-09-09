<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tickets Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\TicketPrioritiesTable&\Cake\ORM\Association\BelongsTo $TicketPriorities
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\AssignmentsTable&\Cake\ORM\Association\HasMany $Assignments
 * @property \App\Model\Table\TicketHistoriesTable&\Cake\ORM\Association\HasMany $TicketHistories
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\Ticket newEmptyEntity()
 * @method \App\Model\Entity\Ticket newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ticket> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ticket get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ticket findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ticket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ticket> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ticket|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ticket saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ticket>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ticket>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ticket>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ticket> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ticket>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ticket>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ticket>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ticket> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TicketsTable extends Table
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

        $this->setTable('tickets');
        $this->setDisplayField('subject');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('TicketPriorities', [
            'foreignKey' => 'priority_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Assignments', [
            'foreignKey' => 'ticket_id',
        ]);
        $this->hasMany('TicketHistories', [
            'foreignKey' => 'ticket_id',
        ]);
        $this->belongsToMany('Tags', [
            'foreignKey' => 'ticket_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'tickets_tags',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->uuid('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->scalar('subject')
            ->maxLength('subject', 255)
            ->requirePresence('subject', 'create')
            ->notEmptyString('subject');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->integer('category_id')
            ->notEmptyString('category_id');

        $validator
            ->integer('priority_id')
            ->notEmptyString('priority_id');

        $validator
            ->integer('status_id')
            ->notEmptyString('status_id');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['category_id'], 'Categories'), ['errorField' => 'category_id']);
        $rules->add($rules->existsIn(['priority_id'], 'TicketPriorities'), ['errorField' => 'priority_id']);
        $rules->add($rules->existsIn(['status_id'], 'Statuses'), ['errorField' => 'status_id']);

        return $rules;
    }
}
