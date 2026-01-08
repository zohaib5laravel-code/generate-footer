Generate Footer for Laravel

A simple Laravel package to automatically generate and install a beautiful, responsive footer in your Laravel application with one command.
Static Blade footer
Auto-injects into layouts/app.blade.php
Publishes CSS & JS

Installation

Install the package using Composer:

    composer require zohaib/generate-footer
Run the install command:

    php artisan generate-footer:install
This command will:
Publish the footer Blade view
Publish CSS and JS assets
Automatically add the footer include into your layout file


IMPORTANT REQUIREMENT (Read This)
Your Laravel project MUST contain the following layout file:
resources/views/layouts/app.blade.php
If this file does not exist, the installation command will not work.
Required Folder Structure
If you don’t already have it, create it manually:

        resources
        └── views
            └── layouts
                └── app.blade.php
