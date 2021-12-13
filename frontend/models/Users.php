<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $password
 * @property string $dt_add
 * @property string $user_role_id
 * @property string|null $address
 * @property string|null $bd
 * @property string|null $about
 * @property int|null $phone
 * @property string|null $skype
 * @property string|null $telegram
 * @property string|null $avatar
 * @property float $rate
 * @property int|null $city_id
 *
 * @property Cities $city
 * @property Favourites[] $favourites
 * @property Favourites[] $favourites0
 * @property Messages[] $messages
 * @property Notifications[] $notifications
 * @property Opinions[] $opinions
 * @property PortfolioPhoto[] $portfolioPhotos
 * @property Replies[] $replies
 * @property Tasks[] $tasks
 * @property Tasks[] $tasks0
 * @property UserCategory[] $userCategories
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name', 'password', 'user_role_id', 'rate'], 'required'],
            [['dt_add', 'bd'], 'safe'],
            [['about'], 'string'],
            [['phone', 'city_id'], 'integer'],
            [['rate'], 'number'],
            [['email', 'name', 'password', 'user_role_id', 'address', 'skype', 'telegram', 'avatar'], 'string', 'max' => 128],
            [['email'], 'unique'],
            [['name'], 'unique'],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Name',
            'password' => 'Password',
            'dt_add' => 'Dt Add',
            'user_role_id' => 'User Role ID',
            'address' => 'Address',
            'bd' => 'Bd',
            'about' => 'About',
            'phone' => 'Phone',
            'skype' => 'Skype',
            'telegram' => 'Telegram',
            'avatar' => 'Avatar',
            'rate' => 'Rate',
            'city_id' => 'City ID',
        ];
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'city_id']);
    }

    /**
     * Gets query for [[Favourites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourites()
    {
        return $this->hasMany(Favourites::className(), ['favourite_person_id' => 'id']);
    }

    /**
     * Gets query for [[Favourites0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourites0()
    {
        return $this->hasMany(Favourites::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Messages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Messages::className(), ['writer_id' => 'id']);
    }

    /**
     * Gets query for [[Notifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notifications::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Opinions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOpinions()
    {
        return $this->hasMany(Opinions::className(), ['writer_id' => 'id']);
    }

    /**
     * Gets query for [[PortfolioPhotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolioPhotos()
    {
        return $this->hasMany(PortfolioPhoto::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Replies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReplies()
    {
        return $this->hasMany(Replies::className(), ['doer_id' => 'id']);
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['doer_id' => 'id']);
    }

    /**
     * Gets query for [[Tasks0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks0()
    {
        return $this->hasMany(Tasks::className(), ['client_id' => 'id']);
    }

    /**
     * Gets query for [[UserCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserCategories()
    {
        return $this->hasMany(UserCategory::className(), ['user_id' => 'id']);
    }
}
