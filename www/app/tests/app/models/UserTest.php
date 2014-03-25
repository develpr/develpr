<?php

use Develpr\User;
use Way\Tests\Assert;

class UserTest extends TestCase{

	public function tearDown()
	{
		Mockery::close();
	}

	public function testCanBeLoaded()
	{
		$this->assertInstanceOf('Develpr\User', new User);
	}

	public function testGetsFullName()
	{
		$user = new User;
		$user->first_name = "Kevin";
		$user->last_name = "Mitchell";

		$this->assertEquals('Kevin Mitchell', $user->getFullName());
	}

	public function testCanGenerateApiKey()
	{
		$user = Mockery::mock('Develpr\User')->makePartial();
		$user->shouldReceive('save')->once();

		$user->refreshApiKey();

		Assert::notEmpty($user->api_key);

	}

	public function testApiKeyIsLowerCase()
	{
		$user = Mockery::mock('Develpr\User')->makePartial();
		$user->shouldReceive('save')->once();

		$user->refreshApiKey();

		Assert::same($user->api_key, strtolower($user->api_key));
	}

	public function testRefreshApiKeyChangesKey()
	{
		$user = Mockery::mock('Develpr\User')->makePartial();
		$user->shouldReceive('save')->times(2);

		$user->refreshApiKey();

		$apiKey = $user->api_key;

		$user->refreshApiKey();

		Assert::notSame($apiKey, $user->api_key);
	}

	public function testApiKeySetOnRedis()
	{

		$user = Mockery::mock('Develpr\User')->makePartial();
		$user->shouldReceive('save')->once();
		$user->id = 5;

		Redis::shouldReceive('set')->once();

		$user->refreshApiKey();

	}

}