<?php

namespace App\Enums;

enum CommentRead: string
{
    case Read = 'read';
    case Unread = 'unread';
}
