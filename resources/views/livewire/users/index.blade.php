<div>
    @include('livewire.users.modal')

    <div class="col-md-12">
        {{-- @if (session()->has('message'))
            <h5 class="alert alert-success">{{ session('message') }}</h5>
        @endif --}}

        <div class="card">
            <div class="card-header">
                <h5>List Users
                    <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search..."
                        style="width: 230px" />
                    <button type="button" class="btn btn-primary float-end" wire:click="create()">
                        Add New User
                    </button>
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $index=>$listUser)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $listUser->name }}</td>
                                <td>{{ $listUser->email }}</td>
                                <td>{{ $listUser->created_at }}</td>
                                <td>
                                    <button type="button" wire:click="editStudent({{ $listUser->id }})"
                                        class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                    <button type="button" wire:click="deleteStudent({{ $listUser->id }})"
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
</div>
