<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Mockery;
use App\Http\Requests\UpdateSlideRequest;
use Symfony\Component\HttpFoundation\ParameterBag;
use App\Http\Controllers\SlideController;
use App\Models\Slide;
use Illuminate\Http\Request;
use App\Repo\SlideRepository;

class SocialControllerTest extends TestCase
{
    /**
     * @var \Mockery\Mock|Repo\StreetRepositoryInterface
     */
    protected $socialRepository;

    protected function setUp(): void
    {
        $this->afterApplicationCreated(function () {
            $this->slideRepository = Mockery::mock(SlideRepository::class);
        });

        parent::setUp();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testListSocial()
    {
        $request = new Request();

        $listSocial = factory(Social::class, 3)->make();

        $this->socialRepository->shouldReceive('getListSocial')
            ->once()
            ->andReturn($listSocial);

        $socialController = new SocialController($this->socialRepository);

        $view = $socialController->index($request);
        $this->assertEquals('socials.index', $view->getName());
        $this->assertArraySubset([
            'listSocial' => $listSocial,
        ], $view->getData());

    }

    public function testUpdateFirstSlide()
    {
        $request = new UpdateSlideRequest();

        $data = [
            'text_logo' => 'sdfghsh',
            'intro' => 'dfgbdfghdfgh',
            'image[0]' => 'dfgbdfgh',
            'button[0]text' => 'dfghdfgh',
            'button[0]color' => 'dfghdf',
            'button[0]link' => 'dfghdg',
            'button[0]icon' => 'dfghfgh',
        ];

        $id = '0';

        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));

        $this->slideRepository->shouldReceive('updateSlide')
            ->once()
            ->andReturn(true);

        $slideController = new SlideController($this->slideRepository);
        $redirectResponse = $slideController->update($request, $id);

        $this->assertEquals(route('slide.index'), $redirectResponse->headers->get('location'));
    }
}
