@if ($action == 1)
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
                        <a href="{{route('restaurant.create')}}" type="button" class="btn btn-primary mr-1 mb-1">
                          <i class="feather icon-plus"></i>{{ __("Create Restaurant") }}</a>
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
                    <th class="text-center">{{ __("Restaurant Name") }}</th>
                    <th class="text-center">{{ __("How many Pax") }}</th>
                    <th class="text-center">{{ __("Open Time") }}</th>
                    <th class="text-center">{{ __("Closing Time") }}</th>
                    <th class="text-center">{{ __("Type") }}</th>
                    <th class="text-center">{{ __("Actions") }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($restaurants as $restaurant)
                    <tr>
                      <td class="text-center">{{ $restaurant->name }}</td>
                      <td class="text-center">{{ $restaurant->pax }}</td>
                      <td class="text-center">{{ $restaurant->open_time }}</td>
                      <td class="text-center">{{ $restaurant->closing_time }}</td>
                      <td class="text-center">{{ $restaurant->typerestaurant->name }}</td>
                      <td class="text-center">
                        <a href="{{ route('restaurant.edit',$restaurant->id) }}" class="btn btn-icon btn-warning mt-1" title="{{ __("Edit Restaurant") }}"><i class="feather icon-edit"></i></a>
                        <a href="javascript:void(0);" onclick="myFunction('{{ $restaurant->id }}')" class="btn btn-icon btn-danger mt-1" title="{{ __("Delete Restaurant") }}"><i class="feather icon-trash"></i></a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $restaurants->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  @elseif($action == 2)

  @endif
  <script type="text/javascript">
  function myFunction(id)
  {
    let me = this;
    Swal.fire({
      title: 'Confirm',
      text: 'You want to delete the restaurant?',
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
