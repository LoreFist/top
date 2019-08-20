<?php
namespace app\commands;

use app\models\MailSchedule;
use app\models\Request;
use DateTime;
use Yii;
use yii\console\Controller;

class MailController extends Controller
{
    public function actionIndex()
    {
        $mails = MailSchedule::find()
            ->joinWith(['request','request.consultant'])
            ->where(['send' => 0])
            ->all();

        foreach ($mails as $mail){
            if(isset($mail->request->consultant)) {
                $date = new DateTime($mail->created_at);
                $now  = new DateTime();
                $min  = $date->diff($now)->format("%i");
                if ($min >= Yii::$app->params['minute_delay_email']) {
                    $mail->send = 1;
                    $mail->save();

                    $email_to = $mail->request->consultant->email;
                    Yii::$app->mailer->compose(
                        '@app/mail/requests/request',
                        [
                            'model'    => Request::findOne($mail->request_id),
                            'email_to' => $email_to,
                            'name'=>$mail->request->consultant->name
                        ]
                    )
                        ->setFrom(Yii::$app->params['admin_email'])
                        ->setTo($email_to)
                        ->setSubject('Добавлена новая заявка')
                        ->send();
                }
            }
        }
    }
}