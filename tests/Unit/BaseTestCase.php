<?php

namespace Tests\Unit {

    use Mockery;
    use Mockery\Adapter\Phpunit\MockeryTestCase;

    abstract class BaseTestCase extends MockeryTestCase
    {
        public $SUT;
        public static $env;
        public static $response;

        protected function mockeryTestSetUp()
        {
            parent::mockeryTestSetUp();
            self::$env = env('APP_ENV');
            self::$response = Mockery::mock('App\Http\Response');
        }
    }
}

namespace App\Http\Controllers {

    use App\Models\User;

    function view()
    {
        return 'view';
    }

    function redirect()
    {
        return new RedirectStub;
    }

    function auth()
    {
        return new UserStub;
    }

    class RedirectStub
    {
        public function route($key)
        {
            return 'route';
        }
    }

    class UserStub
    {
        public function user()
        {
            return (object)['first_time' => 1, 'id' => 1];
        }
    }
}
