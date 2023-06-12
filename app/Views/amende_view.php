<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Codeigniter 4 CRUD App Example - positronx.io</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container-fluid mt-4">
            <div class="d-flex justify-content-end">
                <a href="<?php echo site_url('/add-amende') ?>" class="btn btn-success mb-2">Add amende</a>
            </div>
            <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
        } ?>
            <div class="mt-3">
                <?= $tableamendes; ?>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#amendes-list').DataTable({
                responsive: true,
                language: {
                    lengthMenu: 'Display _MENU_ records per page',
                    zeroRecords: 'Nothing found - sorry',
                    info: 'Showing page _PAGE_ of _PAGES_',
                    infoEmpty: 'No records available',
                    infoFiltered: '(filtered from _MAX_ total records)',
                },
                columnDefs: [{
                    targets: 8,
                    className: 'dt-body-right'
                }, {
                    targets: 9,
                    className: 'dt-body-right'
                }, {
                    targets: 10,
                    className: 'dt-body-right'
                }]
            });
        });
        </script>
    </body>

</html>