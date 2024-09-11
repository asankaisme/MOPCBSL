<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view_letters',
            'add_letters',
            'edit_letters',
            'delete_letters',
            'view_assets',
            'add_assets',
            'edit_assets',
            'delete_assets',
            'view_requestMenu',
            'view_gatepass',
            'add_gatepass',
            'edit_gatepass',
            'delete_gatepass',
            'verify_gatepass',
            'approve_gatepass',
            'view_cabVouchers',
            'add_cabVouchers',
            'edit_cabVouchers',
            'delete_cabVouchers',
            'issue_cabVouchers',
            'verify_cabVouchers',
            'approve_cabVouchers',
            'view_visitorPermission',
            'add_visitorPermission',
            'edit_visitorPermission',
            'delete_visitorPermission',
            'verify_visitorPermission',
            'approve_visitorPermission',
            'view_repairLog',
            'add_repairLog',
            'edit_repairLog',
            'delete_repairLog',
            'verify_repairLog',
            'approve_repairLog',
            'view_masterdata',
            'add_masterdata',
            'edit_masterdata',
            'delete_masterdata',
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',
            'view_permissions',
            'add_permissions',
            'edit_permissions',
            'delete_permissions',
        ];

        //all permissions will be recorded in the db table
        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }

        Role::create(['name' => 'Super Admin']);

        // role specific permission

        $adminOfficerRole = Role::create(['name' => 'Admin_Officer']);

        $adminOfficerPermissions = [
            'view_letters',
            'add_letters',
            'edit_letters',
            'delete_letters',
            'view_assets',
            'add_assets',
            'edit_assets',
            'view_gatepass',
            'add_gatepass',
            'edit_gatepass',
            'delete_gatepass',
            'verify_gatepass',
            'approve_gatepass',
            'issue_cabVouchers',
            'view_requestMenu',
            'view_visitorPermission',
            'add_visitorPermission',
            'edit_visitorPermission',
            'delete_visitorPermission',
            'verify_visitorPermission',
            'approve_visitorPermission',
            'view_repairLog',
            'approve_repairLog',
            'view_masterdata',
            'add_masterdata',
            'edit_masterdata',
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',
            'view_permissions',
            'add_permissions',
            'edit_permissions',
            'delete_permissions',
        ];

        foreach($adminOfficerPermissions as $permission){
            $adminOfficerRole->givePermissionTo($permission);
        }

        $approveUserRole = Role::create(['name' => 'Approving_Officer']);

        $approveUserPermissions = [
            'view_letters',
            'view_assets',
            'view_requestMenu',
            'view_gatepass',
            'approve_gatepass',
            'view_visitorPermission',
            'approve_visitorPermission',
            'view_repairLog',
            'approve_repairLog',
            'view_masterdata',
        ];

        foreach($approveUserPermissions as $permission)
        {
            $approveUserRole->givePermissionTo($permission);
        }

        $helpdeskOfficerRole = Role::create(['name' => 'Helpdesk_Officer']);

        $helpdeskOfficerPermission = [
            'view_letters',
            'add_letters',
            'edit_letters',
            'delete_letters',
            'view_assets',
            'add_assets',
            'edit_assets',
            'view_requestMenu',
            'view_gatepass',
            'add_gatepass',
            'edit_gatepass',
            'delete_gatepass',
            'verify_gatepass',
            'view_visitorPermission',
            'add_visitorPermission',
            'edit_visitorPermission',
            'delete_visitorPermission',
            'verify_visitorPermission',
            'view_repairLog',
            'add_repairLog',
            'edit_repairLog',
            'delete_repairLog',
            'verify_repairLog',
            'approve_repairLog',
            'view_masterdata',
        ];     
        
        foreach ($helpdeskOfficerPermission as $permission) {
            $helpdeskOfficerRole->givePermissionTo($permission);
        }

        $technicalOfficerRole = Role::create(['name' => 'Technical_Officer']);

        $technicalOfficerPermissions = [
            'view_requestMenu',
            'view_gatepass',
            'add_gatepass',
            'edit_gatepass',
            'delete_gatepass',
            'view_visitorPermission',
            'add_visitorPermission',
            'edit_visitorPermission',
            'delete_visitorPermission',
            'view_repairLog',
            'add_repairLog',
            'edit_repairLog',
            'delete_repairLog',
        ];

        foreach ($technicalOfficerPermissions as $permission) {
            $technicalOfficerRole->givePermissionTo($permission);
        }

        $guestUserRole = Role::create(['name' => 'Guest']);

        $guestUserPermissions = [
            'view_letters',
            'view_assets',
            'view_requestMenu',
            'view_gatepass',
            'view_visitorPermission',
            'view_repairLog',
            'view_masterdata',
        ];

        foreach ($guestUserPermissions as $permissions) {
            $guestUserRole->givePermissionTo($permission);
        }
    }
}
