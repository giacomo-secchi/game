<?php


namespace App\Models;



abstract class BasePlayer implements Player {
    protected $name;
    private $environment;
    public function __construct(string $name) {
        $this->environment = $environment ?? (PHP_SAPI === 'cli' ? 'cli' : 'web');

        $this->name = $name;
    }
    
    public function getName(): string {
        return $this->name;
    }
}