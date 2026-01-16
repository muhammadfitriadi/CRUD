<!DOCTYPE html>
<html>

<head>
    <title>nisn</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .template {
            width: 50%;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        .contain {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="template">
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@mdo">Create nisn</button>
            {{-- <a class="btn btn-primary" href="/nisn">Create Nisn</a> --}}
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nisns as $nisn)
                    {{-- {{ echo $nisn }} --}}
                    <tr>
                        <th scope="row">{{ $nisn->nisn }}</th>
                        <td>{{ $nisn->siswa->nama }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $nisn->id }}" data-bs-whatever="@mdo">Edit</button>
                            <div class="modal fade" id="editModal{{ $nisn->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action={{ route('nisn.update', $nisn)  }}>
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nama" class="col-form-label">Nisn</label>
                                                    <input type="text" class="form-control" id="nisn" name="nisn"
                                                        placeholder="Example" value="{{ $nisn->nisn }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="siswa_id" class="col-form-label">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama"
                                                        placeholder="Example" value="{{ $nisn->siswa->nama }}">
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
                                data-bs-target="#exampleModals{{ $nisn->id }}">
                                Delete
                            </button>
                            <div class="modal fade" id="exampleModals{{ $nisn->id }}" tabindex="-1"
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
                                            <form method="post" action="{{ route('nisn.destroy', $nisn) }}">
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
                    <form method="POST" action={{ route('nisn.store')  }}>
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="siswa_id" class="col-form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Example">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="col-form-label">Nisn</label>
                                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Example">
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
</body>

</html>