<?php 
declare(strict_types=1);

namespace Tf\Process;

use Symfony\Component\Process\Process;

interface BuilderInterface
{
    public function setArguments(array $args): BuilderInterface;
    
    public function getProcess(): Process;
}