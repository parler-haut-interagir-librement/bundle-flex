<?php

namespace Phil\BundleFlex\Tests\Maker;

use Phil\BundleFlex\Maker\BundleMaker;
use Phil\BundleFlex\Maker\BundleOptions;

class BundleMakerTest extends MakerTestCase
{
    public function testCreateBundleWithCorrectNamespaceAndClassName(): void
    {
        $maker = new BundleMaker($this->bundleDir);
        $options = new BundleOptions();
        $options->name = 'acme/foo-bundle';

        $maker->make($options);

        $this->assertGenFile('src/FooBundle.php');
    }

    public function testCreateConfigureMethodWhenHasConfigOptionIsTrue(): void
    {
        $maker = new BundleMaker($this->bundleDir);
        $options = new BundleOptions();
        $options->name = 'acme/foo-with-config-bundle';
        $options->hasConfig = true;

        $maker->make($options);

        $this->assertGenFile('src/FooWithConfigBundle.php');
    }
}
