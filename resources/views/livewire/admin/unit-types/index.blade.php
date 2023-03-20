<div>
    <div class="container-fluid">
        <x-page-heading>
            List of Unit Types
        </x-page-heading>

        <div class="card my-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Default Measurement</th>
                            <th scope="col">Number of Measurement Units</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unit_types as $type)
                        <tr class="">
                            <td scope="row">{{ $type->id }}</td>
                            <td>{{ $type->title }}</td>
                            <td>{{ $type->default }}</td>
                            <td>{{ $type->units->count() }}</td>
                            <td>
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="flex-col mx-2">
                                        <a href="{{ route('admin.unit-types.edit', $type->id) }}"
                                            class="btn btn-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                    <div class="flex-col mx-2">
                                        <button
                                            onclick="confirm('Are You Sure you want to delete this Unit Type?')||event.stopImmediatePropagation()"
                                            wire:click="delete({{ $type->id }})" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
