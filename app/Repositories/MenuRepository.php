<?php

namespace Faq\Repositories;
use Faq\Menu;

class MenuRepository extends Repository {
    
    public function __construct(Menu $menu) {
        $this->model = $menu;
    }
    
}