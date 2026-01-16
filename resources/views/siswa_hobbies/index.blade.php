<!DOCTYPE html>
<html>

<head>
    <title>Siswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet">

    <style>
        .template {
            width: 50%;
            margin: auto;
            margin-top: 20px;
        }
    </style>
</head>


<body>
    <div class="template">
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@mdo">Create Hobi Siswa</button>

        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Hobbies</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswaHobbies->groupBy('siswa_id') as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->first()->siswa->nama }}</td>
                        <td>
                            @foreach ($item as $hobby)
                                <span class="badge bg-primary">{{ $hobby->hobby->hobby }}</span>
                            @endforeach
                        </td>

                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $item->first()->siswa_id }}"
                                data-bs-whatever="@mdo">Edit</button>
                            <div class="modal fade" id="editModal{{ $item->first()->siswa_id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="{{ route('siswa-hobbies.update',  $item->first()->siswa_id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Pilih Siswa</label>
                                                        <select name="siswa_id" class="form-select">
                                                            @foreach ($sisway as $sis)
                                                            <option value="{{ $item->first()->siswa_id }}"
                                                                    {{  $item->first()->siswa_id  === $sis->id ? 'selected' : '' }}>{{ $sis->nama }}</option>
                                                                <option value="{{ $sis->id }}">{{ $sis->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Pilih Hobi</label>
                                                        <select class="form-select select-hobi-edit"
                                                            name="hobbies_ids[]"
                                                            multiple
                                                            data-modal="{{ $item->first()->siswa_id }}">

                                                            @foreach ($hobbies as $hobby)
                                                                <option value="{{ $hobby->id }}"
                                                                    {{ $item->pluck('hobby_id')->contains($hobby->id) ? 'selected' : '' }}>
                                                                    {{ $hobby->hobby }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModals{{ $item->first()->siswa_id }}">
                                Delete
                            </button>
                            <div class="modal fade" id="exampleModals{{ $item->first()->siswa_id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Anda Yakin Ingin Menghapus Data ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form method="post"
                                                action="{{ route('siswa-hobbies.destroy', $item->first()->siswa_id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button role="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Creates</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action={{ route('siswa-hobbies.store') }}>
                        @csrf
                        <div class="modal-body">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Pilih Siswa</label>
                                    <select name="siswa_id" class="form-select">
                                        <option value="" disabled selected>Pilih Siswa</option>
                                        @foreach ($sisway as $sis)
                                            <option value="{{ $sis->id }}">{{ $sis->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pilih Hobi</label>
                                    <select class="form-select" id="select-hobi" name="hobbies_ids[]" multiple>
                                        @foreach ($hobbies as $hobby)
                                            <option value="{{ $hobby->id }}">{{ $hobby->hobby }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery FULL -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('#exampleModal').on('shown.bs.modal', function () {

            $('#select-hobi').select2({
                theme: 'bootstrap-5',
                dropdownParent: $('#exampleModal'),
                placeholder: 'Pilih Hobi',
                width: '100%'
            });

            $('#select-siswa').select2({
                theme: 'bootstrap-5',
                dropdownParent: $('#exampleModal'),
                placeholder: 'Pilih Siswa',
                width: '100%'
            });

        });
    </script>
    <script>
    $(document).on('shown.bs.modal', '.modal', function () {
        $(this).find('.select-hobi-edit').select2({
            theme: 'bootstrap-5',
            dropdownParent: $(this),
            width: '100%'
        });
    });
    </script>


</body>

</html>