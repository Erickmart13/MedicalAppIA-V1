<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getUsersByRole($roleId)
    {
        try {
            // Obtener las personas asociadas al rol
            $users = User::whereHas('roles', function($query) use ($roleId) {
                $query->where('role_id', $roleId);
            })
            
            ->get();

            // Mapear las personas para obtener los atributos necesarios
            $usersData = $users->map(function($user) {
                return [
                    'id' => $user->id,
                    'first_name' => $user->person->first_name,
                    'last_name' => $user->person->last_name,
                    
                ];
            });

            return response()->json($usersData);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener las personas: ' . $e->getMessage()], 500);
        }
    }
}
