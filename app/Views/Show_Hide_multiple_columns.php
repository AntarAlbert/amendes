<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <div>
            <div>
                <span>Show/Hide Columns</span><br>
                <input type="checkbox" name='hide_columns[]' value='0'> Employee
                <input type="checkbox" name='hide_columns[]' value='1'> Email
                <input type="checkbox" name='hide_columns[]' value='2'> Gender
                <input type="checkbox" name='hide_columns[]' value='3'> Salary
                <input type="checkbox" name='hide_columns[]' value='4'> City

                <input type="button" id="but_showhide" value='Show/Hide'>
            </div>


            <!-- Table -->
            <table id='empTable' class='display dataTable'>
                <thead>
                    <tr>
                        <th>Employee name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Salary</th>
                        <th>City</th>
                    </tr>
                </thead>

            </table>
        </div>
        <!-- Datatable CSS -->
        <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

        <!-- jQuery Library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Datatable JS -->
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready(function() {

            // Initialize DataTable
            var empDataTable = $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url': 'ajaxfile.php'
                },
                'columns': [{
                        data: 'emp_name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'gender'
                    },
                    {
                        data: 'salary'
                    },
                    {
                        data: 'city'
                    },
                ]
            });

            // Hide & show columns
            $('#but_showhide').click(function() {
                var checked_arr = [];
                var unchecked_arr = [];

                // Read all checked checkboxes
                $.each($('input[type="checkbox"]:checked'), function(key, value) {
                    checked_arr.push(this.value);
                });

                // Read all unchecked checkboxes
                $.each($('input[type="checkbox"]:not(:checked)'), function(key, value) {
                    unchecked_arr.push(this.value);
                });

                // Hide the checked columns
                empDataTable.columns(checked_arr).visible(false);

                // Show the unchecked columns
                empDataTable.columns(unchecked_arr).visible(true);
            });
        });
        </script>
    </body>

</html>