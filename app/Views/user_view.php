<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Codeigniter 4 CRUD App Example - positronx.io</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-4">
            <div class="d-flex justify-content-end">
                <a href="<?php echo site_url('/user-form') ?>" class="btn btn-success mb-2">Add User</a>
            </div>
            <?php
		if (isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
		}
		$table = new \CodeIgniter\View\Table();
		$template = [
			'table_open' => '<table class="table table-bordered" id="users-list">',
			// 'table_open' => '<table class="table table-striped"  style="width:100%" id="users-list">',
		];
		$table->setTemplate($template);
		$table->setEmpty('&nbsp;');
		$table->setHeading('User Id', 'Name', 'Email', 'Phone', 'Action');
		foreach ($users as &$user) {
			$action = base_url('edit-view/' . $user['ID']);
			$user['Action'] = '<a href="' . $action . '" class="btn btn-primary btn-sm">Edit</a>&nbsp;';
			$action = base_url('delete/' . $user['ID']);
			$user['Action'] .= '<a href="' . $action . '" class="btn btn-danger btn-sm">Delete</a>';
		}
		$users = $table->generate($users);
		?>
            <div class="mt-3">
                <?= $users; ?>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#users-list').DataTable();
        });
        </script>
    </body>

</html>