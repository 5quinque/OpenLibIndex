# OpenLibIndex

Parse the JSON from an openlibrary dump into a MySQL database, to be indexed via Sphinx

[https://openlibrary.org/developers/dumps](https://openlibrary.org/developers/dumps)

## Getting only JSON from tab seperated dump

```bash
wget https://openlibrary.org/data/ol_dump_latest.txt.gz
gunzip ol_dump_latest.txt.gz
awk -F $'\t' '{print $5}' ol_dump_latest.txt > dump.json
```

## Running

```bash
php run.php
```

## Dependencies

 - php7
 - php-json

## License

    Copyright (C) 2019 Linnit

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>

