<?php
include 'koneksi.php';

try {
    // Menangani form input jika ada data yang dikirimkan
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ticket_name = $_POST['ticket_name'];
        $ticket_price = $_POST['ticket_price'];

        // Query untuk menambahkan data tiket
        $query = "INSERT INTO tiket (ticket_name, ticket_price) VALUES (:ticket_name, :ticket_price)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':ticket_name', $ticket_name);
        $stmt->bindParam(':ticket_price', $ticket_price);

        if ($stmt->execute()) {
            echo "Ticket added successfully!<br>";
        } else {
            echo "Error adding ticket.<br>";
        }
    }

    // Query untuk mengambil data tiket
    $query = "SELECT * FROM tiket";
    $stmt = $pdo->query($query);

    // Menampilkan data tiket dalam tabel HTML
    echo "<h2>List of Tickets</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Ticket Name</th>
                <th>Ticket Price</th>
            </tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['ticket_name'] . "</td>";
        echo "<td>" . $row['ticket_price'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!-- Form untuk menambah tiket -->
<h2>Add Ticket</h2>
<form method="POST" action="">
    <label for="ticket_name">Ticket Name:</label>
    <input type="text" id="ticket_name" name="ticket_name" required><br><br>

    <label for="ticket_price">Ticket Price:</label>
    <input type="text" id="ticket_price" name="ticket_price" required><br><br>

    <input type="submit" value="Add Ticket">
</form>