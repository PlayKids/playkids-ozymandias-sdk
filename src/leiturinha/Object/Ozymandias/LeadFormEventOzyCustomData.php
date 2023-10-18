<?php

namespace Leiturinha\Object\Ozymandias;

use Leiturinha\Object\Ozymandias\EventOzyCustomData;

/**
 * Ozymandias Simple Lead Register Event - Custom Params
 * 
 * @property string $src
 * @property string $name
 * @property string $phone
 * @property string $campaign
 * @property string $device
 * @property string $country
 * @property string $language
 * @property string $date
 */

/**
 * Ozymandias Lead Form Event - Custom Params
 */

class LeadFormEventOzyCustomData extends EventOzyCustomData
{

    public $src;
    public $name;
    public $phone;
    public $campaign;
    public $device;
    public $country;
    public $language;
    public $date;

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
