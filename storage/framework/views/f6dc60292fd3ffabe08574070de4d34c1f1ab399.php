<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Page Description">
    <meta name="author" content="largo">
    <title>Page Title</title>

    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/app.js"></script>
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>Materials</h1>
    </div>

    <?php if(Session::has('message')): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong><?php echo Session::get('message'); ?></strong>
        </div>
    <?php endif; ?>

    <div class="col-lg-12">
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Jednostki miary
                        <a href="" data-toggle="modal" data-target="#modal-new-measure">
                            <span class="glyphicon glyphicon-plus" style="float: right;"></span>
                        </a>
                    </h3>
                </div>
                <div class="panel-body">
                    <table class="table table-condensed table-hover" id="measures">
                        <thead>
                        <tr>
                            <th>Skrót</th>
                            <th>Nazwa</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($measures as $measure): ?>
                            <tr>
                                <td><?php echo $measure->short_name; ?></td>
                                <td><?php echo $measure->name; ?></td>
                                <td><a href="#modal-id" data-toggle="modal" data-target="#modal-edit-measure"><span
                                                class="glyphicon glyphicon-pencil"></span></a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Materiały
                        <a href="" data-toggle="modal" data-target="#modal-new-material">
                            <span class="glyphicon glyphicon-plus" style="float: right;"></span>
                        </a>
                    </h3>
                </div>
                <div class="list-group" id="materials">
                    <?php foreach($materials as $material): ?>
                        <a href="#" class="list-group-item" data-toggle="modal" data-target="#modal-update-material">
                            <h4 class="list-group-item-heading">
                                <strong><?php echo $material->name; ?> </strong>
                                <small id="<?php echo $material->measure->id; ?>">[<?php echo $material->measure->short_name; ?>]
                                </small>
                            </h4>
                            <p class="list-group-item-text">
                                <italic id="<?php echo $material->group->id; ?>"><?php echo $material->group->name; ?></italic>
                                <em><?php echo $material->code; ?></em>
                            </p>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Grupy mteriałów
                        <a href="" data-toggle="modal" data-target="#modal-new-material-groups">
                            <span class="glyphicon glyphicon-plus" style="float: right;"></span>
                        </a>
                    </h3>
                </div>
                <div class="panel-body">
                    <div id="group-list">
                        <?php foreach($groups as $el): ?>
                            <?php echo $el; ?>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>

