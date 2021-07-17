<?php


namespace StanDev\Laraplate\Tests;


class RouteTest extends TestCase
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testGetRoutes()
    {
        //$this->disableExceptionHandling();

        $this->visit(route('backend.login'));
        $this->type('admin@example.com', 'email');
        $this->type('password', 'password');
        $this->press(__('Log in'));

        $urls = [
            route('backend.login'),
        ];

        foreach ($urls as $url) {
            $response = $this->call('GET', $url);
            $this->assertEquals(200, $response->status(), $url . ' did not return a 200');
        }
    }

}
