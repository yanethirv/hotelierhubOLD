<div>
    @if($createMode)
      @include('livewire.admin.roles.create')
    @elseif($updateMode)
    @include('livewire.admin.roles.update')
    @else
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                  <div class="dropdown sort-dropdown mb-1 mb-sm-0">
                    @include('common.search')
                  </div>
                  <div class="ag-btns d-flex flex-wrap">
                      <div class="action-btns">
                          <div class="btn-dropdown ">
                              <div class="btn-group dropdown actions-dropodown">
                                <button type="button" wire:click="create()" class="btn btn-primary mr-1 mb-1">
                                  <i class="feather icon-plus"></i>{{ __("Create Rol") }}
                                </button>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                @include('common.alerts')
                <div class="content-body">
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th class="text-center">{{ __("ID") }}</th>
                          <th class="text-center">{{ __("Name") }}</th>
                          <th class="text-center">{{ __("Actions") }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($roles as $value)
                          <tr>
                            <td class="text-center">{{ $value->id }}</td>
                            <td class="text-center">{{ $value->name }}</td>
                            <td class="text-center">
                              <a href="{{ route('role.edit',$value->id) }}" class="btn btn-icon btn-warning mt-1" title="{{ __("Edit Rol") }}"><i class="feather icon-edit"></i></a>
                              <a href="javascript:void(0);" onclick="myFunction('{{ $value->id }}')" class="btn btn-icon btn-danger mt-1" title="{{ __("Delete Rol") }}"><i class="feather icon-trash"></i></a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $roles->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    <script type="text/javascript">
      function myFunction(id)
      {
        let me = this;
        Swal.fire({
          title: 'Confirm',
          text: 'You want to delete the registration?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'Cancel',
          closeOnConfirm: false
        }).then((result) => {
          if (result.value) {
            //console.log('ID', id);
            window.livewire.emit('deleteRow', id)
          }
        })
      }
      </script>
    
    