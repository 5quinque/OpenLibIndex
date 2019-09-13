<?php

class Book
{
    public function __construct($db, $key = false)
    {
        $this->id = 0;
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

        $this->db = $db;

        if ($key) {
            $this->findBook($key);
        }
    }

    public function findBook($key)
    {
        $this->db->prepareSearch();
        $this->db->search_key = $key;
        $this->db->search_stmt->execute();

        $row = $this->db->search_stmt->fetch();

        var_dump($row);
    }

    public function addRecord()
    {
        $this->db->book_title = $this->title;
        $this->db->book_subtitle = $this->subtitle;
        $this->db->book_numbers_of_pages = $this->numbers_of_pages;
        $this->db->book_key = $this->key;
        $this->db->book_publish_date = $this->publish_date;
        $this->db->book_by_statement = $this->by_statement;

        $this->db->book_stmt->execute();
        $bid = $this->db->handle->lastInsertId();

        $this->id = $bid;

        return $bid;
    }

    public function addISBN($isbn, $format)
    {
        $this->db->isbn_bid = $this->id;
        $this->db->isbn_isbn = $isbn;
        $this->db->isbn_format = $format;

        $this->db->isbn_stmt->execute();
    }

    public function addCover($cover)
    {
        $this->db->cover_bid = $this->id;
        $this->db->cover_cover = $cover;

        $this->db->cover_stmt->execute();
    }

    public function addSubject($subject)
    {
        $this->db->subject_bid = $this->id;
        $this->db->subject_subject = $subject;

        $this->db->subject_stmt->execute();
    }

    public function addAuthorIndex($key)
    {
        $this->db->authorind_bid = $this->id;
        $this->db->authorind_key = $key;

        $this->db->authorind_stmt->execute();
    }

    public function setValues($json)
    {
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
