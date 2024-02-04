<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css')?>">
    <title>Bookmarks</title>
</head>

<body>
    <header>
        <h1>Add a Bookmark</h1>
        <form action="process" method="post">
            <label>
                Name: <input type="text" name="name">
            </label>
            <label class="url">
                URL: <input type="text" name="url">
            </label>
            <p>Folder</p>
            <select name="folder">
                <option value="Favorites" name="favorites">Favorites</option>
                <option value="Others" name="others">Others</option>
            </select>
            <input type="submit" name="add" value="Add">
        </form>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Folder</th>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $arr){?>
                    <tr>
                    <td><?php echo $arr['folder']  ?></td>
                    <td><?php echo $arr['name'] ?></td>
                    <td><a href="<?php echo $arr['url'] ?>"><?php echo $arr['url'] ?></a></td>
                    <td><a href="<?php echo base_url("bookmarks/delete/{$arr['id']}") ?>">DELETE</a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </main>
</body>

</html>