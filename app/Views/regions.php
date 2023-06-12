<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Les régions de France</title>
</head>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>


<body>
    <h1>Les régions de France</h1>
    <fieldset>
        <legend>Demo 5</legend>
        <input type="button" value="Demo 5" id="buttonDemo5">
        <br>
        <table id="tableProduct">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </fieldset>
    <script type="text/javascript">
        $('#buttonDemo5').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'GET',
                url: '<?= site_url('types-infractions'); ?>',
                success: function(products) {
                    var result = '';
                    for (var i = 0; i < products.length; i++) {
                        result += '<tr>';
                        result += '<td>' + products[i].id + '</td>';
                        result += '<td>' + products[i].libelle_infraction + '</td>';
                        result += '<td>' + products[i].loi + '</td>';
                        result += '</tr>';
                    }
                    $('#tableProduct tbody').html(result);
                }
            });
        });
    </script>
</body>

</html>