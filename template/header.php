<?php
$page = Context::retrieveValue("page");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <link rel='icon' href='<?= BASE_URL; ?>favicon.ico' type='image/x-icon'/>
    <link rel='stylesheet' href='<?= BASE_URL; ?>template/stylesheet.css'/>
    <link rel='stylesheet' href='<?= BASE_URL; ?>template/timeline.css'/>
    <link rel='stylesheet' href='<?= BASE_URL; ?>template/skills.css'/>
    <link rel="stylesheet" href="<?= BASE_URL; ?>template/font-awesome/css/font-awesome.min.css">
    <title><?= SITE_TITLE; ?></title>
</head>
<body>
<div id="wrapper">
    <header id="header">
        <div class="title">
            <h1>
                <?= HEADER_TITLE; ?>
                <h2><?= $page ?></h2>
            </h1>
        </div>
        <nav class="navigation">
            <ul>
                <li><a class="<?php if ($page == 'about') {
                        echo('selected');
                    } ?>" href="<?= BASE_URL; ?>index.php/about">&#x1F471; ABOUT</a></li>
                <li><a class="<?php if ($page == 'notes') {
                        echo('selected');
                    } ?>" href="<?= BASE_URL; ?>index.php/notes">&#x1F4DD; NOTES</a></li>
            </ul>
        </nav>
    </header>
    <section id="content">
        <!--CONTENT-->
