<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Verificar si los roles existen antes de crearlos
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        }

        if (!Role::where('name', 'usuario')->exists()) {
            Role::create(['name' => 'usuario']);
        }

        // Crear usuario administrador si no existe
        $admin = User::firstOrCreate([
            'email' => 'vcruzpenna@gmail.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('Va124457') // Cambia la contraseña según sea necesario
        ]);

        // Verificar si el usuario tiene el método assignRole antes de asignar el rol
        if ($admin && method_exists($admin, 'assignRole')) {
            $admin->assignRole('admin');
        } else {
            echo "Error: El método assignRole no está disponible en el modelo User.\n";
        }
    }
}
