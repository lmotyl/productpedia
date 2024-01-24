composer install;
bin/console lexik:jwt:generate-keypair
bin/console doctrine:migrations:migrate
bin/console doctrine:fixtures:load
bin/console --env=test doctrine:database:create