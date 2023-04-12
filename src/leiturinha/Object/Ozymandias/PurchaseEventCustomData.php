<?php

namespace Leiturinha\Object\Ozymandias;

/**
 * Ozymandias Purchase Event - Custom Params
 *
 * @property string $plan_price required
 * @property string $currency required
 */

class PurchaseEventCustomData extends EventCustomData
{

  public $plan_price;

  public $currency;

  /**
   * Validate
   *
   * @return void
   */
  public function validate()
  {
      if(!$this->plan_price || !$this->currency) {
          throw new \InvalidArgumentException('the field value and currency are required');
      }

      return $this;
  }

}
