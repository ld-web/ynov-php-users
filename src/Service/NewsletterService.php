<?php

namespace App\Service;

use Exception;

class NewsletterService extends AbstractService
{
  /**
   * Inserts a new email in database
   *
   * @param string $email
   * @return boolean
   * @throws Exception
   */
  public function insertEmail(string $email): bool
  {
    $query = "INSERT INTO newsletter (email) VALUES (:mail)";
    try {
      $stmt = $this->db->prepare($query);
      if (!$stmt->bindParam('mail', $email)) {
        throw new Exception("Erreur de liaison de paramètre");
      }
      return $stmt->execute();
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
