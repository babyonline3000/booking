<?php
/**
 * Created by PhpStorm.
 * User: Cosmos
 * Date: 20.07.20
 * Time: 19:39
 */

class m200720_183800_rooms_and_reserved_room extends \yii\db\Migration
{
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%rooms}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->notNull()
        ], $tableOptions);

        $this->createTable('{{%reserved_room}}',[
            'id' => $this->primaryKey(),
            'rooms_id' => $this->integer(),
            'username' => $this->string(255)->notNull(),
            'phone' => $this->string(20)->notNull(),
            'date_to_reserved' => $this->date()->notNull(),
            'created_at' => $this->dateTime()->notNull()
        ], $tableOptions);

        $this->addForeignKey('reserved_rooms_fk_rooms_id', '{{%reserved_room}}', 'rooms_id', '{{%rooms}}', 'id', 'set null', 'cascade');
    }

    public function safeDown()
    {
        $this->dropForeignKey('reserved_rooms_fk_rooms_id', '{{%reserved_room}}');
        $this->dropTable('{{%rooms}}');
        $this->dropTable('{{%reserved_room}}');
    }
} 