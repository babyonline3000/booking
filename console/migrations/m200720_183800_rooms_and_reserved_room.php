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

        $array = [
            ['Бизнес с двуспальной кроватью','Номер Бизнес с одной большой кроватью. Площадь номера 27 м 2. Вид из окна на город.'],
            ['Бизнес с двумя кроватями','Номер Бизнес с двумя кроватями (twin). Площадь номера 27 м 2. Вид из окна на город.'],
            ['Делюкс','Номер Делюкс На выбор гостя: номер с одной большой кроватью на высоком этаже с живописным видом на городской парк и пруд или номер с одной большой кроватью и раскладным диваном-кроватью. Площадь номера 27 м 2.'],
            ['Люкс','Номер Люкс двухкомнатный. Площадь номера 35 м 2. Живописный вид из окна на парк и пруд.'],
            ['Апартаменты','Номер Апартаменты двухкомнатные. Площадь номера 55 м 2. Живописный вид из окна на парк и город. Мини-кухня в номере.']
        ];

        $this->batchInsert('{{%rooms}}', ['name','description'], $array);

        $this->createTable('{{%reserved_room}}',[
            'id' => $this->primaryKey(),
            'rooms_id' => $this->integer(),
            'username' => $this->string(255)->notNull(),
            'phone' => $this->string(20)->notNull(),
            'date_to_reserved' => $this->date()->notNull(),
            'date_out_reserved' => $this->date()->notNull(),
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