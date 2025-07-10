<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250710145309 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE product_material (product_id INT NOT NULL, material_id INT NOT NULL, INDEX IDX_B70E1F024584665A (product_id), INDEX IDX_B70E1F02E308AC6F (material_id), PRIMARY KEY(product_id, material_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product_material ADD CONSTRAINT FK_B70E1F024584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product_material ADD CONSTRAINT FK_B70E1F02E308AC6F FOREIGN KEY (material_id) REFERENCES material (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE product_material DROP FOREIGN KEY FK_B70E1F024584665A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product_material DROP FOREIGN KEY FK_B70E1F02E308AC6F
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE product_material
        SQL);
    }
}
