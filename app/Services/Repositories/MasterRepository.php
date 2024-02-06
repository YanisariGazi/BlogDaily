<?php

namespace App\Services\Repositories;

use App\Models\User;
use Hashids\Hashids;
use App\Models\Profil;
use App\Jobs\SendEmailVerifyJob;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use App\Services\Interfaces\MasterInterface;

class MasterRepository implements MasterInterface
{
    protected $user;
    protected $profil;
    public function __construct(User $user, Profil $profil)
    {
        $this->user = $user;
        $this->profil = $profil;
    }
    public function store($models, array $data = null)
    {
        $responseUser = $models->toArray();
        $responseUser['password'] = Hash::make($responseUser['password']);
        $hashids = new Hashids('your-secret-salt', 10);
        $hashedId = $hashids->encode($responseUser->id);
        $verification = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(5),
            ['id' => $hashedId, 'hash' => sha1($responseUser->email->getEmailForVerification())]
        );
        $responseUser['id'] = $hashedId;
        $SendEmailVerifyJob = new SendEmailVerifyJob($models, $verification);
        dispatch($SendEmailVerifyJob);
        $addData = $models->create($responseUser);
        $data['user_id'] = $addData->id;
        $this->profil->create($data);
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