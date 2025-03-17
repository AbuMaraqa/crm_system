<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Livewire;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Livewire;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;

class ModuleLivewireComponentsRegistrar
{
    protected array $livewireClasses = [];

    public static function make(): static
    {
        return new static();
    }

    public function registerLivewireComponents(string $moduleName, string $moduleNameLower)
    {
        $this->registerModuleComponentsByNamespace($moduleName, $moduleNameLower);
    }

    protected function getLivewireClassesInNamespace($directory, $namespace, $aliasPrefix = ''): array
    {
        $livewireClasses = [];

        $directoryIterator = new RecursiveDirectoryIterator($directory);
        $iteratorIterator = new RecursiveIteratorIterator($directoryIterator);

        foreach ($iteratorIterator as $file) {
            if ($file->isDir()) {
                continue;
            }

            $class = (string) Str::of($namespace)
                ->append('\\', $iteratorIterator->getSubPathName())
                ->replace(['/', '.php'], ['\\', '']);

            if (is_subclass_of($class, Component::class) && ! (new ReflectionClass($class))->isAbstract()) {
                $alias = $aliasPrefix.Str::of($class)
                    ->after($namespace.'\\')
                    ->replace(['/', '\\'], '.')
                    ->explode('.')
                    ->map([Str::class, 'kebab'])
                    ->implode('.');

                if (Str::endsWith($class, ['\Index', '\index'])) {
                    Livewire::component(Str::beforeLast($alias, '.index'), $class);
                }

                $livewireClasses[$alias] = $class;
            }
        }

        return $livewireClasses;
    }

    public function registerModuleComponentsByNamespace(string $moduleName, string $moduleNameLower): void
    {
        $directory = (string) Str::of(module_path($moduleName))
            ->append('/Livewire')
            ->replace(['\\'], '/');

        if (! File::isDirectory($directory)) {
            return;
        }

        $namespace = "Modules\\{$moduleName}\\Livewire";

        // $this->livewireClasses = cache()->remember("cache-livewire-classes-in-module-{$moduleName}", 1000, function () use ($directory, $namespace, $moduleNameLower) {

        //     return $this->getLivewireClassesInNamespace($directory, $namespace, $moduleNameLower . '::');
        // });
        $this->livewireClasses = $this->getLivewireClassesInNamespace($directory, $namespace, $moduleNameLower.'::');

        $this->registerLivewireComponent();
    }

    protected function registerLivewireComponent()
    {
        foreach ($this->livewireClasses as $alias => $livewireClass) {
            Livewire::component($alias, $livewireClass);
        }
    }
}
