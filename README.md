# PHIL bundle flex

This Composer plugin is no longer maintained. It filled in the old PHIL bundle skeleton, which is no longer maintained
either. New PHIL packages, libraries and bundles alike, are created with the `new` command of
[phil/dev-tools](https://github.com/parler-haut-interagir-librement/dev-tools):

```bash
composer require --dev phil/dev-tools
vendor/bin/phil-dev new vendor/name --bundle
```

`phil-dev new` writes the file set every PHIL package has: sources, tests, bilingual documentation, CHANGELOG and the
configuration of the quality tools. See
[The package skeleton](https://github.com/parler-haut-interagir-librement/dev-tools/blob/main/doc/skeleton.md).

To start an application instead, use one of the PHIL templates:
[MicroSymfony](https://github.com/parler-haut-interagir-librement/MicroSymfony),
[WebSymfony](https://github.com/parler-haut-interagir-librement/WebSymfony),
[WebSkeleton](https://github.com/parler-haut-interagir-librement/WebSkeleton) or
[ApiSymfony](https://github.com/parler-haut-interagir-librement/ApiSymfony).

This repository will be archived.

[Version française](README.fr.md)

## License

MIT
