<?php

namespace Phil\BundleFlex\Template;

use Phil\BundleFlex\Maker\BundleOptions;

readonly class TemplateRenderer
{
    public function __construct(private string $baseDir = __DIR__.'/../../templates')
    {
    }

    public function render(string $template, BundleOptions $options): string
    {
        $filename = $this->baseDir.'/'.$template;

        if (!file_exists($filename)) {
            throw new \InvalidArgumentException(sprintf('Template "%s" not found.', $template));
        }

        $content = file_get_contents($filename);

        if ($parameters) {
            $placeholders = array_map(static fn (string $name) => '<'.$name.'>', array_keys($parameters));
            $content = str_replace($placeholders, array_values($parameters), $content);
        }

        return $content;
    }
}
