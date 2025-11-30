<?php
session_start();
include 'connection.php';

// if (!isset($_SESSION['u_id'])) {
//     echo "<script>alert('Please login to continue.'); window.location='login.php';</script>";
//     exit;
// }

$u_id = $_SESSION['u_id'];
$action = $_REQUEST['action'] ?? '';

if ($action === 'add') {
    $p_id = intval($_POST['p_id'] ?? 0);
    $qty = max(1, intval($_POST['qty'] ?? 1));

    // Fetch product details
    $stmt = $con->prepare("SELECT p_name, p_price, p_image_url FROM product WHERE p_id = ?");
    $stmt->bind_param("i", $p_id);
    $stmt->execute();
    $product = $stmt->get_result()->fetch_assoc();

    if (!$product) {
        echo "<script>alert('Product not found'); window.location='products.php';</script>";
        exit;
    }

    $name = $product['p_name'];
    $price = intval($product['p_price']);
    $img = $product['p_image_url'];
    $subtotal = $price * $qty;

    // if exists, update; else insert
    $check = $con->prepare("SELECT qty FROM cart WHERE u_id = ? AND p_id = ?");
    $check->bind_param("ii", $u_id, $p_id);
    $check->execute();
    $res = $check->get_result();

    if ($res->num_rows > 0) {
        $update = $con->prepare("UPDATE cart SET qty = qty + ?, subtotal = subtotal + ? WHERE u_id = ? AND p_id = ?");
        $update->bind_param("iiii", $qty, $subtotal, $u_id, $p_id);
        $update->execute();
    } else {
        $insert = $con->prepare("INSERT INTO cart (u_id, p_id, product_name, p_price, qty, subtotal, img) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insert->bind_param("iisiiss", $u_id, $p_id, $name, $price, $qty, $subtotal, $img);
        $insert->execute();
    }

    echo "<script>alert('Product added to cart'); window.location='cart.php';</script>";
    exit;
}

if ($action === 'update_qty') {
    $cart_id = intval($_POST['cart_id'] ?? 0);
    $qty = max(1, intval($_POST['qty'] ?? 1));

    // get price
    $stmt = $con->prepare("SELECT p_price FROM cart WHERE cart_id = ? AND u_id = ?");
    $stmt->bind_param("ii", $cart_id, $u_id);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    if (!$row) {
        echo "Invalid cart item.";
        exit;
    }
    $price = intval($row['p_price']);
    $subtotal = $price * $qty;

    $update = $con->prepare("UPDATE cart SET qty = ?, subtotal = ? WHERE cart_id = ? AND u_id = ?");
    $update->bind_param("iiii", $qty, $subtotal, $cart_id, $u_id);
    $update->execute();

    header("Location: cart.php");
    exit;
}

if ($action === 'remove') {
    $cart_id = intval($_GET['cart_id'] ?? 0);
    $del = $con->prepare("DELETE FROM cart WHERE cart_id = ? AND u_id = ?");
    $del->bind_param("ii", $cart_id, $u_id);
    $del->execute();

    header("Location: cart.php");
    exit;
}

if ($action === 'clear') {
    $del = $con->prepare("DELETE FROM cart WHERE u_id = ?");
    $del->bind_param("i", $u_id);
    $del->execute();

    header("Location: cart.php");
    exit;
}

// move from wishlist -> cart (optional)
if ($action === 'move_from_wishlist') {
    $wish_id = intval($_POST['wish_id'] ?? 0);

    // fetch wishlist entry
    $stmt = $con->prepare("SELECT p_id, product_name, p_price, img FROM wishlist WHERE wish_id = ? AND u_id = ?");
    $stmt->bind_param("ii", $wish_id, $u_id);
    $stmt->execute();
    $w = $stmt->get_result()->fetch_assoc();

    if (!$w) {
        echo "<script>alert('Item not found in wishlist'); window.location='wishlist.php';</script>";
        exit;
    }

    $p_id = intval($w['p_id']);
    $name = $w['product_name'];
    $price = intval($w['p_price']);
    $img = $w['img'];
    $qty = 1;
    $subtotal = $price * $qty;

    // reuse add logic
    $check = $con->prepare("SELECT qty FROM cart WHERE u_id = ? AND p_id = ?");
    $check->bind_param("ii", $u_id, $p_id);
    $check->execute();
    $exist = $check->get_result();

    if ($exist->num_rows > 0) {
        $update = $con->prepare("UPDATE cart SET qty = qty + 1, subtotal = subtotal + ? WHERE u_id = ? AND p_id = ?");
        $update->bind_param("iii", $price, $u_id, $p_id);
        $update->execute();
    } else {
        $insert = $con->prepare("INSERT INTO cart (u_id, p_id, product_name, p_price, qty, subtotal, img) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insert->bind_param("iisiiss", $u_id, $p_id, $name, $price, $qty, $subtotal, $img);
        $insert->execute();
    }

    // remove from wishlist
    $del = $con->prepare("DELETE FROM wishlist WHERE wish_id = ? AND u_id = ?");
    $del->bind_param("ii", $wish_id, $u_id);
    $del->execute();

    echo "<script>alert('Moved to cart'); window.location='cart.php';</script>";
    exit;
}

?>
