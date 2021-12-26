<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TournamentState extends Enum
{
    const Signup      = 1;
    const Ongoing     = 2;
    const Completed   = 3;
}
