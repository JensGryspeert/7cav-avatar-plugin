<?php

namespace Cav7\AvatarByRole\Application\Config;

class AvatarConfig
{
    /**
     * @return AvatarGroup[]
     */
    public static function all(): array
    {
        return [
            new AvatarGroup(-1, 'PVT', '/styles/default/xenforo/avatars/PVT_Avatar.png'),
            new AvatarGroup(-1, 'PFC', '/styles/default/xenforo/avatars/PFC_Avatar.png'),
            new AvatarGroup(6, 'CPL', '/styles/default/xenforo/avatars/CPL_Avatar.png'),
            new AvatarGroup(5, 'SGT', '/styles/default/xenforo/avatars/SGT_Avatar.png'),
            new AvatarGroup(-1, 'SSG', '/styles/default/xenforo/avatars/SSG_Avatar.png'),
            new AvatarGroup(-1, 'SFC', '/styles/default/xenforo/avatars/SFC_Avatar.png'),
            new AvatarGroup(-1, 'MSG', '/styles/default/xenforo/avatars/MSG_Avatar.png'),
            new AvatarGroup(-1, '1SG', '/styles/default/xenforo/avatars/1SG_Avatar.png'),
            new AvatarGroup(-1, 'SMA', '/styles/default/xenforo/avatars/SMA_Avatar.png'),
            new AvatarGroup(-1, 'WO1', '/styles/default/xenforo/avatars/WO1_Avatar.png'),
            new AvatarGroup(-1, 'CW2', '/styles/default/xenforo/avatars/CW2_Avatar.png'),
            new AvatarGroup(-1, 'CW3', '/styles/default/xenforo/avatars/CW3_Avatar.png'),
            new AvatarGroup(-1, 'CW4', '/styles/default/xenforo/avatars/CW4_Avatar.png'),
            new AvatarGroup(-1, 'CW5', '/styles/default/xenforo/avatars/CW5_Avatar.png'),
            new AvatarGroup(-1, '2LT', '/styles/default/xenforo/avatars/2LT_Avatar.png'),
            new AvatarGroup(-1, '1LT', '/styles/default/xenforo/avatars/1LT_Avatar.png'),
            new AvatarGroup(-1, 'CPT', '/styles/default/xenforo/avatars/CPT_Avatar.png'),
            new AvatarGroup(-1, 'MAJ', '/styles/default/xenforo/avatars/MAJ_Avatar.png'),
            new AvatarGroup(-1, 'LTC', '/styles/default/xenforo/avatars/LTC_Avatar.png'),
            new AvatarGroup(-1, 'COL', '/styles/default/xenforo/avatars/COL_Avatar.png'),
            new AvatarGroup(-1, 'BG', '/styles/default/xenforo/avatars/BG_Avatar.png'),
            new AvatarGroup(-1, 'MG', '/styles/default/xenforo/avatars/MG_Avatar.png'),
            new AvatarGroup(-1, 'LTG', '/styles/default/xenforo/avatars/LTG_Avatar.png'),
            new AvatarGroup(-1, 'GEN', '/styles/default/xenforo/avatars/GEN_Avatar.png'),
            new AvatarGroup(-1, 'CIV', '/styles/default/xenforo/avatars/CIV_Avatar.png'),
            new AvatarGroup(-1, 'RES', '/styles/default/xenforo/avatars/RES_Avatar.png'),
            new AvatarGroup(7, 'Mourning', ''),
            new AvatarGroup(8, 'Retired', ''),
            new AvatarGroup(-1, 'Recruiter', ''),
        ];
    }

    public static function findByGroupId(int $id): ?AvatarGroup
    {
        foreach (self::all() as $group) {
            if ($group->groupId === $id) return $group;
        }
        return null;
    }

    public static function findBySlug(string $slug): ?AvatarGroup
    {
        foreach (self::all() as $group) {
            if ($group->slug === $slug) return $group;
        }
        return null;
    }

    public static function isReservistGroupId(int $id): bool
    {
        $group = self::findByGroupId($id);
        return $group && $group->slug === 'reservist';
    }
}
