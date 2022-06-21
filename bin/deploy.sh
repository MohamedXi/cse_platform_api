#!/bin/bash

source /opt/cse-platform/.env
readonly BIN=$(dirname $(readlink -m $0))

error_exit()
{
    echo "$1" 1>&2
    exit 1
}

main()
{

#
    [ -z ${APP_ENV+x} ] && error_exit "La variable d'environnement APP_ENV doit être renseignée."

##    local composer="${BIN}/../composer.phar"
##    [ ! -f ${composer} ] && error_exit "composer.phar introuvable"
##
##    ${composer} run-script post-install-cmd
#

#    echo ">>> Cache clear"
#    php -dmemory_limit=-1 ${BIN}/console cache:clear || error_exit "Cache clear failed !"

    echo ">>> Cache warmup"

    php -dmemory_limit=-1 ${BIN}/console cache:warmup || error_exit "Cache warmup failed !"


    echo ">>> DB Migration"
    php -dmemory_limit=-1 ${BIN}/console doctrine:migrations:migrate --no-interaction || error_exit "migrations failed !"

    echo ">>> DB load fixtures"
    php -dmemory_limit=-1 ${BIN}/console doctrine:fixtures:load --no-interaction || error_exit "fixtures failed !"
    

    echo ">>> Updating assets version..."
        php -dmemory_limit=-1 ${BIN}/console assets:install
       echo "...OK !"
#
#
#    if [ -n "${SYMFONY_EXECUTE_TESTS}" ] && [ $SYMFONY_EXECUTE_TESTS == "true" ]; then
#        if [ ! -d "web/reports" ];then
#            echo "Création du dossier web/reports";
#            mkdir web/reports
#        fi
#
#        echo ">>> Launching PHPUnit tests..."
#        php -dmemory_limit=-1 bin/phpunit --coverage-php web/reports/phpunit-php.cov || error_exit "phpunit failed !"
#        echo "...OK !"
#
#        echo ">>> Resetting database schema before functional tests..."
#        bin/console doctrine:schema:drop --force
#        bin/console doctrine:schema:create
#        bin/console doctrine:migrations:version --add --all -n
#        [ $? == 1 ] && error_exit "...failed !"
#        echo "...OK !"
#
#        echo ">>> Loading fixtures..."
#        php -dmemory_limit=-1 bin/console doctrine:fixtures:load -n --no-debug
#        [ $? == 1 ] && error_exit "...failed !"
#        echo "...OK !"
#
#        echo ">>> Launching Behat integration tests..."
##        php -dmemory_limit=-1 bin/behat --suite integration
#        echo "...OK !"
#
#        #echo ">>> Launching Behat interface tests..."
#        #php -dmemory_limit=-1 bin/behat --suite interface
##        bin/phpcov merge web/reports/ --html web/reports/phpunit
#        #echo "...OK !"
#    fi
}

main "$@"
