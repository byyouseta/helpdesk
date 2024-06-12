<div class="row">
    <div class="col-sm-6 mb-3 order-0">
        <div class="card">
            <div class="card-header">
                <h5>Unused Permission User
                    <input type="search" wire:model="search_permission" class="form-control float-end mx-2"
                        placeholder="Search..." style="width: 230px" />

                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Permission Name</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPermission as $index=>$list)
                            <tr>
                                <td class="text-center"><input type="checkbox"
                                        name="role_permission[{{ $index }}]" class="form-controls"
                                        @php
$checked = false;
                                            foreach ($rolePermissions as $listPermission){
                                                if ($list->id == $listPermission->id){
                                                echo 'checked';
                                                $checked = true;
                                                }
                                            } @endphp>
                                </td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->created_at }}</td>
                                <td>
                                    @if ($checked == false)
                                        <button type="button" wire:click="tambahPermission({{ $list->id }})"
                                            class="btn btn-success btn-xs">Add</button>
                                    @else
                                        <button type="button" class="btn btn-info btn-xs">Added</button>
                                    @endif
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
                    {{ $dataPermission->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 order-1">
        <div class="card">
            <div class="card-header">
                <h5>Used Permission User
                    <input type="search" wire:model="search_permission_select" class="form-control float-end mx-2"
                        placeholder="Search..." style="width: 230px" />

                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Permission Name</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rolePermissions as $index => $list)
                            {{-- @php
                                dd($list);
                            @endphp --}}
                            <tr>
                                <td class="text-center"><input type="checkbox" name="role_permission"
                                        class="form-controls"></td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->created_at }}</td>
                                <td>
                                    <button type="button" wire:click="hapusPermission({{ $list->id }})"
                                        class="btn btn-danger btn-xs">Remove</button>
                                </td>
                            </tr>
                            {{-- @empty
                            <tr>
                                <td colspan="5" class="text-center">No Record Found</td>
                            </tr> --}}
                        @endforeach
                    </tbody>
                </table>
                <div class="pt-3">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
