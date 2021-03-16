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
                        <a href="{{route('photo.create')}}" type="button" class="btn btn-primary mr-1 mb-1">
                          <i class="feather icon-plus"></i>{{ __("Upload Photo") }}</a>
                      </div>
                  </div>
              </div>
            </div>
          </div>
          @include('common.alerts')
          <div class="content-body">
            <div class="row">
              @foreach ($photos as $photo)
              <div class="col-md-3">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" style="height: 300px; width: 100%; display: block;" src="{{ asset($photo->photo) }}">
                  <div class="card-body">
                    <p class="card-text">{{ $photo->name }}</p>
                    <p class="card-text">Location: {{ $photo->location->name }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="{{ route('photo.edit',$photo->id) }}" class="btn btn-sm btn-warning">{{ __("Edit") }}</a>
                        <a href="javascript:void(0);" onclick="myFunction('{{ $photo->id }}')" class="btn btn-sm btn-danger">{{ __("Delete") }}</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
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
      text: 'You want to delete the photo?',
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
