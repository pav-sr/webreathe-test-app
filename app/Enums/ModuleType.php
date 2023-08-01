<?php

namespace App\Enums;

enum ModuleType: string
{
    case Temperature = 'TEMP';
    case Pressure = 'PRESSURE';
    case Speed = 'SPEED';
}
