<?php

namespace App\Enums;

enum ContactState: string {
    case Read = 'read';
    case Unread = 'unread';
}
