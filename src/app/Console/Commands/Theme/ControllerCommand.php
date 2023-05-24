<?php

namespace App\Console\Commands\Theme;

use Illuminate\Console\Command;

class ControllerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
//    protected $signature = 'theme:controller {name} --space=frontend --theme=default';
    protected $signature = 'theme:controller {name : The name of the controller.} {--space= : The space option.} {--theme= : The theme option.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is theme controller create commands';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name'); // Controller name variable
        $space = $this->option('space'); // Space name
        $theme = $this->option('theme'); // Theme name

        $stub = file_get_contents(__DIR__.'/stubs/controller.stub'); // Controller stub file
        $filename = ucfirst($name).'.php'; // Create file name from command name properties with first letter upper
        $space = ucfirst($space); // First letter upper space folder name
        $theme = ucfirst($theme); // First letter upper theme name
        $filepath = app_path('Http/Controllers/Themes/'.$space.'/'.$theme.'/'.$filename);

        $stub = str_replace('{{ name }}', $name, $stub); // Replace name
        $stub = str_replace('{{ space }}', $space, $stub); // Replace space
        $stub = str_replace('{{ theme }}', $theme, $stub); // Replace theme

        if (!file_exists($filepath)){
            file_put_contents($filepath, $stub); // Create controller file
            $this->info($name.' create is successfully'); // Information message
        }else{
            $this->error('File exist!');
        }

    }
}
