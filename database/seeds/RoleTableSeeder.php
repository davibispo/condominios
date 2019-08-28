<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $role_employee = new Role();
        $role_employee->name = 'adm';
        $role_employee->description = 'Administrador';
        $role_employee->save();

    }

}
