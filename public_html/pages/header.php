<!DOCTYPE html>
<html>
<!--
    This page is inspired by a basic template from w3schools: https://www.w3schools.com/w3css/tryw3css_templates_cafe.htm
    The template is modified for educational purposes, as a starter for a PHP server project
-->

<head>
    <title>Café PHP</title>
    <meta charset="UTF-8">
    <meta name="keywords" content="PHP, HTML, CSS, Bootstrap, JavaScript">
    <meta name="description" content="A fictitious cafe for the purpose of teaching basic web server programming.">
    <meta name="author" content="https://github.com/TeacherArea">
    <link rel="icon" href="img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/n2foggimtz8mxzay5lakmbv9a51nnpnlh4e5cvl1iudzoaru/tinymce/6/tinymce.min.js" referrerpolicy="origin" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: 'textarea.init-textarea'
            });
        });
    </script>
</head>

<body>
    <nav class="navbar bg-dark fixed-top navbar-expand-sm bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=home">Cafe PHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100 justify-content-between">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=home">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=home#menu">MENU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=shop">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=blog">BLOG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=home#about">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=home#where">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>