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
    .custom-line {
        min-height: 5rem;
        margin-bottom: 1rem;
        background-color: RGBa(60, 240, 160, 0.7);
        /*Vert*/
    }

    .custom-line>.col-3,
    .custom-line>.col-4 {
        background-color: RGBa(60, 120, 240, 0.7);
        /*Bleu*/
    }
    </style>

    <body>
        <div class="container">
            <div class="row">
                <form class="col-lg-6">
                    <legend>Légende </legend>
                    <div class="form-group">
                        <label for="texte">Text : </label>
                        <input id="text" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="textarea">Textarea : </label>
                        <textarea id="textarea" type="textarea" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="select">Select : </label>
                        <select id="select" class="form-control">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="pull-right btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-start custom-line">
                <div class="col-4">
                    <p>justify-content-start 1/2</p>
                </div>
                <div class="col-4">
                    <p>justify-content-start 2/2</p>
                </div>
            </div>
            <div class="row justify-content-center custom-line">
                <div class="col-4">
                    <p>justify-content-center 1/2</p>
                </div>
                <div class="col-4">
                    <p>justify-content-center 2/2</p>
                </div>
            </div>
            <div class="row justify-content-end custom-line">
                <div class="col-4">
                    <p>justify-content-end 1/2</p>
                </div>
                <div class="col-4">
                    <p>justify-content-end 2/2</p>
                </div>
            </div>
            <div class="row justify-content-around custom-line">
                <div class="col-4">
                    <p>justify-content-around 1/2</p>
                </div>
                <div class="col-4">
                    <p>justify-content-around 2/2</p>
                </div>
            </div>
            <div class="row justify-content-around custom-line">
                <div class="col-3">
                    <p>justify-content-around 1/3</p>
                </div>
                <div class="col-3">
                    <p>justify-content-around 2/3</p>
                </div>
                <div class="col-3">
                    <p>justify-content-around 3/3</p>
                </div>
            </div>
            <div class="row justify-content-between custom-line">
                <div class="col-4">
                    <p>justify-content-between 1/2</p>
                </div>
                <div class="col-4">
                    <p>justify-content-between 2/2</p>
                </div>
            </div>
            <div class="row justify-content-between custom-line">
                <div class="col-3">
                    <p>justify-content-between 1/3</p>
                </div>
                <div class="col-3">
                    <p>justify-content-between 2/3</p>
                </div>
                <div class="col-3">
                    <p>justify-content-between 3/3</p>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
    </body>

</html>