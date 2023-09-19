<?php

namespace Tests\Unit;

use App\Models\Role;
use App\Models\User;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_creation()
    {
        $role = new Role();
        $role->name = "Testing role";
        $role->save();

        $this->assertNotNull(
            $role->id,
            "Role ID should have changed for the ID created by Elocuent"
        );

        $obtained_role = Role::find($role->id);
        $role->delete();
        $this->assertEquals(
            $role->id,
            $obtained_role->id,
            "Obtained role from DB should have same ID as inserted role"
        );
        $this->assertEquals(
            $role->name,
            $obtained_role->name,
            "Obtained role from DB should have same name as inserted role"
        );
    }

    public function test_user_relation() {

        $role = new Role();
        $role->name = "Testing role";
        $role->save();

        $this->assertNotNull(
            $role->id,
            "Role ID should have changed for the ID created by Elocuent"
        );

        $user1 = new User();
        $user1->email = "test@test.com";
        $user1->name = "Mr. Test";
        $user1->password = "1234567";
        $user1->role_id = $role->id;
        $user1->save();

        $this->assertNotNull(
            $user1->id,
            "Unable to create user"
        );

        $user2 = new User();
        $user2->email = "test2@test.com";
        $user2->name = "Mr. Test";
        $user2->password = "1234567";
        $user2->role_id = $role->id;
        $user2->save();

        $this->assertNotNull(
            $user2->id,
            "Unable to create user"
        );

        $users = $role->users;
        $this->assertTrue($users->contains($user1));
        $this->assertTrue($users->contains($user2));
        $role->delete();
        $user1->delete();
        $user2->delete();
    }

    public function test_nullify_userrole_ondelete() {
        $role = new Role();
        $role->name = "Testing role";
        $role->save();

        $this->assertNotNull(
            $role->id,
            "Role ID should have changed for the ID created by Elocuent"
        );

        $user1 = new User();
        $user1->email = "test@test.com";
        $user1->name = "Mr. Test";
        $user1->password = "1234567";
        $user1->role_id = $role->id;
        $user1->save();

        $this->assertNotNull(
            $user1->id,
            "Unable to create user"
        );

        $role->delete();
        $this->assertNull($user1->role);
        $user1->delete();
    }
}
