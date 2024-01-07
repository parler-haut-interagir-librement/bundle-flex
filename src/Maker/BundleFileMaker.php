<?php

namespace Phil\BundleFlex\Maker;

use Phil\BundleFlex\Template\TemplateFileCreator;
use Phil\BundleFlex\Utils\Inflector;

use function sprintf;

readonly class BundleFileMaker
{

    public function __construct(private TemplateFileCreator $fileCreator)
    {
    }

    public function make(BundleOptions $options): void
    {
        $this->fileCreator->create('README.md', $options);
        $this->fileCreator->create('config/services.yaml', $options);
        $this->fileCreator->create('docs/index.md', $options);

        if ($options->hasWebAssets) {
            $this->fileCreator->create(
                'assets/acme-bundle.js',
                $options,
                sprintf('assets/%s.js', $options->getFileName())
            );
        }

        if ($options->hasConfig) {
            $this->fileCreator->create('config/definition.php', $options);
        }

        if ($options->hasControllers) {
            $this->fileCreator->create('config/routes.yaml', $options);
            $this->fileCreator->create('src/Controller/HelloController.php', $options);
        }

        if ($options->hasCommands) {
            $this->fileCreator->create('src/Command/HelloCommand.php', $options);
        }

        if ($options->hasTwigTemplates) {
            $this->fileCreator->create('templates/hello.html.twig', $options);
        }

        if ($options->hasTwigComponents) {
            $this->fileCreator->create('src/Twig/HelloComponent.php', $options);
            $this->fileCreator->create('templates/components/Hello.html.twig', $options);
        }

        if ($options->hasTranslations) {
            $this->fileCreator->create(
                'translations/AcmeBundle.fr.yaml',
                $options,
                sprintf('translations/%s.fr.xlf', $options->getBundleName())
            );
            $this->fileCreator->create(
                'translations/AcmeBundle.en.yaml',
                $options,
                sprintf('translations/%s.en.xlf', $options->getBundleName())
            );
        }
    }

}
