<?php

namespace App\Imports;

use App\Models\{
    User,
    Role
};
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $getUser = User::where('email', $row['email'])->first();
        if (!$getUser) {
            $user = new User;
            $user->name = $row['nombre'];
            $user->email = $row['email'];
            $user->password = Hash::make($row['password']);
            $user->is_enabled = $row['activo'];
            $user->name = $row['nombre'];
            if ($user->save()) {
                $rol = Role::where('name', $row['rol'])->first()->id;
                $user->roles()->sync([$rol]);
            }
        }
    }
}
