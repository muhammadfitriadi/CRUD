<!DOCTYPE html>
<html>

<head>
    <title>Hobbies</title>
    
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
        <div class="contain">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Create Hobby</button>
            <a class="btn btn-primary" href="/siswa">Create Siswa</a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Hobby</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
             @foreach($hobby as $hob) 
             <tr>
                 <th scope="row">{{ $loop->iteration }}</th>
                 <td>{{ $hob->hobby }}</td>
                 <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $hob->id }}" data-bs-whatever="@mdo">Edit</button>
                     <div class="modal fade" id="editModal{{ $hob->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" >Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('hobbies.update', $hob) }}">
            @method('PUT')
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="hobby" class="col-form-label">Hobby</label>
                    <input type="text" class="form-control" id="hobby" name="hobby" value="{{ $hob->hobby }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
            </div>
        </div>
        </div>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModals{{ $hob->id }}">
                Delete
                </button>
                <div class="modal fade" id="exampleModals{{ $hob->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Anda Yakin Ingin Menghapus Data ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form method="post" action="{{ route('hobbies.destroy', $hob) }}">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('hobbies.store') }}">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="hobby" class="col-form-label">Hobby</label>
                    <input type="text" class="form-control" id="hobby" name="hobby">
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
   
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="/hobbies">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="hobby" class="col-form-label">Hobby</label>
                    <input type="text" class="form-control" id="hobby" name="hobby" placeholder="Example">
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