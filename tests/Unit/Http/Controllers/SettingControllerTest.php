<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Connection;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\ParameterBag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\SettingController;
use App\Models\Setting;
use Mockery as m;

class SettingControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected $db;

    protected $settingMock;


    public function test_create_return_view()
    {
    	$controller = new SettingController();
    	$view = $controller->create();

    	$this->assertEquals('setting.update_or_create', $view->getName());
    }

    public function test_index_return_view()
    {
    	$controller = new SettingController();
    	$view = $controller->index();
    	
    	$this->assertArrayHasKey('listSetting', $view->getData());
    }
}
