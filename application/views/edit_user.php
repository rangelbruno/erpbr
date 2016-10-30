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
                                    <?= form_open('CadastroUser/store')  ?>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Nome</label>
                                                <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name') ? : (isset($name) ? $name : '')?>" placeholder="John">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Telefone</label>
                                                <input type="text" class="form-control" name="telefone" id="telefone" value="<?= set_value('telefone') ? : (isset($telefone) ? $telefone : ''); ?>" placeholder="Telefone">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" class="form-control" value="<?= set_value('email') ? : (isset($email) ? $email : '') ; ?>" placeholder="Email">
                                                </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label for="field-3" class="control-label">Usuário</label>
                                                      <input type="text" class="form-control" name="username" id="username" class="form-control" value="<?= set_value('username') ? : (isset($username) ? $username : '') ; ?>" placeholder="Usuário">
                                                  </div>
                                              </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                  <label for="field-3" class="control-label">Usuário</label>
                                                    <select class="form-control" name="roles_id" id="roles_id">
                                                        <option><?= set_value('roles_id') ? : (isset($roles_id) ? $roles_id : '') ; ?></option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                    </select>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Senha</label>
                                                        <input type="password" class="form-control" name="password" id="password" class="form-control" value="<?= set_value('password') ? : (isset($password) ? $password : '') ; ?>" placeholder="Senha">
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
