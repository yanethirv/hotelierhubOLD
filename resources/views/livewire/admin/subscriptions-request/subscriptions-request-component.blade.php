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
                    <th class="text-center">{{ __("Invoice ID") }}</th>
                    <th class="text-center">{{ __("Hostname") }}</th>
                    <th class="text-center">{{ __("Product") }}</th>
                    <th class="text-center">{{ __("Status") }}</th>
                    <th class="text-center">{{ __("Actions") }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($subscriptions as $subscrition)
                    <tr>
                      <td class="text-center">{{ $subscrition->id }}</td>
                      <td class="text-center">{{ $subscrition->stripe_id }}</td>
                      <td class="text-center">{{ $subscrition->user->hostname }}</td>
                      <td class="text-center">{{ $subscrition->stripe_plan }}</td>
                      @if ($subscrition->status === 'wait')
                          <td class="text-center"><i class="fa fa-circle font-small-3 text-warning mr-50"></i> {{ __("On Wait") }}</td>
                        @endif
                        @if ($subscrition->status === 'process')
                          <td class="text-center"><i class="fa fa-circle font-small-3 text-primary mr-50"></i> {{ __("In Process") }}</td>
                        @endif
                        @if ($subscrition->status === 'active')
                          <td class="text-center"><i class="fa fa-circle font-small-3 text-success mr-50"></i> {{ __("Active") }}</td>
                        @endif
                        @if ($subscrition->status === 'inactive')
                          <td class="text-center"><i class="fa fa-circle font-small-3 text-danger mr-50"></i> {{ __("Inactive") }}</td>
                        @endif
                      <td class="text-center">
                        <a href="{{ route('subscription-request.edit',$subscrition->id) }}" class="btn btn-icon btn-warning mt-1" title="{{ __("Edit Status") }}"><i class="feather icon-edit"></i></a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $subscriptions->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  @elseif($action == 2)
  @include('livewire.admin.products.products-form')
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
