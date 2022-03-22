<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SetupRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Basic Roles';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        if(!User::find(1)) {
            $superAdminUser = User::create([
                'name' => config('portal.saName'),
                'email' => config('portal.saMail'),
                'password' => \Illuminate\Support\Facades\Hash::make(config('portal.saPass'))
            ]);
        }

        foreach (Permission::all() as $permission)
            $permission->delete();

        foreach (Role::all() as $role)
            $role->delete();


        $superAdmin = Role::create(['name' => 'Super Admin']);
        $higherAdmin = Role::create(['name' => 'Head Admin']);
        $seniorAdmin = Role::create(['name' => 'Senior Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $moderator = Role::create(['name' => 'Moderator']);
        $trial = Role::create(['name' => 'Trial']);


        $territoryInventory = Permission::create(['name' => 'territory.inventory']);
        $manageTerritory = Permission::create(['name' => 'territory.manage']);
        $resetExp = Permission::create(['name' => 'exp.reset']);
        $manageUsers = Permission::create(['name' => 'users.manage']);
        $modifyPortal = Permission::create(['name' => 'portal.manage']);
        $modifyRoles = Permission::create(['name' => 'roles.mange']);

        $higherAdmin->givePermissionTo($territoryInventory);
        $higherAdmin->givePermissionTo($manageTerritory);
        $higherAdmin->givePermissionTo($resetExp);
        $higherAdmin->givePermissionTo($manageUsers);
        $higherAdmin->givePermissionTo($modifyPortal);
        $higherAdmin->givePermissionTo($modifyRoles);

        $seniorAdmin->givePermissionTo($territoryInventory);
        $seniorAdmin->givePermissionTo($manageTerritory);
        $seniorAdmin->givePermissionTo($resetExp);

        $admin->givePermissionTo($territoryInventory);
        $admin->givePermissionTo($manageTerritory);
        $admin->givePermissionTo($resetExp);

        Account::find(1)->assignRole($superAdmin);


        return 0;
    }
}
