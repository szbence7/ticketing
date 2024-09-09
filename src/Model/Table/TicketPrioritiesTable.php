<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TicketPriorities Model
 *
 * @method \App\Model\Entity\TicketPriority newEmptyEntity()
 * @method \App\Model\Entity\TicketPriority newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\TicketPriority> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TicketPriority get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\TicketPriority findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\TicketPriority patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\TicketPriority> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TicketPriority|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\TicketPriority saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\TicketPriority>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TicketPriority>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TicketPriority>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TicketPriority> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TicketPriority>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TicketPriority>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TicketPriority>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TicketPriority> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TicketPrioritiesTable extends Table
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

        $this->setTable('ticket_priorities');
        $this->setDisplayField('priority_name');
        $this->setPrimaryKey('id');
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
            ->scalar('priority_name')
            ->maxLength('priority_name', 255)
            ->requirePresence('priority_name', 'create')
            ->notEmptyString('priority_name');

        return $validator;
    }
}
