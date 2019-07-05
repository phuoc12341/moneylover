<?php

namespace Tests\Unit\Repo;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Menu;
use App\Repo\MenuRepository;
use Tests\TestCase;
use Mockery as m;
use Symfony\Component\HttpFoundation\ParameterBag;
use App\Http\Requests\Menu\UpdateMenuRequest;


class MenuRepositoryTest extends TestCase
{
    protected $modelMock;

    public function setUp():void
    {
        $this->afterApplicationCreated(function () {
            $this->modelMock = m::mock($this->app->make(Menu::class));
        });

        parent::setUp();
    }

    public function test_create_repo_function()
    {
        $request = [
            'name' => 'name menu',
            'link' => 'testurl.com',
            'type' => 1,
            'order' => null,
        ];

        $menuRepository = new MenuRepository;

        $menu = $menuRepository->create($request);

        $this->assertDatabaseHas('menus', $menu->toArray());
    }

    // public function test_get_view_edit_repo_function()
    // {
    //     $menu = factory(Menu::class)->make();
    //     dd($menu);
    //     $id = '1';
    //     $menuRepository = new MenuRepository;
    //     $menu = $menuRepository->getViewEdit($id);
    //     $this->assertTrue(true);
    // }



    // public function test_update_menu_repo_function()
    // {
    //     $menu = factory(Menu::class)->make();
    //     dd($menu);
    //     $data = [
    //         'name' => 'update menu',
    //         'link' => 'yputobe.com',
    //         'type' => 2,
    //         'order' => null,
    //     ];
    //     $id = '3';
    //     $menuRepository = new MenuRepository;
    //     $menu = $menuRepository->updateMenu($data, $id);
    //     $this->assertDatabaseHas('menus', $menu->toArray());

    // }

   //  public function test_destroy_menu_repo_funtion()
   //  {
   //     $menu = factory(Menu::class)->make();
   //     dd($menu);
   //     $menuRepository = new MenuRepository;
   //     $data = $menuRepository->deleteMenu($menu->id);
   //     dd($data);
   //     $this->assertDatabaseMissing('menus', $menu->toArray());

   // }

}