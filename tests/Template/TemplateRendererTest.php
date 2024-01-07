<?php

namespace Phil\BundleFlex\Tests\Template;

use PHPUnit\Framework\TestCase;
use Phil\BundleFlex\Template\TemplateRenderer;

class TemplateRendererTest extends TestCase
{
    public function testRender(): void
    {
        $renderer = new TemplateRenderer(__DIR__.'/../../templates');
        $content = $renderer->render('docs/index.md.template', ['bundle-name' => 'FooBundle']);

        self::assertSame('# FooBundle', trim($content));
    }
}
