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

      if (!$this->isValidBook($json)) {
        continue;
      }

      $book = new Book($this->db);
      $book->setValues($json);

      $book->addRecord();
      
      if (is_array($book->isbn_10)) {
        foreach($book->isbn_10 as $isbn_10) {
          $book->addISBN($isbn_10, "isbn_10");
        }
      }
      if (is_array($book->isbn_13)) {
        foreach($book->isbn_13 as $isbn_13) {
          $book->addISBN($isbn_13, "isbn_13");
        }
      }
      if (is_array($book->authors)) {
        foreach($book->authors as $author) {
          $book->addAuthorIndex($author["key"]);
        }
      }

      if (is_array($book->covers)) {
        foreach($book->covers as $cover) {
          if (!empty($cover)) {
            $book->addCover($cover);
          }
        }
      }

      if (is_array($book->subjects)) {
        foreach($book->subjects as $subject) {
          $book->addSubject($subject);
        }
      }

    }
    fclose($this->handle);
  }

  // Does the book have the values we want?
  public function isValidBook($json) {
    if (!isset($json["isbn_10"]) && !isset($json["isbn_13"])) {
      return false;
    }

    if (!isset($json["title"])) {
      return false;
    }
    if (!isset($json["authors"]) && !isset($json["by_statement"])) {
      return false;
    }

    return true;
  }

}

