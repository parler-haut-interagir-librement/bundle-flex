<?php

namespace Phil\BundleFlex\Maker;

use Phil\BundleFlex\Utils\Inflector;

class BundleOptions
{

    /**
     * Composer package name
     */
    public string $name = 'vendor/name-bundle';

    /**
     * Composer package description
     */
    public string $description = 'Acme bundle description';

    /**
     * Composer package author name
     */
    public string $authorName = 'Author Name';

    /**
     * Composer package author email
     */
    public string $authorEmail = 'AuthorName@ph-il.ca';

    /**
     * Will the bundle contain a config definition?
     */
    public bool $hasConfig = false;

    /**
     * Will the bundle contain Web assets?
     */
    public bool $hasWebAssets = false;

    /**
     * Will the bundle contain Twig templates?
     */
    public bool $hasTwigTemplates = false;

    /**
     * Will the bundle contain Twig Components?
     */
    public bool $hasTwigComponents = false;

    /**
     * Will the bundle contain translations?
     */
    public bool $hasTranslations = false;

    /**
     * Will the bundle contain controllers?
     */
    public bool $hasControllers = false;

    /**
     * Will the bundle contain commands?
     */
    public bool $hasCommands = false;

    private ?string $bundleName;

    private ?string $vendorPrefix;

    private ?string $bundleNamespace;

    private ?string $bundleClass;

    private ?string $fileName;

    private ?string $noBundleName;

    public function getVendorPrefix(): string
    {
        if (null === $this->vendorPrefix) {
            $this->vendorPrefix = Inflector::vendory($this->name);
        }

        return $this->vendorPrefix;
    }

    public function getBundleClass(): string
    {
        if (null === $this->bundleClass) {
            $this->bundleClass = $this->getBundleNamespace() . '\\' . $this->getBundleName();
        }

        return $this->bundleClass;
    }

    public function getBundleNamespace(): string
    {
        if (null === $this->bundleNamespace) {
            $this->bundleNamespace = Inflector::namespacefy($this->name);
        }

        return $this->bundleNamespace;
    }

    public function getBundleName(): string
    {
        if (null === $this->bundleName) {
            $this->bundleName = Inflector::className($this->name);
        }

        return $this->bundleName;
    }

    public function getFileName(): string
    {
        if (null === $this->fileName) {
            $this->fileName = Inflector::fileName($this->name);
        }

        return $this->fileName;
    }

    public function getNoBundleName(): string
    {
        if (null === $this->noBundleName) {
            $this->noBundleName = Inflector::noBundleName($this->name);
        }

        return $this->noBundleName;
    }

}
