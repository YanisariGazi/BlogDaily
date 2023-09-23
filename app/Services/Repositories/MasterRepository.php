<?php

namespace Services\Repositories;

use Services\Interface\MastersInterface;

class MasterRepository implements MastersInterface
{
    public function store($models, array $data = null)
    {
        $addData = $models->create($data);
        return $addData;
    }

    public function update($models, array $data = null, $id)
    {
        $updateData = $models->findOrFail($id);
        $updateData->update($data);

        return $updateData;
    }

    public function destroy($models, $id)
    {
        $deleteData = $models->findOrFail($id);
        $deleteData->delete();
        return $deleteData;
    }
}