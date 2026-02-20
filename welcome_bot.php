<?php
/**
 * Welcome Bot - بات خوش آمدگویی
 * A simple welcome bot in PHP
 */

class WelcomeBot {
    private $messages = [];
    
    public function __construct() {
        // Default welcome messages in Persian (Farsi)
        $this->messages = [
            'سلام! خوش آمدید! 👋',
            'به خانواده ما خوش آمدید! 🎉',
            'سلام و درود! خوشحالیم که اینجا هستید! 😊',
            'به جمع ما خوش آمدید! امیدواریم لحظات خوبی را تجربه کنید! 🌟',
            'درود بر شما! ورود شما را گرامی می‌داریم! 🙏'
        ];
    }
    
    /**
     * Get a random welcome message
     * @return string
     */
    public function getRandomWelcome() {
        return $this->messages[array_rand($this->messages)];
    }
    
    /**
     * Greet a user by name
     * @param string $name User's name
     * @param bool $escapeHtml Whether to escape HTML entities (default: true for web safety)
     * @return string
     */
    public function greetUser($name, $escapeHtml = true) {
        $safeName = $escapeHtml ? htmlspecialchars($name, ENT_QUOTES, 'UTF-8') : $name;
        return "سلام {$safeName}! خوش آمدید! 🎊";
    }
    
    /**
     * Get all available welcome messages
     * @return array
     */
    public function getAllMessages() {
        return $this->messages;
    }
    
    /**
     * Add a custom welcome message
     * @param string $message
     * @param bool $escapeHtml Whether to escape HTML entities (default: true for web safety)
     */
    public function addMessage($message, $escapeHtml = true) {
        $safeMessage = $escapeHtml ? htmlspecialchars($message, ENT_QUOTES, 'UTF-8') : $message;
        $this->messages[] = $safeMessage;
    }
}

// Example usage
if (php_sapi_name() === 'cli') {
    echo "=== بات خوش آمدگویی (Welcome Bot) ===\n\n";
    
    $bot = new WelcomeBot();
    
    // Show random welcome
    echo "پیام تصادفی: " . $bot->getRandomWelcome() . "\n\n";
    
    // Greet a specific user
    echo "پیام شخصی: " . $bot->greetUser("علی") . "\n\n";
    
    // Show all messages
    echo "همه پیام‌های خوش‌آمدگویی:\n";
    foreach ($bot->getAllMessages() as $index => $message) {
        echo ($index + 1) . ". " . $message . "\n";
    }
}
?>
