<?php 

namespace app\models;

class Main extends AppModel{
    
    public function getNames(): array
    {
        return \R::findAll('name');
    }
}