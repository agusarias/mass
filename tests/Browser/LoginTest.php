<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'admin@test.com')
                ->type('password', '123456')
                ->press('Login')
                ->assertPathIs('/home');
        });
    }

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHome()
    {
        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                ->visit('/home')
                ->assertPathIs('/home');
        });
    }
}
