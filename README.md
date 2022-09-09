
# Holiday Chat Agent Installation Guide

1) Must have PHP 8.0*
2) https://getcomposer.org/download/ - download composer
3) https://symfony.com/download - download the symfony cli
4) Clone the repo / CD holiday-chat-Agent
5) Install packages - $composer install
6) Run migrations - $php bin/console doctrine:migrations:migrate
7) symfony server:start
8) head to http://127.0.0.1:8000/