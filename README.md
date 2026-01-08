# Generate Footer for your Website

A simple Laravel package to automatically generate and install a **beautiful, responsive footer** in your Website.

## ✨ Features

- ✔ Static Blade footer (no config file)
- ✔ Auto-injects into `layouts/app.blade.php`
- ✔ Publishes CSS & JavaScript assets
- ✔ Easy to customize
- ✔ Supports Laravel 10, 11, and 12

---

## 📦 Installation

Install the package using Composer:

```bash
composer require zohaib/generate-footer
```

The run this command:
```bash
php artisan generate-footer:install
```

## ✨ This command will:

- ✔ Publish the footer Blade view
- ✔ Publish CSS and JS assets
- ✔ Automatically add the footer include into your layout file



## ✨ IMPORTANT REQUIREMENT (Read This)
Your Laravel project MUST contain the following layout file:
**resources/views/layouts/app.blade.php**
If this file does not exist, the installation command will not work.

## ✨Required Folder Structure.
If you don’t already have it, create it manually:

    resources
    └── views
        └── layouts
            └── app.blade.php


To remove the footer run this command:
```bash
php artisan generate-footer:remove
```


