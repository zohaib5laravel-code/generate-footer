<?php

namespace Zohaib\GenerateFooter\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallFooterCommand extends Command
{
    protected $signature = 'generate-footer:install';
    protected $description = 'Install footer view and add it to app layout';

    public function handle()
    {
        // Publish views
        $this->call('vendor:publish', [
            '--tag' => 'footer-view',
            '--force' => true,
        ]);

        // Publish assets
        $this->call('vendor:publish', [
            '--tag' => 'footer-assets',
            '--force' => true,
        ]);

        $layoutPath = resource_path('views/layouts/app.blade.php');

        if (! File::exists($layoutPath)) {
            $this->error('layouts/app.blade.php not found');
            return 1;
        }

        $content = File::get($layoutPath);
        $footerInclude = "@include('generate-footer::footer')";

        if (! str_contains($content, $footerInclude)) {
            $content = str_replace('</body>', "    $footerInclude\n</body>", $content);
            File::put($layoutPath, $content);
            $this->info('Footer added to app layout');
        } else {
            $this->warn('Footer already exists in layout');
        }

        $this->info('Generate Footer installed successfully 🎉');
    }
}
