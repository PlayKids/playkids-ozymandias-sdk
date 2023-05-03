<?php

namespace Leiturinha\Object\Ozymandias;

use Leiturinha\Object\Ozymandias\EventCustomData;

/**
 * Ozymandias Simple Lead Register Event - Custom Params
 * 
 * @property string $src
 * @property string $name
 * @property string $date
 * @property string $phone
 */

class SimpleLeadRegisteredEventCustomData extends EventCustomData
{

    public $src;
    public $name;
    public $date;
    public $phone;

    /**
     * Validate
     *
     * @return void
     */

     function __construct() {

        if($this->phone) {
            $phone = str_replace('-', '', $this->phone);
            $phone = str_replace('(', '', $phone);
            $phone = str_replace(')', '', $phone);
            $phone = str_replace(' ', '', $phone);
            $this->phone = '55'.$phone;
        }

    }

    public function validate()
    {
        // if(!$this->date) {
        //     throw new \InvalidArgumentException('the field date are required');
        // }
  
        return $this;
    }

}
