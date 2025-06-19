<?php


namespace App\Models;



abstract class BasePlayer implements Player {
    protected $name;
    
    public function __construct(string $name) {
        $this->name = $name;
    }
    
    public function getName(): string {
        return $this->name;
    }
}