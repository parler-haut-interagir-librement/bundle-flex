<?php

namespace Phil\BundleFlex\Template;

use Phil\BundleFlex\Maker\BundleOptions;

readonly class TemplateFileCreator
{
    public function __construct(
        private string $bundleDir,
        private TemplateRenderer $renderer = new TemplateRenderer(),
    ) {
    }

    public function create(string $name, BundleOptions $options, string $destName = null): void
    {
        $content = $this->renderer->render($name.'.twig', $options);
        $destination = $this->bundleDir.'/'.($destName ?? $name);

        if (!is_dir(dirname($destination)) || !file_put_contents($destination, $content)) {
            throw new \RuntimeException(sprintf('Unable to create "%s" file.', $destination));
        }
    }
}
