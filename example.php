<?php
/**
 * Example usage of Welcome Bot
 * مثال استفاده از بات خوش‌آمدگویی
 */

require_once 'welcome_bot.php';

// Create bot instance
$bot = new WelcomeBot();

echo "=== مثال‌های استفاده (Usage Examples) ===\n\n";

// Example 1: Get random welcome message
echo "1. پیام تصادفی:\n";
echo $bot->getRandomWelcome() . "\n\n";

// Example 2: Greet specific users
echo "2. خوش‌آمدگویی به کاربران مختلف:\n";
$users = ['محمد', 'فاطمه', 'حسین', 'زهرا'];
foreach ($users as $user) {
    echo "- " . $bot->greetUser($user) . "\n";
}
echo "\n";

// Example 3: Add custom message
echo "3. افزودن پیام سفارشی:\n";
$bot->addMessage('با احترام به شما خوش آمد می‌گوییم! ✨');
echo "تعداد پیام‌ها: " . count($bot->getAllMessages()) . "\n";
echo "پیام جدید: " . $bot->getRandomWelcome() . "\n\n";

// Example 4: Use in web context (simulation)
echo "4. استفاده در محیط وب:\n";
echo "<!DOCTYPE html>\n";
echo "<html lang='fa' dir='rtl'>\n";
echo "<head>\n";
echo "    <meta charset='UTF-8'>\n";
echo "    <title>بات خوش‌آمدگویی</title>\n";
echo "</head>\n";
echo "<body>\n";
echo "    <h1>" . htmlspecialchars($bot->getRandomWelcome(), ENT_QUOTES, 'UTF-8') . "</h1>\n";
echo "</body>\n";
echo "</html>\n";
?>
