<?php

namespace App\Enums;

enum ModuleStatus: string
{
    case Ok = 'OK';
    case Failed = 'FAILED';
    case Stopped = 'STOPPED';
}
