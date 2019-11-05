<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191104222751 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create table city';
    }

    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('city');

        $table->addColumn('id', 'integer', [
            'autoincrement' => true,
        ]);

        $table->addColumn('name', 'string', [
            'Notnull' => true,
            'Length' => 50,
        ]);

        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('city');
    }
}
