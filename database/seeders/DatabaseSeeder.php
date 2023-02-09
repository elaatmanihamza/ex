<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Metier;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Metier::factory(10)->create();

         $user1=User::factory()->create([
            'name' => 'admin ',
            'email' => 'admin@example.com',
        ]);
        $user2=User::factory()->create([
            'name' => 'user ',
            'email' => 'user@example.com',
        ]);
        $role = Role::create(['name'=>'super-admin']);
        $role1 = Role::create(['name'=>'admin']);
        $user1->assignRole($role);
        $user2->assignRole($role1);
    }
}
