<?php

abstract class Command
{
    abstract public function execute($arguments);

    abstract public function getDescription();
}

?>