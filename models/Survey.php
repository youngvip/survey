<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "survey".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $region
 * @property string $city
 * @property string $gender
 * @property int $rating
 * @property string $comment
 * @property int $created_at
 * @property int $updated_at
 */
class Survey extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'survey';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'region', 'city', 'gender', 'comment'], 'required'],
            [['rating', 'created_at', 'updated_at'], 'integer'],
            [['comment'], 'string'],
            [['email'], 'email'],
            [['name',  'phone', 'region', 'city', 'gender'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'region' => 'Регион',
            'city' => 'Город',
            'gender' => 'Пол',
            'rating' => 'Рейтинг',
            'comment' => 'Комментарий',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }
}
