<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ApiResponse;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Services\Interfaces\MasterInterface;

class AuthController extends Controller
{
    protected $api;
    protected $model;
    protected $interface;
    public function __construct(MasterInterface $interface, User $model, ApiResponse $api)
    {
        $this->model = $model;
        $this->api = $api;
        $this->interface = $interface;
    }

    public function register(UserRequest $request)
    {
        DB::beginTransaction();
        try{
            dd(1);
            $users = $this->interface->store($this->model, $request->validated());
            DB::commit();
            return $this->api->store($users);
        }
        catch(\Throwable$e){
        DB::rollBack();
            if (config('envconfig.app_debug')) {
                return $this->api->error_code($e->getMessage(), $e->getCode());
            } else {
                return $this->api->error_code_log("Internal Server Error", $e->getMessage());
            };
        }
    }
}
