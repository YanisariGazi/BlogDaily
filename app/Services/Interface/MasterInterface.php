<?php

namespace Services\Interface;

interface MastersInterface
{
    public function store($models, array $data);

    public function update($models, array $data, $id);

    public function destroy($models, $id);

    
}