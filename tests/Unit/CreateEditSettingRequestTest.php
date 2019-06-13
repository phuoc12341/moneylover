<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\Requests\Social\SocialCreateRequest;
use Symfony\Component\HttpFoundation\ParameterBag;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Arr;
use App\Models\Social;
use Mockery;

class CreateEditSocialRequestTest extends TestCase
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

    public function testCreateSocialWithInvalidUrl()
    {
        $data = [
            'url' => 'jkdfghdf',
            'icon' => 'jkdfghdf',
        ];

        $request = new SocialCreateRequest();

        $request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
        $this->app->instance('request', $request);

        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        try {
            $request->validateResolved();
        } catch(ValidationException $e) {
            $errorMessage = Arr::get($e->errors(), 'url.0');
            $this->assertSame($errorMessage, __('validation.url', ['attribute' => 'url']));
        }
    }

    public function testCreateSocialWithoutUrl()
    {
        $data = [
            'icon' => 'gsdfgsdf',
        ];

        $request = new SocialCreateRequest();

        $request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
        $this->app->instance('request', $request);

        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        try {
            $request->validateResolved();
        } catch(ValidationException $e) {
            $errorMessage = Arr::get($e->errors(), 'url.0');
            $this->assertSame($errorMessage, __('messages.url_required'));
        }
    }

    public function testCreateSocialWithUrlHasBeenExisted()
    {
        $socialExisted = Social::all()->first();

        $data = [
            'url' => $socialExisted->url,
            'icon' => 'gsdfgsdf',
        ];

        $request = new SocialCreateRequest();

        $request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
        $this->app->instance('request', $request);

        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        try {
            $request->validateResolved();
        } catch(ValidationException $e) {
            $errorMessage = Arr::get($e->errors(), 'url.0');
            $this->assertSame($errorMessage, __('validation.unique', ['attribute' => 'url']));
        }
    }

    public function testCreateSocialWithoutIcon()
    {
        $data = [
            'url' => 'fbgkjhkjh',
        ];

        $request = new SocialCreateRequest();

        $request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
        $this->app->instance('request', $request);

        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        try {
            $request->validateResolved();
        } catch(ValidationException $e) {
            $errorMessage = Arr::get($e->errors(), 'icon.0');
            $this->assertSame($errorMessage, __('validation.required', ['attribute' => 'icon']));
        }
    }

    public function testCreateSocialWithIconHasBeenExisted()
    {
        $socialExisted = Social::all()->first();
        $data = [
            'url' => 'fbgkjhkjh',
            'icon' => $socialExisted->icon,
        ];

        $request = new SocialCreateRequest();

        $request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
        $this->app->instance('request', $request);

        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        try {
            $request->validateResolved();
        } catch(ValidationException $e) {
            $errorMessage = Arr::get($e->errors(), 'icon.0');
            $this->assertSame($errorMessage, __('validation.unique', ['attribute' => 'icon']));
        }
    }

    public function testCreateSocialWithIconExceedMaxLength()
    {
        $data = [
            'url' => 'fbgkjhkjh',
            'icon' => 'cgsdfgdfgsdfgsdsdffjcgsdvsdfvfgsdfgdffgdsfg',
        ];

        $request = new SocialCreateRequest();

        $request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
        $this->app->instance('request', $request);

        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        try {
            $request->validateResolved();
        } catch(ValidationException $e) {
            $errorMessage = Arr::get($e->errors(), 'icon.0');
            $this->assertSame($errorMessage, __('validation.max.string', ['attribute' => 'icon', 'max' => 20]));
        }
    }

    public function testUpdateSocialWithoutUrl()
    {
        $data = [
            'icon' => 'cgsdfgdfgsdfgsdsdffjcgsdfgsdfgdffgdsfg',
        ];

        $request = new SocialCreateRequest();

        $request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
        $this->app->instance('request', $request);

        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        try {
            $request->validateResolved();
        } catch(ValidationException $e) {
            $errorMessage = Arr::get($e->errors(), 'url.0');
            $this->assertSame($errorMessage, __('messages.url_required'));
        }
    }

    public function testUpdateSocialWithInvalidUrl()
    {
        $data = [
            'url' => 'jkdfghdf',
            'icon' => 'jkdfghdf',
        ];

        $request = new SocialCreateRequest();

        $request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
        $this->app->instance('request', $request);

        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        try {
            $request->validateResolved();
        } catch(ValidationException $e) {
            $errorMessage = Arr::get($e->errors(), 'url.0');
            $this->assertSame($errorMessage, __('validation.url', ['attribute' => 'url']));
        }
    }

    public function testUpdateSocialWithUrlHasBeenExisted()
    {
        $socialExisted = Social::all()->first();

        $data = [
            'url' => $socialExisted->url,
            'icon' => 'gsdfgsdf',
        ];

        $request = new SocialCreateRequest();

        $request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
        $this->app->instance('request', $request);

        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        try {
            $request->validateResolved();
        } catch(ValidationException $e) {
            $errorMessage = Arr::get($e->errors(), 'url.0');
            $this->assertSame($errorMessage, __('validation.unique', ['attribute' => 'url']));
        }
    }

    public function testUpdateSocialWithoutIcon()
    {
        $data = [
            'url' => 'fbgkjhkjh',
        ];

        $request = new SocialCreateRequest();

        $request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
        $this->app->instance('request', $request);

        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        try {
            $request->validateResolved();
        } catch(ValidationException $e) {
            $errorMessage = Arr::get($e->errors(), 'icon.0');
            $this->assertSame($errorMessage, __('validation.required', ['attribute' => 'icon']));
        }
    }

    public function testUpdateSocialWithIconHasBeenExisted()
    {
        $socialExisted = Social::all()->first();
        $data = [
            'url' => 'fbgkjhkjh',
            'icon' => $socialExisted->icon,
        ];

        $request = new SocialCreateRequest();

        $request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
        $this->app->instance('request', $request);

        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        try {
            $request->validateResolved();
        } catch(ValidationException $e) {
            $errorMessage = Arr::get($e->errors(), 'icon.0');
            $this->assertSame($errorMessage, __('validation.unique', ['attribute' => 'icon']));
        }
    }

    public function testUpdateSocialWithIconExceedMaxLength()
    {
        $data = [
            'url' => 'fbgkjhkjh',
            'icon' => 'cgsdfgdfgsdfgsdsdffjcgsdfgsdfgdffgdsfg',
        ];

        $request = new SocialCreateRequest();

        $request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
        $this->app->instance('request', $request);

        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        try {
            $request->validateResolved();
        } catch(ValidationException $e) {
            $errorMessage = Arr::get($e->errors(), 'icon.0');
            $this->assertSame($errorMessage, __('validation.max.string', ['attribute' => 'icon', 'max' => 20]));
        }
    }
}
