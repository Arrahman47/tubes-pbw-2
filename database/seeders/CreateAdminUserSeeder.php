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
        $user = User::find(1); // Replace 1 with the user ID you want to assign permissions to
$user->givePermissionTo(['role-list', 'role-create', 'role-edit', 'role-delete']);
        // $user = User::create([
        //     'name' => 'Daffa Akhadi Yoga Perdana', 
        //     'email' => 'akhadidaffa332@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);
        
        $user= User::where("email",'admin@gmail.com')->first();
        // $role = Role::create(['name' => 'Admin']);
        $role = Role::where("name","Admin")->first();
        $permissions = Permission::pluck('id','id')->all();
       
        $role->syncPermissions($permissions);
         
        $user->assignRole([$role->id]);
    }
}
