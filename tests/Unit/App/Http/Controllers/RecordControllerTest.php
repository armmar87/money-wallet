<?php

namespace App\Http\Controllers;

use Mockery;
use Tests\Unit\BaseTestCase;


class RecordControllerTest extends BaseTestCase
{
    private $model;

    protected function mockeryTestSetUp()
    {
        parent::mockeryTestSetUp();
        $this->SUT = Mockery::mock(RecordController::class)->shouldAllowMockingProtectedMethods()->makePartial();
        $this->model = Mockery::mock('overload:App\Models\Record');
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

        $this->model->shouldReceive('with')
            ->once()
            ->with('wallet')
            ->andReturn($this->model)
            ->shouldReceive('get');


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
    public function GIVEN_WHEN_create_THEN_return_view()
    {
        // GIVEN
        $expected = 'view';
        $this->constructMocks();

        $wallet = Mockery::mock('alias:App\Models\Wallet');
        $wallet->shouldReceive('all');


        // WHEN
        $actual = $this->SUT->create();

        // THEN
        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function GIVEN_WHEN_store_THEN_return_view()
    {
        // GIVEN
        $expected = 'route';
        $this->constructMocks();
        $request = Mockery::mock('App\Http\Requests\RecordRequest');
        $request->shouldReceive('all');

        $this->model->shouldReceive('store')->once();


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
    public function GIVEN_WHEN_edit_THEN_return_view()
    {
        // GIVEN
        $expected = 'view';
        $this->constructMocks();

        $wallet = Mockery::mock('alias:App\Models\Wallet');
        $wallet->shouldReceive('all');


        // WHEN
        $actual = $this->SUT->edit($this->model);

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
        $request = Mockery::mock('App\Http\Requests\RecordRequest');
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
