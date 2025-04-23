Nette Web Project Quartext test
===============================

Requirements
------------

- git
- make
- docker (+ compose)



Installation
------------
```bash
$ git clone git@github.com:JanGalek/quartext_test.git
$ cd quartext_test
$ make build
```


Ensure the `temp/` and `log/` directories are writable.


Web Server Setup
----------------

	make start

Then, open `http://localhost:8085` in your browser to view the welcome page.

**Important Note:** Ensure `app/`, `config/`, `log/`, and `temp/` directories are not web-accessible.
Refer to [security warning](https://nette.org/security-warning) for more details.

