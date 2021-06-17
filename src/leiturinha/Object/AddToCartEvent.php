<?php

namespace Leiturinha\Object;



class AddToCartEvent extends EventBase
{

    public function validate()
    {
        return true;
    }
}

