<?php

namespace App\Services\Interfaces;

interface MasterInterface
{
    public function store($models, array $data);

    public function update($models, array $data, $id);

    public function destroy($models, $id);

    
}