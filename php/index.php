<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
</nav>


<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Naam</th>
        <th scope="col">Acties</th>
    </tr>
    </thead>
    <tbody>
    <?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=alcohol", "root", "");

        $query = $db->prepare("SELECT * FROM vodka");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $data) {
            ?>
            <tr>
                <th scope="row"><?= $data['id'] ?></th>
                <td><?= $data['naam'] ?></td>
                <td><a href="detail.php?id=<?= $data['id'] ?>">Detail</a></td>
                <td><a href="new.php">Add new</a></td>
                <td><a href="edit.php?id=<?= $data['id'] ?>">Edit</a></td>
                <td><a href="delete.php?id=<?= $data['id'] ?>">Delete</a></td>
            </tr>
            <?php
        }
    } catch (PDOException $e) {
        die ("Error!:" . $e->getMessage());
    }
    ?>
    </tbody>
</table>

</body>
</html>