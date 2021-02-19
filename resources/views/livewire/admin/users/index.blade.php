<div>
    @if($createMode)
      @include('livewire.admin.users.create')
    @elseif($updateMode)
    @include('livewire.admin.users.update')
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
                                <a href="{{route('user.create')}}" type="button" class="btn btn-primary mr-1 mb-1">
                                    <i class="feather icon-plus"></i>{{ __("Create User") }}</a>
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
                          <th class="text-center">{{ __("Full Name") }}</th>
                          <th class="text-center">{{ __("Email") }}</th>
                          <th class="text-center">{{ __("Type") }}</th>
                          <th class="text-center">{{ __("Status") }}</th>
                          <th class="text-center">{{ __("Actions") }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $value)
                          @if (Auth::user()->all_view == 'yes')
                            <tr>
                              <td class="text-center">{{ $value->id }}</td>
                              <td class="text-center">{{ $value->name }} {{ $value->surname }}</td>
                              <td class="text-center">{{ $value->email }}</td>
                              <td class="text-center">{{ $value->type }}</td>
                              <td class="text-center">{{ $value->status }}</td>
                              <td class="text-center">
                                <a href="{{ route('user.show',$value->id) }}" class="btn btn-icon btn-info mt-1" title="{{ __("View Profile") }}"><i class="feather icon-search"></i></a>
                                @if ($value->type == 'client')
                                  <a href="{{ route('hotel-profile.show',$value->id) }}" class="btn btn-icon btn-success mt-1" title="{{ __("View Hotel Profile") }}"><i class="feather icon-home"></i></a>  
                                @endif
                                @if (Auth::user()->id == $value->id)
                                @else
                                  <a href="{{ route('user.edit',$value->id) }}" class="btn btn-icon btn-warning mt-1" title="{{ __("Edit User") }}"><i class="feather icon-edit"></i></a>
                                  <a href="javascript:void(0);" onclick="myFunction('{{ $value->id }}')" class="btn btn-icon btn-danger mt-1" title="{{ __("Delete User") }}"><i class="feather icon-trash"></i></a>
                                @endif
                              </td>
                            </tr>
                          @else
                            @if (Auth::user()->country == $value->country)
                            <tr>
                              <td class="text-center">{{ $value->id }}</td>
                              <td class="text-center">{{ $value->name }} {{ $value->surname }}</td>
                              <td class="text-center">{{ $value->email }}</td>
                              <td class="text-center">{{ $value->type }}</td>
                              <td class="text-center">{{ $value->status }}</td>
                              <td class="text-center">
                                <a href="{{ route('user.show',$value->id) }}" class="btn btn-icon btn-info mt-1" title="{{ __("View Profile") }}"><i class="feather icon-search"></i></a>
                                @if ($value->type == 'client')
                                  <a href="{{ route('hotel-profile.show',$value->id) }}" class="btn btn-icon btn-success mt-1" title="{{ __("View Hotel Profile") }}"><i class="feather icon-home"></i></a>  
                                @endif
                                @if (Auth::user()->id == $value->id)
                                @else
                                  <a href="{{ route('user.edit',$value->id) }}" class="btn btn-icon btn-warning mt-1" title="{{ __("Edit User") }}"><i class="feather icon-edit"></i></a>
                                  <a href="javascript:void(0);" onclick="myFunction('{{ $value->id }}')" class="btn btn-icon btn-danger mt-1" title="{{ __("Delete User") }}"><i class="feather icon-trash"></i></a>
                                @endif
                              </td>
                            </tr>
                            @endif
                          @endif
                        @endforeach
                      </tbody>
                    </table>
                    {{ $users->links() }}
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
    
    