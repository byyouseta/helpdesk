<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $permission_name, $permission_id;
    public $search = '';
    public $tombolMulti = 'Save';
    public $isOpen = false;

    protected function rules()
    {
        return [
            'permission_name' => ['required', "unique:permissions,name, $this->permission_id"],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function simpan()
    {
        $this->validate();

        ModelsPermission::Create(
            ['name' => $this->permission_name]
        );

        $this->emit('success', ['pesan' => 'Permission Created Successfully']);
        $this->resetInput();
    }

    public function edit(int $permission_id)
    {

        $data = ModelsPermission::find($permission_id);
        // dd($user);
        if ($data) {
            $this->permission_id = $data->id;
            $this->permission_name = $data->name;

            $this->tombolMulti = 'Update';
        } else {
            return redirect()->route('user.permission');
        }
    }

    public function update()
    {
        $this->validate();

        ModelsPermission::updateOrCreate(
            ['id' => $this->permission_id],
            ['name' => $this->permission_name]
        );

        $this->emit('success', ['pesan' => 'Permission Updated Successfully']);
        $this->resetInput();
    }

    public function delete(int $id)
    {
        $this->permission_id = $id;
        // dd($this->permission_id);
        $this->resetInput();
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function destroy()
    {
        ModelsPermission::find($this->permission_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->emit('success', ['pesan' => 'Permission Deleted Successfully']);
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
        $this->permission_name = '';
        $this->permission_id = '';

        $this->tombolMulti = 'Save';
    }

    public function render()
    {
        $data = ModelsPermission::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('name', 'ASC')->paginate(10);
        return view('livewire.permission.index', compact('data'));
    }
}
