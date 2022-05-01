<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\Permission;
use App\Models\Role;

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
        if (!User::find(1)) {
            $superAdminUser = User::create([
                'name' => config('portal.saName'),
                'email' => config('portal.saMail'),
                'password' => Hash::make(config('portal.saPass'))
            ]);
        }

        $superAdmin = $this->call('permission:create-role', [
            'name' => 'Super Admin'
        ]);

        $this->call('permission:create-permission', [
            'name' => 'territory.inventory'
        ]);
        $this->call('permission:create-permission', [
            'name' => 'territory.manage'
        ]);
        $this->call('permission:create-permission', [
            'name' => 'exp.reset'
        ]);
        $this->call('permission:create-permission', [
            'name' => 'users.manage'
        ]);
        $this->call('permission:create-permission', [
            'name' => 'portal.manage'
        ]);
        $this->call('permission:create-permission', [
            'name' => 'roles.manage'
        ]);
        $this->call('permission:create-permission', [
            'name' => 'clans.manage'
        ]);

        User::find(1)->assignRole('Super Admin');
        $this->call('permission:cache-reset');
        return 0;
    }
}
