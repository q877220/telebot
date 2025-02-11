<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 *
 * @property string $type            Type of the entity. Currently, can be “mention” (@username), “hashtag” (#hashtag), “cashtag” ($USD), “bot_command” (/start@jobs_bot), “url” (https://telegram.org), “email” (do-not-reply@telegram.org), “phone_number” (+1-212-555-0123), “bold” (bold text), “italic” (italic text), “underline” (underlined text), “strikethrough” (strikethrough text), “spoiler” (spoiler message), “code” (monowidth string), “pre” (monowidth block), “text_link” (for clickable text URLs), “text_mention” (for users without usernames), “custom_emoji” (for inline custom emoji stickers)
 * @property int    $offset          Offset in UTF-16 code units to the start of the entity
 * @property int    $length          Length of the entity in UTF-16 code units
 * @property string $url             Optional. For “text_link” only, url that will be opened after user taps on the text
 * @property User   $user            Optional. For “text_mention” only, the mentioned user
 * @property string $language        Optional. For “pre” only, the programming language of the entity text
 * @property string $custom_emoji_id Optional. For “custom_emoji” only, unique identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the sticker
 */
class MessageEntity extends TelegramObject
{
    protected $attributes = [
        'type'            => 'string',
        'offset'          => 'integer',
        'length'          => 'integer',
        'url'             => 'string',
        'user'            => 'User',
        'language'        => 'string',
        'custom_emoji_id' => 'string',
    ];
}
