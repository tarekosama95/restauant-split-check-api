<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class TraitMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trait {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new trait';

    /**
     * The Type of class to be generated
     *
     * @var string
     */
    protected $type = 'Trait';

    /**
     * Get the stub file for the generator
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/traits.stub';
    }

    /**
     * Get the default namespace for the class
     *
     * @param  string  $rootNameSpace
     * @return string
     */
    protected function getDefaultNameSpace($rootNameSpace)
    {
        return $rootNameSpace.'\Traits';
    }
}
