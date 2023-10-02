<?php
namespace Leiturinha\Object\Facebook\Enums;

abstract class ActionSource
{
    //Conversion happened over email.
    const EMAIL = "email";

    //Conversion was made on your website.
    const WEBSITE = "website";

    //Conversion was made over the phone.
    const PHONE_CALL = "phone_call";

    //Conversion was made via a messaging app, SMS, or online messaging feature.
    const CHAT = "chat";

    //Conversion was made in person at your physical store.
    const PHYSICAL_STORE = "physical_store";

    //Conversion happened automatically, for example, a subscription renewal that’s set on auto-pay each month.
    const SYSTEM_GENERATED = "system_generated";

    // etc.
    const OTHER = "other";
}
