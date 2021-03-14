<?php

namespace App\Http\Controllers;

use Mockery;
use Tests\Unit\BaseTestCase;


class WalletControllerTest extends BaseTestCase
{
    private $model;

    protected function mockeryTestSetUp()
    {
        parent::mockeryTestSetUp();
        $this->SUT = Mockery::mock(WalletController::class)->shouldAllowMockingProtectedMethods()->makePartial();
        $this->model = Mockery::mock('overload:App\Models\Wallet');
    }

    /**
     * @test
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function GIVEN_WHEN_construct()
    {
        $this->constructMocks();

        $this->assertEquals(true, true);
    }

    private function constructMocks()
    {
        $this->SUT->__construct($this->model);
    }

    /**
     * @test
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function GIVEN_WHEN_index_THEN_return_view()
    {
        // GIVEN
        $expected = 'view';
        $this->constructMocks();

        $this->model->shouldReceive('all');


        // WHEN
        $actual = $this->SUT->index();

        // THEN
        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function GIVEN_user_first_time_WHEN_store_THEN_return_view()
    {
        // GIVEN
        $expected = 'route';
        $this->constructMocks();
        $request = Mockery::mock('App\Http\Requests\WalletRequest');
        $request->shouldReceive('merge')
            ->once('all')
            ->andReturn($request)
            ->shouldReceive('all');

        $this->model->shouldReceive('store');


        // WHEN
        $actual = $this->SUT->store($request);

        // THEN
        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function GIVEN_WHEN_update_THEN_return_view()
    {
        // GIVEN
        $expected = 'route';
        $this->constructMocks();
        $request = Mockery::mock('App\Http\Requests\WalletRequest');
        $request->shouldReceive('all');

        $this->model->shouldReceive('store')->once();


        // WHEN
        $actual = $this->SUT->update($request, $this->model);

        // THEN
        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function GIVEN_WHEN_destroy_THEN_return_view()
    {
        // GIVEN
        $expected = 'route';
        $this->constructMocks();

        $this->model->shouldReceive('delete');

        // WHEN
        $actual = $this->SUT->destroy($this->model);

        // THEN
        $this->assertEquals($expected, $actual);
    }

}
