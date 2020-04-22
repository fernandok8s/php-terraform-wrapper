<?php

namespace Tf\Commands;
use Symfony\Component\Process\Process;

class TerraformAction extends AbstractTerraformCommand implements TerraformActionInterface
{
    private $supportedActions = ["init","apply","destroy"];

    public function action(string $action): TerraformActionInterface 
    {
        $this->addCommand($action);
        return $this;
    }

    public function extraOptions(array $options): TerraformActionInterface
    {
        $this->addExtraOptions($options);
        return $this;
    }

    public function autoApprove():TerraformActionInterface
    {
        $this->addExtraOptions(['-auto-approve']);
        return $this;
    }

    public function vars(array $vars): TerraformActionInterface
    {
        $this->addVars($vars);
        return $this;
    }
    
    public function execute($callback = null): int
    {
        return $this->runProcess($callback);
    }

    public function getCommand() :string
    {
        return join(" ", $this->prepareCommand());
    }

    public function __call($funName, $arguments) 
    {
        if(in_array($funName, $this->supportedActions)) 
        {
            $this->action($funName);
            return $this;
        }
    }
}