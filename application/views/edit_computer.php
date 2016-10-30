<!DOCTYPE html>

<html>
        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">

                        <h4 class="page-title">Form elements</h4>
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">Ubold</a>
                            </li>
                            <li>
                                <a href="#">Forms</a>
                            </li>
                            <li class="active">
                                General elements
                            </li>
                        </ol>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title"><b>Input Types</b></h4>
                            <p class="text-muted m-b-30 font-13">
                                Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                            </p>
                            <div class="row">
                                <div class="col-md-6 form">
                                    <?= form_open('CadastroComputer/store')  ?>

                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Tipo</label>
                                                <input type="text" class="form-control" name="tipo" id="tipo" value="<?= set_value('tipo') ? : (isset($tipo) ? $tipo : '')?>" placeholder="Desktop">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Hostname</label>
                                                <input type="text" class="form-control" name="hostname" id="hostname" value="<?= set_value('hostname') ? : (isset($hostname) ? $hostname : ''); ?>" placeholder="CSSMSetor">
                                            </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">MAC</label>
                                                    <input type="text" class="form-control" name="mac" id="mac" class="form-control" value="<?= set_value('mac') ? : (isset($mac) ? $mac : '') ; ?>" placeholder="Número do MAC">
                                                </div>
                                            </div>
                                          </div>

                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">IP Atual</label>
                                                <input type="text" class="form-control" name="ip_atual" id="ip_atual" value="<?= set_value('ip_atual') ? : (isset($ip_atual) ? $ip_atual : '')?>" placeholder="IP Atual">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">IP Novo</label>
                                                <input type="text" class="form-control" name="ip_novo" id="ip_novo" value="<?= set_value('ip_novo') ? : (isset($ip_novo) ? $ip_novo : ''); ?>" placeholder="IP Novo">
                                            </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Setor</label>
                                                <input type="text" class="form-control" name="setor" id="setor" value="<?= set_value('setor') ? : (isset($setor) ? $setor : '')?>" placeholder="Setor">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Usuário</label>
                                                <input type="text" class="form-control" name="usuario" id="usuario" value="<?= set_value('usuario') ? : (isset($usuario) ? $usuario : ''); ?>" placeholder="Usuário">
                                            </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Sistema Operacional</label>
                                                    <input type="text" class="form-control" name="so" id="so" class="form-control" value="<?= set_value('so') ? : (isset($so) ? $so : '') ; ?>" placeholder="Windows 7">
                                                </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="field-1" class="control-label">Processador</label>
                                                  <input type="text" class="form-control" name="processador" id="processador" value="<?= set_value('processador') ? : (isset($processador) ? $processador : '')?>" placeholder="CELERON">
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="field-2" class="control-label">Clock</label>
                                                  <input type="text" class="form-control" name="clock" id="clock" value="<?= set_value('clock') ? : (isset($clock) ? $clock : ''); ?>" placeholder="1,80">
                                              </div>
                                          </div>
                                          </div>

                                          <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="field-1" class="control-label">Modelo Memória</label>
                                                  <input type="text" class="form-control" name="memoria" id="memoria" value="<?= set_value('memoria') ? : (isset($memoria) ? $memoria : '')?>" placeholder="DDR 3">
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="field-2" class="control-label">Capacidade Memória</label>
                                                  <input type="text" class="form-control" name="mem" id="mem" value="<?= set_value('mem') ? : (isset($mem) ? $mem : ''); ?>" placeholder="4">
                                              </div>
                                          </div>
                                          </div>

                                          <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="field-1" class="control-label">HD</label>
                                                  <input type="text" class="form-control" name="hd" id="hd" value="<?= set_value('hd') ? : (isset($hd) ? $hd : '')?>" placeholder="500 GB">
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="field-2" class="control-label">Placa Mãe</label>
                                                  <input type="text" class="form-control" name="modelo" id="modelo" value="<?= set_value('modelo') ? : (isset($modelo) ? $modelo : ''); ?>" placeholder="ASUS">
                                              </div>
                                          </div>
                                          </div>

                                          <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="field-1" class="control-label">Tipo Monitor</label>
                                                  <input type="text" class="form-control" name="tipo_monitor" id="tipo_monitor" value="<?= set_value('tipo_monitor') ? : (isset($tipo_monitor) ? $tipo_monitor : '')?>" placeholder="LED">
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="field-2" class="control-label">Polegada</label>
                                                  <input type="text" class="form-control" name="monitor" id="monitor" value="<?= set_value('monitor') ? : (isset($monitor) ? $monitor : ''); ?>" placeholder="18.5">
                                              </div>
                                          </div>
                                          </div>

                                          <div class="row">
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label for="field-3" class="control-label">Avaliacao</label>
                                                      <input type="text" class="form-control" name="avaliacao" id="avaliacaoo" class="form-control" value="<?= set_value('username') ? : (isset($avaliacao) ? $avaliacao : '') ; ?>" placeholder="5">
                                                  </div>
                                              </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-1" class="control-label">Patrimonio Gabinete</label>
                                                    <input type="text" class="form-control" name="serie_gabinete" id="serie_gabinete" value="<?= set_value('serie_gabinete') ? : (isset($serie_gabinete) ? $serie_gabinete : '')?>" placeholder="xxxxx">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">Patrimonio Monitor</label>
                                                    <input type="text" class="form-control" name="serie_monitor" id="serie_monitor" value="<?= set_value('serie_monitor') ? : (isset($serie_monitor) ? $serie_monitor : ''); ?>" placeholder="xxxxx">
                                                </div>
                                            </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                  <label for="field-3" class="control-label">Observação</label>
                                                    <textarea class="form-control" rows="5" name="observacao" id="observacao"><?= set_value('observacao') ? : (isset($observacao) ? $observacao : ''); ?></textarea>
                                                  </div>
                                                </div>
                                            </div>

                                          <div class="form-group text-right">
                                						<input type="submit" value="Salvar" class="btn btn-success" />
                                					</div>
                                					<input type='hidden' name="id" value="<?= set_value('id') ? : (isset($id) ? $id : ''); ?>">
                                        <?= form_close(); ?>

                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>


                          </div>
                        </div> <!-- end container -->
                      </div>
        <!-- end wrapper -->



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App core js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
