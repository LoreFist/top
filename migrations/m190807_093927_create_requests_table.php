<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%requests}}`.
 */
class m190807_093927_create_requests_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable(
            'requests',
            [
                'id'              => $this->primaryKey(),
                'name'            => $this->text()->notNull(),
                'phone'           => $this->text()->notNull(),
                'email'           => $this->text(),
                'direct'          => $this->text(),
                'optional'        => $this->text(),
                'created_at'      => $this->integer(),
                'date_departure ' => $this->text(),
                'day_stay '       => $this->text(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('requests');
    }

}
