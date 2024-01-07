<?php

namespace Phil\BundleFlex\Maker;

use Composer\IO\IOInterface;
use Phil\BundleFlex\Composer\CommandRunner;
use Phil\BundleFlex\Template\TemplateFileCreator;

class FlexMaker
{
    private readonly BundleOptionsAsker $bundleOptionsAsker;
    private readonly BundleComposerJsonMaker $bundleComposerJsonMaker;
    private readonly BundleDirectoryMaker $bundleDirectoryMaker;
    private readonly BundleFileMaker $bundleFileMaker;
    private readonly BundleMaker $bundleMaker;

    public function __construct(CommandRunner $commandRunner, IOInterface $io, string $bundleDir)
    {
        $this->bundleOptionsAsker = new BundleOptionsAsker($io);
        $this->bundleComposerJsonMaker = new BundleComposerJsonMaker($bundleDir);
        $this->bundleDirectoryMaker = new BundleDirectoryMaker($commandRunner, $bundleDir);
        $this->bundleFileMaker = new BundleFileMaker(new TemplateFileCreator($bundleDir));
        $this->bundleMaker = new BundleMaker($bundleDir);
    }

    public function make(): void
    {
        $options = $this->bundleOptionsAsker->ask();

        $this->bundleComposerJsonMaker->make($options);
        $this->bundleDirectoryMaker->make($options);
        $this->bundleFileMaker->make($options);
        $this->bundleMaker->make($options);
    }
}
