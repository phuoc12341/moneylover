<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\Requests\SettingRequest;
use Symfony\Component\HttpFoundation\ParameterBag;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Arr;
use App\Models\Setting;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SettingRequestTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_it_contains_valid_rules()
    {
    	$r = new SettingRequest();

    	$this->assertEquals([
    		'site_name' => 'required|max:255',
    		'email' => 'required|email',
    		'phone'=> 'required|numeric',
    		'address' => 'required|min:5|max:255',
    		'first_logo' => 'image|max:2048',
    		'not_first_logo' => 'image|max:2048',
    	], $r->rules());
    }

    public function testSiteNamRequired()
    {
    	$request = new SettingRequest();
    	$request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
    	$this->app->instance('request', $request);
    	try {
    		$request->validateResolved();
    	} catch(ValidationException $e) {

    		$errorMessage = Arr::get($e->errors(), 'site_name')[0];
    		$this->assertSame($errorMessage, trans('messages.site_name_required'));
    	}
    }

    public function testEmailRequired()
    {
    	$request = new SettingRequest();
    	$request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
    	$this->app->instance('request', $request);
    	try {
    		$request->validateResolved();
    	} catch(ValidationException $e) {

    		$errorMessage = Arr::get($e->errors(), 'email')[0];
    		$this->assertSame($errorMessage, trans('messages.email_required'));
    	}
    }

    public function testPhoneRequired()
    {
    	$request = new SettingRequest();
    	$request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
    	$this->app->instance('request', $request);
    	try {
    		$request->validateResolved();
    	} catch(ValidationException $e) {

    		$errorMessage = Arr::get($e->errors(), 'phone')[0];
    		$this->assertSame($errorMessage, trans('messages.phone_required'));
    	}
    }

    public function testAddressRequired()
    {
    	$request = new SettingRequest();
    	$request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
    	$this->app->instance('request', $request);
    	try {
    		$request->validateResolved();
    	} catch(ValidationException $e) {
    		$errorMessage = Arr::get($e->errors(), 'address')[0];
    		$this->assertSame($errorMessage, trans('messages.address_required'));
    	}
    }

    public function testSiteMaxFail()
    {

    	$request = new SettingRequest();
    	$request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
    	$this->app->instance('request', $request);
    	$request->merge([
    		'site_name' => str_random(300),
    	]);
    	try {
    		$request->validateResolved(); 
    	} catch(ValidationException $e) {

    		$errorMessage = Arr::get($e->errors(), 'site_name')[0];;
    		$this->assertSame($errorMessage, trans('messages.site_name_max'));
    	}
    }

    public function testemailIsValid()
    {

    	$request = new SettingRequest();
    	$request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
    	$this->app->instance('request', $request);
    	$request->merge([
    		'email' => 'bwbwsbseerere.com',
    	]);
    	try {
    		$request->validateResolved(); 
    	} catch(ValidationException $e) {
    		$errorMessage = Arr::get($e->errors(), 'email')[0];;
    		$this->assertSame($errorMessage, trans('messages.email_email'));
    	}
    }

    public function testPhoneIsValid()
    {

    	$request = new SettingRequest();
    	$request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
    	$this->app->instance('request', $request);
    	$request->merge([
    		'phone' => 'bwbwsbseeresbfsdf',
    	]);
    	try {
    		$request->validateResolved(); 
    	} catch(ValidationException $e) {
    		$errorMessage = Arr::get($e->errors(), 'phone')[0];;
    		$this->assertSame($errorMessage, trans('messages.phone_numeric'));
    	}
    }

    public function testAddressMinFail()
    {

    	$request = new SettingRequest();
    	$request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
    	$this->app->instance('request', $request);
    	$request->merge([
    		'address' => 'er',
    	]);
    	try {
    		$request->validateResolved(); 
    	} catch(ValidationException $e) {
    		$errorMessage = Arr::get($e->errors(), 'address')[0];;
    		$this->assertSame($errorMessage, trans('messages.address_min'));
    	}
    }

    public function testAddressMaxFail()
    {

    	$request = new SettingRequest();
    	$request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
    	$this->app->instance('request', $request);
    	$request->merge([
    		'address' => str_random(300),
    	]);
    	try {
    		$request->validateResolved(); 
    	} catch(ValidationException $e) {
    		$errorMessage = Arr::get($e->errors(), 'address')[0];;
    		$this->assertSame($errorMessage, trans('messages.address_max'));
    	}
    }

    public function testFileFail()
    {

    	$request = new SettingRequest();
    	$request->setContainer($this->app)->setRedirector($this->app->make(Redirector::class));
    	$this->app->instance('request', $request);
    	$request->merge([
    		'first_logo' => 'default',
    	]);
    	try {
    		$request->validateResolved(); 
    	} catch(ValidationException $e) {
    		$errorMessage = Arr::get($e->errors(), 'first_logo')[0];;
    		$this->assertSame($errorMessage, trans('messages.first_logo_image'));
    	}
    }
}
