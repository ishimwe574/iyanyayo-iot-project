---
if ($stmt->execute()) {
  echo json_encode([
 'success' => true,
 'message' => 'Data inserted successfully',
 'inserted' => [
     'id' => $stmt->insert_id,
       'temperature' => $temperature,
         'humidity' => $humidity
 ]
  ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Insert failed: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>s