<?php

namespace Leiturinha\Object\Salesforce;

/**
 * Data extension: Phone
 * ex: user_data.phone.number
 *
 * @property string $number
 * @property string $locale
 */
class UserDataPhoneCrm extends EventBase
{
    public $number;

    public $locale = 'BR';

    /**
     * Filter and validate
     *
     * @return void
     */
    public function validate()
    {
        if($this->number) {
            $this->number = str_replace([" ", "(", ")", "-"], ["","","",""], $this->number);
        }

        return $this;
    }

}
