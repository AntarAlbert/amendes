<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <style>
    .bordureRouge {
        border: 3px solid red;
        padding: 10px;
    }

    .bordureVerte {
        border: 3px solid green;
        padding: 10px;
    }

    .bordureBleue {
        border: 3px solid blue;
        padding: 10px;
    }

    .bordureJaune {
        border: 3px solid yellow;
        padding: 10px;
    }

    .bordureOrange {
        border: 3px solid orange;
        padding: 10px;
    }

    .header-1,
    .header-2,
    .header-3 {
        min-height: 100px;
    }

    .section-1,
    .section-2,
    .section-3 {
        min-height: 400px;
    }
    </style>

    <body>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-prnum_pvary">
                    MODIFICATION AMENDE
                </div>
                <div class="card-body">
                    <form method="post" id="update_part_penalite" name="update_part_penalite"
                        action="<?= site_url('/update-part_penalite') ?>">
                        <?php $d = ['id', 'num_pv', 'date_fin', 'cin', 'id_penalite', 'id_agent', 'id_recapitulatif', 'constatation', 'montant_penalite', 'montant_paye', 'montant_reste', 'montant_paye', 'montant_reste']; ?>
                        <input type="hidden" name="id" id="id" value="<?= $part_penalite['id'] ?? set_value('id'); ?>">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?= form_label('Pénalité', "id_penalite", array('class' => 'form-label')); ?>
                                    <?php
                                $options = [
                                    '1'  => 'Service de la Finance Extérieure',
                                ];
                                $js = [
                                    'id'       => 'id_penalite',
                                    'class' => 'form-control form-select',
                                    'onChange' => 'some_function();',
                                    'aria-label' => 'Entrer Lieu de la rédaction'
                                ];
                                echo form_dropdown('id_penalite', $options, $part_penalite['id_penalite'] ?? set_value('id_penalite'), $js); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?= form_label('Matricule', 'id_agent', array('class' => 'form-label')); ?>
                                <?php
                            $data = [
                                'name'     => 'id_agent',
                                'id'       => 'id_agent',
                                'value'    => $part_penalite['id_agent'] ?? set_value('id_agent'),
                                'required' => true,
                                'class' => 'form-control',
                                'placeholder' => 'id_agent',
                            ];
                            echo form_input($data); ?>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?= form_label('Part Agent', 'id_recapitulatif', array('class' => 'form-label')); ?>
                                    <?php
                                $options = [
                                    '1'  => '2006-008',
                                ];
                                $js = [
                                    'id'       => 'id_recapitulatif',
                                    'class' => 'form-control form-select',
                                    'onChange' => 'some_function();',
                                    'aria-label' => 'Entrer Part Agent'
                                ];
                                echo form_dropdown('id_recapitulatif', $options, $part_penalite['id_recapitulatif'] ?? set_value('id_recapitulatif'), $js); ?>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <?= form_label('date début', 'date_debut', array('class' => 'form-label')); ?>
                                    <?php
                                $data = [
                                    'name'     => 'date_debut',
                                    'id'       => 'date_debut',
                                    'value'    =>  $part_penalite['date_debut'] ?? set_value('date_debut'),
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'date debut',
                                ];
                                echo form_input($data); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?= form_label('date fin', 'date_fin', array('class' => 'form-label')); ?>
                                    <?php
                                $data = [
                                    'name'     => 'date_fin',
                                    'id'       => 'date_fin',
                                    'value'    => $part_penalite['date_fin'] ?? set_value('date_fin'),
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'Entrer date fin',
                                ];
                                echo form_input($data); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-around custom-line">
                            <div class="col-2 m-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-prnum_pvary btn-block">Enregistrer</button>
                                </div>
                            </div>
                            <div class="col-2 m-2">
                                <div class="form-group">
                                    <button class="btn btn-info">Annuller</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-md-center">
                    &copy; 2022
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
                crossorigin="anonymous">
            </script>
    </body>

</html>