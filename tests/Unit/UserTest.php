<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Role;

class UserTest extends TestCase
{
    public function test_create_user()
    {
        $userTest = new User();
        $userTest->name = 'User Test';
        $userTest->email = 'test1@test.com';
        $userTest->password = '122345678';
        $userTest->save();

        $this->assertEquals('User Test', $userTest->name);

        $userTest->delete();

    }
    public function test_create_user_with_role()
    {
        $role_test = new Role();
        $role_test->name = 'Jefe de test';
        $role_test->save();

        $userTest = new User();
        $userTest->name = 'Test';
        $userTest->email = 'test@test.com';
        $userTest->password = '12345678';
        $userTest->role_id = $role_test->id;
        $userTest->save();

        $this->assertEquals('Jefe de test', $userTest->role->name);

        $userTest->delete();
        $role_test->delete();
    }
}
