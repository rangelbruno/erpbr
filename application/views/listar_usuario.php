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
                							<td><?= anchor("cadastro/edit/$cadastro->id", "Editar") ?>
                								 | <a href="#" class='confirma_exclusao' data-id="<?= $cadastro->id ?>" data-nome="<?= $cadastro->nome ?>" />Excluir</a></td>
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

          <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h4 class="modal-title">Modal Content is Responsive</h4>
                      </div>
                      <div class="modal-body">
                          <div class="row">
                              <div class="col-md-6">
                                <form method="post" action="<?=base_url('cadastro/salvar')?>" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label for="field-1" class="control-label">Nome</label>
                                      <input type="text" class="form-control" name="nome" id="nome" value="<?=set_value('nome')?>" placeholder="John">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="field-2" class="control-label">Telefone</label>
                                      <input type="text" class="form-control" name="telefone" id="telefone" value="<?=set_value('telefone')?>" placeholder="Telefone">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="field-3" class="control-label">Email</label>
                                      <input type="text" class="form-control" name="email" id="email" class="form-control" value="<?=set_value('email')?>" placeholder="Email">
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group no-margin">
                                      <label for="field-7" class="control-label">Observações</label>
                                      <textarea class="form-control autogrow" name="observacoes" id="observacoes" placeholder="Write something about yourself" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"><?=set_value('observacoes')?></textarea>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group text-right">
                            <input type="submit" value="Salvar" class="btn btn-success" />
                          </div>


                      </div>
                      <div class="modal-footer">
                          <input type="submit" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                          <input type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                      </div>
                      </form>
                  </div>
              </div>
          </div><!-- /.modal -->

      </div> <!-- end container -->
  </div>
  <!-- end wrapper -->

  <!-- jQuery  -->
  <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
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
