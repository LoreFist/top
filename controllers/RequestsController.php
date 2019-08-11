<?php

namespace app\controllers;

use app\models\Requests;
use Yii;

class RequestsController extends \yii\web\Controller
{

    /**
     * Creates a new Requests model.
     * If creation is successful, the send email and alert
     *
     * @return mixed
     */

    public function actionHelp()
    {
        $model = new Requests();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = strtotime($model->created_at);

            if ($model->save()) {

                $email_to = 'test.th.welcome@gmail.com';
                try {
                    Yii::$app->mailer->compose(
                        '@app/mail/requests/request',
                        [
                            'model'    => $model,
                            'email_to' => $email_to,
                        ]
                    )
                        ->setFrom('sdfghj1234567sdfg@gmail.com')
                        ->setTo($email_to)
                        ->setSubject('Добавлена новая заявка')
                        ->send();

                    return json_encode(
                        [
                            'code'   => 1,
                            'status' => 'send and save',
                        ]
                    );

                } catch (ExitException $e) {
                    return json_encode(
                        [
                            'code'   => 0,
                            'status' => 'send error',
                        ]
                    );
                }


            } else {
                return json_encode(
                    [
                        'code'   => 0,
                        'status' => 'no save',
                    ]
                );
            }
        }

        return $this->render('help', ['model' => $model]);
    }

}
