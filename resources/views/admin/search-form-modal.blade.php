  <!-- Modal -->
  <div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog"
       aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                  <button type="button" class="close"
                     data-dismiss="modal">
                         <span aria-hidden="true">&times;</span>
                         <span class="sr-only">Close</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">
                      Busque un usuario
                  </h4>
              </div>

              <!-- Modal Body -->
              <div class="modal-body">

                  <form role="form" action="{{route('user.search')}}" method="get">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control typeahead" name='user' placeholder="Ingrese usuario" autocomplete="off"/>
                            <span class="input-group-btn">
                              <button type="submit"  class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                              </button>
                            </span>
                        </div>
                        <input type="hidden" name="action" id='action'>
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <script>
  $(document).ready(function(){
    $('#myModalNorm').on('show.bs.modal', function (e) {
      $('#action').val(e.relatedTarget.id);
    });
  });
  </script>
