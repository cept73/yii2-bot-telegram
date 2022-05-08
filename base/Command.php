<?php

namespace aki\telegram\base;

use Yii;
use yii\base\Component;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 */
class Command extends Component
{
    /**
     * Run command bot
     *
     * @param String $command
     * @param Callable $fun
     * @return mixed|void
     */
    public static function run(string $command, callable $fun)
    {
        /** @var TelegramBase $telegram */
        $telegram = Yii::$app->getModule('telegram');
        $input = $telegram->input;

        $args = explode(' ', $input->message->text);
        $inputCommand = array_shift($args);

        if ($inputCommand === $command){
            return $fun($telegram, $args);
        }
    }
}
