<div class="row">
    <div class="col-lg-7 mx-auto">
        <div class="bg-white rounded-lg shadow-sm p-5">
            <h3 class="mb-4 text-center">
              @if($selected_id == 0) {{ __("Create Resource") }}
              @else {{ __("Edit Resource") }}
              @endif
            </h3>
            <div class="form-group">
              <label for="name">{{ __("Name") }}</label>
              <div class="input-group">
                <input type="text" name="name" placeholder="{{ __("Name") }}" class="form-control"
                  wire:model.lazy="name"/>
              </div>
              @error('name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <button type="button" wire:click="doAction(1)" class="btn btn-outline-primary mr-1">{{ __("Back") }}</button>
            <button type="button" wire:click="StoreOrUpdate()" class="btn btn-primary float-right">{{ __("Save") }}</button>
        </div>
    </div>
  </div>
  