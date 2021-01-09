<div class="row">
    <div class="col-lg-7 mx-auto">
        <div class="bg-white rounded-lg shadow-sm p-5">
            <h3 class="mb-4 text-center">{{ __("Create Rol") }}</h3>
            <form>
              <div class="form-group">
                <label for="name">{{ __("Name") }}</label>
                  <input type="text" class="form-control" placeholder="Name" wire:model="name">
                  @error('name') <span class="text-danger">{{ $message }}</span>@enderror
              </div>
              <div class="form-group">
                <label class="form-label">{{ __("Permissions") }}</label>
                <br/>
                @foreach ($permissionsList as $index => $permission)
                <br/>
                    <label><input wire:model="permissions.{{ $permission }}" value="{{ $permission }}" type="checkbox">&nbsp;{{ $index }}</label>
                <br/>
                @endforeach
                @error('permissions') <span class="text-danger">{{ $message }}</span>@enderror
              </div>
              <button wire:click.prevent="cancel()" class="btn btn-outline-primary">{{ __("Back") }}</button>
              <button wire:click.prevent="store()" class="btn btn-primary float-right">{{ __("Save") }}</button>
            </form>
        </div>
    </div>
  </div>
  