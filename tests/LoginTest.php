<?php


namespace StanDev\Laraplate\Tests;


use Illuminate\Support\Facades\Auth;
use StanDev\Laraplate\Models\User;

class LoginTest extends TestCase
{

    public function testSuccessfulLoginWithDefaultCredentials()
    {
        User::factory()->create(['email' => 'admin@example.com']);

        $this->visit(route('backend.login'))
            ->type('admin@example.com', 'email')
            ->type('password', 'password')
            ->press('Log in')
            ->seePageIs(route('backend.dashboard'));
    }

    public function testShowAnErrorMessageWhenITryToLoginWithWrongCredentials()
    {
        session()->setPreviousUrl(route('backend.login'));

        $this->visit(route('backend.login'))
            ->type('john@Doe.com', 'email')
            ->type('pass', 'password')
            ->press('Log in')
            ->seePageIs(route('backend.login'))
            ->see(__('auth.failed'))
            ->seeInField('email', 'john@Doe.com');
    }

    //public function testRedirectIfLoggedIn()
    //{
    //    Auth::loginUsingId(1);
    //
    //    $this->visit(route('backend.login'))
    //        ->seePageIs(route('backend.dashboard'));
    //}

    public function testRedirectIfNotLoggedIn()
    {
        $this->visit(route('backend.dashboard'))
            ->seePageIs(route('backend.login'));
    }

    public function testCanLogout()
    {
        Auth::loginUsingId(1);

        $this->visit(route('backend.dashboard'))
            ->press(__('Logout'))
            ->seePageIs(route('backend.login'));
    }

}
