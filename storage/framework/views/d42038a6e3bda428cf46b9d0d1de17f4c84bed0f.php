<div class="modal fade" id="modal-edit-measure" data-name="modalek">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edytuj jednostkę miary</h4>
            </div>
            <div class="modal-body">

                <?php echo Form::open(array('url' => '/measures/update', 'method' => 'get', 'class' => 'form-horizontal')); ?>

                <div class="form-group">
                    <?php echo Form::label('short_name', 'Skrót', array('class' => 'col-sm-2 control-label', 'for' => 'short_name')); ?>

                    <div class="col-sm-10">
                        <?php echo Form::text('short_name', null, array('class' => 'form-control', 'required')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <?php echo Form::label('name', 'Nazwa', array('class' => 'col-sm-2 control-label', 'for' => 'name')); ?>

                    <div class="col-sm-10">
                        <?php echo Form::text('name', null, array('class' => 'form-control', 'required')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-8 col-lg-offset-2">
                        <?php echo Form::submit('Zapisz', array('class' => 'btn btn-primary')); ?>

                    </div>
                </div>

                <?php echo Form::close(); ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="modal-new-measure">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Dodaj nową jednostkę miary</h4>
            </div>
            <div class="modal-body">
                <?php echo Form::open(array('url' => '/measures/store', 'method' => 'get', 'class' => 'form-horizontal')); ?>

                <div class="form-group">
                    <?php echo Form::label('short_name', 'Skrót', array('class' => 'col-sm-2 control-label', 'for' => 'short_name')); ?>

                    <div class="col-sm-10">
                        <?php echo Form::text('short_name', null, array('class' => 'form-control')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <?php echo Form::label('name', 'Nazwa', array('class' => 'col-sm-2 control-label', 'for' => 'name')); ?>

                    <div class="col-sm-10">
                        <?php echo Form::text('name', null, array('class' => 'form-control')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-8 col-lg-offset-2">
                        <?php echo Form::submit('Zapisz', array('class' => 'btn btn-primary')); ?>

                    </div>
                </div>


                <?php echo Form::close(); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal-new-material">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Dodaj nowy materiał</h4>
            </div>
            <div class="modal-body">
                <?php echo Form::open(array('url' => '/material/store', 'method' => 'get', 'class' => 'form-horizontal')); ?>


                <div class="form-group">
                    <?php echo Form::label('code', 'Kod', array('class' => 'col-sm-3 control-label', 'for' => 'code')); ?>

                    <div class="col-sm-9">
                        <?php echo Form::text('code', null, array('class' => 'form-control')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <?php echo Form::label('name', 'Nazwa', array('class' => 'col-sm-3 control-label', 'for' => 'name')); ?>

                    <div class="col-sm-9">
                        <?php echo Form::text('name', null, array('class' => 'form-control')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <?php echo Form::label('group', 'Grupa materiału', array('class' => 'col-sm-3 control-label', 'for' => 'group')); ?>

                    <div class="col-sm-9">
                        <?php echo Form::select('group', $select_group, null, array('class' => 'form-control')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <?php echo Form::label('measure', 'Jednostka Miary', array('class' => 'col-sm-3 control-label', 'for' => 'measure')); ?>

                    <div class="col-sm-9">
                        <?php echo Form::select('measure', $select_measures, null, array('class' => 'form-control')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-lg-offset-3">
                        <?php echo Form::submit('Zapisz', array('class' => 'btn btn-primary')); ?>

                    </div>
                </div>


                <?php echo Form::close(); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal-new-material-groups">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Dodaj nową grupę materiałów</h4>
            </div>
            <div class="modal-body">
                <?php echo Form::open(array('url' => '/material-group/store', 'method' => 'get', 'class' => 'form-horizontal')); ?>


                <div class="form-group">
                    <?php echo Form::label('name', 'Nazwa', array('class' => 'col-sm-3 control-label', 'for' => 'name')); ?>

                    <div class="col-sm-9">
                        <?php echo Form::text('name', null, array('class' => 'form-control', 'required')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <?php echo Form::label('group', 'Umieść w grupie', array('class' => 'col-sm-3 control-label', 'for' => 'group')); ?>

                    <div class="col-sm-9">
                        <?php echo Form::select('group', $select_group, null, array('class' => 'form-control selectpicker', 'multiple data-max-options' => 1)); ?>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-lg-offset-3">
                        <?php echo Form::submit('Zapisz', array('class' => 'btn btn-primary')); ?>

                    </div>
                </div>

                <?php echo Form::close(); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="rename-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Zmień nazwę grupy</h4>
            </div>
            <div class="modal-body">
                <?php echo Form::open(array('url' => '/material-group/rename', 'method' => 'get', 'class' => 'form-horizontal')); ?>


                <div class="form-group">
                    <?php echo Form::label('name', 'Nazwa', array('class' => 'col-sm-2 control-label', 'for' => 'name')); ?>

                    <div class="col-sm-10">
                        <?php echo Form::text('name', null, array('class' => 'form-control', 'required')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-8 col-lg-offset-2">
                        <?php echo Form::submit('Zapisz', array('class' => 'btn btn-primary')); ?>

                    </div>
                </div>


                <?php echo Form::close(); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="change-group-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Zmień element nadrzędny dla - </h4>
            </div>
            <div class="modal-body">
                <?php echo Form::open(array('url' => '/material-group/update', 'method' => 'get', 'class' => 'form-horizontal')); ?>


                <div class="form-group">
                    <?php echo Form::label('name', 'Nazwa', array('class' => 'col-sm-2 control-label', 'for' => 'name')); ?>

                    <div class="col-sm-10">
                        <?php echo Form::text('name', null, array('class' => 'form-control', 'required')); ?>

                    </div>
                </div>

                <div class="form-group">

                    <div class="col-sm-8 col-lg-offset-2">
                        <div class="btn-group">
                            <?php echo Form::submit('Zapisz', array('class' => 'btn btn-success', 'name' => 'save')); ?>

                            <?php echo Form::submit('Usuń', array('class' => 'btn btn-danger', 'name' => 'destroy')); ?>

                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <?php echo Form::label('group', 'Grupy', array('class' => 'col-sm-2 control-label', 'for' => 'group')); ?>

                    <div class="col-sm-10">
                        <?php echo Form::select('group', $select_group, null, array('class' => 'form-control')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-8 col-lg-offset-2">
                        <?php echo Form::submit('Uaktualnij nadrzędny element', array('class' => 'btn btn-primary', 'name' => 'update')); ?>

                    </div>
                </div>

                <?php echo Form::close(); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="modal-update-material">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Zmień dane materiału</h4>
            </div>
            <div class="modal-body">
                <?php echo Form::open(array('url' => '/material/action', 'method' => 'get', 'class' => 'form-horizontal')); ?>


                <div class="form-group">
                    <?php echo Form::label('code', 'Kod', array('class' => 'col-sm-3 control-label', 'for' => 'code')); ?>

                    <div class="col-sm-9">
                        <?php echo Form::text('code', null, array('class' => 'form-control')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <?php echo Form::label('name', 'Nazwa', array('class' => 'col-sm-3 control-label', 'for' => 'name')); ?>

                    <div class="col-sm-9">
                        <?php echo Form::text('name', null, array('class' => 'form-control')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <?php echo Form::label('group', 'Grupa materiału', array('class' => 'col-sm-3 control-label', 'for' => 'group')); ?>

                    <div class="col-sm-9">
                        <?php echo Form::select('group', $select_group, null, array('class' => 'form-control')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <?php echo Form::label('measure', 'Jednostka Miary', array('class' => 'col-sm-3 control-label', 'for' => 'measure')); ?>

                    <div class="col-sm-9">
                        <?php echo Form::select('measure', $select_measures, null, array('class' => 'form-control')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-lg-offset-3">
                        <div class="btn-group">
                            <?php echo Form::submit('Zapisz', array('class' => 'btn btn-success', 'name' => 'save')); ?>

                            <?php echo Form::submit('Usuń', array('class' => 'btn btn-danger', 'name' => 'destroy')); ?>

                        </div>
                    </div>
                </div>


                <?php echo Form::close(); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->