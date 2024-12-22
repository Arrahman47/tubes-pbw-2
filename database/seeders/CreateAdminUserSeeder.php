<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah pengguna dengan ID 1 ada, jika tidak, buat pengguna baru
        $user = User::find(1);
        


        if (!$user) {
            // Membuat pengguna baru jika tidak ada
            $user = User::create([
                'name' => 'Ben',
                'email' => 'bernard47@gmail.com',
                'password' => bcrypt('Horsee47'),
            ]);
        }

        // Memberikan izin kepada pengguna
        $user->givePermissionTo(['role-list', 'role-create', 'role-edit', 'role-delete']);
        $user->givePermissionTo(['laundry-list', 'laundry-create', 'laundry-edit', 'laundry-delete']);
        $user->givePermissionTo(['payment-list', 'payment-create', 'payment-delete']);
        $user->givePermissionTo(['user-list', 'user-create', 'user-edit', 'user-delete']);
        
        // Membuat role Admin jika belum ada
        $role = Role::firstOrCreate(['name' => 'Admin']);

        // Menyinkronkan semua izin ke peran Admin
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        // Menetapkan peran Admin ke pengguna
        $user->assignRole([$role->id]);
    }
}
