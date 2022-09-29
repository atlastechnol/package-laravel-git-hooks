# Laravel Git Hooks

Package developed to automate and change the main folder referring to git hooks.

## Installation
Add private repository in composer json file:

```json
{
  ...
  "repositories": [
    {
      "type": "vcs",
      "url": "git@github.com:rsgabrielrm/laravel-git-hooks.git"
    }
  ]
}
```

Require this package with composer:
```bash
composer require --dev rsgabrielrm/laravel-git-hooks
```

You can install the package:
```bash
php artisan laravel-git-hooks:install
```

## Usage

Change the pre-commit template file created in `.gitHooks/` and add the action you want to take before the user successfully commits.

Example if you are using docker:
```bash
#!/bin/sh
. "$(dirname "$0")/_/hooks.sh"

cd ..
containerName='enter-the-container-name'
docker-compose up --detach --no-deps --no-recreate ${containerName}
docker-compose exec -T ${containerName} php artisan test
```

You can use other git hooks as per the [documentation](https://git-scm.com/docs/githooks).

## Credits
This package was inspired by the [npm husky package](https://github.com/typicode/husky).

Package created by [Gabriel Menezes](https://github.com/rsgabrielrm).
