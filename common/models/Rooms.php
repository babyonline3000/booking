<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Rooms model
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class Rooms extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%rooms}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['name'], 'required'],
            [['name', 'description'], 'string'],
            [['name', 'description'], 'trim'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'                   => 'ID',
            'name'                 => 'Название',
            'description'          => 'Описание',
        ];
    }
}
