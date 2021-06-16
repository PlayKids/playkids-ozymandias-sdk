<?php

namespace Leiturinha\Object;

/**
 * Facebook Purchase Event - Custom Params
 *
 * @property string $value required
 * @property string $currency required
 */

class PurchaseEventCustomData extends EventCustomData
{

  public $value;

  public $currency;

  /**
   * Validate
   *
   * @return void
   */
  public function run()
  {
      if(!$this->value || !$this->currency) {
          throw new \InvalidArgumentException('the field value and currency are required');
      }

      return $this;
  }

}
