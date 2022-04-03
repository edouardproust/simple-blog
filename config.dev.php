<?php

const SITE_NAME = "Blog";

const APP_ENV = 'dev';

const DB_TYPE = 'mysql';
const DB_HOST = 'localhost';
const DB_PORT = '8000';
const DB_NAME = 'main';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'root';

const MAIN_MENU = [
    ['index.php', 'Home'],
    ['pages/newsletter.php', 'Newsletter']
];

const FOOTER_HIDE_NEWSLETTER_LOCATIONS = [
    'pages/newsletter.php',
    'admin',
];
