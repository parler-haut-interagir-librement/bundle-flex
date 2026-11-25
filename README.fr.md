# Bundle flex de PHIL

Ce plugin Composer n'est plus maintenu. Il remplissait l'ancien squelette de bundle de PHIL, qui n'est plus maintenu
non plus. Les nouveaux paquets de PHIL, librairies comme bundles, se créent avec la commande `new` de
[phil/dev-tools](https://github.com/parler-haut-interagir-librement/dev-tools) :

```bash
composer require --dev phil/dev-tools
vendor/bin/phil-dev new vendor/name --bundle
```

`phil-dev new` écrit les fichiers que porte chaque paquet de PHIL : sources, tests, documentation bilingue, CHANGELOG
et configuration des outils de qualité. Voir
[le squelette de paquet](https://github.com/parler-haut-interagir-librement/dev-tools/blob/main/doc/skeleton.md)
(en anglais).

Pour démarrer une application, prenez plutôt un des gabarits de PHIL :
[MicroSymfony](https://github.com/parler-haut-interagir-librement/MicroSymfony),
[WebSymfony](https://github.com/parler-haut-interagir-librement/WebSymfony),
[WebSkeleton](https://github.com/parler-haut-interagir-librement/WebSkeleton) ou
[ApiSymfony](https://github.com/parler-haut-interagir-librement/ApiSymfony).

Ce dépôt sera archivé.

[English version](README.md)

## Licence

MIT
