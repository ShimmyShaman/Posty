<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ListingType extends Enum
{
    const Singles       = 0;
    const ChatRoom      = 1;
    const Tournament    = 2;
    const Doubles       = 3;
    const SocialSession = 4;
}
