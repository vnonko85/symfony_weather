<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191104224118 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create table weather_info';
    }

    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('weather_info');

        $table->addColumn('id', 'integer', [
            'autoincrement' => true,
        ]);

        $table->addColumn('date', 'integer');
        $table->addColumn('temp', 'float');
        $table->addColumn('humidity', 'integer');
        $table->addColumn('pressure', 'integer');
        $table->addColumn('city_id', 'integer');

        $table->setPrimaryKey(['id']);

        $table->addForeignKeyConstraint('city', ['city_id'], ['id'], [
            'onDelete' => 'CASCADE',
        ]);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('weather_info');
    }
}
