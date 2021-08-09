<?php

namespace Leiturinha\Object\Salesforce;

/**
 * Data extension: Atendimento
 * ex: data.id
 *
 * @property int $id
 * @property int $user_id
 * @property int $subscription_id
 * @property string $date datetime
 * @property string $type max 50
 * @property string $channel required max 50
 */
class DataCustomerServiceCrm extends EventBase
{
    public $id;

    public $user_id;

    public $subscription_id;

    public $date;

    public $type;

    public $channel = 'Leiturinha';

}
