<div class="container">
    <br><br>
    <a href="{{url('/')}}" wire:navigate class="btn btn-primary">Back</a>
    <br>
    <div class="row">
        <div class="col-md-4 offset-md-4 card p-3">
            <form wire:submit.prevent="update">
                <h2 class="text-center mb-3">Edit User</h2>
                <input type="text" class="form-control" wire:model.live="name" value="{{$user->name}}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <input type="email" class="form-control" wire:model.live="email" value="{{$user->email}}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <input type="password" class="form-control" wire:model.live="password" placeholder="New Password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>
