<?php

namespace app\models\dict;

use Yii;

/**
 * This is the model class for table "dict_city".
 *
 * @property int $id
 * @property string $name
 * @property bool $active
 * @property bool $trash
 * @property int $updated
 * @property string $date_create
 * @property int $country
 * @property int $district
 * @property string $name_eng
 * @property int $staff_modified
 * @property int $resort
 */
class DictCity extends \yii\db\ActiveRecord
{

    /**
     * в постановке задачи 4.1 указаны эти города
     * @var array
     */
    private static $direct_city
        = [
            'Алматы', 'Астана', 'Белгород', 'Брянск', 'Владикавказ',
            'Волгоград', 'Воронеж', 'Гомель', 'Гродно', 'Екатеринбург',
            'Иркутск', 'Калининград', 'Киев', 'Краснодар', 'Красноярск',
            'Магадан', 'Махачкала', 'Минеральные воды', 'Москва', 'Мурманск',
            'Набережные Челны', 'Нижний Новгород', 'Новосибирск', 'Омск',
            'Оренбург', 'Пенза', 'Ростов-на-Дону', 'Саратов', 'Санкт-Петербург',
            'Симферополь', 'Смоленск', 'Сочи', 'Томск', 'Ульяновск', 'Харьков',
            'Челябинск', 'Шымкент', 'Якутск', 'Ярославль',
            'Москва', 'Санкт-Петербург'
        ];

    /**
     * получем ид, название города из справочника с указанными  городами в задаче
     *
     * @return \app\models\DictCity[]|\app\models\DictCountry[]|array|\yii\db\ActiveRecord[]
     */
    public static function getDirectCity()
    {
        return DictCity::find()
            ->select('id, name')
            ->where(['active' => true])
            ->andWhere(['trash' => false])
            ->andWhere(['name' => self::$direct_city])
            ->orderBy(['name' => SORT_ASC])
            ->all();
    }

    /**
     * по ид получаем город
     *
     * @param $id
     *
     * @return \app\models\DictCity[]|\app\models\DictCountry[]|array|\yii\db\ActiveRecord[]
     */
    public static function getDictCity($id)
    {
        return DictCity::find()
            ->select('id, name')
            ->where(['active' => true])
            ->andWhere(['trash' => false])
            ->andWhere(['country' => $id])
            ->all();
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dict_city';
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
            [['id', 'name', 'updated', 'date_create'], 'required'],
            [['id', 'updated', 'country', 'district', 'staff_modified', 'resort'], 'default', 'value' => null],
            [['id', 'updated', 'country', 'district', 'staff_modified', 'resort'], 'integer'],
            [['active', 'trash'], 'boolean'],
            [['date_create'], 'safe'],
            [['name', 'name_eng'], 'string', 'max' => 50],
            [['updated'], 'unique'],
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
            'active' => 'Active',
            'trash' => 'Trash',
            'updated' => 'Updated',
            'date_create' => 'Date Create',
            'country' => 'Country',
            'district' => 'District',
            'name_eng' => 'Name Eng',
            'staff_modified' => 'Staff Modified',
            'resort' => 'Resort',
        ];
    }
}
