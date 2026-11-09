<?php
// Shared database settings for CIS 239 projects.
// This file lives in a "config" folder NEXT TO htdocs, not inside it,
// so a web address can never reach it.
//
//   Classroom Mac:   /Applications/XAMPP/xamppfiles/config/db-config.php
//   Windows at home: C:\xampp\config\db-config.php
//
// The database name is not stored here. Each project names its own database.

return [
    'host'     => 'localhost',
    'user'     => 'cis239_app',
    'password' => 'Cis239Classroom',
];