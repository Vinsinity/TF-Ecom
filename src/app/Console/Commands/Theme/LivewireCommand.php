<?php

namespace App\Console\Commands\Theme;

use File;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Livewire\Commands\MakeCommand;
use Livewire\Livewire;
use Livewire\LivewireComponentsFinder;
use function PHPUnit\Framework\directoryExists;

class LivewireCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme:livewire {name : The name of the component.} {--space= : The space option.} {--theme= : The theme option.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is theme livewire controller create commands';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name'); // Component name variable
        $space = $this->option('space'); // Space name
        $theme = $this->option('theme'); // Theme name

        if (Str::contains($name,'/')){
            $nameArray = explode("/",$name);
            $exactName = array_pop($nameArray);

            $viewStub = file_get_contents(__DIR__.'/stubs/livewire.view.stub'); // View stub file
            $controllerStub = file_get_contents(__DIR__.'/stubs/livewire.controllerwithpath.stub'); // Controller stub file

            $controllerStub = str_replace('{{ name }}', ucfirst($exactName), $controllerStub); // Replace name
            $controllerStub = str_replace('{{ space }}', ucfirst($space), $controllerStub); // Replace space
            $controllerStub = str_replace('{{ theme }}', ucfirst($theme), $controllerStub); // Replace theme
            $seperatedPath = '';
            foreach ($nameArray as $key => $value) {
                if ($key === count($nameArray) - 1) {
                    $seperatedPath .= ucfirst($value);
                } else {
                    $seperatedPath .= ucfirst($value).'\\';
                }
            }

            $controllerStub = str_replace('{{ view }}', strtolower($seperatedPath).'.'.$this->seperateString($exactName), $controllerStub); // Replace theme
            $controllerStub = str_replace('{{ path }}', $seperatedPath, $controllerStub); // Replace theme

            $pureControllerPath = app_path('Http/Controllers/Themes/'.ucfirst($space).'/'.ucfirst($theme).'/Livewire/');
            $pureViewPath = resource_path('themes/'.$space.'/'.$theme.'/livewire/');

            $exactControllerName = app_path('Http/Controllers/Themes/'.ucfirst($space).'/'.ucfirst($theme).'/Livewire/'.$seperatedPath.'/'.ucfirst($exactName).'.php');
            $exactViewName = resource_path('themes/'.$space.'/'.$theme.'/livewire/'.strtolower($seperatedPath).'/'.$this->seperateString($exactName).'.blade.php');

            if (file_exists($exactControllerName)) {
                $this->error($seperatedPath.'/'.ucfirst($exactName).' Controller file exist!');
            }

            foreach ($nameArray as $key => $pathValue) {
                if ($key === count($nameArray) - 1) {
                    $pureControllerPath = $pureControllerPath.ucfirst($pathValue);
                    $pureViewPath = $pureViewPath.strtolower($pathValue);
                } else {
                    $pureControllerPath = $pureControllerPath.ucfirst($pathValue).'/';
                    $pureViewPath = $pureViewPath.strtolower($pathValue).'/';
                }
                if (!is_dir($pureControllerPath)){
                    File::makeDirectory($pureControllerPath);
                }
                if (!is_dir($pureViewPath)){
                    File::makeDirectory($pureViewPath);
                }
            }
            app()->bind();
            file_put_contents($exactControllerName, $controllerStub);
            file_put_contents($exactViewName, $viewStub);

        }else{
            $viewStub = file_get_contents(__DIR__.'/stubs/livewire.view.stub'); // View stub file
            $controllerStub = file_get_contents(__DIR__.'/stubs/livewire.controller.stub'); // Controller stub file

            $controllerStub = str_replace('{{ name }}', ucfirst($name), $controllerStub); // Replace name
            $controllerStub = str_replace('{{ space }}', ucfirst($space), $controllerStub); // Replace space
            $controllerStub = str_replace('{{ theme }}', ucfirst($theme), $controllerStub); // Replace theme
            $controllerStub = str_replace('{{ view }}', $this->seperateString($name), $controllerStub); // Replace view

            $controllerPath = app_path('Http/Controllers/Themes/'.ucfirst($space).'/'.ucfirst($theme).'/Livewire/'.ucfirst($name).'.php');
            $viewPath = resource_path('themes/'.$space.'/'.$theme.'/livewire/'.$this->seperateString($name).'.blade.php');

            file_put_contents($controllerPath, $controllerStub);
            file_put_contents($viewPath, $viewStub);

        }
        app(LivewireComponentsFinder::class)->build();
        $this->info('Livewire component created successfully.');
    }

    function seperateString($string, $symbol = '-')
    {
        // Büyük harflerden önce tire koyarak kelimeyi ayır
        $string = preg_replace('/(?<!^)([A-Z])/', $symbol.'$1', $string);

        // Tüm harfleri küçük harfe dönüştür ve geri dön
        return strtolower($string);
    }
}
