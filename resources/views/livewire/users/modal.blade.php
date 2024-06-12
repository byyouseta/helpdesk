<div>
    <!-- Insert Modal -->
    <div wire:ignore.self class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel"
        role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form autocomplete="off" wire:submit.prevent="saveStudent">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentModalLabel">Create User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        {{-- <div class="mb-3">
                            <label>Nama User</label>
                            <input type="text" wire:model="name" class="form-control ">
                            @error('name')
                                <small>
                                    <span class="text-danger">{{ $message }}</span>
                                </small>
                            @enderror
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label>Email User</label>
                            <input type="text" wire:model="email" class="form-control">
                            @error('email')
                                <small>
                                    <span class="text-danger">{{ $message }}</span>
                                </small>
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Full Name</label>
                                <input class="form-control" type="text" id="firstName" wire:model="name" autofocus />
                                @error('name')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nip" class="form-label">NIP</label>
                                <input class="form-control" type="text" id="nip" wire:model="nip" />
                                @error('nip')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    wire:model="email" />
                                @error('email')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="unit">UNIT</label>
                                <select id="unit" class="form-select" wire:model="unit_id">
                                    <option value="">Select</option>
                                    @foreach ($unit as $listUnit)
                                        <option value="{{ $listUnit->id }}">{{ $listUnit->name }}</option>
                                    @endforeach
                                </select>
                                @error('unit_id')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="level_user" class="form-label">Level Ticketing</label>
                                <select id="level_user" class="form-select" wire:model="level">
                                    <option value="">Select Level</option>
                                    <option value="1">Level 1</option>
                                    <option value="2">Level 2</option>
                                    <option value="3">Level 3</option>
                                    <option value="4">Level 4</option>
                                    <option value="5">Level 5</option>
                                </select>
                                @error('level')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="role_user" class="form-label">Roles User</label>
                                <select id="role_user" class="form-select" wire:model="role_id">
                                    <option value="">Select Roles</option>
                                    @foreach ($role as $listRole)
                                        <option value="{{ $listRole->id }}">{{ $listRole->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="status_user" class="form-label">Status User</label>
                                <select id="status_user" class="form-select" wire:model="active">
                                    <option value="">Select Status</option>
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                                {{-- <div>
                                    Data : @json($aktif)
                                </div> --}}
                                @error('active')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Update Student Modal -->
    <div wire:ignore.self class="modal fade" id="updateStudentModal" tabindex="-1"
        aria-labelledby="updateStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStudentModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="updateStudent" autocomplete="off">
                    <div class="modal-body">
                        {{-- <div class="mb-3">
                            <label>Student Name</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Student Email</label>
                            <input type="text" wire:model="email" class="form-control">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Full Name</label>
                                <input class="form-control" type="text" id="firstName" wire:model="name"
                                    autofocus />
                                @error('name')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nip" class="form-label">NIP</label>
                                <input class="form-control" type="text" id="nip" wire:model="nip" />
                                @error('nip')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    wire:model="email" />
                                @error('email')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="unit">UNIT</label>
                                <select id="unit" class="form-select" wire:model="unit_id">
                                    <option value="">Select</option>
                                    @foreach ($unit as $listUnit)
                                        <option value="{{ $listUnit->id }}">{{ $listUnit->name }}</option>
                                    @endforeach
                                </select>
                                @error('unit_id')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="level_user" class="form-label">Level Ticketing</label>
                                <select id="level_user" class="form-select" wire:model="level">
                                    <option value="">Select Level</option>
                                    <option value="1">Level 1</option>
                                    <option value="2">Level 2</option>
                                    <option value="3">Level 3</option>
                                    <option value="4">Level 4</option>
                                    <option value="5">Level 5</option>
                                </select>
                                @error('level')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="role_user" class="form-label">Roles User</label>
                                <select id="role_user" class="form-select" wire:model="role_id">
                                    <option value="">Select Roles</option>
                                    @foreach ($role as $listRole)
                                        <option value="{{ $listRole->id }}">{{ $listRole->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="status_user" class="form-label">Status User</label>
                                <select id="status_user" class="form-select" wire:model="active">
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                                @error('active')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Student Modal -->
    <div wire:ignore.self class="modal fade" id="deleteStudentModal" tabindex="-1"
        aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentModalLabel">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyStudent">
                    <div class="modal-body">
                        <h5>Are you sure you want to delete this data ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes! Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
