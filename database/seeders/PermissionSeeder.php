<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Permission::updateOrCreate(['name'=>'view permohonan']);
        // Permission::updateOrCreate(['name'=>'create permohonan']);
        // Permission::updateOrCreate(['name'=>'edit permohonan']);
        // Permission::updateOrCreate(['name'=>'delete permohonan']);

        // Permission::updateOrCreate(['name'=>'urusetia approve permohonan']);
        // Permission::updateOrCreate(['name'=>'urusetia rejected permohonan']);

        // Permission::updateOrCreate(['name'=>'pelulus approve permohonan']);
        // Permission::updateOrCreate(['name'=>'pelulus rejected permohonan']);

        // $role_admin = Role::findByName('admin');
        // $role_admin->givePermissionTo('view permohonan');
        // $role_admin->givePermissionTo('create permohonan');
        // $role_admin->givePermissionTo('edit permohonan');
        // $role_admin->givePermissionTo('delete permohonan');
        // $role_admin->givePermissionTo('urusetia approve permohonan');
        // $role_admin->givePermissionTo('urusetia rejected permohonan');
        // $role_admin->givePermissionTo('pelulus approve permohonan');
        // $role_admin->givePermissionTo('pelulus rejected permohonan');

        // $role_urusetia = Role::findByName('urusetia');
        // $role_urusetia->givePermissionTo('view permohonan');
        // $role_urusetia->givePermissionTo('create permohonan');
        // $role_urusetia->givePermissionTo('edit permohonan');
        // $role_urusetia->givePermissionTo('delete permohonan');
        // $role_urusetia->givePermissionTo('urusetia approve permohonan');
        // $role_urusetia->givePermissionTo('urusetia rejected permohonan');

        // $role_user = Role::findByName('user');
        // $role_user->givePermissionTo('view permohonan');
        // $role_user->givePermissionTo('create permohonan');
        // $role_user->givePermissionTo('edit permohonan');
        // $role_user->givePermissionTo('delete permohonan');

        // $role_pelulus = Role::findByName('pelulus');
        // $role_pelulus->givePermissionTo('view permohonan');
        // $role_pelulus->givePermissionTo('create permohonan');
        // $role_pelulus->givePermissionTo('edit permohonan');
        // $role_pelulus->givePermissionTo('delete permohonan');
        // $role_pelulus->givePermissionTo('pelulus approve permohonan');
        // $role_pelulus->givePermissionTo('pelulus rejected permohonan');

        // $user_admin = User::find(1);
        // $user_admin->assignRole('admin');

        // $user = User::find(16);
        // $user->assignRole('user');

        // $user_urusetia = User::find(17);
        // $user_urusetia->assignRole('urusetia');

        // $user_pelulus = User::find(18);
        // $user_pelulus->assignRole('pelulus');
    }
}
