<?php

namespace Tf\Commands;

use Symfony\Component\Process\Process;

interface TerraformActionInterface 
{
    public function action(string $action): TerraformActionInterface;
    public function extraOptions(array $options): TerraformActionInterface;
    public function vars(array $vars): TerraformActionInterface;
    public function execute($callback = null): int;
    public function getCommand(): string;
}