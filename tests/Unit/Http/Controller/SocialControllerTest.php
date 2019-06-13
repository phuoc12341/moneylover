<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Mockery;
use App\Http\Requests\Social\SocialCreateRequest;
use Symfony\Component\HttpFoundation\ParameterBag;
use App\Http\Controllers\SocialController;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testCreateSocial()
    {
        $request = new SocialCreateRequest();
        $socialController = new SocialController();

        $data = [
            'url' => 'fbgkjhkjh',
            'icon' => 'cgsdfgdfgsdfgsdsdffjcgsdfgsdfgdffgdsfg',
        ];

        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));

        $view = $socialController->store($request);
        $this->assertEquals(route('social.index'), $view->headers->get('Location'));
    }

    public function testSocialReturnViewIndex()
    {
        $request = new Request();
        $socialController = new SocialController();

        $request->headers = ['content-type', 'application/json'];

        $view = $socialController->index();

        $this->assertEquals('socials.index', $view->getName());
    }

    public function testSocialReturnViewCreate()
    {
        $request = new Request();
        $socialController = new SocialController();

        $request->headers = ['content-type', 'application/json'];

        $view = $socialController->create();

        $this->assertEquals('socials.create', $view->getName());
    }
}
