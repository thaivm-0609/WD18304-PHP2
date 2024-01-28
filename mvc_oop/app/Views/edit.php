<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sản phẩm</title>
</head>
<body>
    <form action="<?=route('/products/'.$product['id'].'/update')?>" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?=$product['name']?>">
        <br>
        <label for="description">Description</label>
        <input type="text" name="description" value="<?=$product['description']?>">
        <br>
        <label for="price">Price</label>
        <input type="number" name="price" value="<?=$product['price']?>">
        <br>
        <label for="status">Status</label>
        <input type="text" name="status" value="<?=$product['status']?>">
        <br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>