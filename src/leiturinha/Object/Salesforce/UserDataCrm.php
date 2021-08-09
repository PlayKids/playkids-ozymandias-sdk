<?php

namespace Leiturinha\Object\Salesforce;

use Leiturinha\Object\Salesforce\UserDataInvoiceCrm;
use Leiturinha\Object\Salesforce\UserDataKitShipmentsCrm;
use Leiturinha\Object\Salesforce\UserDataPersonalDataCrm;
use Leiturinha\Object\Salesforce\UserDataPhoneCrm;
use Leiturinha\Object\Salesforce\UserDataPurchaseCrm;
use Leiturinha\Object\Salesforce\UserDataPurchaseItemsCrm;
use Leiturinha\Object\Salesforce\UserDataShipmentProductsCrm;
use Leiturinha\Object\Salesforce\UserDataSubscriptionCrm;

/**
 * Main User Data
 * ex: user_data.email
 *
 * @property string $email
 * @property UserDataPhoneCrm $phone
 * @property UserDataPersonalDataCrm $personal_data
 * @property UserDataSubscriptionCrm $subscription
 * @property UserDataInvoiceCrm|array<UserDataInvoiceCrm> $invoice
 * @property UserDataKitShipmentsCrm $kit_shipments
 * @property UserDataShipmentProductsCrm|array<UserDataShipmentProductsCrm> $shipment_products
 * @property UserDataPurchaseCrm $purchase
 * @property UserDataPurchaseItemsCrm|array<UserDataPurchaseItemsCrm> $purchase_items
 */
class UserDataCrm extends EventBase
{
    public $email;

    public $phone;

    public $personal_data;

    public $subscription;

    public $invoice;

    public $kit_shipments;

    public $shipment_products;

    public $purchase;

    public $purchase_items;

    /**
     * Filter and validate
     *
     * @return void
     */
    public function validate()
    {
        if($this->email && !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('field user_data.email format invalid');
        }

        return $this;
    }

}
