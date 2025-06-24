<?php
function display() 
{
    $count = 1;
    $total_price = 0;
    $book_id_amount = array();

    if (isset($_SESSION['cart'])) 
    {
        foreach ($_SESSION['cart'] as $id => $value) 
        {
            $rate = $value['quantity'] * $value['price'];
            $total_price += $rate;
            $book_info = '(Name: ' . $value['name'] . '. Amount: ' . $value['quantity'] . ')';
            array_push($book_id_amount, $book_info);

            echo '
                <tr>
                    <td>' . $count . '</td>
                    <td>' . $value['name'] . '</td>
                    <td><img src="' . $value['img'] . '" width="50" height="70"></td>
                    <td><input type="number" min="1" value="' . $value['quantity'] . '" style="width: 50px" name="' . $id . '"></td>
                    <td>' . $value['price'] . '</td>
                    <td>' . $rate . '</td>
                    <td><a class="btn btn-outline-danger" href="../functions/add_to_cart.php?id=' . $id . '&action=delete">Delete</a></td>
                </tr>';

            $count++;
        }
    }

    $amount_of_books = implode(', ', $book_id_amount);

    echo '
        <tr>
            <td colspan="5">Total: </td>
            <td colspan="2">₹ ' . $total_price . '</td>
        </tr>';

    $_SESSION['client']['order_total_price'] = $total_price;
    $_SESSION['client']['order_books_name'] = $amount_of_books;
}
?>