<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
                <form method="post" id="update_agent" name="update_agent" action="<?= site_url('/update-agent') ?>">
                    <?php $d = ['id', 'num_pv', 'nif', 'cin', 'id_lieu_redaction', 'id_autorite_requerente', 'id_reglementation', 'constatation', 'montant_penalite', 'montant_paye', 'montant_reste', 'montant_paye', 'montant_reste']; ?>
                    <input type="hidden" name="id" id="id" value="<?php echo $amende_obj['id']; ?>">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <?= form_label('N°PV', 'num_pv', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'num_pv',
                                    'id'       => 'num_pv',
                                    'value'    => $amende_obj['num_pv'],
                                    'required' => true,
                                    'placeholder' => 'Entrer N°Procès Verbal',
                                    'class' => 'form-control'
                                ];
                                echo form_input($data); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= form_label('Lieu de la rédaction', "id_lieu_redaction", array('class' => 'form-label')); ?>
                                <?php
                                $options = [
                                    '1'  => 'Service de la Finance Extérieure',
                                ];
                                $js = [
                                    'id'       => 'id_lieu_redaction',
                                    'class' => 'form-control form-select',
                                    'onChange' => 'some_function();',
                                    'aria-label' => 'Entrer Lieu de la rédaction'
                                ];
                                echo form_dropdown('id_lieu_redaction', $options, $amende_obj['id_lieu_redaction'], $js); ?>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <?= form_label('Autorité réquérente', 'id_autorite_requerente', array('class' => 'form-label')); ?>
                                <?php
                                $options = [
                                    '1' => 'Le Directeur Générale du Trésor',
                                    '2' => 'Le Secrétaire Général',
                                    '3' => 'Le Ministre chargé des Finances',
                                    '4' => 'Président de la République de Madagascar',
                                    '5' => 'Le Chef du Service de la Finance Extérieure'
                                ];

                                $js = [
                                    'id'       => 'id_autorite_requerente',
                                    'class' => 'form-control form-select',
                                    'onChange' => 'some_function();',
                                    'aria-label' => 'Entrer Rôle Agent'
                                ];
                                echo form_dropdown('id_autorite_requerente', $options, $amende_obj['id_autorite_requerente'], $js); ?>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= form_label('Reglementation', 'id_reglementation', array('class' => 'form-label')); ?>
                                <?php
                                $options = [
                                    '1'  => '2006-008',
                                ];
                                $js = [
                                    'id'       => 'id_reglementation',
                                    'class' => 'form-control form-select',
                                    'onChange' => 'some_function();',
                                    'aria-label' => 'Entrer division'
                                ];
                                echo form_dropdown('id_reglementation', $options, $amende_obj['id_reglementation'], $js); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <?= form_label('Loi portant sur', 'portant', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'portant',
                                    'id'       => 'portant',
                                    'value'    => 'Loi portant sur',
                                    'rows' => 2,
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'Loi portant sur',
                                    'disabled'    => 'disabled'
                                ];
                                echo form_textarea($data); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= form_label('NIF Société', 'nif', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'nif',
                                    'id'       => 'nif',
                                    'value'    => $amende_obj['nif'],
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'Entrer NIF de la société',
                                ];
                                echo form_input($data); ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <?= form_label('Raison sociale', 'raison_sociale', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'raison_sociale',
                                    'id'       => 'raison_sociale',
                                    'value'    => 'raison sociale',
                                    'rows' => 2,
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'Raison sociale',
                                    'disabled'    => 'disabled'
                                ];
                                echo form_textarea($data); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <?= form_label('CIN Gérant', 'cin', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'cin',
                                    'id'       => 'cin',
                                    'value'    => $amende_obj['cin'],
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'Entrer le CIN Gérant',
                                ];
                                echo form_input($data); ?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <?= form_label('Nom et Prénom(s)', 'nom_prenom', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'nom_prenom',
                                    'id'       => 'nom_prenom',
                                    'value'    => 'Nom et Prénom(s)',
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'Nom et Prénom(s)',
                                ];
                                echo form_input($data); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= form_label('Montant Pénalité', 'montant_penalite', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'montant_penalite',
                                    'id'       => 'montant_penalite',
                                    'value'    =>  $amende_obj['montant_penalite'],
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'Entrer Montant Pénalité',
                                ];
                                echo form_input($data); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= form_label('Montant payé', 'montant_paye', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'montant_paye',
                                    'id'       => 'montant_paye',
                                    'value'    =>  $amende_obj['montant_paye'],
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'Montant déjà payé',
                                ];
                                echo form_input($data); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= form_label('Montant reste à payer', 'montant_reste', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'montant_reste',
                                    'id'       => 'montant_reste',
                                    'value'    =>  $amende_obj['montant_reste'],
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'Montant reste à payer',
                                ];
                                echo form_input($data); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <?= form_label('Constatation', 'constatation', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'constatation',
                                    'id'       => 'constatation',
                                    'value'    => $amende_obj['constatation'],
                                    'required' => true,
                                    'rows' => '2',
                                    'class' => 'form-control',
                                    'placeholder' => 'Entrer constatation',
                                ];
                                echo form_textarea($data); ?>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
</body>

</html>