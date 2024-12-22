<?php
  
namespace Database\Seeders;
  

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'laundry-list',
           'laundry-create',
           'laundry-edit',
           'laundry-delete',
           'payment-list',
           'payment-create',
           'payment-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',

        ];
        
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
