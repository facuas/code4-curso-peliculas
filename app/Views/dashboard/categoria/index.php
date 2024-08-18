<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>
<body>
    <h1>Listado Categorias</h1>

    <a href="/dashboard/categoria/new">Crear</a>
    <table>
        <tr>
            <th>
                id
            </th>
            <th>
                Titulo
            </th>
            <th>
                Opciones
            </th>
        </tr>
        <?php foreach ($categorias as $key => $c) : ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= $c['titulo']  ?></td>
            <td><a href="/dashboard/categoria/show/<?= $c['id']?>">Show</a></td>
            <td><a href="/dashboard/categoria/edit/<?= $c['id']?>">Edit</a></td>
            <td>
            <form action="/dashboard/categoria/delete/<?= $c['id']?>" method="post">
                <button type="submit">Delete</button>
            </form>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>