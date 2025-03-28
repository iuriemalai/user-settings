# This is my package user-settings

This is the description of my package user-settings.

## Support us



## Installation

You can install the package via composer:

```bash
composer require iuriemalai/user-settings
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="user-settings-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="user-settings-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="user-settings-views"
```

## Usage

```php
$userSettings = new IurieMalai\UserSettings();
echo $userSettings->echoPhrase('Hello, IurieMalai!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Iurie Malai](https://github.com/iuriemalai)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
