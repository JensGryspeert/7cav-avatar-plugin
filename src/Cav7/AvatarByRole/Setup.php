<?php

namespace Cav7\AvatarByRole;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;

class Setup extends AbstractSetup
{
    use StepRunnerInstallTrait;
    use StepRunnerUpgradeTrait;
    use StepRunnerUninstallTrait;

    public function install(array $stepParams = [])
    {
        $sourceDir = $this->addOn->getAddOnDirectory() . '/Resources/images';
        $destDir = \XF::getRootDirectory() . '/styles/default/xenforo/avatars';

        if (!is_dir($sourceDir)) {
            throw new \RuntimeException("Source image directory not found: $sourceDir");
        }

        if (!is_dir($destDir)) {
            if (!mkdir($destDir, 0755, true) && !is_dir($destDir)) {
                throw new \RuntimeException("Failed to create destination directory: $destDir");
            }
        }

        foreach (glob($sourceDir . '/*') as $sourceFile) {
            $filename = basename($sourceFile);
            $destFile = $destDir . '/' . $filename;
            if (!copy($sourceFile, $destFile)) {
                throw new \RuntimeException("Failed to copy $filename to $destDir");
            }
        }
    }

    public function uninstall(array $stepParams = [])
    {
        $destDir = \XF::getRootDirectory() . '/styles/default/xenforo/avatars';

        if (is_dir($destDir)) {
            $files = glob($destDir . '/*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }
            rmdir($destDir);
        }
    }
}
