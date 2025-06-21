<?php
try {
    $conn = new PDO(
        "sqlsrv:Server=localhost\\MSSQLSERVER;Database=CybertelRecursosHumanos",
        "admin",
        "ImperioPeru2025+"
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error PDO: " . $e->getMessage());
}
?>