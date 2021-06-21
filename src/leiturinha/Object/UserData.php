<?php
namespace Leiturinha\Object;
/**
 * UserData object
 *
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $country
 * @property string $language
 * @property string $phone
 * @property string $phone_locale
 */
class UserData extends EventBase
{
  public $email;
  public $first_name;
  public $last_name;
  public $country;
  public $language;
  public $phone;
  public $phone_locale;

    public function validate()
    {
        if(!$this->email || !$this->first_name || !$this->phone) {
            throw new \InvalidArgumentException('field event required');
        }
        return $this;
    }
}
