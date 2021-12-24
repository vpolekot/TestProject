<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
            integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"
            integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" src="script/script.js"></script>
    <title>Welcome to the Club!</title>
</head>
<body>
<br/>
<div class="container">
    <div style="text-align: center;">
        <h3>Welcome to the Club!</h3>
    </div>
    <br/>
    <h5>New member</h5>
    <br/>
    <form method="post" id="user_form">
        <div class="row mb-2">
            <label for="input_name" class="col-sm-1 col-form-label">Name:</label>
            <div class="col-sm-3">
                <input type="input" class="form-control" name="name" id="input_name" pattern="\b([A-Z][-,a-z. ']+[ ]*)+"
                       title="English letters, dots, spaces, apostrophes, hyphens" required>
            </div>
        </div>
        <div class="row mb-2">
            <label for="input_email" class="col-sm-1 col-form-label">Email:</label>
            <div class="col-sm-3">
                <input type="email" class="form-control" id="input_email" name="email" required>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary" id="btn">Add</button>
            </div>
            <div class="col-sm-1">
                <button type="reset" class="btn btn-primary">Clear</button>
            </div>
        </div>
    </form>
    <br/>
    <div style="text-align: center;">
        <h5>Members</h5>
    </div>
    <br/>
    <div class="container" id="table_container">
    </div>

</body>
</html>