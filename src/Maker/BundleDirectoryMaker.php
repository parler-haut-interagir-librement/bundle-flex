<?php

namespace Phil\BundleFlex\Maker;

use Phil\BundleFlex\Composer\CommandRunner;

readonly class BundleDirectoryMaker
{
    public function __construct(
        private CommandRunner $commandRunner,
        private string $bundleDir,
    ) {
    }

    public function make(BundleOptions $options): void
    {
        $this->makeDirectory('config');
        $this->makeDirectory('docs');
        $this->makeDirectory('src');
        $this->makeDirectory('tests');

        if ($options->hasWebAssets) {
            $this->makeDirectory('assets');
        }

        if ($options->hasTwigTemplates) {
            $this->makeDirectory('templates');
            $this->commandRunner->require('symfony/twig-bundle');
        }

        if ($options->hasTwigComponents) {
            $this->makeDirectory('templates/components');
            $this->makeDirectory('src/Twig');
            $this->commandRunner->require('symfony/ux-twig-component');
        }

        if ($options->hasTranslations) {
            $this->makeDirectory('translations');
            $this->commandRunner->require('symfony/translation');
        }

        if ($options->hasControllers) {
            $this->makeDirectory('src/Controller');
        }

        if ($options->hasCommands) {
            $this->makeDirectory('src/Command');
        }
    }

    private function makeDirectory(string $name): void
    {
        $dir = $this->bundleDir.'/'.$name;

        if (!is_dir($dir) && !mkdir($dir, 0777, true) && !is_dir($dir)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created.', $dir));
        }
    }
}
