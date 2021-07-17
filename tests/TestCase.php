<?php


namespace StanDev\Laraplate\Tests;

use Illuminate\Testing\TestResponse;
//use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

use StanDev\Laraplate\Laraplate;

use Illuminate\Contracts\Debug\ExceptionHandler;
//use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Orchestra\Testbench\Concerns\CreatesApplication;
use StanDev\Laraplate\LaraplateServiceProvider;

class TestCase extends BaseTestCase
{

    use CreatesApplication;

    /**
     * setUp
     */
    public function setUp(): void
    {
        parent::setUp();

        if (!is_dir(base_path('routes'))) {
            mkdir(base_path('routes'));
        }

        if (!file_exists(base_path('routes/web.php'))) {
            file_put_contents(
                base_path('routes/web.php'),
                "<?php Route::get('/', function () {return view('welcome');});"
            );
        }

        // Orchestra Testbench does not contain this file and can't create autoload without
        if (!is_dir(base_path('tests/'))) {
            mkdir(base_path('tests/'));

            file_put_contents(
                base_path('tests/TestCase.php'),
                "<?php\n\n"
            );
        }

        $this->app->make('Illuminate\Contracts\Http\Kernel')->pushMiddleware('Illuminate\Session\Middleware\StartSession');
        $this->app->make('Illuminate\Contracts\Http\Kernel')->pushMiddleware('Illuminate\View\Middleware\ShareErrorsFromSession');

        //$this->install();
    }


    /**
     * getEnvironmentSetUp
     *
     * @param $app
     */
    public function getEnvironmentSetUp($app)
    {
        // import the CreatePostsTable class from the migration
        include_once __DIR__ . '/../database/migrations/2021_07_16_000000_create_users_table.php';
        include_once __DIR__ . '/../database/migrations/2021_07_16_000000_add_columns_to_users_table.php';

        // run the up() method of that migration class
        (new \CreateUsersTable())->up();
        (new \AddColumnsToUsersTable())->up();
    }

    /**
     * Visit the given URI with a GET request.
     *
     * @param string $uri
     *
     * @return TestCase
     */
    public function visit($uri): TestCase
    {
        if (is_callable('parent::visit')) {
            return parent::visit($uri);
        }

        return $this->get($uri);
    }

    /*
     * Disable exception handling
     */
    public function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new DisabledTestException());
    }

    protected function getPackageProviders($app): array
    {
        return [
            LaraplateServiceProvider::class,
        ];
    }
}
