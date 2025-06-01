<?php

namespace Cav7\AvatarByRole\Infrastructure\Xenforo\Template;

use XF\Container;
use XF\Template\Templater;
use Cav7\AvatarByRole\Application\Mapper\UserGroupAvatarMapper;

class TemplateOverrides
{
    public static function templaterSetup(Container $container, Templater $templater)
    {
        $templater->addFunction('avatar', [self::class, 'customAvatar']);
    }

    public static function customAvatar(Templater $templater, &$escape, $user, $size = 's', $canonical = false, $href = true)
    {
        $default = $templater->fnAvatar($templater, $escape, $user, $size, $canonical, $href);

        $primary = $user['user_group_id'] ?? 0;
        $secondary = $user['secondary_group_ids'] ?? [];

        if (is_string($secondary)) {
            $secondary = array_map('intval', explode(',', $secondary));
        }

        $imgSrc = UserGroupAvatarMapper::getAvatarForGroupIds($primary, $secondary);

        error_log("Resolved avatar path: $imgSrc");

        $modified = preg_replace(
            '#(<span class="avatar[^"]*"[^>]*>).*?(</span>)#is',
            '$1<img src="' . $imgSrc . '" loading="lazy" />$2',
            $default
        );

        return $modified;
    }
}
