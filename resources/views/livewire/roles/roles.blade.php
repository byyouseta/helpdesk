<div>
    @include('livewire.permission.modal')

    <div class="col-md-12">
        {{-- @if (session()->has('message'))
            <h5 class="alert alert-success">{{ session('message') }}</h5>
        @endif --}}
        <div class="card mb-3">
            <div class="card-header">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Permission Name"
                        aria-label="Recipient's username" aria-describedby="button-addon2" wire:model="role_name" />
                    <button class="btn {{ $tombolMulti == 'Save' ? 'btn-primary' : 'btn-warning' }} btn-sm"
                        type="button" id="button-addon2" wire:click="simpan()">{{ $tombolMulti }}</button>
                    @if ($tombolMulti != 'Save')
                        <button class="btn btn-secondary btn-sm" type="button" id="button-addon3"
                            wire:click="resetInput()">Cancel</button>
                    @endif
                </div>
                @error('role_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <h5>List Users
                    <input type="search" wire:model="search" class="form-control float-end mx-2"
                        placeholder="Search..." style="width: 230px" />

                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Roles Name</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $index=>$list)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->created_at }}</td>
                                <td>
                                    <button type="button" wire:click="edit({{ $list->id }})"
                                        class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                    <button type="button" wire:click="delete({{ $list->id }})"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Record Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="pt-3">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    @if ($tombolMulti == 'Update')
        @include('livewire.roles.edit')
    @endif
</div>
