<?php

namespace Cav7\AvatarByRole\Infrastructure\Xenforo\Entity;

use XF\Entity\User as XFUser;

class User extends XFUser
{
    public function canUploadAvatar()
    {
        return false;
    }

    public function canDeleteAvatar()
    {
        return false;
    }
}
