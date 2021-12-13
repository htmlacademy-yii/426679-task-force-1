<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "replies".
 *
 * @property int $id
 * @property string $dt_add
 * @property float|null $rate
 * @property string $description
 * @property string|null $title
 * @property int $task_id
 * @property int $doer_id
 *
 * @property Users $doer
 * @property Tasks $task
 */
class Replies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'replies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_add'], 'safe'],
            [['rate'], 'number'],
            [['description', 'task_id', 'doer_id'], 'required'],
            [['description'], 'string'],
            [['task_id', 'doer_id'], 'integer'],
            [['title'], 'string', 'max' => 128],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['doer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['doer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dt_add' => 'Dt Add',
            'rate' => 'Rate',
            'description' => 'Description',
            'title' => 'Title',
            'task_id' => 'Task ID',
            'doer_id' => 'Doer ID',
        ];
    }

    /**
     * Gets query for [[Doer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoer()
    {
        return $this->hasOne(Users::className(), ['id' => 'doer_id']);
    }

    /**
     * Gets query for [[Task]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::className(), ['id' => 'task_id']);
    }
}
