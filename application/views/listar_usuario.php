
<body>
  <div class="wrapper">
      <div class="container">

        <div class="row">
  				<h3></h3>
  			</div>

          <div class="row">
              <div class="col-sm-12">
                  <div class="card-box table-responsive">
                      <h4 class="m-t-0 header-title"><b>Lista de Usuários</b></h4>
                      <!-- Full width modal -->


                				<?= anchor('cadastro/create', 'Novo Cadastro', array('class' => 'btn btn-success')); ?>

                      <p class="text-muted font-13 m-b-30">
                        <? if ($cadastros->num_rows() > 0): ?>
                      </p>

                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                							<th>Código</th>
                							<th>Nome</th>
                							<th>Telefone</th>
                							<th>E-mail</th>
                							<th>Observações</th>
                							<th>Ações</th>
                						</tr>
                          </thead>


                          <tbody>
                            <? foreach($cadastros -> result() as $cadastro): ?>
                						<tr>
                							<td><?= $cadastro->id ?></td>
                							<td><?= $cadastro->nome ?></td>
                							<td><?= $cadastro->telefone ?></td>
                							<td><?= $cadastro->email ?></td>
                							<td><?= $cadastro->observacoes ?></td>
                							<td><?= anchor("cadastro/edit/$cadastro->id", "Editar", "class='btn btn-primary waves-effect waves-light'") ?>
                								 | <a href="#" class='confirma_exclusao btn btn-danger waves-effect waves-light' data-id="<?= $cadastro->id ?>" data-nome="<?= $cadastro->nome ?>" />Excluir</a></td>
                						</tr>
                						<? endforeach; ?>
                          </tbody>
                      </table>
                    <? else: ?>
                      <h4>Nenhum registro cadastrado.</h4>
                    <? endif; ?>
                  </div>
              </div>
          </div>
          <!-- end row -->

          <div class="modal fade" id="modal_confirmation">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Confirmação de Exclusão</h4>
                </div>
                <div class="modal-body">
                  <p>Deseja realmente excluir o registro <strong><span id="nome_exclusao"></span></strong>?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Agora não</button>
                  <button type="button" class="btn btn-primary waves-effect waves-light" id="btn_excluir">Sim. Acabe com ele</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
          <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
          <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

          <script>

        		var base_url = "<?= base_url(); ?>";

        		$(function(){
        			$('.confirma_exclusao').on('click', function(e) {
        			    e.preventDefault();

        			    var nome = $(this).data('nome');
        			    var id = $(this).data('id');

        			    $('#modal_confirmation').data('nome', nome);
        			    $('#modal_confirmation').data('id', id);
        			    $('#modal_confirmation').modal('show');
        			});

        			$('#modal_confirmation').on('show.bs.modal', function () {
        			  var nome = $(this).data('nome');
        			  $('#nome_exclusao').text(nome);
        			});

        			$('#btn_excluir').click(function(){
        				var id = $('#modal_confirmation').data('id');
        				document.location.href = base_url + "index.php/cadastro/delete/"+id;
        			});
        		});
        	</script>

      </div> <!-- end container -->
  </div>
  <!-- end wrapper -->

  <!-- jQuery  -->

  <script src="<?= base_url() ?>assets/js/detect.js"></script>
  <script src="<?= base_url() ?>assets/js/fastclick.js"></script>
  <script src="<?= base_url() ?>assets/js/jquery.slimscroll.js"></script>
  <script src="<?= base_url() ?>assets/js/jquery.blockUI.js"></script>
  <script src="<?= base_url() ?>assets/js/waves.js"></script>
  <script src="<?= base_url() ?>assets/js/wow.min.js"></script>
  <script src="<?= base_url() ?>assets/js/jquery.nicescroll.js"></script>
  <script src="<?= base_url() ?>assets/js/jquery.scrollTo.min.js"></script>

  <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.js"></script>

  <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/buttons.bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/jszip.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/pdfmake.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/vfs_fonts.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.keyTable.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/responsive.bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.scroller.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.colVis.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

  <script src="<?= base_url() ?>assets/pages/datatables.init.js"></script>

  <!-- App core js -->
  <script src="<?= base_url() ?>assets/js/jquery.core.js"></script>
  <script src="<?= base_url() ?>assets/js/jquery.app.js"></script>

  <script type="text/javascript">
      $(document).ready(function () {
          $('#datatable').dataTable();
          $('#datatable-keytable').DataTable({keys: true});
          $('#datatable-responsive').DataTable();
          $('#datatable-colvid').DataTable({
              "dom": 'C<"clear">lfrtip',
              "colVis": {
                  "buttonText": "Change columns"
              }
          });
          $('#datatable-scroller').DataTable({
              ajax: "assets/plugins/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
          });
          var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
          var table = $('#datatable-fixed-col').DataTable({
              scrollY: "300px",
              scrollX: true,
              scrollCollapse: true,
              paging: false,
              fixedColumns: {
                  leftColumns: 1,
                  rightColumns: 1
              }
          });
      });
      TableManageButtons.init();

  </script>


</body>
</html>
