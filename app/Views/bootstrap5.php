<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
    .container {
        border: 1px solid;
    }

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
    <h1 class="text-center">INFORMATION AGENT BENEFICIAIRE</h1>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">INFORMATION AGENT BENEFICIAIRE</h3>
            </div>
            <div class="panel-body m-2">
                <form method="post" id="update_agent" name="update_agent" action="<?= site_url('/update') ?>">
                    <input type="hidden" name="id" id="id" value="<?php echo $agent_obj['id']; ?>">
                    <div class="row justify-content-md-center">
                        <div class="col-md-3">
                            <div class="form-group">
                                <?= form_label('Civilité', "civilite_id", array('class' => 'form-label')); ?>
                                <?php
                                $options = [
                                    '1'  => 'Monsieur',
                                    '2'  => 'Madame',
                                    '3'  => 'Mademoiselle',
                                ];
                                $js = [
                                    'id'       => 'civilite_id',
                                    'class' => 'form-control form-select',
                                    'onChange' => 'some_function();',
                                    'aria-label' => 'Entrer civilité'
                                ];
                                echo form_dropdown('civilite_id', $options, $agent_obj['civilite_id'], $js); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?= form_label('Matricule', 'im', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'im',
                                    'id'       => 'im',
                                    'value'    => $agent_obj['im'],
                                    'required' => true,
                                    'placeholder' => 'Entrer Matricule',
                                    'class' => 'form-control'
                                ];
                                echo form_input($data); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?= form_label('Sigle', 'sigle', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'sigle',
                                    'id'       => 'sigle',
                                    'value'    => $agent_obj['sigle'],
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'Entrer Sigle',
                                ];
                                echo form_input($data); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <?= form_label('Ordre', 'ordre', array('class' => 'form-label')); ?>
                            <?php
                            $data = [
                                'name'     => 'ordre',
                                'id'       => 'ordre',
                                'value'    => $agent_obj['ordre'],
                                'required' => true,
                                'class' => 'form-control',
                                'placeholder' => 'Entrer l\'ordre',
                            ];
                            echo form_input($data); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Nom', 'nom', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'nom',
                                    'id'       => 'nom',
                                    'value'    => $agent_obj['nom'],
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'Entrer nom',
                                ];
                                echo form_input($data); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Prénom(s)', 'prenom', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'prenom',
                                    'id'       => 'prenom',
                                    'value'    =>  $agent_obj['prenom'],
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'Entrer prénom',
                                ];
                                echo form_input($data); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Fonction de l\'Agent', 'fonction_agent', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'fonction_agent',
                                    'id'       => 'fonction_agent',
                                    'value'    =>  $agent_obj['fonction_agent'],
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'Entrer Fonction',
                                ];
                                echo form_input($data); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Direction/Service/Division', 'division_id', array('class' => 'form-label')); ?>
                                <?php
                                $options = [
                                    '1'  => 'Informatique',
                                    '2'  => 'Opération en Capitale',
                                    '3'  => 'Opération courante (Import/Export)',
                                    '4'  => 'Autre',
                                    '5'  => 'Service Finex',
                                ];
                                $js = [
                                    'id'       => 'division_id',
                                    'class' => 'form-control form-select',
                                    'onChange' => 'some_function();',
                                    'aria-label' => 'Entrer division'
                                ];
                                echo form_dropdown('division_id', $options, $agent_obj['division_id'], $js); ?> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Mail', 'email', array('class' => 'form-label')); ?>
                                <?php
                                $data = [
                                    'name'     => 'email',
                                    'id'       => 'email',
                                    'value'    =>  $agent_obj['email'],
                                    'required' => true,
                                    'class' => 'form-control',
                                    'placeholder' => 'Entrer email',
                                ];
                                echo form_input($data); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Rôle', 'id_recapitulatif', array('class' => 'form-label')); ?>
                                <?php
                                $options = [
                                    '1'  => 'saisissants',
                                    '2'  => 'fonds communs',
                                    '3'  => 'budget général',
                                ];
                                $js = [
                                    'id'       => 'id_recapitulatif',
                                    'class' => 'form-control form-select',
                                    'onChange' => 'some_function();',
                                    'aria-label' => 'Entrer division'
                                ];
                                echo form_dropdown('division_id', $options, $agent_obj['id_recapitulatif'], $js); ?>


                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <?php
                                $data = [
                                    'name'    => 'actif',
                                    'id'      => 'actif',
                                    'value'   =>  $agent_obj['actif'],
                                    'checked' => true,
                                    'style'   => 'margin:10px',
                                    'class' => 'form-check-input'
                                ];
                                echo form_checkbox($data); ?>
                                <?= form_label('Actif', 'actif', array('class' => 'form-check-label')); ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer m-3">
                <div class="row justify-content-around custom-line">
                    <div class="col-2">
                        <div class="form-group">
                            <button class="btn btn-success">Modifier</button>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <button class="btn btn-info">Annuller</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>