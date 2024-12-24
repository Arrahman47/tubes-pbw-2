

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Permissions
        Permission::create(['name' => 'manage-orders']);
        Permission::create(['name' => 'manage-users']);
        Permission::create(['name' => 'manage-roles']);
        Permission::create(['name' => 'manage-payments']);

        // Roles
        $customerRole = Role::create(['name' => 'Customer']);
        $adminRole = Role::create(['name' => 'Admin']);

        // Assign permissions to roles
        $customerRole->givePermissionTo('manage-orders');
        $adminRole->givePermissionTo(Permission::all());
    }
}
