<?php

namespace Zohaib\GenerateFooter\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RemoveFooterCommand extends Command
{
    protected $signature = 'generate-footer:remove';
    protected $description = 'Remove the footer view, assets, and remove the include from app layout';

    public function handle()
    {
        // Remove published Blade view
        $footerViewPath = resource_path('views/vendor/generate-footer/footer.blade.php');
        if (File::exists($footerViewPath)) {
            File::delete($footerViewPath);
            $this->info('Footer view removed.');
        } else {
            $this->warn('Footer view not found.');
        }

        // Remove published assets
        $cssPath = public_path('vendor/generate-footer/css');
        $jsPath = public_path('vendor/generate-footer/js');

        if (File::exists($cssPath)) {
            File::deleteDirectory($cssPath);
            $this->info('Footer CSS removed.');
        } else {
            $this->warn('Footer CSS not found.');
        }

        if (File::exists($jsPath)) {
            File::deleteDirectory($jsPath);
            $this->info('Footer JS removed.');
        } else {
            $this->warn('Footer JS not found.');
        }

        // Remove include from app.blade.php
        $layoutPath = resource_path('views/layouts/app.blade.php');
        if (File::exists($layoutPath)) {
            $content = File::get($layoutPath);
            $footerInclude = "@include('generate-footer::footer')";
            if (str_contains($content, $footerInclude)) {
                $content = str_replace("    $footerInclude\n", '', $content);
                File::put($layoutPath, $content);
                $this->info('Footer include removed from app layout.');
            } else {
                $this->warn('Footer include not found in app layout.');
            }
        } else {
            $this->warn('layouts/app.blade.php not found.');
        }

        $this->info('Generate Footer removed successfully ✅');
    }
}
