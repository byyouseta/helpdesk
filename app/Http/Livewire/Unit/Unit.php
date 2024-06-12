<?php

namespace App\Http\Livewire\Unit;

use App\Models\Unit as ModelsUnit;
use Livewire\Component;
use Livewire\WithPagination;

class Unit extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $unit_name, $unit_id;
    public $search = '';
    public $tombolMulti = 'Save';
    public $isOpen = false;

    protected function rules()
    {
        return [
            'unit_name' => ['required', "unique:units,name, $this->unit_id"],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function simpan()
    {
        $this->validate();

        ModelsUnit::Create(
            ['name' => $this->unit_name]
        );

        $this->emit('success', ['pesan' => 'Unit Created Successfully']);
        $this->resetInput();
    }

    public function edit(int $unit_id)
    {

        $data = ModelsUnit::find($unit_id);
        // dd($user);
        if ($data) {
            $this->unit_id = $data->id;
            $this->unit_name = $data->name;

            $this->tombolMulti = 'Update';
        } else {
            return redirect()->route('unit.index');
        }
    }

    public function update()
    {
        $this->validate();

        ModelsUnit::updateOrCreate(
            ['id' => $this->unit_id],
            ['name' => $this->unit_name]
        );

        $this->emit('success', ['pesan' => 'Unit Updated Successfully']);
        $this->resetInput();
    }

    public function delete(int $id)
    {
        $this->unit_id = $id;
        // dd($this->permission_id);
        // $this->resetInput();
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function destroy()
    {
        ModelsUnit::find($this->unit_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->emit('success', ['pesan' => 'Unit Deleted Successfully']);
    }

    public function resetInput()
    {
        $this->unit_name = '';
        $this->unit_id = '';

        $this->tombolMulti = 'Save';
    }

    public function render()
    {
        $data = ModelsUnit::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('name', 'ASC')->paginate(10);
        return view('livewire.unit.unit', compact('data'));
    }
}
