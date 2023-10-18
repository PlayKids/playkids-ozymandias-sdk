<?php
namespace Leiturinha\Object;
/**
 * UserData object
 *
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $language
 * @property string $zipcode
 * @property string $phone
 * @property string $phone_locale
 */
class UserData
{
  public $email;
  public $first_name;
  public $last_name;
  public $city;
  public $state;
  public $country;
  public $language;
  public $zipcode;
  public $phone;
  public $phone_locale;

    public function validate()
    {
        if(!$this->email) {
            throw new \InvalidArgumentException('field event required');
        }
        return $this;
    }
}
