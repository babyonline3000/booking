<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * ReservedRoom model
 *
 * @property integer $id
 * @property integer $rooms_id
 * @property string $username
 * @property string $phone
 * @property string $date_to_reserved
 * @property string $date_out_reserved
 * @property string $created_at
 */
class ReservedRoom extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%reserved_room}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'phone', 'date_to_reserved', 'date_out_reserved'], 'required','message' => 'Поле обязательно для заполения'],
            [['username', 'phone', 'date_to_reserved', 'date_out_reserved', 'created_at'], 'string'],
            [['username', 'phone', 'date_to_reserved', 'date_out_reserved', 'created_at'], 'trim'],
            [['rooms_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rooms::class, 'targetAttribute' => ['rooms_id' => 'id']],
//            [['date_out_reserved'], 'default', 'value' => null],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'                => 'ID',
            'rooms_id'          => 'ID номера',
            'username'          => 'Имя пользователя',
            'phone'             => 'Телефон',
            'date_to_reserved'  => 'Дата заезда',
            'date_out_reserved' => 'Дата выезда',
            'created_at'        => 'Дата создания',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => \yii\behaviors\TimestampBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }

    /**
     * @return \common\models\queries\Rooms
     */
    public function getRoom()
    {
        return $this->hasOne(Rooms::class, ['id' => 'rooms_id']);
    }
}
