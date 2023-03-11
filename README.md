# Status page for your laravel application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/eazybright/status-page.svg?style=flat-square)](https://packagist.org/packages/eazybright/status-page)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/eazybright/status-page/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/eazybright/status-page/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/eazybright/status-page/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/eazybright/status-page/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/eazybright/status-page.svg?style=flat-square)](https://packagist.org/packages/eazybright/status-page)

How do you tell if your laravel application is up and running or if there's a downtime?. [StatusPage](https://github.com/Eazybright/status-page) helps you communicate realtime status of your application.

## Installation

You can install the package via composer:

```bash
composer require eazybright/status-page
```

You can publish the public assets with:

```bash
php artisan vendor:publish --tag="status-page-assets"
```

The asset files will be available in `public/vendor/status-page` directory

You can publish the config file with:

```bash
php artisan vendor:publish --tag="status-page-config"
```

This is the contents of the published config file:

```php
return [
    /**
     * Specify the location of the logo
    */
    'logo' => 'vendor/status-page/img/STATUSPAGE.png',
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="status-page-views"
```

## Usage

Before the you can view the status page, some actions needs to be performed.

1. Copy the bash script to root folder, `health-check.sh` file will be generated.

```bash
php artisan status-page:copy-script
```

2. Crawl the routes in the application. This creates `urls.cfg` file in the public folder. This is where the available urls will be saved to.
```bash
php artisan status-page:generate-route
```

Optionally, you can include your urls to `urls.cfg` file.
```cfg
Google https://google.com GET
Statsig https://statsig.com GET
```

3. Create the status page view.
```bash
php artisan status-page:create
```
Your view is available at localhost:8000/status-page

![Status Page View](https://res.cloudinary.com/eazybright/image/upload/v1678542586/status_page.png)

4. To automate `step 3`, you can schedule the artisan command `php artisan status-page:create` to run independently inside `app\Console\kernel.php` file.

```php
    ...

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        ...
        $schedule->command('status-page:create')->hourly();
    }
```

## Testing

```bash
composer test
```

## Contributing

Send in a PR - I'd love to integrate your ideas.

## Credits

- [Kolawole Ezekiel](https://github.com/Eazybright)
- [Statsig status page](https://github.com/statsig-io/statuspage/)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
