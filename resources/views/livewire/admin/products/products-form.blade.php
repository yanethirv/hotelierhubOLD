<div class="row">
    <div class="col-lg-7 mx-auto">
        <div class="bg-white rounded-lg shadow-sm p-5">
            <h3 class="mb-4 text-center">
              @if($selected_id == 0) {{ __("Create Product") }}
              @else {{ __("Edit Product") }}
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
            <div class="form-group">
              <label for="price">{{ __("Price") }}</label>
              <div class="input-group">
                <input type="text" name="price" placeholder="{{ __("Price") }}" class="form-control"
                  wire:model.lazy="price"/>
              </div>
              @error('price') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
              <label for="cost">{{ __("Cost") }}</label>
              <div class="input-group">
                <input type="text" name="cost" placeholder="{{ __("Cost") }}" class="form-control"
                  wire:model.lazy="cost"/>
              </div>
              @error('cost') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
              <label for="description">{{ __("Type") }}</label>
              <div class="input-group">
                <select class="form-control" wire:model.lazy="type">
                  <option value="Direct Channel">Direct Channel</option>
                  <option value="Distribution Channels">Distribution Channels</option>
                  <option value="Experts">Experts</option>
                  <option value="Guest Communication">Guest Communication</option>
                  <option value="Marketing">Marketing</option>
                  <option value="Services">Services</option>
                </select>
              </div>
              @error('type') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <select name="type" wire:model="typesList" class="form-control" >
              <option value="">Select</option>
                @foreach ($type as $types)
                  <option value="{{$types->id}}">{{ $types->name }}</option>
                @endforeach
            </select>

            <div class="form-group">
              <label for="description">{{ __("Description") }}</label>
              <div class="input-group">
                <input type="text" name="description" placeholder="{{ __("Description") }}" class="form-control"
                  wire:model.lazy="description"/>
              </div>
              @error('description') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <button type="button" wire:click="doAction(1)" class="btn btn-outline-primary mr-1">{{ __("Back") }}</button>
            <button type="button" wire:click="StoreOrUpdate()" class="btn btn-primary float-right">{{ __("Save") }}</button>
          </div>
        </div>
    </div>
  </div>
  