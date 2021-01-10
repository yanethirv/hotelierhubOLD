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
                          <i class="fa fa-circle font-small-3 text-warning mr-50"></i>
                          <td class="text-center">{{ __("On Wait") }}</td>
                        @endif
                        @if ($subscrition->status === 'process')
                          <td class="text-center">{{ __("In Process") }}</td>
                        @endif
                        @if ($subscrition->status === 'active')
                          <td class="text-center">{{ __("Active") }}</td>
                        @endif
                        @if ($subscrition->status === 'inactive')
                          <td class="text-center">{{ __("Inactive") }}</td>
                        @endif
                        @if ($subscrition->status === 'review')
                          <td class="text-center">{{ __("On Review") }}</td>
                        @endif
                      <td class="text-center">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
                          {{ __("Edit status") }}
                        </button>
                          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __("Edit status request") }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-left">
                                      <form action="{{ route('subscription-request.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="subscription_id" class="form-control" value="{{ $subscrition->id }}">
                                            <input type="hidden" name="user_id" class="form-control" value="{{ $subscrition->user_id }}">
                                        </div>
                                        <div class="form-group">
                                          <label for="description">{{ __("Status") }}</label>
                                          <div class="input-group">
                                              <select class="form-control" name="status">
                                                  <option value="active"
                                                  @if ($subscrition->status === 'active')
                                                      selected
                                                  @endif
                                                  >{{ __("Active") }}</option>
          
                                                  <option value="inactive"
                                                  @if ($subscrition->status === 'inactive')
                                                      selected
                                                  @endif
                                                  >{{ __("Inactive") }}</option>

                                                  <option value="process"
                                                  @if ($subscrition->status === 'process')
                                                      selected
                                                  @endif
                                                  >{{ __("In Process") }}</option>

                                                  <option value="review"
                                                  @if ($subscrition->status === 'review')
                                                      selected
                                                  @endif
                                                  >{{ __("On Review") }}</option>

                                                  <option value="wait"
                                                  @if ($subscrition->status === 'wait')
                                                      selected
                                                  @endif
                                                  >{{ __("On Wait") }}</option>
                                              </select>
                                          </div>
                                          @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                                      </div>
                                        <div class="form-group">
                                            <label class="form-label">{{ __("Comment") }}</label>
                                            <textarea class="form-control" style="height:150px" name="comment" placeholder="comment"></textarea>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('subscriptions-request') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
                                        <button class="btn btn-primary float-right" type="submit">{{ __("Save") }}</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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