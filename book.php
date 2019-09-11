<?php

class Book {
  public function __construct() {
    $this->title = "";
    $this->subtitle = "";
    $this->numbers_of_pages = "";
    $this->covers = "";
    $this->isbn_10 = "";
    $this->isbn_13 = "";
    $this->publish_date = "";
    $this->key = "";
    $this->by_statement = "";
    $this->authors = "";
    $this->subjects = "";
    $this->works = "";
    $this->identifiers = "";
  }
  public function setValues($json) {
      if (isset($json["title"])) {
        $this->title =            $json["title"];
      }
      if (isset($json["subtitle"])) {
        $this->subtitle =            $json["subtitle"];
      }
      if (isset($json["numbers_of_pages"])) {
        $this->numbers_of_pages = $json["numbers_of_pages"];
      }
      if (isset($json["covers"])) {
        $this->covers =           $json["covers"];
      }
      if (isset($json["key"])) {
        $this->key =              $json["key"];
      }
      if (isset($json["isbn_10"])) {
        $this->isbn_10 =          $json["isbn_10"];
      }
      if (isset($json["isbn_13"])) {
        $this->isbn_13 =          $json["isbn_13"];
      }
      if (isset($json["publish_date"])) {
        $this->publish_date =     $json["publish_date"];
      }
      if (isset($json["by_statement"])) {
        $this->by_statement =     $json["by_statement"];
      }
      if (isset($json["authors"])) {
        $this->authors =          $json["authors"];
      }
      if (isset($json["subjects"])) {
        $this->subjects =         $json["subjects"];
      }
      if (isset($json["works"])) {
        $this->works =            $json["works"];
      }
      if (isset($json["identifiers"])) {
        $this->identifiers =      $json["identifiers"];
      }
  }
}

