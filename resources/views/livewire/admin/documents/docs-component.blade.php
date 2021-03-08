@if ($action == 1)

  <div class="content-body">
              <section id="basic-examples">
                      <div class="row match-height">
                      @foreach ($documents as $document)
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                          <div class="card">
                              <div class="card-content">
                                  <div class="card-body">
                                      <!--<img class="card-img img-fluid mb-1" src="../../../app-assets/images/pages/content-img-3.jpg" alt="Card image cap">-->
                                      <h5 class="my-1">{{ $document->name }}</h5>
                                      <p class="card-text  mb-0">{{ $document->description }}</p>
                                      <br>
                                      <hr class="my-1">
                                      <div class="card-btns d-flex justify-content-between">
                                        <td class="text-center"><a class="btn btn-success" href="{{ asset($document->document) }}" target="_blank" rel="noopener noreferrer">{{ __("View Document") }}</a></td>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
              </section>
        </div>
  @elseif($action == 2)
  @include('livewire.admin.documents.docs-form')
  @endif
