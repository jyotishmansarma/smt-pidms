<?php

namespace App\Http\Livewire;

use App\Models\Circle;
use App\Models\Division;
use App\Models\IssueType;
use App\Models\Role;
use App\Models\userType;
use App\Models\Zone;
use Livewire\Component;

class RegisterForm extends Component
{
    public $user_type='';
    public $user_role;
    public function updateduser_type($value)
    {
        return $value;
    }
    public function render()
    {

        $roles = Role::get();
        $zones = Zone::get();
        $issuetypes = IssueType::get();
        $usertypes = userType::get();
        $division=Division::select('id','division_name')->get();
        $circle=Circle::get();
        return view('livewire.register-form',compact('roles', 'zones', 'issuetypes','usertypes','division','circle'));
    }

}
