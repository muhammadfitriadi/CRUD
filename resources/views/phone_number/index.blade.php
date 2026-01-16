<!DOCTYPE html>
<html>

<head>
    <title>phone-number</title>

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
                data-bs-whatever="@mdo">Create phone-number</button>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswas as $siswa)

                    @if ($siswa->phone_number->count() > 0)
                        <tr>
                            <td>
                                @foreach ($siswa->phone_number as $phone)
                                    <div>{{ $phone->phone_number }}</div>
                                @endforeach
                            </td>

                            <td>{{ $siswa->nama }}</td>



                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $siswa->id }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModals{{ $siswa->id }}"> Delete </button>
                                <div class="modal fade" id="exampleModals{{ $siswa->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data</h1> <button
                                                    type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body"> Anda Yakin Ingin Menghapus Data ? </div>
                                            <div class="modal-footer"> <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form method="post" action="{{ route('phone-number.destroy', $siswa->id) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button role="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </tr>
                        <div class="modal fade" id="editModal{{ $siswa->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('phone-number.update', $siswa->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5>Edit Phone Number - {{ $siswa->nama }}</h5>
                                        </div>

                                        <div class="modal-body">
                                            <div class="parent-{{ $siswa->id }}">
                                                @foreach ($siswa->phone_number as $phone)
                                                    <input type="text" class="form-control mb-2 phone_input" name="phone_number[]"
                                                        value="{{ $phone->phone_number }}">
                                                @endforeach
                                            </div>

                                            <button type="button" class="btn btn-sm btn-primary add-phone"
                                                data-id="{{ $siswa->id }}">
                                                +
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger remove-phone"
                                                data-id="{{ $siswa->id }}">
                                                Del
                                            </button>
                                            <div class="mb-3">
                                                <label class="form-label">Siswa</label>
                                                <select name="siswa_id" class="" required>
                                                    @foreach ($siswas as $s)
                                                        <option value="{{ $s->id }}" {{ $s->id == $siswa->id ? 'selected' : '' }}>
                                                            {{ $s->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
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
                    <form method="POST" action={{ route('phone-number.store')  }}>
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama" class="col-form-label">phone-number</label>
                                <div class="parent">
                                    <input type="text" class="form-control mb-2 phone_input" name="phone_number[]"
                                        placeholder="Example">
                                </div>

                                <button type="button" class="btn btn-primary " id="plus">+</button>
                                <button type="button" class="btn btn-danger" id="del">Del</button>
                                <div class="mb-3">
                                    <label for="siswa_id" class="col-form-label">Pilih Siswa</label>
                                    <select id="siswa_id" name="siswa_id">
                                        <option value="" selected disabled hidden>Choose here</option>
                                        @foreach ($siswas as $siswa)
                                            <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                        @endforeach
                                    </select>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).on('click', '.add-phone', function () {
            let id = $(this).data('id');
            $('.parent-' + id).append(
                '<input type="text" class="form-control mb-2 phone_input" name="phone_number[]" placeholder="Example">'
            );
        });

        $(document).on('click', '.remove-phone', function () {
            let id = $(this).data('id');
            $('.parent-' + id + ' .phone_input').last().remove();
        });




        // CREATE MODE
        $('#plus').on('click', function () {
            $('.parent').append(
                '<input type="text" class="form-control mb-2 phone_input" name="phone_number[]" placeholder="Example">'
            );
        });

        $('#del').on('click', function () {
            $('.parent .phone_input').last().remove();
        });

    </script>


</body>

</html>