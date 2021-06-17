<?php

namespace Leiturinha\Object;

/**
 * Data extension: Generic
 *
 * @property string $field
 */
class UserDataFbHashField
{
    public $fields;

    /**
     * Validate
     *
     * @return void
     */
    public function run()
    {
        // $hashedField = new Hash->run($this->field);
        if(preg_match("/^([a-f0-9]{64})$/", $this->field) == 1) {
            throw new \InvalidArgumentException('the field is not a valid SHA256 hash');
        }

        return $this;
    }

}
