<?php

namespace App\Http\Livewire\Users;

use App\Models\Unit;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $email, $user_id, $nip, $unit_id, $level, $role_id;
    public $role, $unit;
    public $search = '';
    public $isOpen = 0;
    public $active = 1;

    public function mount()
    {
        $this->role = Role::orderBy('name', 'ASC')->get();
        $this->unit = Unit::orderBy('name', 'ASC')->get();
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|min:6',
            'email' => ['required', 'email', "unique:users,email, $this->user_id"],
            'nip' => ['required', 'numeric', 'digits_between:3,18', "unique:users,nip, $this->user_id"],
            'unit_id' => ['required', 'numeric'],
            'level' => ['required', 'numeric'],
            'role_id' => ['required', 'numeric'],
            'active' => ['required', 'numeric'],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveStudent()
    {
        $validatedData = $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'nip' => $this->nip,
            'unit_id' => $this->unit_id,
            'level' => $this->level,
            'role_id' => $this->role_id,
            'active' => $this->active,
            'password' => Hash::make('password123')
        ]);
        $user = User::where('email', $this->email)->first();
        $user->assignRole($this->role_id);
        $this->closeModal();
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->emit('success', ['pesan' => 'User berhasil ditambahkan']);
    }

    public function editStudent(int $user_id)
    {
        $this->resetInput();
        $this->dispatchBrowserEvent('show-edit-modal');

        $user = User::find($user_id);
        // dd($user);
        if ($user) {
            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->nip = $user->nip;
            $this->unit_id = $user->unit_id;
            $this->level = $user->level;
            $this->role_id = $user->role_id;
            $this->active = $user->active;
        } else {
            return redirect()->route('user.index');
        }
    }

    public function updateStudent()
    {
        $validatedData = $this->validate();

        User::where('id', $this->user_id)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'nip' => $validatedData['nip'],
            'unit_id' => $validatedData['unit_id'],
            'level' => $validatedData['level'],
            'role_id' => $validatedData['role_id'],
            'active' => $validatedData['active']
        ]);
        $user = User::find($this->user_id);
        $user->syncRoles($this->role_id);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->emit('success', ['pesan' => 'User Updated Successfully']);
    }

    public function deleteStudent(int $user_id)
    {
        $this->user_id = $user_id;

        $this->resetInput();
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function destroyStudent()
    {
        User::find($this->user_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->emit('success', ['pesan' => 'User Deleted Successfully']);
    }

    public function create()
    {
        $this->resetInput();
        // $this->openModal();
        $this->dispatchBrowserEvent('show-add-modal');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->nip = '';
        $this->unit_id = '';
        $this->role_id = '';
        $this->active = 1;
        $this->level = '';
    }

    public function render()
    {
        $data = User::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.users.index', compact('data'));
    }
}
