<div>
    <div>
        <div class="container-fluid">
            <x-page-heading>Measurement Units</x-page-heading>

            <div class="card">
                <div class="card-header">
                    <h5>List of Measurement Units</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped
                    table-hover
                    table-bordered
                    align-middle">
                        <thead class="">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Unit Type</th>
                                <th>Equivalent To Default</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($units as $unit)
                                <tr class="" >
                                    <td scope="row">{{ $unit->id }}</td>
                                    <td>{{ $unit->title }}</td>
                                    <td>{{ $unit->unitType->title }} <sub>default: {{ $unit->unitType->default }}</sub></td>
                                    <td>{{ (float)$unit->rate.' '.$unit->symbol }} is equal to 1 {{ $unit->unitType->default }}</td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center">
                                            <a href="{{ route('admin.units.edit', $unit->id) }}"
                                                class="btn btn-dark flex-col mx-2">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button
                                                onclick="confirm('Are you Sure you want to delete this Unit of Measurement?')||event.stopImmediatePropagation()"
                                                wire:click="delete({{ $unit->id }})"
                                                class="btn btn-danger flex-col mx-2">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>

                            </tfoot>
                    </table>
                </div>

            </div>
        </div>

    </div>

</div>
