<?php

namespace App\Http\Livewire;

use App\Models\Circle;
use App\Models\Division;
use App\Models\IssueType;
use App\Models\Role;
use App\Models\userType;
use App\Models\Zone;
use Livewire\Component;

class UserCreateForm extends Component
{

    public $user_role;
    public function render()
    {
        $roles = Role::get();
        return view('livewire.user-create-form', compact('roles'));
    }
}
