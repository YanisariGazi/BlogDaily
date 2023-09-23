<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BlameableObserver
{
    public function creating(Model $model)
    {
        $column = $model->getConnection()->getSchemaBuilder()->hasColumn($model->getTable(), 'created_by');
        if ($column) {
            $model->created_by = Auth::user()->id;
        }
    }

    public function updating(Model $model)
    {
        $update = $model->getConnection()->getSchemaBuilder()->hasColumn($model->getTable(), 'updated_by');
        $modified = $model->getConnection()->getSchemaBuilder()->hasColumn($model->getTable(), 'modified_by');
        if ($update) {
            $model->updated_by = Auth::user()->id;
        }

        if ($modified) {
            $model->modified_by = Auth::user()->id;
        }
    }
}
