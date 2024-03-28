<div class="container">
    <br><br>
    <a href="{{url('/')}}" wire:navigate class="btn btn-primary">Users</a>
    <br>
    <div class="row">
        <div class="col-md-4 offset-md-4 card p-3">
            <form wire:submit.prevent="submit">
                <h2 class="text-center mb-3">Create User</h2>
                <input type="text" class="form-control" wire:model.live="name" placeholder="Name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <input type="email" class="form-control" wire:model.live="email" placeholder="Email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <input type="password" class="form-control" wire:model.live="password" placeholder="Password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <button class="btn btn-success" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
