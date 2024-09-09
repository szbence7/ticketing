<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TicketsTags Model
 *
 * @property \App\Model\Table\TicketsTable&\Cake\ORM\Association\BelongsTo $Tickets
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsTo $Tags
 *
 * @method \App\Model\Entity\TicketsTag newEmptyEntity()
 * @method \App\Model\Entity\TicketsTag newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\TicketsTag> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TicketsTag get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\TicketsTag findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\TicketsTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\TicketsTag> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TicketsTag|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\TicketsTag saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\TicketsTag>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TicketsTag>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TicketsTag>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TicketsTag> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TicketsTag>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TicketsTag>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TicketsTag>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TicketsTag> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TicketsTagsTable extends Table
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

        $this->setTable('tickets_tags');
        $this->setDisplayField(['ticket_id', 'tag_id']);
        $this->setPrimaryKey(['ticket_id', 'tag_id']);

        $this->belongsTo('Tickets', [
            'foreignKey' => 'ticket_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id',
            'joinType' => 'INNER',
        ]);
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
        $rules->add($rules->existsIn(['tag_id'], 'Tags'), ['errorField' => 'tag_id']);

        return $rules;
    }
}
