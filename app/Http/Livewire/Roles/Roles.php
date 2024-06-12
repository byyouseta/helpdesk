<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $role_name, $role_id, $permission_id;
    public $search, $search_permission, $search_permission_select = '';
    public $tombolMulti = 'Save';
    public $isOpen = false;
    // public $rolePermissions = [];

    protected function rules()
    {
        return [
            'role_name' => ['required', "unique:roles,name, $this->role_id"],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function simpan()
    {
        $this->validate();

        Role::updateOrCreate(
            ['id' => $this->role_id],
            ['name' => $this->role_name]
        );

        $this->resetInput();
    }

    public function edit(int $role_id)
    {

        $data = Role::find($role_id);
        // dd($user);
        if ($data) {
            $this->role_id = $data->id;
            $this->role_name = $data->name;

            $this->tombolMulti = 'Update';
        } else {
            return redirect()->route('user.roles');
        }
    }

    public function delete(int $id)
    {
        $this->role_id = $id;
        // dd($this->role_id);
        $this->resetInput();
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function destroy()
    {
        Role::find($this->role_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->emit('success', ['pesan' => 'Permission Deleted Successfully']);
    }

    public function tambahPermission(int $permission_id)
    {
        // dd($permission_id, $this->role_id);
        $role = Role::find($this->role_id);
        $permission = Permission::find($permission_id);

        $role->givePermissionTo($permission);
        $permission->assignRole($role);
    }

    public function hapusPermission(int $permission_id)
    {
        // dd($permission_id, $this->role_id);
        $role = Role::find($this->role_id);
        $permission = Permission::find($permission_id);

        $role->revokePermissionTo($permission);
        $permission->removeRole($role);
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
        $this->role_name = '';

        $this->tombolMulti = 'Save';
    }

    public function render()
    {
        $data = Role::where('name', 'like', "%$this->search%")
            ->orderBy('name', 'ASC')
            ->paginate(10);

        $dataPermission = Permission::where('name', 'like', "%$this->search_permission%")
            ->orderBy('name', 'ASC')
            ->paginate(10);

        if ($this->role_id != '') {
            $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
                ->where("role_has_permissions.role_id", $this->role_id)
                ->where('name', 'like', "%$this->search_permission_select%")
                ->get();

            $rolePermissions = json_decode(json_encode($rolePermissions));
        } else {
            $rolePermissions = null;
        }

        return view('livewire.roles.roles', compact('data', 'dataPermission', 'rolePermissions'));
    }
}
