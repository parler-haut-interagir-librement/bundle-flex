<?php

namespace Phil\BundleFlex\Tests\Maker;

use Phil\BundleFlex\Maker\BundleComposerJsonMaker;
use Phil\BundleFlex\Maker\BundleOptions;

class BundleComposerJsonMakerTest extends MakerTestCase
{
    public function testCreateComposerJsonFileWithCorrectContent(): void
    {
        file_put_contents($this->bundleDir.'/composer.json', '{}');
        $maker = new BundleComposerJsonMaker($this->bundleDir);
        $options = new BundleOptions();
        $options->name = 'acme/foo-bundle';

        $maker->make($options);

        $this->assertGenFile('composer.json');
    }
}
