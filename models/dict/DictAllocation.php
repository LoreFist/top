<?php

namespace app\models\dict;

use Yii;

/**
 * This is the model class for table "dict_allocation".
 *
 * @property int $id
 * @property string $name
 * @property string $name_alt
 * @property string $name_eng
 * @property string $name_indx
 * @property int $cat
 * @property int $allocation_type
 * @property int $resort
 * @property int $resort_place
 * @property int $chage_baby
 * @property int $chage_small
 * @property int $chage_big
 * @property int $original
 * @property int $hotels_network
 * @property int $tophotels_cat
 * @property bool $tophotels_cat_confirm
 * @property bool $hotel_promo
 * @property bool $bonus
 * @property bool $active
 * @property bool $trash
 * @property string $date_create
 * @property int $updated
 * @property int $th_updated признак обновления записи, используется для построения таблицы кэша отелей на ТХ
 * @property int $noncertified_cat
 * @property int $geo
 * @property int $rooms_number Количество номеров в отеле
 * @property int $rooms_kind_number Количество типов номеров
 * @property int $blocks_number Количество корпусов в отеле
 * @property DictAllocationType $type
 * @property DictResort $resort0
 * @property DictAlloccat $cat0
 */
class DictAllocation extends \yii\db\ActiveRecord
{
    public function getType()
    {
        return $this->hasOne(DictAllocationType::className(), ['id'=>'allocation_type']);
    }

    public function getResort0()
    {
        return $this->hasOne(DictResort::className(),['id'=>'resort']);

    }

    public function getCat0()
    {
        return $this->hasOne(DictAlloccat::className(),['id'=>'cat']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dict_allocation';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dict');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'cat', 'allocation_type', 'resort', 'date_create', 'updated', 'th_updated', 'noncertified_cat'], 'required'],
            [['id', 'cat', 'allocation_type', 'resort', 'resort_place', 'chage_baby', 'chage_small', 'chage_big', 'original', 'hotels_network', 'tophotels_cat', 'updated', 'th_updated', 'noncertified_cat', 'geo', 'rooms_number', 'rooms_kind_number', 'blocks_number'], 'default', 'value' => null],
            [['id', 'cat', 'allocation_type', 'resort', 'resort_place', 'chage_baby', 'chage_small', 'chage_big', 'original', 'hotels_network', 'tophotels_cat', 'updated', 'th_updated', 'noncertified_cat', 'geo', 'rooms_number', 'rooms_kind_number', 'blocks_number'], 'integer'],
            [['tophotels_cat_confirm', 'hotel_promo', 'bonus', 'active', 'trash'], 'boolean'],
            [['date_create'], 'safe'],
            [['name', 'name_alt', 'name_eng', 'name_indx'], 'string', 'max' => 100],
            [['updated'], 'unique'],
            [['th_updated'], 'unique'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'name_alt' => 'Name Alt',
            'name_eng' => 'Name Eng',
            'name_indx' => 'Name Indx',
            'cat' => 'Cat',
            'allocation_type' => 'Allocation Type',
            'resort' => 'Resort',
            'resort_place' => 'Resort Place',
            'chage_baby' => 'Chage Baby',
            'chage_small' => 'Chage Small',
            'chage_big' => 'Chage Big',
            'original' => 'Original',
            'hotels_network' => 'Hotels Network',
            'tophotels_cat' => 'Tophotels Cat',
            'tophotels_cat_confirm' => 'Tophotels Cat Confirm',
            'hotel_promo' => 'Hotel Promo',
            'bonus' => 'Bonus',
            'active' => 'Active',
            'trash' => 'Trash',
            'date_create' => 'Date Create',
            'updated' => 'Updated',
            'th_updated' => 'признак обновления записи, используется для построения таблицы кэша отелей на ТХ',
            'noncertified_cat' => 'Noncertified Cat',
            'geo' => 'Geo',
            'rooms_number' => 'Количество номеров в отеле',
            'rooms_kind_number' => 'Количество типов номеров',
            'blocks_number' => 'Количество корпусов в отеле',
        ];
    }
}
