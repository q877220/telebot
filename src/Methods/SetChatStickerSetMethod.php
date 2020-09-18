<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;

class SetChatStickerSetMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type'      => 'POST',
            'url'       => "https://api.telegram.org/bot{$this->token}/setChatStickerSet",
            'send'      => $this->send(),
            'expect'    => 'boolean'
        ];
    }

    private function send()
    {
        $parameters = [
            'chat_id'                   => 'string',
            'sticker_set_name'          => 'string'
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);
        return [ 'json' => TypeCaster::stripArrays($object) ];
    }
}