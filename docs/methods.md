# Methods

The `WeStacks\TeleBot\TeleBot` instance can execute all methods which provided in official Telegram API [documentstion](https://core.telegram.org/bots/api#available-methods).

If you need some working examples always feel free to see our [tests](https://github.com/WeStacks\TeleBot\tree/master/tests)

<!-- tabs:start -->

#### ** sendMessage **

```php
$bot = new TeleBot('<your bot token>');

// See docs for details:  https://core.telegram.org/bots/api#sendmessage
$message = $bot->sendMessage([
    'chat_id' => 1234567890,
    'text' => 'Test message',
    'reply_markup' => [
        'inline_keyboard' => [[[
            'text' => 'Google',
            'url' => 'https://google.com/'
        ]]]
    ]
]);
```

#### ** sendPhoto **

```php
$bot = new TeleBot('<your bot token>');

// See docs for details:  https://core.telegram.org/bots/api#sendphoto
// Using URL
$message = $bot->sendPhoto([
    'chat_id' => 1234567890,
    'photo' => 'https://picsum.photos/640'
]);

// Local file
$message = $bot->sendPhoto([
    'chat_id' => 1234567890,
    'photo' => fopen('local/file/path', 'r')
]);

// With filename
$message = $bot->sendPhoto([
    'chat_id' => 1234567890,
    'photo' => [
        'file' => fopen('https://picsum.photos/640', 'r'),
        'filename' => 'test-image.jpg'
    ]
]);
// or
$message = $bot->sendPhoto([
    'chat_id' => 1234567890,
    'photo' => new InputFile(fopen('https://picsum.photos/640', 'r'), 'test-image.jpg')
]);
```

<!-- tabs:end -->

## TeleBot methods

* `WeStacks\TeleBot\TeleBot` supports all methods form official Telegram API [documentation](https://core.telegram.org/bots/api#available-methods).

Additional library methods:

* **`async(bool $async = true)`**
    * Call next Telegram API method asynchronously, ignoring config parameter (bot method will return guzzle promise)
    * Returns: `self`

* **`exceptions(bool $exceptions = true)`**
    * Throw exceptions on next method, ignoring config parameter (bot method will throw `TeleBotException` on request error)
    * Returns: `self`

* **`config($value = null)`**
    * Get config that was used to create this bot instance. Passed key as argument will return only selected value instead of whole config.
    * Returns: `mixed`

* **`handleUpdate(Update $update)`**
    * Handle Telegram [Update](https://core.telegram.org/bots/api#update) using registered update handlers. See more details in [Handling updates](updates.md) section.
    * Returns: `mixed` - result of handled update

* **`addHandler($handler)`**
    * Add new update handler(s) to the bot instance. See more details in [Handling updates](updates.md) section
    * `$handler` - closure function or `UpdateHandler` class resolution.
    * Returns: `void`

* **`clearHandlers()`**
    * Remove all update handlers from bot instance
    * Returns: `void`

* **`setLocalCommands()`**
    * Sets locally registered bot commands on Telegram API server. See [Handling commands](updates.md#commands) section for more details. Can be customized by custom Kernel.
    * Returns: `mixed` - By default returns `true` if commands were set.

* **`deleteLocalCommands()`**
    * Deletes locally registered bot commands from Telegram API server. See [Handling commands](updates.md#commands) section for more details. Can be customized by custom Kernel.
    * Returns: `mixed` - By default returns `true` if commands were deleted.


## BotManager methods

* `WeStacks\TeleBot\BotManager` supports all `WeStacks\TeleBot\TeleBot` methods, passing them to your [default](configuration.md#default-string) bot.

Additional library methods:

* **`bot(string $name)`**
    * Get [TeleBot](methods.md#telebot-methods) instance by bot name
    * Returns: `TeleBot`

* **`bots()`**
    * Get array of bot names attached to BotManager instance
    * Returns: `string[]`

* **`add(string $name, TeleBot|string|array $bot)`**
    * Add a `$bot` with given `$name` to `BotManager` instance
    * Returns: `TeleBot` - given bot

* **`delete(string $name)`**
    * Delete a bot with given `$name` from `BotManager` instance
    * Returns: `void`

* **`default(string $name)`**
    * Set `BotManager` default bot to `$name`
    * Returns: `TeleBot` - default bot

## Laravel TeleBot Facade

`WeStacks\TeleBot\Laravel\TeleBot` is a [facade](https://laravel.com/docs/facades) for `WeStacks\TeleBot\BotManager` instance. It supports all `BotManager` methods statically (config is used from `config/telebot.php`).