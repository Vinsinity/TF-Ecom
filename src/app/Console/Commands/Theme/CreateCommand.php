<?php

namespace App\Console\Commands\Theme;

use File;
use Illuminate\Console\Command;

class CreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme:create {name : The name of the theme.} {--space= : The space option.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Theme create command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name'); // Component name variable
        $space = $this->option('space'); // Space name

        $themePath = resource_path('themes/'.$space.'/'.strtolower($name));
        $folders = [
            $themePath,
            $themePath.'/assets',
            $themePath.'/lang',
            $themePath.'/layouts',
            $themePath.'/livewire',
            $themePath.'/views',
        ];
        foreach ($folders as $folder) {
            if (!is_dir($folder))
            {
                File::makeDirectory($folder);
            }else{
                $this->error('Folder exist!');
            }
        }

        $cssStub = file_get_contents(__DIR__.'/stubs/theme/app.css.stub'); // View stub file
        $langStub = file_get_contents(__DIR__.'/stubs/theme/auth.lang.stub'); // View stub file
        $layoutStub = file_get_contents(__DIR__.'/stubs/theme/app.layout.stub'); // View stub file

        $configStub = file_get_contents(__DIR__.'/stubs/theme/config.stub'); // View stub file
        $configStub = str_replace('{{ name }}', ucfirst($name), $configStub); // Replace name

        $composerStub = file_get_contents(__DIR__.'/stubs/theme/composer.stub'); // View stub file
        $composerStub = str_replace('{{ name }}', ucfirst($name), $composerStub); // Replace name

        $packageStub = file_get_contents(__DIR__.'/stubs/theme/package.stub'); // View stub file

        $viteStub = file_get_contents(__DIR__.'/stubs/theme/vite.stub'); // View stub file
        $viteStub = str_replace('{{ space }}', ucfirst($space), $viteStub); // Replace name
        $viteStub = str_replace('{{ theme }}', ucfirst($name), $viteStub); // Replace name

        file_put_contents($folders[1].'/app.css',$cssStub);
        file_put_contents($folders[2].'/auth.php',$langStub);
        file_put_contents($folders[3].'/app.blade.php',$layoutStub);
        file_put_contents($folders[0].'/config.json',$configStub);
        file_put_contents($folders[0].'/composer.json',$composerStub);
        file_put_contents($folders[0].'/package.json',$packageStub);
        file_put_contents($folders[0].'/vite.config.js',$viteStub);

        // TODO: Controller copy
    }
}
