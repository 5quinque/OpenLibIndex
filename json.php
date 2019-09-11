<?php

class JSON {
  public function __construct($file, $dbo) {
    $this->handle = fopen($file, "r");
    if (!$this->handle) {
      die("Error opening file.\n");
    }
    $this->db = $dbo;
  }

  public function readJSON() {
    $book = false;
    while (($line = fgets($this->handle)) !== false) {
      $json = json_decode($line, true);
      // We only want books with an ISBN
      if (!isset($json["isbn_10"]) && !isset($json["isbn_13"])) {
        continue;
      }

      if (!isset($json["title"])) {
        continue;
      }
      if (!isset($json["authors"]) && !isset($json["by_statement"])) {
        continue;
      }

      $book = new Book();
      $book->setValues($json);

      echo "----------------------\n";
      echo "Title: {$book->title}\n";// - {$book->isbn_10}\n";
      #if (!empty($book->by_statement)) {
      #  echo "By: {$book->by_statement}\n";
      #}
      if (is_array($book->authors)) {
        foreach($book->authors as $author) {
          var_dump($author);
          //echo "ISBN 10: {$isbn_10}\n";
        }
      }
      #if (is_array($book->isbn_10)) {
      #  foreach($book->isbn_10 as $isbn_10) {
      #    echo "ISBN 10: {$isbn_10}\n";
      #  }
      #}
      #if (is_array($book->isbn_13)) {
      #  foreach($book->isbn_13 as $isbn_13) {
      #    echo "ISBN 13: {$isbn_13}\n";
      #  }
      #}

      #if (is_array($book->covers)) {
      #  foreach($book->covers as $cover) {
      #    echo "Cover: {$cover}\n";
      #  }
      #}
      #if (!empty($book->publish_date)) {
      #  echo "Publish Date: {$book->publish_date}\n";
      #}
      #$stmt->execute();

      #$wid = $db->lastInsertId();

      #if (isset($json["subjects"])) {
      #  $subjects = $json["subjects"];
      #  foreach($subjects as $subject) {
      #    $subject_stmt->execute();
      #  }
      #}
      echo "----------------------\n";

    }
    fclose($this->handle);
  }
}

