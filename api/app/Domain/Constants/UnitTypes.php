<?php

namespace App\Domain\Constants;

class UnitTypes
{
    public final const STANDARD = 'standard';
    public final const IMPERIAL = 'imperial';
    public final const METRIC = 'metric';
    public final const ALL = [
        self::STANDARD,
        self::IMPERIAL,
        self::METRIC
    ];
}
