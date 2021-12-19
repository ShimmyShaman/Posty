<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserTournamentStatus extends Enum
{
    const SignedUp      = 1;
    const Eliminated    = 2;
    const LuckyLoser    = 3;
    const Allocated     = 4;
}
