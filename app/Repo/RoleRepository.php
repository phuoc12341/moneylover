<?php

namespace App\Repo;

use App\Models\Role;

class RoleRepository
{
	public function create($data)
	{
		return Role::create($data);
	}
}