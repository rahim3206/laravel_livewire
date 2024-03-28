
<div>


    <br><br>
    <div class="d-flex w-100 justify-content-end">
    <a href="{{ url('/creates') }}" wire:navigate class="btn btn-primary">Create User</a>
    </div>
    <br>
    <div class="d-flex justify-content-end">
        <div class="col-md-4 p-0">
            <input type="text" wire:model.live="search" placeholder="Search..." class="form-control">
        </div>
    </div>
    <br>    
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a class="btn btn-danger text-white" wire:click="delete({{ $user->id }})">Delete</a>
                    <a class="btn btn-info text-white" href="{{ url('/edit'.'/'.$user->id) }}" wire:navigate>Edit</a>
                </td>
            </tr>
            @endforeach
        </tr>
    </table>
    {{ $users->links() }}

</div>

