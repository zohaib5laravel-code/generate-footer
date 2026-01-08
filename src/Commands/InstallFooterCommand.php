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
        $this->call('vendor:publish', [
            '--tag' => 'footer-view',
        ]);

        $this->call('vendor:publish', [
            '--tag' => 'footer-config',
        ]);

        $layoutPath = resource_path('views/layouts/app.blade.php');

        if (! File::exists($layoutPath)) {
            $this->error('layouts/app.blade.php not found');
            return;
        }

        $content = File::get($layoutPath);

        if (! str_contains($content, "@include('layouts.footer')")) {
            $content = str_replace(
                '</body>',
                "    @include('layouts.footer')\n</body>",
                $content
            );

            File::put($layoutPath, $content);
            $this->info('Footer added to app layout');
        } else {
            $this->warn('Footer already exists in layout');
        }

        $this->info('Generate Footer installed successfully 🎉');
    }
}
