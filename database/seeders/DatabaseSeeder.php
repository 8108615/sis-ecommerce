<?php

namespace Database\Seeders;

use App\Models\Ajuste;
use App\Models\Categoria;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::create(['name' => 'SUPER ADMIN']);
        Role::create(['name' => 'ADMINISTRADOR']);
        Role::create(['name' => 'VENDEDOR']);
        Role::create(['name' => 'CONTABILIDAD']);
        Role::create(['name' => 'OPERADOR']);
        Role::create(['name' => 'CLIENTE']);

        User::create([
            'name' => 'Erick Morales',
            'email' => 'erick@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('SUPER ADMIN');

        Ajuste::create([
            'nombre' => 'Sistema Ecommerce',
            'descripcion' => 'Sistema Para Todo',
            'sucursal' => 'Santa Cruz',
            'direccion' => 'Av Cumavi/ Barrio San Juan Calle 5/N° 225',
            'telefonos' => '76658531',
            'logo' => 'logos/KdTRR1Olm14q4tSgTLHb6yieavvYkpG5pRfPJ1He.png',
            'imagen_login' => 'imagenes_login/DjXop4bOBxGk7OOVK1oqIMUNVIwITOqRhGFLfjXz.png',
            'email' => 'ecomerce@gmail.com',
            'divisa' => 'Bs',
            'pagina_web' => 'https://erick.com',
        ]);

        Categoria::factory(15)->create();

        
            
        
    }
}
