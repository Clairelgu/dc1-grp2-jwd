<?php
function getAllTagsByPhoto(int $id): array {
    global $connection;

    $query = "SELECT
                tag.id,
                tag.libelle
            FROM tag
            INNER JOIN photo_has_tag ON tag.id = photo_has_tag.tag_id
            WHERE photo_has_tag.photo_id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll();
}