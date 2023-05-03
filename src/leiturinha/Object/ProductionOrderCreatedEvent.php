<?php

namespace Leiturinha\Object;



class ProductionOrderCreatedEvent extends EventBase
{

    public function validate()
    {
        return true;
    }
}

