<div>
    @if($createMode)
      @include('livewire.admin.suscriptions.create')
    @elseif($updateMode)
    @include('livewire.admin.suscriptions.update')
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
                                <a href="{{ route('plans.create') }}" type="button" class="btn btn-primary mr-1 mb-1">
                                    <i class="feather icon-plus"></i>{{ __("Create Subscription") }}</a>
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
                            <th class="text-center">{{ __("Description") }}</th>
                            <th class="text-center">{{ __("Price") }}</th>
                            <th class="text-center">{{ __("Cost") }}</th>
                            <th class="text-center">{{ __("Type") }}</th>
                            <th class="text-center">{{ __("Status") }}</th>
                            <th class="text-center">{{ __("Actions") }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($suscriptions as $suscription)
                          <tr>
                            <td class="text-center">{{ $suscription->id }}</td>
                            <td class="text-center">{{ $suscription->slug }}</td>
                            <td class="text-center">{{ str_limit($suscription->description, $limit = 30, $end = '...') }}</td>
                            <td class="text-center">{{ $suscription->amount }}$</td>
                            <td class="text-center">{{ $suscription->cost }}$</td>
                            <td class="text-center">{{ $suscription->type->name }}</td>
                            <td class="text-center">{{ $suscription->status }}</td>
                            <td class="text-center">
                              <a href="{{ route('plans.edit',$suscription->id) }}" class="btn btn-icon btn-warning mt-1" title="{{ __("Edit Subscription") }}"><i class="feather icon-edit"></i></a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $suscriptions->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    