@extends('layouts.app', ['activePage' => 'oportunidades', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'oportunidades'])

@push('css')
    <style>
        /**************************\
  Basic Modal Styles
\**************************/

.modal {
  font-family: -apple-system,BlinkMacSystemFont,avenir next,avenir,helvetica neue,helvetica,ubuntu,roboto,noto,segoe ui,arial,sans-serif;
}

.modal__overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0,0,0,0.6);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal__container {
  background-color: #fff;
  padding: 30px;
  max-width: 500px;
  max-height: 100vh;
  border-radius: 4px;
  overflow-y: auto;
  box-sizing: border-box;
}

.modal__header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.modal__title {
  margin-top: 0;
  margin-bottom: 0;
  font-weight: 600;
  font-size: 1.25rem;
  line-height: 1.25;
  color: #00449e;
  box-sizing: border-box;
}

.modal__close {
  background: transparent;
  border: 0;
}

.modal__header .modal__close:before { content: "\2715"; }

.modal__content {
  margin-top: 2rem;
  margin-bottom: 2rem;
  line-height: 1.5;
  color: rgba(0,0,0,.8);
}

.modal__btn {
  font-size: .875rem;
  padding-left: 1rem;
  padding-right: 1rem;
  padding-top: .5rem;
  padding-bottom: .5rem;
  background-color: #e6e6e6;
  color: rgba(0,0,0,.8);
  border-radius: .25rem;
  border-style: none;
  border-width: 0;
  cursor: pointer;
  -webkit-appearance: button;
  text-transform: none;
  overflow: visible;
  line-height: 1.15;
  margin: 0;
  will-change: transform;
  -moz-osx-font-smoothing: grayscale;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  transition: -webkit-transform .25s ease-out;
  transition: transform .25s ease-out;
  transition: transform .25s ease-out,-webkit-transform .25s ease-out;
}

.modal__btn:focus, .modal__btn:hover {
  -webkit-transform: scale(1.05);
  transform: scale(1.05);
}

.modal__btn-primary {
  background-color: #00449e;
  color: #fff;
}
/* .modal.is-open{
    display:block;
} */


/**************************\
  Demo Animation Style
\**************************/
@keyframes mmfadeIn {
    from { opacity: 0; }
      to { opacity: 1; }
}

@keyframes mmfadeOut {
    from { opacity: 1; }
      to { opacity: 0; }
}

@keyframes mmslideIn {
  from { transform: translateY(15%); }
    to { transform: translateY(0); }
}

@keyframes mmslideOut {
    from { transform: translateY(0); }
    to { transform: translateY(-10%); }
}

.micromodal-slide {
  display: none;
}

.micromodal-slide.is-open {
  display: block;
}

.micromodal-slide[aria-hidden="false"] .modal__overlay {
  animation: mmfadeIn .3s cubic-bezier(0.0, 0.0, 0.2, 1);
}

.micromodal-slide[aria-hidden="false"] .modal__container {
  animation: mmslideIn .3s cubic-bezier(0, 0, .2, 1);
}

.micromodal-slide[aria-hidden="true"] .modal__overlay {
  animation: mmfadeOut .3s cubic-bezier(0.0, 0.0, 0.2, 1);
}

.micromodal-slide[aria-hidden="true"] .modal__container {
  animation: mmslideOut .3s cubic-bezier(0, 0, .2, 1);
}

.micromodal-slide .modal__container,
.micromodal-slide .modal__overlay {
  will-change: transform;
}
    </style>
@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            @include('alerts.success')
            <div class="row">
                <div class="col-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header">
                          <div class="row">
                            <div class="col-md-8">
                              <div class="card-title">Administrador de Oportunidades</div>
                              <div class="card-category">Lorem Ipsum</div>
                            </div>
                            <div class="col-md-4">
                              <a href="#" class="btn btn-success">Crear Oportunidad</a>
                            </div>
                          </div>
                            
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped table-sortable" id="table">
                                <thead>
                                    <th class="d-none d-md-block">ID</th>
                                    <th>opportunityName</th>
                                    <th>probability</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($oportunidades as $oportunidad)
                                        <tr>
                                            <td class="op-id d-none d-md-block">{{$oportunidad->id}}</td>
                                            <td><a href="{{route('oportunidades.edit', $oportunidad->id)}}">{{$oportunidad->opportunityName}}</a></td>
                                            <td>{{$oportunidad->probability}}</td>
                                            <td>{{$oportunidad->amount}}</td>
                                            <td>
                                                @if ($oportunidad->isClosed == 1 && $oportunidad->isWon==1)
                                                    Ganada
                                                @elseif ($oportunidad->isClosed == 1 && $oportunidad->isWon==0)
                                                    Perdida
                                                @else 
                                                    Pendiente
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success modal-button" data-micromodal-trigger="modal-1" role="button"><i class="fa-solid fa-circle-play"></i></button>
                                            </td>
                                            <td class="d-flex justify-content-end">
                                                <a href="" class="btn btn-info btn-link btn-xs">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{route('oportunidades.edit',$oportunidad->id)}}" class="btn btn-info btn-link btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <!-- <a href="" class="btn btn-info btn-link btn-xs">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a> -->
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL -->
    <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <form action="{{route('entrevista.oportunidad')}}" method="get">
          <header class="modal__header">
            <h2 class="modal__title" id="modal-1-title">
              Micromodal
            </h2>
            <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
          </header>
          <main class="modal__content" id="modal-1-content">
            <input type="hidden" value="" id="op_id" name="opportunity_id">
            @if(count($guiones)<=0)
              <div class="alert alert-warning">No hay guiones creados</div>
            @else
              <select name="guion_id" id="" class="form-control">
                @foreach($guiones as $guion)
                  <option value="{{$guion->id}}">{{$guion->nombre}}</option>
                @endforeach
              </select>
            @endif
            
          
          </main>
          <footer class="modal__footer">
            @if(count($guiones)!=0)
              <input type="submit" value="Iniciar" class="btn btn-success">
            @endif
            <!-- <button class="modal__btn modal__btn-primary">Continue</button> -->
            <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
          </footer>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('js')
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery.fancytable/dist/fancyTable.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/micromodal/0.4.10/micromodal.min.js" integrity="sha512-qcwcAul7d7yUcoz3MmQABiaGDa+gVkaDWgZX6wEd/z3I6z62nQCDW3EqioQG+O+QlGCpxmJLdH5snh4IaDPiPA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script type="text/javascript">
      jQuery(function($){
        $(document).ready(function() {
          $("#table").fancyTable({
              // sortColumn:0,
              // pagination: true,
              // perPage:10,
              globalSearch:true
          });
          $(".modal-button").click(function(){
            // console.log($(this).parents('tr').find('.op-id'));
            let oportunidad_id = $(this).parents('tr').find('.op-id').text();
            $('#op_id').val(oportunidad_id);

          });
          try {
            MicroModal.init({
              awaitCloseAnimation: true,// set to false, to remove close animation
              onShow: function(modal) {
                console.log("micromodal open");
              },
              onClose: function(modal) {
                console.log("micromodal close");
              }
            });
          
          } catch (e) {
            console.log("micromodal error: ", e);
          }
		
        });
      })
        
    </script>
@endpush