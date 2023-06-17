<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <form class="row g-3 needs-validation" action="post.php" method="POST" novalidate>
            <div class="col-md-12">
                <label for="cliente" class="form-label">Cliente</label>
                <input type="text" class="form-control" id="cliente" name="cliente" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-8">
                <label for="produto1" class="form-label">Produto 1</label>
                <input type="text" class="form-control" id="produto1" name="produto[]" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="quantidade1" class="form-label">Quantidade</label>
                <select class="form-select" id="quantidade1" name="quantidade[]" required>
                    <option selected disabled value="">Escolha a quantidade</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                <div class="invalid-feedback">
                    Informe a quantidade
                </div>
            </div>

            <div class="col-md-8">
                <label for="produto2" class="form-label">Produto 2</label>
                <input type="text" class="form-control" id="produto2" name="produto[]" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="quantidade2" class="form-label">Quantidade</label>
                <select class="form-select" id="quantidade2" name="quantidade[]" required>
                    <option selected disabled value="">Escolha a quantidade</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                <div class="invalid-feedback">
                    Informe a quantidade
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Salvar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>