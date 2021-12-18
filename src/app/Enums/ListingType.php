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
    const LadderLeague  = 1;
    const ChatRoom      = 2;
    const Tournament    = 3;
    const Casual        = 4;
    const ClubOnlyEvent = 5;
}
